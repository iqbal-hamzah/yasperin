<?php
	require("conf.php");
	session_start();
	
	$idbuku = $_GET["id"];
	$price = $_GET["price"];
	
	$iduser = $_SESSION['IdUser'];
	$rs = mysql_query("select * from pemesanan where IdPelanggan='".$iduser."' and Status='Cart'");
	$order = mysql_fetch_array($rs);
	if($order)
	{
		
		$idpemesanan = $order['IdPemesanan'];
		$rs2 = mysql_query("select * from detailpemesanan where IdPemesanan='".$idpemesanan."' and IdBuku='".$idbuku."' ");
		$row2 = mysql_fetch_array($rs2);
		if($row2)
		{
			mysql_query("update detailpemesanan set Jumlah=Jumlah+1 where IdDetailPemesanan='".$row2[0]."' ");
		}
		else
		{
			mysql_query("insert into detailpemesanan(IdPemesanan,IdBuku,Harga,Jumlah,Diskon) value('$idpemesanan','$idbuku','$price',1,0)");
		}
	}	
	else
	{

		$result = mysql_query("SELECT RIGHT(IdPemesanan,4) as Id FROM pemesanan ORDER BY IdPemesanan DESC");
		$pemesanan = mysql_fetch_array($result);
		$id = $pemesanan["Id"]+1;
		if($pemesanan["Id"] < 10)
			$id = "PM000".$id;
		else if($pemesanan["Id"]< 100)
			$id = "PM00".$id;
		else if($pemesanan["Id"]< 1000)
			$id = "PM0".$id;
		else
			$id = "PM".$id;
			
		$date = date("Y-m-d");	
		mysql_query("insert into pemesanan(IdPemesanan,IdPelanggan,Tanggal,Total,Status) value('$id','$iduser','$date',0,'Cart')") or die("insert into pemesanan(IdPemesanan,IdPelanggan,Tanggal,Total,Status) value('$id','$iduser','$date',0,'Cart')");
		mysql_query("insert into detailpemesanan(IdPemesanan,IdBuku,Harga,Jumlah,Diskon) value('$id','$idbuku','$price',1,0)") or die();
	}
	
	header("location:../keranjang_belanja.php");

?>