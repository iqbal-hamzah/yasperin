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
	$date = date("Y-m-d");

	mysql_query("insert into promo(JudulPromo,IsiPromo,TglPromo,IdPengurus) values('$title','$content','$date','".$_SESSION["IDUser"]."')");
	header("location:../promo.php");

?>