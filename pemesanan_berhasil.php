<?php
require("header.php");
?>
	<div id="contentWrap">
 		<div id="contentPanel"> 
		<?php require("leftPanel.php"); ?>
		<script src="script/validate.js" type="text/javascript"></script>		
<div id="middlePanel">
   				<div class="top">
    				<h2 align="center">Pemesanan Berhasil</h2>
    				
   				</div>
   
                <div class="bottom">
				<br/>
<?php
	 $pengiriman = mysql_fetch_array(mysql_query("select * from pengiriman where IdPemesanan='".$_GET['idpemesanan']."'"));
?>				
				
Terima Kasih, <?php echo $nama; ?> Telah memesan buku di toko kami. <br/>
Total Harga Buku : <strong><?php echo rp($_GET['total']); ?></strong><br/>
Ongkos Kirim : <strong><?php echo rp($_GET['ongkos']); ?></strong><br/>
Total yang harus dibayar : <strong><?php echo rp($_GET['ongkos']+$_GET['total']); ?></strong><br/>
Alamat Pengiriman : <strong><?php echo $pengiriman['Alamat']; ?><br/></strong>
Kota : <strong><?php echo $pengiriman['Kota']; ?><br/></strong>
Kode Pos : <strong><?php echo $pengiriman['KodePos']; ?><br/></strong><br/><br/>

Silahkan segera melakukan proses pembayaran melalui transfer ke:<br/>
YAYASAN PERPUSTAKAAN INJIL <br/>
TAHAPAN BCA LAWANG <br/>
NO. REK. 316 10 789 89<br/><br/>

Jangan lupa melakukan konfirmasi pembayaran pada menu Konfirmasi Pembayaran.<br/>


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
