<?php

require("conf.php");
$email = $_POST['txtemail'];
$nohp = $_POST['txtcell'];

$rs1 = mysql_query("select * from pelanggan where Email='$email' and Handphone='$nohp'");
$rs2 = mysql_query("select * from pengurus where Email='$email' and Handphone='$nohp'");
$row = "";

$random_digit=rand(00000,99999);

function random($panjang)
{
   $karakter = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
   $string = '';
   for($i = 0; $i < $panjang; $i++) {
   $pos = rand(0, strlen($karakter)-1);
   $string .= $karakter{$pos};
   }
    return $string;
}
$new_pass=random(5).$random_digit.$fileName;

if(mysql_num_rows($rs1) == 1)
{
	$row = mysql_fetch_array($rs1);
	mysql_query("update pelanggan set Sandi='".md5($new_pass)."' where IdPelanggan='".$row[0]."'");
}
else if(mysql_num_rows($rs2) == 1)
{
	$row = mysql_fetch_array($rs2);
	mysql_query("update pengurus set Sandi='".md5($new_pass)."' where IdPengurus='".$row[0]."'");
}
else
{
	header("location:../lupasandi.php?error=Data Salah");
	exit;
}


$nama = $row['Nama'];


require 'PHPMailer-master/PHPMailerAutoload.php';
 
$mail = new PHPMailer;
 
$mail->isSMTP();                                      
$mail->Host = 'smtp.gmail.com';                       
$mail->SMTPAuth = true;                              
$mail->Username = 'yasperin.indonesia@gmail.com';                   
$mail->Password = 'yasperin1';              
$mail->SMTPSecure = 'tls';                          
$mail->Port = 587;                                  
$mail->setFrom('yasperin.indonesia@gmail.com', 'Admin Yasperin');     
$mail->addAddress(''.$email, ''.$nama); 

$mail->isHTML(true);                                  
 
$mail->Subject = 'Permintaan Reset Password';
$mail->Body    = 'Halo , '.$nama.' <br/><br/> Password anda telah di reset menjadi <b>'.$new_pass.'</b> <br/>Harap Segera Mengganti Password anda <br/><br/> Kind Regards, <br/> Admin Yasperin';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
 
if(!$mail->send()) {
	header("location:../lupasandi.php?error=Maaf Reset Password sedang tidak dapat dilakukan pada saat ini");
   exit;
}
 
header("location:../lupasandi.php?error=Password Telah dikirimkan ke Email anda");