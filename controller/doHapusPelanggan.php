<?php
	require("conf.php");
	$id = $_GET["id"];
	
	mysql_query("delete from pelanggan where IdPelanggan=".$id);
	header("location:../kelola_pelanggan.php");

?>