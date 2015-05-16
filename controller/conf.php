<?php
$server 	= "localhost";
$username 	= "root";
$password 	= "";
$database 	= "yasperin";


mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");

function rp($angka){
	$angka = number_format($angka);
	$angka = str_replace(',', '.', $angka);
	$angka ="$angka";
	return "Rp.".$angka.",-";
}
?>