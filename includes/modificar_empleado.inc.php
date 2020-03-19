<?php
if (isset($_POST['modificar_empleado'])) {
	session_start();
	require 'dbh.inc.php';
	require 'send_mail.inc.php';

	unset($_POST['modificar_empleado']);

	$Session = $_SESSION['Darmas_Empleado_Modificar'];
	if (!isset($_SESSION['Darmas_Empleado_Modificar'])) {
		header("Location: ../Empleado_Lista.php");
	}

	$username = $_POST['usuario'];
	$email = $_POST['mail'];
	$password = $_POST['Set_Reset_Password'];
	$nombreEmpleado = $_POST['nombreEmpleado'];
	$apellidoEmpleado = $_POST['apellidoEmpleado'];


	$sql = "SELECT * FROM empleados WHERE EmpleadoID=?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo 'Error: SQL Conection.';
		exit();		
	}else{
		mysqli_stmt_bind_param($stmt, "i", $Session);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);
		$Id_Cuenta = $row['FK_Cuenta'];
	}

	$sql = "SELECT * FROM cuenta WHERE Id_Cuenta=?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo 'Error: SQL Conection.';
		exit();		
	}else{
		mysqli_stmt_bind_param($stmt, "i", $Id_Cuenta);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row_C = mysqli_fetch_assoc($result);
	}

	if ($username != $row_C['Username']) {
		User($username,$Id_Cuenta,$conn);
	}

	if ($email != $row_C['Email']) {
		Email($email,$Id_Cuenta,$conn);
	}

	Nombre_Apellido($nombreEmpleado, $apellidoEmpleado, $Id_Cuenta, $conn);

	switch ($_POST['Set_Reset_Password']) {
		case '1':
			//---------------- Nueva contraseña
			if (!empty($_POST['password'])) {
				$password = $_POST['password'];

				$pwdCheck = password_verify($password, $row_C['Password']);

				if ($pwdCheck == false) {
					Password($Id_Cuenta,$password,$conn);

					SendMail($email, $password);
				}

			}
			break;

		case '2':
			//---------------- Contraseña actualizar
				SendReset($email, $conn);
			break;
		case '3':
			//---------------- Notificacion enviada por Correo
			SendMail($email, "");
			break;
	}


	unset($_SESSION['Darmas_Empleado_Modificar']);
	header("Location: ../Empleado_Lista.php");
}else{
	header("Location: ../Empleado_Modificar_Detalle.php");
	exit();		
}



//----------------------------------------------------------------------------------------
	function Email($email,$Id_Cuenta,$conn){
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/ˆ[a-zA-Z0-9]*$/", $username)) {
			header("Location: ../Empleado_Modificar_Detalle.php?error=invalidmail");
			$Error = '?error=invalidmail&';
		}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$Error = '?error=invalidmail&';
		}

		$sql ="SELECT Email FROM cuenta WHERE Email=? and Id_Cuenta != ?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			////header("Location: ../Empleado_Modificar_Detalle.php?error=sqlerror");
		}else{
			mysqli_stmt_bind_param($stmt, "si", $email,$Id_Cuenta);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) {
				////header("Location: ../Empleado_Modificar_Detalle.php?error=usermail&uid=".$username);
				echo "Hay mas correos";
			}else{

				$sql = "UPDATE cuenta SET Email=? WHERE Id_Cuenta=?;";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					echo "Error: SQL";
				}else{
					mysqli_stmt_bind_param($stmt, "si", $email,  $Id_Cuenta);
					mysqli_stmt_execute($stmt);
				}

				$sql = "UPDATE empleados SET correoEmpleado=? WHERE FK_Cuenta=?;";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					echo "Error: SQL";
				}else{
					mysqli_stmt_bind_param($stmt, "si", $email,  $Id_Cuenta);
					mysqli_stmt_execute($stmt);
				}

			}
		}
	}

	//----------------------------------------------------------------------------------------
	function User($username,$Id_Cuenta,$conn){

	 	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
			$Error = '?error=invaliduser&';
		}else{
			$sql ="SELECT Username FROM cuenta WHERE Username=? and Id_Cuenta != ?;";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				//header("Location: ../Empleado_Modificar_Detalle.php?error=sqlerror");
				exit();					
			}else{
				mysqli_stmt_bind_param($stmt, "si", $username,$Id_Cuenta);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);
				if ($resultCheck > 0) {
					//header("Location: ../Empleado_Modificar_Detalle.php?error=usertaken&mail=".$email);
					echo "Hay mas Usuarios";
				}else{
					//Si no se encuentran parecidos se actualizara el registro de dicha id
					$sql = "UPDATE cuenta SET Username=? WHERE Id_Cuenta=?;";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "Error: SQL";
					}else{
						mysqli_stmt_bind_param($stmt, "si", $username,  $Id_Cuenta);
						mysqli_stmt_execute($stmt);
					}
				}
			}
		}
	}


	//----------------------------------------------------------------------------------------
	function Password($Id_Cuenta,$password,$conn){

		$sql = "UPDATE cuenta SET Password=? WHERE Id_Cuenta=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			////header("Location: ../Empleado_Modificar_Detalle.php?error=sqlerror");
			exit();
		}else{
			$hashedpassword = password_hash($password, PASSWORD_DEFAULT);
			mysqli_stmt_bind_param($stmt, "si", $hashedpassword, $Id_Cuenta);
			mysqli_stmt_execute($stmt);
		}

	}

	//----------------------------------------------------------------------------------------
	function Nombre_Apellido($nombreEmpleado, $apellidoEmpleado, $Id_Cuenta,$conn){

		$sql = "UPDATE empleados SET nombreEmpleado=?,apellidoEmpleado=? WHERE FK_Cuenta=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			//header("Location: ../Empleado_Modificar_Detalle.php?error=sqlerror");
		}else{
			mysqli_stmt_bind_param($stmt, "ssi", $nombreEmpleado, $apellidoEmpleado, $Id_Cuenta);
			mysqli_stmt_execute($stmt);
		}

	}

	//----------------------------------------------------------------------------------------
	function New_Password($Id_Cuenta){

		$sql = "INSERT INTO confirmar_cuenta (cuenta_Id, Selector, Token) VALUES (?, ?, ?);";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			////header("Location: ../Empleado_Modificar_Detalle.php?error=sqlerror");
			exit();
		}else{

			$selector = bin2hex(random_bytes(8));
			$token = random_bytes(32);

			$hashedToken = password_hash($token, PASSWORD_DEFAULT);
			mysqli_stmt_bind_param($stmt, "iss", $Id_Cuenta, $selector, $hashedToken);
			mysqli_stmt_execute($stmt);
		}

	}

	//----------------------------------------------------------------------------------------
	function SendMail($email,$ExtraMSG){

		$server = $_SERVER['SERVER_NAME'];

		if ($server == "localhost") {
			$server.=':8080';
		}

		$url = "http://$server/Fundacion-dar-mas/login.php";
		//$url = "http://ejemplo.com/Fundacion-dar-mas/login.php";


		$url_consejos = "http://$server/Fundacion-dar-mas/consejos.php";

		$subject = utf8_decode("Modificacion de su cuenta, Fundacion dar mas");
		$message = utf8_decode('<h2>Se a modificado su cuenta de fundación dar más</h2>');

		if (!empty($ExtraMSG)) {
			$message .= '<p>Se a modificado su contrase&ntilde;a</p><p style="font-size: 22px">Nueva contrase&ntilde;a: <br> <label style="color: #2471A3; text-decoration: underline;">' .$ExtraMSG. '</label></p>';
		}else{
			$message .= "<br><br>";
		}


		$style = 'target="_blank" style="font-family:Segoe UI Semibold,Segoe UI Bold,Segoe UI,Helvetica Neue Medium,Arial,sans-serif; font-size:22px; text-align:center; text-decoration:none; font-weight:600; color:#fff; background: MEDIUMSEAGREEN; padding: 12px 50px; border-radius: 6px;"';

		$message .= '<a href="'. $url .'"  '.$style.'>Ingresar</a><br>';

		$message .= utf8_decode("<br>Si tienes cualquier pregunta, no dudes en comunicarte directamente al teléfono: (662)XXX-XX-XX");

		Enviar_Correo ($email,$subject,$message);

	}

	//----------------------------------------------------------------------------------------
	function SendReset($email, $conn){


		$selector = bin2hex(random_bytes(8));
		$token = random_bytes(32);


		$server = $_SERVER['SERVER_NAME'];

		if ($server == "localhost") {
			$server.=':8080';
		}

		echo "hola";

		$url = "http://$server/Fundacion-dar-mas/create_new_password.php?selector=" . $selector . "&validator=" . bin2hex($token);
		//$url = "http://tacosalpastor.cf/Fundacion-dar-mas/create_new_password.php?selector=" . $selector . "&validator=" . bin2hex($token);

		$expires = date("U") + 99900;	

		$sql = "DELETE FROM password_reset WHERE Password_Reset_Email=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo "error";
			exit();
		}else{
			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
		}

		$sql = "INSERT INTO password_reset (Password_Reset_Email, Password_Reset_Selector, Password_Reset_Token, Password_Reset_Expires) VALUES (?, ?, ?, ?);";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo "error";
			exit();
		}else{
			$hashedToken = password_hash($token, PASSWORD_DEFAULT);
			mysqli_stmt_bind_param($stmt, "ssss", $email, $selector, $hashedToken, $expires);
			mysqli_stmt_execute($stmt);
		}

		$subject = utf8_decode("Modificacion de contrase&ntilde;a, Fundacion dar mas");
		$message = utf8_decode("<h1>Se a pedido que modifique su contrase&ntilde;a</h1>");

		$message .= utf8_decode("<p>Aqui esta el link para realizar el cambio de contrase&ntilde;a: <br><br>");

		$style = 'target="_blank" style="font-family:Segoe UI Semibold,Segoe UI Bold,Segoe UI,Helvetica Neue Medium,Arial,sans-serif; font-size:22px; text-align:center; text-decoration:none; font-weight:600; color:#fff; background: MEDIUMSEAGREEN; padding: 12px 50px; border-radius: 6px;"';

		$message .= '<div style=" text-align:justify; background:lightgray; "><a href="'. $url .'" '.$style.'>'. $url .'</a></p></div>';

		Enviar_Correo ($email,$subject,$message);


	}