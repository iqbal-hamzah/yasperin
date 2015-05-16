<?php
require("header.php");
?>
	<div id="contentWrap">
 		<div id="contentPanel"> 
		<?php require("leftPanel.php"); ?>
		
<div id="middlePanel">
   				<div class="top">
    				<h2 align="center">Detail Transaksi</h2>
    				
   				</div>
   
                <div class="bottom">
<br/><br/>


<table width="671" border="1" cellspacing="0" cellpadding="2" align="center">
    <tr>
      <td width="82" height="24" align="center" bgcolor="#CCCCCC">No</td>
      <td width="400" align="center" bgcolor="#CCCCCC">Nama Buku</td>
      <td width="100" align="center" bgcolor="#CCCCCC">Jumlah</td>
	  <td width="100" align="center" bgcolor="#CCCCCC">Harga</td>
      

    </tr>
    <?php
	
	
	$rs2 = mysql_query("select * from detailpemesanan where IdPemesanan='".$_GET['idpemesanan']."'");
	$pengiriman = mysql_fetch_array(mysql_query("select * from pengiriman where IdPemesanan='".$_GET['idpemesanan']."'"));
	while($row = mysql_fetch_array($rs2))
	{
	$i++;
	$total += $row["Harga"]*$row["Jumlah"];
	?>
    <form method="post" name="form<?php echo $i; ?>" id="form<?php echo $i; ?>" >
    <tr>
    	<input type="hidden" type="text" value="<?php echo $row[0]; ?>" name="IdDetailPemesanan" id="IdDetailPemesanan"/>
    	<td align="center"><?php echo $i; ?></td>
    	<td align="center"><?php 
		$namabuku = mysql_fetch_array(mysql_query("select judul from buku where IdBuku='".$row['IdBuku']."'"));
		echo $namabuku[0]; 
		?></td>
		<td align="center"><?php echo $row["Jumlah"]; ?></td>
        <td align="center"><?php echo rp($row["Harga"]); ?></td>
        
    </tr>
    </form>
    <?php
	}
	?>
    </table><br/>
	<h4>Total Harga Buku :<?php echo rp($total); ?></h4>
	<h4>Ongkos Kirim :<?php echo rp($pengiriman['Ongkos']); ?></h4>
	<h4>Sub Total : <?php echo rp($total+$pengiriman['Ongkos']); ?></h4>
	<h4>Alamat Pengiriman : <?php echo $pengiriman['Alamat']; ?></h4>
	<h4>Kota : <?php echo $pengiriman['Kota']; ?></h4>
	<h4>Kode Pos : <?php echo $pengiriman['KodePos']; ?></h4>
	<a href="status_transaksi.php" style="text-decoration:none"><input type="button" value=" Kembali "/></a>	<br/><br/>
	<label id="error" style="font-size:12px;color:red" ><?php
						$error = $_REQUEST['err'];
						if($error != NULL)
						echo $error; ?></label>
    <br/>


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