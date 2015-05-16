<?php
require("header.php");
?>
	<div id="contentWrap">
 		<div id="contentPanel"> 
		<?php require("leftPanel.php"); ?>
		
<div id="middlePanel">
   				<div class="top">
    				<h2 align="center">Status Transaksi</h2>
    				
   				</div>
   
                <div class="bottom">
<br/><br/>


<table width="671" border="1" cellspacing="0" cellpadding="2" align="center">
    <tr>
      <td width="42" height="24" align="center" bgcolor="#CCCCCC">No</td>
      <td width="100" align="center" bgcolor="#CCCCCC">ID Pemesanan</td>
      <td width="100" align="center" bgcolor="#CCCCCC">Tanggal</td>
      <td width="100" align="center" bgcolor="#CCCCCC">Total</td>
      <td width="102" align="center" bgcolor="#CCCCCC">Status Bayar</td>
      <td width="102" align="center" bgcolor="#CCCCCC">Status Pengiriman</td>
	   <td width="102" align="center" bgcolor="#CCCCCC">Detail Pemesanan</td>
    </tr>
    <?php
	
	$rs = mysql_query("select * from pemesanan where IdPelanggan='".$IdUser."' and Status='Confirm'");
	if(mysql_num_rows($rs) != 0)
	{
	while($row = mysql_fetch_array($rs))
	{
	$i++;
	$pembayaran = mysql_fetch_array(mysql_query("select * from pembayaran where IdPemesanan='".$row["IdPemesanan"]."'"));
	$pengiriman = mysql_fetch_array(mysql_query("select * from pengiriman where IdPemesanan='".$row["IdPemesanan"]."'"));
	?>
    <form method="post" name="form<?php echo $i; ?>" id="form<?php echo $i; ?>" >
    <tr>

    	<td align="center"><?php echo $i; ?></td>
    	<td align="center"><?php echo $row['IdPemesanan']; ?></td>
        <td align="center"><?php echo $row['Tanggal']; ?></td>
        <td align="center"><?php echo rp($row['Total']); ?></td>
        <td align="center"><?php 
		echo $pembayaran['Status']; 
		?></td>
		<td align="center"><?php 
		echo $pengiriman['Status']; 
		?></td>
		<td align="center"><a href="detailtransaksi1.php?idpemesanan=<?php echo $row['IdPemesanan']; ?>" style="text-decoration:none"><input type="button" value=" Detail "/></a></td>
    </tr>
    </form>
    <?php
	}
	
	}
	else
	{
	
	?>
	<tr>
		<td colspan="6" align="center">Belum ada History Transaksi</td>
	</tr>
	
	<?php
	}

	?>
    </table>

	<label id="error" style="font-size:12px;color:red" ><?php
						$error = $_REQUEST['err'];
						if($error != NULL)
						echo $error; ?></label>
    <br/><br/>
	
	<?php
	if(mysql_num_rows($rs) != 0)
	{
	?>
<strong>Keterangan : </strong><br/><br/>	
	
Status Bayar :<br/><br/>
-	Belum Bayar : Pemesanan belum dibayar.<br/>
-	Sudah Konfirmasi : Konfirmasi Pemesan sudah membayar.<br/>
-	Sudah Bayar : Konfirmasi Yasperin telah menerima pembayaran.<br/><br/>
Status Kirim :<br/><br/>
-	Belum Dikirim : Pemesanan belum dikirimkan.<br/>
-	Proses Kirim : Pemesanan sedang dikirim.<br/>
-	Sudah Dikirim : Pemesanan telah diterima oleh Pemesan.<br/><br/>
Tombol Detail : Untuk melihat Detail Transaksi<br/>

 <?php
 }
 ?>

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