<?php

	require("conf.php");
	session_start();
	$idpelanggan = $_GET["id"];	
	$pass = $_POST["txtpassword"];

	mysql_query("update pelanggan set Sandi='".md5($pass)."' where IdPelanggan='$idpelanggan'");
	header("location:../ubah_pelanggan.php?id=$idcustomer&error2=Edit Password Berhasil");

	

?>