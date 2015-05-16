<?php
	require("conf.php");
	$id = $_GET["id"];
	
	mysql_query("delete from promo where IDPromosi=".$id);
	header("location:../promo.php")

?>