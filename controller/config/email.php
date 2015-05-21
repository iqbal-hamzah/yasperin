<?php
require("/../PHPMailer-master/PHPMailerAutoload.php");

$email = array(
	"host"	=>	"smtp.gmail.com",
	"smtpauth"	=>	true,
	"user_name"	=>	"iq134l@gmail.com",
	"password"	=>	"&*9kJi%tgB;L+",
	"sent_from"	=>	"no-reply@yasperin.com",
	"sent_from_name"	=>	"no reply",
	"from"		=>	"iq134l@gmail.com",
	"from_name"	=> 	"Iqbal Hamzah",
);

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = "smtp.gmail.com";

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "iq134l@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "&*9kJi%tgB;L+";

//Set who the message is to be sent from
$mail->setFrom("no-reply@yasperin.com", "no reply");

//Set an alternative reply-to address
$mail->addReplyTo("no-reply@yasperin.com", "no reply");

// $mail->isSMTP();                                    
// $mail->Host = $email["host"];
// $mail->SMTPAuth = $email["smtpauth"];
// $mail->Username = $email["user_name"];
// $mail->Password = $email["password"];
// // $mail->SMTPSecure = 'tls';
// //$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
// $mail->Port = 587; // or 587
// $mail->SMTPDebug = 2;

 
// $mail->From = $email["from"];
// $mail->FromName = $email["from_name"];
// $mail->addAddress('iqbalhamzah03@gmail.com', 'Iqbal hamzah');  
 
// $mail->addReplyTo($email["user_name"], $email["from_name"]);