<?php

	session_start();
	require("conf.php");
	$category = $_POST["category"];
	$name = $_POST["txtname"];
	$desc = $_POST["txtdesc"];
	$penulis = $_POST["txtpenulis"];
	$price = $_POST["txtprice"];
	
	$allowedExts = array("gif", "jpeg", "jpg", "png");

	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);


if($name == "")
{
	header("location:../tambah_buku.php?err=Judul Harus diisi");
}
else if($penulis == "")
{
	header("location:../tambah_buku.php?err=Penulis Harus diisi");
}
else if($price == "")
{
	header("location:../tambah_buku.php?err=Harga Harus diisi");
}
else if(!is_numeric($price))
{
	header("location:../tambah_buku.php?err=Harga Harus angka");
}
else if($desc == "")
{
	header("location:../tambah_buku.php?err=Sinopsis Harus diisi");
}
else
{

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
)
  {
  if ($_FILES["file"]["error"] > 0)
    {
	//	echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
	/*
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
*/
    if (file_exists("../images/buku/".$category."/" . $_FILES["file"]["name"]))
	  {
		header("location:../tambah_buku.php?err=File Already Exists");
	  }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../images/buku/".$category."/" . $_FILES["file"]["name"]);
      
	  $image = $category."/" . $_FILES["file"]["name"];

	  $result = mysql_query("SELECT RIGHT(IdBuku,4) as Id FROM buku ORDER BY IdBuku DESC");
		$buku = mysql_fetch_array($result);
		$id = $buku["Id"]+1;
		if($buku["Id"] < 10)
			$id = "BK000".$id;
		else if($buku["Id"]< 100)
			$id = "BK00".$id;
		else if($buku["Id"]< 1000)
			$id = "BK0".$id;
		else
			$id = "BK".$id;
	  
	  mysql_query("insert into buku(IdBuku,Judul,Sampul,Penulis,Harga,Sinopsis,Kategori) values('$id','$name','$image','$penulis','$price','$desc','$category')");
	  
	  header("location:../buku.php");
      }
    }
  }
else
  {
	header("location:../tambah_buku.php?err=Invalid File");
  }else
  {
	header("location:../tambah_buku.php?err=Invalid File");
  }
  
  }

?>