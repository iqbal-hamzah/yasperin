<?php

	require("conf.php");
	session_start();
	$iduser = $_SESSION["IdUser"];
	$nama = $_POST["txtnama"];
	$email = $_POST["txtemail"];
	$address = $_POST["txtaddress"];
	$phone = $_POST["txtphone"];
	$cell = $_POST["txtcell"];
	$city = $_POST["txtkota"];
	$gender = $_POST["txtgender"];
	$kodepos = $_POST["txtkodepos"];
		
	mysql_query("update pelanggan set Nama='$nama',Email='$email',Alamat='$address',Kota='$city',KodePos='$kodepos',Handphone='$cell',Phone='$phone',JenisKelamin='$gender' where IdPelanggan='".$iduser."'");
	
	header("location:../ubah_profil_pelanggan.php?error=Update Profile Sukses");

	

?>