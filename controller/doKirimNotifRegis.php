<?php
require("config/email.php");

//Set who the message is to be sent to
$mail->addAddress('iqbalhamzah03@gmail.com');

//Set the subject line
$mail->Subject = 'Selamat Bergabung';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('email_content_registrasi_pelanggan.html'), dirname(__FILE__));

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
// $mail->addAttachment('images/phpmailer_mini.png');