<?php
require("/../PHPMailer-master/PHPMailerAutoload.php");

$email = array(
	"host"	=>	"smtp.gmail.com",
	"smtpauth"	=>	true,
	"user_name"	=>	"iq134l@gmail.com",
	"password"	=>	"&*9kJi%tgB;L+",
	"from"		=>	"iq134l@gmail.com",
	"from_name"	=> 	"Iqbal Hamzah",
);


$mail = new PHPMailer();
 
$mail->isSMTP();                                    
$mail->Host = $email["host"];
$mail->SMTPAuth = $email["smtpauth"];
$mail->Username = $email["user_name"];
$mail->Password = $email["password"];
// $mail->SMTPSecure = 'tls';
//$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Port = 587; // or 587
$mail->SMTPDebug = 1;

 
$mail->From = $email["from"];
$mail->FromName = $email["from_name"];
$mail->addAddress('iqbalhamzah03@gmail.com', 'Iqbal hamzah');  
 
$mail->addReplyTo($email["user_name"], $email["from_name"]);