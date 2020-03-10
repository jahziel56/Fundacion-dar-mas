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

	$Content = '<div style="background: #E6E6E6; width:; text-align:center; padding: 4px 12px; max-height: 500px; height: 300px; border-radius: 8px;  box-shadow: 0px 3px 6px 0px rgba(0,0,0,1);"><br>';
	$Content .= "<p style='text-align: justify'>".$message."</p>";
	$Content .= '</div>';

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
	$mail->Body    = $Content;

	$mail->addAddress($Email); 

	$mail->Send();
}