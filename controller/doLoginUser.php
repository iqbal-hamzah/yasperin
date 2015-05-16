<?php

	session_start();
	require("conf.php");

	function antiinjection($data)
	{
 $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  		return $filter_sql;
	}
	$user = antiinjection($_POST["txtusername"]);
	$pass = antiinjection($_POST["txtpassword"]);
	
	$result = mysql_query("select * from pelanggan where Email='$user' and Sandi='".md5($pass)."'");

		if (mysql_num_rows($result) == 1)
		{
			$row = mysql_fetch_array($result);
			$_SESSION["IdUser"] = $row['IdPelanggan'];
			$_SESSION["IdPelanggan"] = $row['IdPelanggan'];
			$_SESSION["TipeAkses"] = "Pelanggan";
			$_SESSION["Nama"] = $row["Nama"];
			header("location:../index.php");
		}
		else
		{
		
				$result2 = mysql_query("select * from pengurus where Email='$user' and Sandi='".md5($pass)."'");
				
				if (mysql_num_rows($result2) == 1)
				{
					$row2 = mysql_fetch_array($result2);
					$_SESSION["IdPengurus"] = $row2["IdPengurus"];
					$_SESSION["IdUser"] = $row2['IdPengurus'];
					$_SESSION["TipeAkses"] = $row2["TipeAkses"];
					$_SESSION["Nama"] = $row2["Nama"];
					header("location:../index.php");
					
				}
				else
				{
					header("location:../index.php?err=Data not found");
				
				}
		}
	
?>