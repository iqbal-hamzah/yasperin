<?php

	session_start();
	require("conf.php");
	$id = $_POST["idbuku"];
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
	header("location:../ubah_buku.php?id=".$id."&err=Judul Harus diisi");
}
else if($penulis == "")
{
	header("location:../ubah_buku.php?id=".$id."&err=Penulis Harus diisi");
}
else if($price == "")
{
	header("location:../ubah_buku.php?id=".$id."&err=Harga Harus diisi");
}
else if(!is_numeric($price))
{
	header("location:../ubah_buku.php?id=".$id."&err=Harga Harus angka");
}
else if($desc == "")
{
	header("location:../ubah_buku.php?id=".$id."&err=Sinopsis Harus diisi");
}
else
{
if($_FILES["file"]["name"] == "" || $_FILES["file"]["name"] == NULL)
	{
	
	mysql_query("update buku set Judul='$name',Penulis='$penulis',Harga='$price',Sinopsis='$desc',Kategori='$category' where IdBuku='$id'");
	header("location:../buku.php");
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
	
    }
  else
    {
	
	
		  $image = $category."/" . $_FILES["file"]["name"];
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../images/product/".$category."/" . $_FILES["file"]["name"]);
      
	  mysql_query("update buku set Judul='$name',Sampul='$image',Penulis='$penulis',Harga='$price',Sinopsis='$desc',Kategori='$category' where IdBuku='$id'");
	  
	  header("location:../buku.php");
	  
	 }
      
    }
  
else
{
	header("location:../ubah_buku.php?id=".$id."&err=Invalid File");
}

  }
	}

?>