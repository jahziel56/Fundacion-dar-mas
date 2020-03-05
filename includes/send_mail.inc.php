<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;



function Enviar_Correo ($Email,$subject,$message){
	//Set PHPMailer
	require_once '../PHPMailer/src/Exception.php';
	require_once '../PHPMailer/src/PHPMailer.php';
	require_once '../PHPMailer/src/SMTP.php';

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
	$headers = "FROM: Fundacion dar mas <registro@darmas.org.mx>\r\n";
	$headers .= "Reply-To: registro@darmas.org.mx\r\n";


	//Set send From and Reply-To
    $mail->setFrom('registro@darmas.org.mx', 'Fundacion Dar Mas');
    $mail->addReplyTo('Reply-To: registro@darmas.org.mx', 'Information');


    //Set Structure
	$mail->Subject = $subject;
	$mail->Body    = $message;

	$mail->addAddress($Email); 

	$mail->Send();
}