<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$mail = new PHPMailer();


$mail->isSMTP();
$mail->SMTPAuth = true;                               
$mail->SMTPSecure = 'ssl';                            
$mail->Host = 'smtp.gmail.com'; 
$mail->Port = '465';
$mail->isHTML();
$mail->Username = 'darkkeioz@gmail.com';                 
$mail->Password = 'jahziel555';                       
$mail->setFrom('nose@nosemas.com');   
$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';

$mail->addAddress('jahziel56@hotmail.com'); 

$mail->Send();

 ?>