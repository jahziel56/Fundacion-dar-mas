<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;



function Enviar_Correo ($Email,$subject,$message){
	//Set PHPMailer
	require_once '../PHPMailer/src/Exception.php';
	require_once '../PHPMailer/src/PHPMailer.php';
	require_once '../PHPMailer/src/SMTP.php';

	/*Set DB si se requiere...
	//require_once 'dbh.inc.php';
		$db_rute = 'dbh.inc.php';
	if (file_exists($db_rute)) {
			require 'dbh.inc.php';
			//echo "existe";
	} else {
	    	require 'includes/dbh.inc.php';
	    	//echo "Tambien existe, pero en otra ruta";
	}*/

	//Set Lenguaje
	$mail = new PHPMailer();
	$mail->setLanguage('es', '/optional/path/to/language/directory/');


	//Set Parameters
	$mail->isSMTP();
	$mail->SMTPAuth = true;                               
	$mail->SMTPSecure = 'ssl';                            
	$mail->Host = 'smtp.gmail.com'; 
	$mail->Port = '465';
	$mail->isHTML();

	//Set Correo y Contraseña
	$mail->Username = 'darkkeioz@gmail.com';                 
	$mail->Password = 'jahziel555';

	//Set Headers
	$headers = "FROM: Fundacion dar mas <fundaciondarmas@gmail.com>\r\n";
	$headers .= "Reply-To: fundaciondarmas@gmail.com\r\n";


	//Set send From and Reply-To
    $mail->setFrom('fundaciondarmas@gmail.com', 'Fundacion Dar Mas');
    $mail->addReplyTo('Reply-To: fundaciondarmas@gmail.com', 'Information');


    //Set Structure
	$mail->Subject = $subject;
	$mail->Body    = $message;

	$mail->addAddress($Email); 

	$mail->Send();
}