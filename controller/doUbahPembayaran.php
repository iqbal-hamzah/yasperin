<?php

require("conf.php");
session_start();

$month = $_POST["txtmonth"];
$date = $_POST["txtdate"];
$year = $_POST["txtyear"];
$IdPembayaran = $_POST["IdPembayaran"];
$status = $_POST["status"];

mysql_query("update pembayaran set Status='$status',Tanggal='".$year."/" .$month."/".$date."' where IdPembayaran='$IdPembayaran'");
header("location:../konfirmasipembayaran.php?err=Konfirmasi Sukses");

?>