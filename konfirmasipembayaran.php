<?php
require("header.php");
?>
	<div id="contentWrap">
 		<div id="contentPanel"> 
		<?php require("leftPanel.php"); ?>
		<script src="script/validate.js" type="text/javascript"></script>		
<div id="">
   				<div class="top">
    				<h2 align="center" style="font-family:georgia"">Konfirmasi Pembayaran</h2>
    				
   				</div>
   
                <div class="bottom">
<br/><br/>


<table width="901" border="1" cellspacing="0" cellpadding="2" align="center">
    <tr>
      <td width="82" height="24" align="center" bgcolor="#CCCCCC">No</td>
      <td width="100" align="center" bgcolor="#CCCCCC">IdPembayaran</td>
      <td width="100" align="center" bgcolor="#CCCCCC">IdPemesanan</td>
      <td width="190" align="center" bgcolor="#CCCCCC">Tanggal Pembayaran</td>
      <td width="62" align="center" bgcolor="#CCCCCC">Total</td>
	  <td width="82" align="center" bgcolor="#CCCCCC"></td>
		<td width="82" align="center" bgcolor="#CCCCCC"></td>	
    </tr>
    <?php
	
	$rs = mysql_query("select * from pembayaran where IdPelanggan='".$IdUser."' and Status not like 'Sudah Bayar'");
	$total = 0;

	if(mysql_num_rows($rs) != 0 )
	{
	
	while($row = mysql_fetch_array($rs))
	{
	$x++;

	?>
    <form method="post" name="form<?php echo $x; ?>" id="form<?php echo $x; ?>" action="controller/doUbahPembayaran.php" >
    <tr>
    	<input type="hidden" type="text" value="<?php echo $row[0]; ?>" name="IdPembayaran" id="IdPembayaran"/>
    	<td align="center"><?php echo $x; ?></td>
		<td align="center"><?php echo $row['IdPembayaran']; ?></td>
    	<td align="center"><?php echo $row['IdPemesanan']; ?></td>
        <td align="center">
			<?php
				$m = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec");
				$bln = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
				$j=0;
			?>							
			<select name="txtdate" id="txtdate" onChange="cekTanggal()">
			<option value="<?php echo date("d",strtotime($row['Tanggal']));  ?>"><?php echo date("d",strtotime($row['Tanggal']));  ?></option>
			<?php
			
			for ($i=1;$i<=31;$i++) echo "<option>" . $i . "</option>";
			?>
			</select>
			
		
			<select name="txtmonth" id="txtmonth" onchange="cekTanggal()">
			<option value="<?php echo date("m",strtotime($row['Tanggal']));  ?>"><?php echo date("M",strtotime($row['Tanggal']));  ?></option>
			<?php
			foreach ($m as $i)
			{
				echo "<option value=\"" . $bln[$j] . "\">" . $i . "</option>";
				$j++;
			}
			?>
			 </select>
		
			<select name="txtyear" id="txtyear" onchange="cekTanggal()">
			<option value="<?php echo date("Y",strtotime($row['Tanggal']));  ?>"><?php echo date("Y",strtotime($row['Tanggal']));  ?></option>
			<?php
			
			for ($i=2014; $i <= date("Y")+5; $i++)
			 echo "<option>" . $i . "</option>";
			?>
			</select>
		
		</td>
		<td align="center"><?php echo rp($row["Total"]); ?></td>
        <td align="center"><select name="status" id="status" <?php if($row['Status'] == "Sudah Bayar") echo "disabled='disabled'";  ?> >
		<option value="<?php echo $row['Status']; ?>"><?php echo $row['Status']; ?></option>
		<option value="Belum Dibayar">Belum Dibayar</option>
		<option value="Sudah Konfirmasi">Sudah Konfirmasi</option>
		</select>
		</td>
        <td align="center">
		<input type="submit" value="Konfirmasi" name="btn1" id="btnUpd" />
		</td>
    
    </tr>
    </form>
    <?php
	}
	
	}
	else
	{
	
	?>
	<tr>
		<td colspan="6" align="center">Belum ada pembayaran</td>
	</tr>
	
	<?php
	}

	?>
    </table>
<br/><br/>


	<label id="error" style="margin-left:40px;font-size:14px;color:red" ><?php
						if (!empty($_REQUEST['err'])) {
							$error = $_REQUEST['err'];
							if($error != NULL)
							echo $error; 	
						}
						?></label>
    <br/><br/>
	<?php
	if(mysql_num_rows($rs) != 0 )
	{
	?>
	<br/>
Keterangan : 	<br/>	<br/>

- Isilah tanggal sesuai dengan tanggal melakukan pembayaran.	<br/>
- Ubah status menjadi "Sudah Konfirmasi" dan tekan tombol "konfirmasi" sebagai konfirmasi telah 	<br/>
melakukan pembayaran.
 <?php
	}
 ?>

				</div>
	
  	</div>

 		</div>
	</div>
	
	<?php
		require("footer.php");
	?>

</body>

</html>