<?php
	
	require("conf.php");
	session_start();
	function antiinjection($data)
	{
		$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  		return $filter_sql;
	}

	$content = antiinjection($_POST["elm1"]);
	$title = $_POST["txtjudul"];
	$id = $_POST['idnews'];
	mysql_query("update promo set JudulPromo='$title',IsiPromo='$content',IdPengurus='".$_SESSION["IDUser"]."' where IDPromosi='$id'");
	header("location:../promo.php");

?>