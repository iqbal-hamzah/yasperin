<?php
	require("conf.php");
	$id = $_GET["id"];
	
	mysql_query("delete from pengurus where IdPengurus=".$id);
	header("location:../kelola_pengurus.php");

?>