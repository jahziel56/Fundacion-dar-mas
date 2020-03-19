<?php 
if (isset($_POST['reset_password_submit'])) {
	require 'send_mail.inc.php';
	require 'dbh.inc.php';


	$selector = bin2hex(random_bytes(8));
	$token = random_bytes(32);


	$server = $_SERVER['SERVER_NAME'];

	if ($server == "localhost") {
		$server.=':8080';
	}

	$url = "http://$server/Fundacion-dar-mas/OSC_acces.php";
	//$url = "http://tacosalpastor.cf/Fundacion-dar-mas/OSC_acces.php;

	$expires = date("U") + 99000;	




	$sql = "SELECT * FROM registro WHERE Id_Cuenta=?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "error";
		exit();
	}else{
		$hashedToken = password_hash($token, PASSWORD_DEFAULT);
		mysqli_stmt_bind_param($stmt, "ssss", $Email, $selector, $hashedToken, $expires);
		mysqli_stmt_execute($stmt);
	}

	mysqli_stmt_close($stmt);
	mysqli_close($stmt);

	$subject = utf8_decode("Reinicio de contraseña, Fundacion dar mas");
	$message = utf8_decode("<h1>Solicitud de cambio de contraseña</h1>
	<p>Recibimos una solicitud de cambio de contraseña para tu cuenta de Fundacion dar mas.</p>
	<p>Este enlace expirará en 1 horas. Si no solicitaste un cambio de contraseña, ignora este correo y no se harán cambios en tu cuenta. Es posible que otra persona haya ingresado tu correo por error, pero te recomendamos consultar nuestros consejos en Protección de cuenta si tienes alguna duda o inquietud.</p>");

	$message .= utf8_decode("<p>Aqui esta el link para realizar el cambio de contraseña: <br>");

	$style = 'target="_blank" style="font-family:Segoe UI Semibold,Segoe UI Bold,Segoe UI,Helvetica Neue Medium,Arial,sans-serif; font-size: 16px; text-align:justify; text-decoration:none; font-weight:600; color:#fff; background: MEDIUMSEAGREEN; padding: 2px 2px; border-radius: 6px;"';

	$message .= '<div style=" text-align:justify; background:lightgray; "><a href="'. $url .'" '.$style.'>'. $url .'</a></p></div>';

	Enviar_Correo ($Email,$subject,$message);


	header("Location: ../reset_osc.php?reset=success");
	exit();	
}
else{
	header("Location: ../login.php");
	exit();		
}


