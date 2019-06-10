<?php 

if (isset($_POST['login-submit'])) {
	require 'dbh.inc.php';

	$mailuid = $_POST['mailuid'];
	$password = $_POST['pwd'];

	if (empty($mailuid) || empty($password)) {
		header("Location: ../login.php?error=emptyfields");
		exit();	
	}
	else{
		$sql = "SELECT * FROM cuenta WHERE Username=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../login.php?error=sqlerror");
			exit();		
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $mailuid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				$pwdCheck = password_verify($password, $row['Password']);
				if ($pwdCheck == false) {
					header("Location: ../login.php?error=wrongpwd");
					exit();		
				}
				else if ($pwdCheck == true) {
					session_start();
					$_SESSION['user_Id'] = $row['Id_Cuenta'];
					$_SESSION['user_Username'] = $row['Username'];
					$_SESSION['Type_User'] = $row['Type'];

					header("Location: ../index.php?login=success");
					exit();		
				}
				else{
					header("Location: ../login.php?error=Letalwrongpwd");
					exit();		
				}
			}
			else{
				header("Location: ../login.php?error=nouser");
				exit();	
			}
		}
	}

}
else{
	header("Location: ../login.php");
	exit();		
}