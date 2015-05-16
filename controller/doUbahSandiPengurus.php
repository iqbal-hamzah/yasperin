<?php

	require("conf.php");
	session_start();
	$idpengurus = $_GET["id"];	
	$pass = $_POST["txtpassword"];

	mysql_query("update pelanggan set Sandi='".md5($pass)."' where IdPengurus='$idpengurus'");
	header("location:../ubah_pengurus.php?id=$idpengurus&error2=Edit Password Berhasil");

	

?>