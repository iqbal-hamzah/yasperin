<?php

	require("conf.php");
	session_start();
	
	$idpemesanan = $_POST['idpemesanan'];
	$total = $_POST['total'];
	$alamat = $_POST['txtaddress'];
	$kota = $_POST['txtkota'];
	$kodepos = $_POST['txtkodepos'];
	$iduser = $_SESSION["IdUser"];
	$ongkos = 0;
	
	//Jakarta Rp 10 ribu
	//Bogor, Depok, Tangerang, dan Bekasi Rp. 20 ribu
	//luar Jabodetabek Rp 30 ribu
	
	if($kota == "Jakarta")
	{
		$ongkos = 10000;
	}
	else if($kota == "Bogor" || $kota == "Depok" || $kota == "Bekasi" || $kota == "Tangerang")
	{
		$ongkos = 20000;
	}
	else $ongkos = 30000;
	
	$totalbayar = $ongkos+$total;
	
	$result = mysql_query("SELECT RIGHT(IdPengiriman,4) as Id FROM pengiriman ORDER BY IdPengiriman DESC");
	$pengiriman = mysql_fetch_array($result);
	$idpengiriman = $pengiriman["Id"]+1;
	if($pengiriman["Id"] < 10)
		$idpengiriman = "PR000".$idpengiriman;
	else if($pengiriman["Id"]< 100)
		$idpengiriman = "PR00".$idpengiriman;
	else if($pengiriman["Id"]< 1000)
		$idpengiriman = "PR0".$idpengiriman;
	else
		$idpengiriman = "PR".$idpengiriman;

	$result2 = mysql_query("SELECT RIGHT(IdPembayaran,4) as Id FROM pembayaran ORDER BY IdPembayaran DESC");
	$pembayaran = mysql_fetch_array($result2);
	$idpembayaran = $pembayaran["Id"]+1;
	if($pembayaran["Id"] < 10)
		$idpembayaran = "PB000".$idpembayaran;
	else if($pembayaran["Id"]< 100)
		$idpembayaran = "PB00".$idpembayaran;
	else if($pembayaran["Id"]< 1000)
		$idpembayaran = "PB0".$idpembayaran;
	else
		$idpembayaran = "PB".$idpembayaran;

	
	$result3 = mysql_query("SELECT RIGHT(IdNota,4) as Id FROM nota ORDER BY IdNota DESC");
	$nota = mysql_fetch_array($result3);
	$idnota = $nota["Id"]+1;
	if($nota["Id"] < 10)
		$idnota = "NT000".$idnota;
	else if($nota["Id"]< 100)
		$idnota = "NT00".$idnota;
	else if($nota["Id"]< 1000)
		$idnota = "NT0".$idnota;
	else
		$idnota = "NT".$idnota;

		
		
	$date = date("Y-m-d");		
	
	mysql_query("update pemesanan set Status='Confirm',Total='$totalbayar' where IdPemesanan='$idpemesanan'");
	mysql_query("insert into pengiriman(IdPengiriman,Tanggal,Ongkos,Alamat,KodePos,Kota,Status,IdPemesanan) values('$idpengiriman','$date','$ongkos','$alamat','$kodepos','$kota','Belum Dikirim','$idpemesanan')");
	mysql_query("insert into pembayaran(IdPembayaran,IdPemesanan,IdPelanggan,Tanggal,Total,Status) value('$idpembayaran','$idpemesanan','$iduser','$date','$totalbayar','Belum Dibayar')");
	mysql_query("insert into nota(IdNota,Tanggal,IdPemesanan) value('$idnota','$date','$idpemesanan')");
	header("location:../pemesanan_berhasil.php?idpemesanan=$idpemesanan&total=$total&ongkos=$ongkos");
	

?>