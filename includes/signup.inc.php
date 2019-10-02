<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
/* METODO: evitar que el usuario ingrese a esta pagina php desde la barra de busqueda */
/* signup-submit es el boton del formulario que se encuentra en la signup.php */
if (isset($_POST['signup-submit'])) {
	/* manda a llamar a la pagina php donde se conecta a la base de datos de esta forma se ahorra codigo y se tiene todo en una funcion mas simple */
	require 'dbh.inc.php';
	require '../PHPMailer/src/Exception.php';
	require '../PHPMailer/src/PHPMailer.php';
	require '../PHPMailer/src/SMTP.php';

	/* lo que se encuentra dentro del metodo post es el name de cada input en signup.php */
	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];
	$Type = 1;

	/* Verifica si hay campos vacios */
	if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
		header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
		exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/ˆ[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../signup.php?error=invalidmailuid");
		exit();	
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../signup.php?error=invalidmail&uid=".$username);
		exit();		
	}
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../signup.php?error=invaliduid&mail=".$email);
		exit();		
	}
	else if ($password !== $passwordRepeat) {
		header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
		exit();	
	}
	else{
		$sql ="SELECT Username FROM cuenta WHERE Username=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../signup.php?error=sqlerror");
			exit();					
		}else{
			/* S string, B boolean, I integrer */
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) {
				header("Location: ../signup.php?error=usertaken&mail=".$email);
				exit();	
			}else{

				$sql ="SELECT Email FROM cuenta WHERE Email=?";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: ../signup.php?error=sqlerror");
					exit();		
				}else{
					mysqli_stmt_bind_param($stmt, "s", $email);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					$resultCheck = mysqli_stmt_num_rows($stmt);
					if ($resultCheck > 0) {
						header("Location: ../signup.php?error=usermail&uid=".$username);
						exit();	
					}else{

						$sql ="INSERT INTO cuenta (Username, Email, Password, Type) VALUES (?, ?, ?, ?)";
						$stmt = mysqli_stmt_init($conn);
						if (!mysqli_stmt_prepare($stmt, $sql)) {
							header("Location: ../signup.php?error=sqlerror");
							exit();					
						}else{
							$hashedpassword = password_hash($password, PASSWORD_DEFAULT);

							mysqli_stmt_bind_param($stmt, "sssi", $username, $email, $hashedpassword,$Type);
							mysqli_stmt_execute($stmt);
							$ultimaID = $conn->insert_id;


							$selector = bin2hex(random_bytes(8));
							$token = random_bytes(32);

							//$url = "http://localhost:8080/Fundacion-dar-mas/includes/confirm_account.inc.php?selector=" . $selector . "&validator=" . bin2hex($token);
							$url = "http://tacosalpastor.cf/Fundacion-dar-mas/includes/confirm_account.inc.php?selector=" . $selector . "&validator=" . bin2hex($token);


							$sql = "INSERT INTO confirmar_cuenta (cuenta_Id, Selector, Token) VALUES (?, ?, ?);";
							$stmt = mysqli_stmt_init($conn);
							if (!mysqli_stmt_prepare($stmt, $sql)) {
								header("Location: ../signup.php?error=sqlerror");
								exit();
							}else{
								$hashedToken = password_hash($token, PASSWORD_DEFAULT);
								mysqli_stmt_bind_param($stmt, "iss", $ultimaID, $selector, $hashedToken);
								mysqli_stmt_execute($stmt);


								$url_consejos = 'http://tacosalpastor.cf/Fundacion-dar-mas/signup.php';

								$subject = utf8_decode("Creacion de cuenta, Fundacion dar mas");
								$message = utf8_decode('<h2>Confirmacion de correo</h2>
								<p>Estas a un solo paso de activar tu cuenta en Fundacion dar mas</p>');

								$message .= utf8_decode("<p>Aqui esta el link para confirmar tu cuenta:</p>");
								$message .= '<a href="'. $url .'">Confirmar Cuenta</a><br>';

								$message .= utf8_decode("<br>Si tienes cualquier pregunta, no dudes en comunicarte directamente al teléfono: (622)1477894");

								$headers = "FROM: Fundacion dar mas <jahziel56@hotmail.com>\r\n";
								$headers .= "Reply-To: jahziel56@hotmail.com\r\n";

								$mail = new PHPMailer();
								$mail->setLanguage('es', '/optional/path/to/language/directory/');


								$mail->isSMTP();
								$mail->SMTPAuth = true;                               
								$mail->SMTPSecure = 'ssl';                            
								$mail->Host = 'smtp.gmail.com'; 
								$mail->Port = '465';
								$mail->isHTML();

								$mail->Username = 'darkkeioz@gmail.com';                 
								$mail->Password = 'jahziel555';

							    $mail->setFrom('fundaciondarmas@gmail.com', 'Fundacion Dar Mas');
							    $mail->addReplyTo('Reply-To: pepeeltoro@hotmail.com', 'Information');


								$mail->Subject = $subject;
								$mail->Body    = $message;

								$mail->addAddress($email); 

								$mail->Send();












								header("Location: ../login.php?signup=confirmmail");
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
	header("Location: ../signup.php");
	exit();		
}