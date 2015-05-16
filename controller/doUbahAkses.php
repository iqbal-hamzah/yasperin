<?php

	require("conf.php");
	session_start();
	$iduser = $_GET["id"];	
	$akses = $_POST["txtakses"];
	

	mysql_query("update pengurus set TipeAkses='$akses' where IdPengurus='$iduser'");
	header("location:../ubah_pengurus.php?id=$iduser&error2=Edit Akses Berhasil");

	

?>