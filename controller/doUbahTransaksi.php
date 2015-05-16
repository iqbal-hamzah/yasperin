<?php

require("conf.php");
session_start();

$IdPemesanan = $_POST["IdPemesanan"];
$statusbayar = $_POST["statusbayar"];
$statuskirim = $_POST["statuskirim"];
$month = $_POST["txtmonth"];
$date = $_POST["txtdate"];
$year = $_POST["txtyear"];
	
if($statuskirim == "") $statuskirim = "Belum Dikirim";
if($month == "" || $date == "" || $year == "")
{
	$month = 1;
	$date = 1;
	$year = 2014;
}
mysql_query("update pembayaran set Status='$statusbayar' where IdPemesanan='$IdPemesanan'");
mysql_query("update pengiriman set Status='$statuskirim',Tanggal='".$year."/" .$month."/".$date."' where IdPemesanan='$IdPemesanan'");

header("location:../kelola_transaksi.php?err=Update Sukses");

?>