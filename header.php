<?php
session_start();
require("controller/conf.php");

// inisailisasi variabel
$nama = ''; $IdUser = ''; $IdPelanggan=""; $IdPengurus=""; $TipeAkses="";
if (!empty($_SESSION)){
$nama = $_SESSION["Nama"];
$IdUser = $_SESSION["IdUser"];
$IdPelanggan = $_SESSION["IdPelanggan"];
$IdPengurus = $_SESSION["IdPengurus"];
$TipeAkses = $_SESSION["TipeAkses"];	
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Yasperin,Toko Buku Rohani" />
<meta name="description" content="Yasperin adalah Toko Buku Rohani" />
<meta name="author" content="Yasperin" />
<meta name="robots" content="index,follow">
<title>Yasperin</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="images/icon.ico" />
<script src="script/excanvas.js" type="text/javascript"></script>
<script src="script/moreskins.js" type="text/javascript"></script>
  
</head>

<body>

         <div id="support-bar">
                Find us :
                <a href="https://www.facebook.com/yasperin"><img src="images/icon-fb.png" /></a>
                <a href="https://twitter.com/yasperin"><img src="images/icon-twitter.png"/></a>
            </div>
       
