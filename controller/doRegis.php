<?php

	require("conf.php");
	session_start();
	$nama = $_POST["txtnama"];
	$email = $_POST["txtemail"];
	$pass = $_POST["txtpassword"];
	$address = $_POST["txtaddress"];
	$phone = $_POST["txtphone"];
	$cell = $_POST["txtcell"];
	$city = $_POST["txtkota"];
	$gender = $_POST["txtgender"];
	$kodepos = $_POST["txtkodepos"];
	
	$result = mysql_query("select * from pelanggan where Email='$email'");
	$result2 = mysql_query("select * from pengurus where Email='$email'");
	if(mysql_num_rows($result) == 1 || mysql_num_rows($result2) == 1)
	{
		header("location:../registrasi.php?error=Email telah digunakan");
	}
	else
	{
	
		$result3 = mysql_query("SELECT RIGHT(IdPelanggan,4) as Id FROM  pelanggan ORDER BY IdPelanggan DESC");
		$pelanggan = mysql_fetch_array($result3);
		$id = $pelanggan["Id"]+1;
		if($pelanggan["Id"] < 10)
			$id = "PL000".$id;
		else if($pelanggan["Id"]< 100)
			$id = "PL00".$id;
		else if($pelanggan["Id"]< 1000)
			$id = "PL0".$id;
		else
			$id = "PL".$id;
	
	mysql_query("insert into pelanggan(IdPelanggan,Sandi,Nama,JenisKelamin,Alamat,Kota,KodePos,Phone,Handphone,Email) values('$id','".md5($pass)."','$nama','$gender','$address','$city','$kodepos','$phone','$cell','$email')") or die("Insert GagaL");
	
	// send email notif registrasi
	require("doKirimNotifRegis.php");
	$mail_msg = "ok";
	if(!$mail->send()) {
		$mail_msg = "Email fail to send";
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		die();
	}
	
	header("location:../registrasi.php?error=Registrasi Sukses&email=".$mail_msg);

	}

?>