<?php

	require("conf.php");
	session_start();
	$iduser = $_SESSION["IdUser"];
	$nama = $_POST["txtnama"];
	$email = $_POST["txtemail"];
	$address = $_POST["txtaddress"];
	$cell = $_POST["txtcell"];
	$phone = $_POST["txtphone"];
	$gender = $_POST["txtgender"];
		
	mysql_query("update pengurus set Nama='$nama',Email='$email',Alamat='$address',Phone='$phone',Handphone='$cell',JenisKelamin='$gender' where IdPengurus='".$iduser."'");
	
	header("location:../ubah_profil_pengurus.php?error=Update Profile Sukses");

	

?>