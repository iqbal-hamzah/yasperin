<?php
require("header.php");
?>
	<div id="contentWrap">
 		<div id="contentPanel"> 
		<?php require("leftPanel.php"); ?>
		<script src="script/validate.js" type="text/javascript"></script>		
<div id="middlePanel">
   				<div class="top">
    				<h2 align="center">Kelola Transaksi</h2>
    				
   				</div>
   
                <div class="bottom">
   			<?php
		
				
			$rs = mysql_query("select * from pemesanan where Status='Confirm'");
			
			while($row = mysql_fetch_array($rs))
			{
			$pembayaran = mysql_fetch_array(mysql_query("select * from pembayaran where IdPemesanan='".$row["IdPemesanan"]."'"));
			$pengiriman = mysql_fetch_array(mysql_query("select * from pengiriman where IdPemesanan='".$row["IdPemesanan"]."'"));
			$pelanggan = mysql_fetch_array(mysql_query("select * from pelanggan where IdPelanggan='".$row["IdPelanggan"]."'"));
		?>
		<form action="controller/doUbahTransaksi.php" method="POST">
		<input type="hidden" value="<?php echo $row["IdPemesanan"]; ?>" name="IdPemesanan" />
			<table border="0" class="message_box">
			<tr>
				<td>IdPemesanan : </td>
				<td><?php echo $row["IdPemesanan"]; ?></td>
			</tr>
			<tr>
				<td>Nama Pelanggan : </td>
				<td><?php echo $pelanggan['Nama']; ?></td>
			</tr>
			<tr>
				<td>Tanggal Pemesanan : </td>
				<td><?php echo date("d-M-Y",strtotime($row["Tanggal"])); ?></td>
			</tr>		
			<tr>
				<td>Status Pembayaran : </td>
				<td>
				<select name="statusbayar" style="width:140px">
					<option value="<?php echo $pembayaran["Status"]; ?>"><?php echo $pembayaran["Status"]; ?></option>
					<option value="Sudah Konfirmasi">Sudah Konfirmasi</option>
					<option value="Sudah Bayar">Sudah Bayar</option>
					<option value="Belum Dibayar">Belum Dibayar</option>
				</select>
				</td>
			</tr>
				<tr>
				<td>Total Transaksi : </td>
				<td><?php echo rp($pembayaran["Total"]); ?></td>
			</tr>
			<?php
			if($pembayaran["Status"] != "Belum Dibayar")
			{
			?>
			<tr>
				<td>Tanggal Pembayaran : </td>
				<td><?php echo date("d-M-Y",strtotime($pembayaran["Tanggal"])); ?></td>
			</tr>
			<?php
			}
			?>
			<tr>
				<td>Tanggal Kirim : </td>
				<td>			<?php
				$m = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec");
				$bln = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
				$j=0;
			?>			
		
			<select name="txtdate" id="txtdate" onChange="cekTanggal()" <?php if($pembayaran["Status"] != "Sudah Bayar") echo "disabled='disabled'" ?>>
			<option value="<?php echo date("d",strtotime($pengiriman['Tanggal']));  ?>"><?php echo date("d",strtotime($pengiriman['Tanggal']));  ?></option>
			<?php
			
			for ($i=1;$i<=31;$i++) echo "<option>" . $i . "</option>";
			?>
			</select>
			
		
			<select name="txtmonth" id="txtmonth" onchange="cekTanggal()" <?php if($pembayaran["Status"] != "Sudah Bayar") echo "disabled='disabled'" ?>>
			<option value="<?php echo date("m",strtotime($pengiriman['Tanggal']));  ?>"><?php echo date("M",strtotime($pengiriman['Tanggal']));  ?></option>
			<?php
			foreach ($m as $i)
			{
				echo "<option value=\"" . $bln[$j] . "\">" . $i . "</option>";
				$j++;
			}
			?>
			 </select>
		
			<select name="txtyear" id="txtyear" onchange="cekTanggal()" <?php if($pembayaran["Status"] != "Sudah Bayar") echo "disabled='disabled'" ?>>
			<option value="<?php echo date("Y",strtotime($pengiriman['Tanggal']));  ?>"><?php echo date("Y",strtotime($pengiriman['Tanggal']));  ?></option>
			<?php
			
			for ($i=2014; $i <= date("Y")+5; $i++)
			 echo "<option>" . $i . "</option>";
			?>
			</select></td>
			</tr>
			<tr>
				<td>Status Pengiriman : </td>
				<td>
				<select name="statuskirim" style="width:120px" <?php if($pembayaran["Status"] != "Sudah Bayar") echo "disabled='disabled'" ?>>
					<option value="<?php echo $pengiriman["Status"]; ?>"><?php echo $pengiriman["Status"]; ?></option>
					<option value="Sudah Dikirim">Sudah Dikirim</option>
					<option value="Proses Kirim">Proses Kirim</option>
					<option value="Belum Dikirim">Belum Dikirim</option>
				</select>
				
				</td>
			</tr>
			
			<tr>
				<td>Detail Transaksi : </td>
				<td>
	<a href="detailtransaksi2.php?idpemesanan=<?php echo $row['IdPemesanan']; ?>" style="text-decoration:none"><input type="button" value=" Detail "/></a>
	<a href="nota.php?id=<?php echo $row['IdPemesanan']; ?>" style="text-decoration:none"><input type="button" <?php if($pembayaran["Status"] != "Sudah Bayar") echo "disabled='disabled'";?>
	value=" Cetak Nota "/></a>
				</td>
			</tr>
			
		
			<tr height="10px"><td colspan="2"></td></tr>
			<tr>
				<td><a style="text-decoration:none"><input class="button1" type="submit" value="Update"/></a></td>
				<td><a href="controller/doHapusTransaksi.php?idpemesanan=<?php echo $row["IdPemesanan"]; ?>" style="text-decoration:none"><input type="button" class="button1" value="Hapus"/></a></td>
			</tr>
			</table>
		</form>

		<?php
			}
		?>

				<br/>
			<label id="error" style="margin-left:15px;font-size:14px;color:red" ><?php
						if (!empty($_REQUEST['err'])) {
							$error = $_REQUEST['err'];
							if($error != NULL)
							echo $error;	
						}
						 ?></label>
		
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


