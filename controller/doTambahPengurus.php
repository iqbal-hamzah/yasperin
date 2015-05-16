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
	$akses = $_POST["txtakses"];
	
	$result = mysql_query("select * from pengurus where Email='$email'");
	$result2 = mysql_query("select * from pelanggan where Email='$email'");
	
	if(mysql_num_rows($result) == 1 || mysql_num_rows($result2) == 1)
	{
		header("location:../tambah_pengurus.php?error=Email telah digunakan");
	}
	else
	{
	
		$result3 = mysql_query("SELECT RIGHT(IdPengurus,4) as Id FROM  pengurus ORDER BY IdPengurus DESC");
		$pengurus = mysql_fetch_array($result3);
		$id = $pengurus["Id"]+1;
		if($pengurus["Id"] < 10)
			$id = "EM000".$id;
		else if($pengurus["Id"]< 100)
			$id = "EM00".$id;
		else if($pengurus["Id"]< 1000)
			$id = "EM0".$id;
		else
			$id = "EM".$id;
		
	mysql_query("insert into pengurus(IdPengurus,Sandi,TipeAkses,Nama,JenisKelamin,Alamat,Phone,Handphone,Email) values('$id','".md5($pass)."','$akses','$nama','$gender','$address','$phone','$cell','$email')") or die("Insert gagal");
		
	header("location:../tambah_pengurus.php?error=Tambah Pengurus Berhasil");

	}

?>