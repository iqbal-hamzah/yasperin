<?php
require("config/email.php");

$mail->WordWrap = 50;                                
$mail->isHTML(true);                                  
 
$mail->Subject = 'Selamat Datang';
$mail->Body    = 'Terima kasih sudah melakukan registrasi pelanggan baru';