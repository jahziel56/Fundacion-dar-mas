<?php
if (isset($_POST['Empleados_Crear_submit'])) {
	/* manda a llamar a la pagina php donde se conecta a la base de datos de esta forma se ahorra codigo y se tiene todo en una funcion mas simple */
	require 'dbh.inc.php';
	require 'send_mail.inc.php';

	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];
	$Type = 2;

	$nombreEmpleado = $_POST['nombreEmpleado'];
	$apellidoEmpleado = $_POST['apellidoEmpleado'];

	/* Verifica si hay campos vacios */
	if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
		header("Location: ../Empleados_Crear.php?error=emptyfields&uid=".$username."&mail=".$email);
		exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/ˆ[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../Empleados_Crear.php?error=invalidmailuid");
		exit();	
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../Empleados_Crear.php?error=invalidmail&uid=".$username);
		exit();		
	}
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../Empleados_Crear.php?error=invaliduid&mail=".$email);
		exit();		
	}
	else if ($password !== $passwordRepeat) {
		header("Location: ../Empleados_Crear.php?error=passwordcheck&uid=".$username."&mail=".$email);
		exit();	
	}
	else{
		$sql ="SELECT Username FROM cuenta WHERE Username=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../Empleados_Crear.php?error=sqlerror");
			exit();					
		}else{
			/* S string, B boolean, I integrer */
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) {
				header("Location: ../Empleados_Crear.php?error=usertaken&mail=".$email);
				exit();	
			}else{

				$sql ="SELECT Email FROM cuenta WHERE Email=?";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: ../Empleados_Crear.php?error=sqlerror");
					exit();		
				}else{
					mysqli_stmt_bind_param($stmt, "s", $email);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					$resultCheck = mysqli_stmt_num_rows($stmt);
					if ($resultCheck > 0) {
						header("Location: ../Empleados_Crear.php?error=usermail&uid=".$username);
						exit();	
					}else{

						$sql ="INSERT INTO cuenta (Username, Email, Password, Type) VALUES (?, ?, ?, ?)";
						$stmt = mysqli_stmt_init($conn);
						if (!mysqli_stmt_prepare($stmt, $sql)) {
							header("Location: ../Empleados_Crear.php?error=sqlerror");
							exit();					
						}else{
							$hashedpassword = password_hash($password, PASSWORD_DEFAULT);

							mysqli_stmt_bind_param($stmt, "sssi", $username, $email, $hashedpassword,$Type);
							mysqli_stmt_execute($stmt);
							$ultimaID = $conn->insert_id;


							$selector = bin2hex(random_bytes(8));
							$token = random_bytes(32);


							$server = $_SERVER['SERVER_NAME'];

							if ($server == "localhost") {
								$server.=':8080';
							}


							$url = "http://$server/Fundacion-dar-mas/includes/confirm_account.inc.php?selector=" . $selector . "&validator=" . bin2hex($token);
							//$url = "http://ejemplo.com/Fundacion-dar-mas/includes/confirm_account.inc.php?selector=" . $selector . "&validator=" . bin2hex($token);


							$sql = "INSERT INTO confirmar_cuenta (cuenta_Id, Selector, Token) VALUES (?, ?, ?);";
							$stmt = mysqli_stmt_init($conn);
							if (!mysqli_stmt_prepare($stmt, $sql)) {
								header("Location: ../Empleados_Crear.php?error=sqlerror");
								exit();
							}else{
								$hashedToken = password_hash($token, PASSWORD_DEFAULT);
								mysqli_stmt_bind_param($stmt, "iss", $ultimaID, $selector, $hashedToken);
								mysqli_stmt_execute($stmt);

								$sql = "INSERT INTO empleados (FK_Cuenta, nombreEmpleado, apellidoEmpleado, correoEmpleado) VALUES (?, ?, ?, ?);";
								$stmt = mysqli_stmt_init($conn);
								if (!mysqli_stmt_prepare($stmt, $sql)) {
									header("Location: ../Empleados_Crear.php?error=sqlerror");
									exit();
								}else{
									mysqli_stmt_bind_param($stmt, "isss", $ultimaID, $nombreEmpleado, $apellidoEmpleado, $email);
									mysqli_stmt_execute($stmt);
								}



								$url_consejos = "http://$server/Fundacion-dar-mas/consejos.php";

								$subject = utf8_decode("Creacion de cuenta, Fundacion dar mas");
								$message = utf8_decode('<h2>Confirmacion de correo</h2>
								<p>Estas a un solo paso de activar tu cuenta en Fundacion dar mas</p>');

								$message .= utf8_decode("<p>Aqui esta el link para confirmar tu cuenta:</p>");
								$message .= '<a href="'. $url .'">Confirmar Cuenta</a><br>';

								$message .= utf8_decode("<br>Si tienes cualquier pregunta, no dudes en comunicarte directamente al teléfono: (662)XXX-XX-XX");

								Enviar_Correo ($email,$subject,$message);


								header("Location: ../login.php?Empleados_Crear=confirmmail");
								exit();	
							}
						}
					}
				}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysql_close($conn);
}
else{
	header("Location: ../Empleados_Crear.php");
	exit();		
}