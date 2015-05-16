<?php

require("conf.php");
session_start();

$iddetailpemesanan = $_POST["IdDetailPemesanan"];
$jumlah = $_POST["Jumlah"];
$btn = $_POST["btn"];
$idpemesanan = $_POST['IdPemesanan'];

	if($btn == "Simpan")
	{
		if(!is_numeric($jumlah))
		{
			header("location:../keranjang_belanja.php?err=Jumlah harus angka");
		}
		else
		{
		mysql_query("update detailpemesanan set Jumlah='$jumlah' where IdDetailPemesanan=$iddetailpemesanan");
		header("location:../keranjang_belanja.php?err=Update Sukses");
		}
	}
	else
	{
		mysql_query("delete from detailpemesanan where IdDetailPemesanan=$iddetailpemesanan");
		$rs = mysql_query("select * from detailpemesanan where IdPemesanan='$idpemesanan'");
		if(mysql_num_rows($rs) == 0) mysql_query("delete from pemesanan where IdPemesanan='$idpemesanan'");
		header("location:../keranjang_belanja.php?err=Hapus Sukses");
	}



?>