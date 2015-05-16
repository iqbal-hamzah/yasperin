<?php
require("header.php");
?>
	<div id="contentWrap">
 		<div id="contentPanel"> 
		<?php require("leftPanel.php"); ?>
		<script src="script/validate.js" type="text/javascript"></script>		
<div id="middlePanel">
   				<div class="top">
    				<h2 align="center">Konfirmasi Pemesanan</h2>
    				
   				</div>
   
                <div class="bottom">

<table width="671" border="1" cellspacing="0" cellpadding="2" align="center">
    <tr>
      <td width="82" height="24" align="center" bgcolor="#CCCCCC">No</td>
      <td width="200" align="center" bgcolor="#CCCCCC">Judul Buku</td>
	   <td width="50" align="center" bgcolor="#CCCCCC">Jumlah</td>
      <td width="100" align="center" bgcolor="#CCCCCC">Harga</td>
     

    </tr>
    <?php
	
	$rs = mysql_query("select * from pemesanan where IdPemesanan='".$_GET['idpemesanan']."'");
	$total = 0;
	$headerpemesanan = mysql_fetch_array($rs);
	if($headerpemesanan)
	{
	
	$rs2 = mysql_query("select * from detailpemesanan where IdPemesanan='".$headerpemesanan[0]."'");
	if(mysql_num_rows($rs2) == 0) header("location:cart.php?err=Harap Memilih buku yang ingin dibeli terlebih dahulu");
	while($row = mysql_fetch_array($rs2))
	{
	$i++;
	$buku = mysql_fetch_array(mysql_query("select * from buku where IdBuku='".$row['IdBuku']."'"));
	$total += $row["Harga"]*$row["Jumlah"];
	?>
    <form method="post" name="form<?php echo $i; ?>" id="form<?php echo $i; ?>" action="controller/doEditKeranjang.php" >
    <tr>
    	<input type="hidden" type="text" value="<?php echo $row[0]; ?>" name="IdDetailPemesanan" id="IdDetailPemesanan"/>
    	<td align="center"><?php echo $i; ?></td>
    	<td align="center"><?php echo $buku['Judul']; ?></td>
		<td align="center"><?php echo $row["Jumlah"]; ?></td>
        <td align="center"><?php echo rp($row["Harga"]); ?></td>
        
    </tr>
    </form>
    <?php
	}
	
	}
	else
	{
		header("location:cart.php?err=Harap Memilih buku yang ingin dibeli terlebih dahulu");
	}
	?>
    </table>
	<h4>Sub Total : <?php echo rp($total); ?></h4>
		<br/>
<form id="pengiriman" name="pengiriman" action="controller/doKonfirmasiPemesanan.php" method="post">
	<h3>Data Pengiriman</h3>
	<table>
	<input type="hidden" name="idpemesanan" id="idpemesanan" value="<?php echo $headerpemesanan[0]; ?>" />
	<input type="hidden" name="total" id="total" value="<?php echo $total; ?>" />
<tr>
	<td><label>Alamat</label></td>
	<td><textarea name="txtaddress" id="txtaddress" cols="20" rows="4" onblur="cekAddress()"></textarea></td>
	<td><font color="red">*Maksimum 100 Karakter</font></td>
	<td><div id="pic_address"></div></td>
</tr>

<tr>
	<td>Kota</td>
	<td><select name="txtkota">
<option value="Bali">Bali</option>
<option value="Balikpapan">Balikpapan</option>
<option value="Bandung">Bandung</option>
<option value="Banjarmasin">Banjarmasin</option>
<option value="Batam">Batam</option>
<option value="Bekasi">Bekasi</option>
<option value="Bengkulu">Bengkulu</option>
<option value="Biak">Biak</option>
<option value="Bogor">Bogor</option>
<option value="Bukittinggi">Bukittinggi</option>
<option value="Cilegon">Cilegon</option>
<option value="Depok">Depok</option>
<option value="Gorontalo">Gorontalo</option>
<option value="Jakarta">Jakarta</option>
<option value="Jambi">Jambi</option>
<option value="Jayapura">Jayapura</option>
<option value="Lampung">Lampung</option>
<option value="Makassar">Makassar</option>
<option value="Malang">Malang</option>
<option value="Manokwari">Manokwari</option>
<option value="Medan">Medan</option>
<option value="Menado">Menado</option>
<option value="Nabire">Nabire</option>
<option value="Padang">Padang</option>
<option value="Palangkaraya">Palangkaraya</option>
<option value="Palembang">Palembang</option>
<option value="Pontianak">Pontianak</option>
<option value="Purwokerto">Purwokerto</option>
<option value="Salahtiga">Salahtiga</option>
<option value="Samarinda">Samarinda</option>
<option value="Singkawang">Singkawang</option>
<option value="Sorong">Sorong</option>
<option value="Surabaya">Surabaya</option>
	</select></td>
	<td></td>
</tr>	

<tr>
	<td><label>Kode Pos</label></td>
	<td><input type="text" name="txtkodepos" id="txtkodepos" onblur="cekKodePos()" /></td>
	<td><font color="red">*Maksimum 10 Karakter</font></td>
	<td><div id="pic_kodepos"></div></td>
</tr>
	
	</table>
	
	<br/>
		<a href="cart.php" style="text-decoration:none"><input type="button" value=" Kembali "/>    </a><input type="submit" value="Konfirmasi" onclick="return cekFormPengiriman();"/>
	</form>
<br/><br/>
<font size="2">
<strong>Keterangan : </strong><br/><br/>
<strong>Alamat pengiriman harus diisi dengan jelas untuk mempermudah proses pengiriman.</strong>
				</font></div>
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
