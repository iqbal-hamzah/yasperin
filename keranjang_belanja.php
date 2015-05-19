<?php
require("header.php");
?>
	<div id="contentWrap">
 		<div id="contentPanel"> 
		<?php require("leftPanel.php"); ?>
		
<div id="middlePanel">
   				<div class="top">
    				<h2 align="center">Keranjang Belanja</h2>
    				
   				</div>
   
                <div class="bottom">
<br/><br/>
<script type="text/javascript">
	function update(temp)
	{

		document.getElementById(temp).Jumlah.disabled = false;
		document.getElementById(temp).btnUpd.type = "hidden";
		document.getElementById(temp).btnCancel.type = "button";
		document.getElementById(temp).btnDel.value = "Simpan";
		
	}
	
	function update2(temp)
	{

		document.getElementById(temp).Jumlah.disabled = true;
		document.getElementById(temp).btnUpd.type = "button";
		document.getElementById(temp).btnCancel.type = "hidden";
		document.getElementById(temp).btnDel.value = "Hapus";
		
	}
	function insert()
	{
		document.getElementById("control").style.visibility = "visible";
		document.getElementById("tombol").style.visibility ="hidden";
	}

</script>

<table width="671" border="1" cellspacing="0" cellpadding="2" align="center">
    <tr>
      <td width="82" height="24" align="center" bgcolor="#CCCCCC">No</td>
      <td width="400" align="center" bgcolor="#CCCCCC">Nama Buku</td>
      <td width="100" align="center" bgcolor="#CCCCCC">Harga</td>
      <td width="100" align="center" bgcolor="#CCCCCC">Jumlah</td>
      <td width="102" align="center" bgcolor="#CCCCCC"></td>
      <td width="102" align="center" bgcolor="#CCCCCC"></td>
    </tr>
    <?php
	
	$rs = mysql_query("select * from pemesanan where IdPelanggan='".$IdUser."' and Status='Cart'");
	$total = 0;
	$headerpemesanan = mysql_fetch_array($rs);
	if($headerpemesanan)
	{
	
	$rs2 = mysql_query("select * from detailpemesanan where IdPemesanan='".$headerpemesanan[0]."'");
	$i = 0;
	while($row = mysql_fetch_array($rs2))
	{
	$i++;
	$total += $row["Harga"]*$row["Jumlah"];
	?>
    <form method="post" name="form<?php echo $i; ?>" id="form<?php echo $i; ?>" action="controller/doEditKeranjang.php" >
    <tr>
    	<input type="hidden" value="<?php echo $row[0]; ?>" name="IdDetailPemesanan" id="IdDetailPemesanan"/>
		<input  type="hidden" value="<?php echo $headerpemesanan[0]; ?>" name="IdPemesanan"/>
    	<td align="center"><?php echo $i; ?></td>
    	<td align="center"><?php 
		$namabuku = mysql_fetch_array(mysql_query("select judul from buku where IdBuku='".$row['IdBuku']."'"));
		echo $namabuku[0]; 
		?></td>
        <td align="center"><?php echo rp($row["Harga"]); ?></td>
        <td align="center"><input type="text" name="Jumlah" id="Jumlah" value="<?php echo $row["Jumlah"]; ?>" size="3" disabled="true"/></td>
        <td align="center"><input type="button" value="Edit" name="btn1" id="btnUpd" onClick="update('form'+<?php echo $i; ?>)"/>
		<input type="hidden" value="Batal" name="btn2" id="btnCancel" onClick="update2('form'+<?php echo $i; ?>)"/></td>
        <td align="center"><input type="submit" value="Hapus" name="btn" id="btnDel"/></td>
    </tr>
    </form>
    <?php
	}
	?>
	    </table>
	<h4>Sub Total : <?php echo rp($total) ?></h4>
	<a href="buku.php" style="text-decoration:none"><input type="button" value=" Kembali "/></a><a style="text-decoration:none" href="konfirmasipemesanan.php?idpemesanan=<?php echo $headerpemesanan[0]; ?>">
	<input type="button" value="Lanjutkan Transaksi" /></a>

	<?php
	
	}
	else
	{
	
	?>
	<tr>
		<td colspan="6" align="center">Belum ada buku yang dibeli</td>
	</tr>	
	 </table>
	<?php
	}

	?>

	<br/><br/>
	<label id="error" style="font-size:12px;color:red" ><?php
						if(!empty($_REQUEST['err'])){
							$error = $_REQUEST['err'];
							if($error != NULL)
							echo $error; 	
						}
						?></label>
    <br/><br/>
	<?php if($headerpemesanan) { ?>

Keterangan :<br/><br/>
Tombol Edit : untuk mengganti jumlah buku yang ingin dipesan.<br/>
Tombol Hapus : untuk menghapus buku yang batal dipesan.<br/>
Tombol Kembali : untuk kembali ke halaman buku dan menambah pemesanan.<br/>
Tombol Lanjutkan : untuk menuju ke halaman konfirmasi pemesanan<br/>

<?php }  ?>
				</div>
	
  	</div>
  
	<?php
			require("rightPanel.php");
		?>
 		</div>
	</div>
	
	<?php
		require("footer.php");
	?>

</body>

</html>