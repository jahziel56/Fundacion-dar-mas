<?php 
if (isset($_POST['save_reset_password_submit'])) {

	$selector = $_POST["selector"];
	$validator = $_POST["validator"];
	$password = $_POST["password"];
	$repeat_password = $_POST["repeat_password"];

	if (empty($password) || empty($repeat_password)) {
		header("Location: ../create_new_password.php?newpassword=empty");
		exit();
	}elseif ($password != $repeat_password) {
		header("Location: ../create_new_password.php?newpassword=passwordnotsame");
		exit();	
	}

	$currentDate = date("U");

	require 'dbh.inc.php';

	$sql = "SELECT * FROM password_reset WHERE Password_Reset_Selector=? AND Password_Reset_Expires >= ?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "error";
		exit();
	}else{
		mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
		mysqli_stmt_execute($stmt);

		$result = mysqli_stmt_get_result($stmt);
		if (!$row = mysqli_fetch_assoc($result)) {
			echo "Necesitara volver a pedir un cambio de contraseña.";
			exit();		
		}else{

			$tokenBin = hex2bin($validator);
			$tokenCheck = password_verify($tokenBin, $row["Password_Reset_Token"]);

			if ($tokenCheck === false) {
				echo "Necesitara volver a pedir un cambio de contraseña.";
				exit();	
			}elseif ($tokenCheck === true) {
			
				$tokenEmail = $row['Password_Reset_Email'];

				$sql = "SELECT * FROM cuenta WHERE Email=?";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					echo "error";
					exit();
				}else{
					mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
					mysqli_stmt_execute($stmt);

					$result = mysqli_stmt_get_result($stmt);
					if (!$row = mysqli_fetch_assoc($result)) {
						echo "Se produjo un error!";
						exit();		
					}else{

						$sql = "UPDATE cuenta SET Password=? WHERE Email=?";
						$stmt = mysqli_stmt_init($conn);
						if (!mysqli_stmt_prepare($stmt, $sql)) {
							echo "error";
							exit();
						}else{
							$Newhashedpassword = password_hash($password, PASSWORD_DEFAULT);

							mysqli_stmt_bind_param($stmt, "ss", $Newhashedpassword, $tokenEmail);
							mysqli_stmt_execute($stmt);


							$sql = "DELETE FROM password_reset WHERE Password_Reset_Email=?";
							$stmt = mysqli_stmt_init($conn);
							if (!mysqli_stmt_prepare($stmt, $sql)) {
								echo "error";
								exit();
							}else{
								mysqli_stmt_bind_param($stmt, "s", $Email);
								mysqli_stmt_execute($stmt);

								header("Location: ../login.php?reset=success");
								exit();	
							}


						}


					}
				}

			}

		}
	}
}
else{
	header("Location: ../index.php");
	exit();		
}


