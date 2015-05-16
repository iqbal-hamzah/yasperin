<?php

	require("conf.php");
	session_start();
	$iduser = $_GET["id"];
	$nama = $_POST["txtnama"];
	$email = $_POST["txtemail"];
	$address = $_POST["txtaddress"];
	$cell = $_POST["txtcell"];
	$gender = $_POST["txtgender"];
	$phone = $_POST["txtphone"];
		
	mysql_query("update pengurus set Nama='$nama',Email='$email',Alamat='$address',Phone='$phone',Handphone='$cell',JenisKelamin='$gender' where IdPengurus='".$iduser."'");
	
	header("location:../ubah_pengurus.php?id=$iduser&error=Edit Pengurus Sukses");

	

?>