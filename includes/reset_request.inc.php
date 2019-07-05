<?php 
if (isset($_POST['reset_password_submit'])) {

	$selector = bin2hex(random_bytes(8));
	$token = random_bytes(32);

	$url = "http://localhost:8080/Fundacion-dar-mas/create_new_password.php?selector=" . $selector . "&validator=" . bin2hex($token);

	$expires = date("U") + 1800;


	require 'dbh.inc.php';

	$Email = $_POST["mail_reset_password"];

	$sql = "DELETE FROM password_reset WHERE Password_Reset_Email=?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "error";
		exit();
	}else{
		mysqli_stmt_bind_param($stmt, "s", $Email);
		mysqli_stmt_execute($stmt);
	}

	$sql = "INSERT INTO password_reset (Password_Reset_Email, Password_Reset_Selector, Password_Reset_Token, Password_Reset_Expires) VALUES (?, ?, ?, ?);";
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

	$to = $Email;
	$subject = 'Reinicio de contraseña, Fundacion dar mas';
	$message = '<h2>Solicitud de cambio de contraseña</h2><br>
	<p>Recibimos una solicitud de cambio de contraseña para tu cuenta de Fundacio dar mas.</p><br>
	<p>Este enlace expirará en 1 horas. Si no solicitaste un cambio de contraseña, ignora este correo y no se harán cambios en tu cuenta. Es posible que otro persona haya ingresado tu correo por error, pero te recomendamos consultar nuestros consejos en Protección de cuenta si tienes alguna duda o inquietud.</p>';

	$message .= '<p>Aqui esta el link para realizar el cambio de contraseña: <br>';

	$message .= '<a href="'. $url .'">'. $url .'</a></p>';

	$headers = "FROM: Fundacion dar mas <jahziel56@hotmail.com>\r\n";
	$headers .= "Reply-To: jahziel56@hotmail.com\r\n";
	$headers .= "Content-type: text/html\r\n";

	mail($to, $subject, $message, $headers);

	header("Location: ../reset_password.php?reset=success");
	exit();	
}
else{
	header("Location: ../login.php");
	exit();		
}


