<?php
	require("conf.php");
	$id = $_GET["id"];
	
	mysql_query("delete from buku where IdBuku=".$id);
	header("location:../buku.php")

?>