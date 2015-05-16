<?php

require("conf.php");
session_start();

$IdPemesanan = $_GET["idpemesanan"];


mysql_query("delete from pembayaran where IdPemesanan='$IdPemesanan'");
mysql_query("delete from pengiriman where IdPemesanan='$IdPemesanan'");
mysql_query("delete from pemesanan where IdPemesanan='$IdPemesanan'");
mysql_query("delete from detailpemesanan where IdPemesanan='$IdPemesanan'");

header("location:../kelola_transaksi.php?err=Update Sukses");

?>