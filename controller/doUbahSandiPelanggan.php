<?php

	require("conf.php");
	session_start();
	$iduser = $_GET['id'];
	$oldpass = $_POST["txtoldpassword"];
	$pass = $_POST["txtpassword"];
	
	$result = mysql_query("select * from pelanggan where IdPelanggan='$iduser'");
	$row = mysql_fetch_array($result);
	if(md5($oldpass) != $row["Sandi"])
	{
		header("location:../ubah_profil_pelanggan.php?error2=Password Salah");
	}
	else
	{
		
		mysql_query("update pelanggan set Sandi='".md5($pass)."' where IdPelanggan='$iduser'");
		header("location:../ubah_profil_pelanggan.php?error2=Ubah Password Berhasil");
	}

?>