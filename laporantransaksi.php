<?php
require("header.php");
?>
	<div id="contentWrap">
 		<div id="contentPanel"> 
		<?php require("leftPanel.php"); ?>
		<script src="script/validate.js" type="text/javascript"></script>		
<div id="middlePanel">
   				<div class="top">
    				<h2 align="center">Laporan Transaksi</h2>
    				
   				</div>
   
                <div class="bottom">
<br/><br/>

<form method="post" action="laporantransaksi.php">

<table border="0" cellspacing="5px" cellpadding="5px">
	
	<tr>
		<td>Input Waktu : </td>
		<td>
			<?php
				$m = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec");
				$bln = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
				$j=0;
			?>			
		
			<select name="txtdate" id="txtdate" onChange="cekTanggal()">
			<?php
			
			for ($i=1;$i<=31;$i++) echo "<option>" . $i . "</option>";
			?>
			</select>
			
		
			<select name="txtmonth" id="txtmonth" onchange="cekTanggal()">
			<?php
			foreach ($m as $i)
			{
				echo "<option value=\"" . $bln[$j] . "\">" . $i . "</option>";
				$j++;
			}
			?>
			 </select>
		
			<select name="txtyear" id="txtyear" onchange="cekTanggal()">
			<?php
			
			for ($i=2014; $i <= date("Y")+5; $i++)
			 echo "<option>" . $i . "</option>";
			?>
			</select>
			-
			<?php
				$m = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec");
				$bln = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
				$j=0;
			?>			
		
			<select name="txtdate2" id="txtdate2" onChange="cekTanggal2()">
			<?php
			
			for ($i=1;$i<=31;$i++) echo "<option>" . $i . "</option>";
			?>
			</select>
			
		
			<select name="txtmonth2" id="txtmonth2" onchange="cekTanggal2()">
			<?php
			foreach ($m as $i)
			{
				echo "<option value=\"" . $bln[$j] . "\">" . $i . "</option>";
				$j++;
			}
			?>
			 </select>
		
			<select name="txtyear2" id="txtyear2" onchange="cekTanggal2()">
			<?php
			
			for ($i=2014; $i <= date("Y")+5; $i++)
			 echo "<option>" . $i . "</option>";
			?>
			</select>
		</td>
		<td><input type="submit" value="Submit"/></td>
	</tr>

	
</table>
</form>

<?php
	$tanggal1 = $_POST['txtdate'];
	$tanggal2 = $_POST['txtdate2'];
	$bulan1 = $_POST['txtmonth'];
	$bulan2 = $_POST['txtmonth2'];
	$tahun1 = $_POST['txtyear'];
	$tahun2 = $_POST['txtyear2'];
	if($tanggal1 != "" && $tanggal2 != "" && $bulan1 != "" && $bulan2 != "" && $tahun1 != "" && $tahun2 != "")
	{
	$date1 = date("Y/m/d",strtotime("".$tahun1."/".$bulan1."/".$tanggal1));
	$date2 = date("Y/m/d",strtotime("".$tahun2."/".$bulan2."/".$tanggal2));
	echo "<div align='center'><h4>Laporan dari $tanggal1/".date("M",strtotime($date1))."/$tahun1 sampai $tanggal2/".date("M",strtotime($date2))."/$tahun2</h4></div>";
?>
	
	<table width="671" border="1" cellspacing="0" cellpadding="2" align="center">
    <tr>
      <td width="82" height="24" align="center" bgcolor="#CCCCCC">No</td>
	   <td width="150" align="center" bgcolor="#CCCCCC">Tanggal Pemesanan</td>
       <td width="150" align="center" bgcolor="#CCCCCC">Id Pemesanan</td>
      <td width="120" align="center" bgcolor="#CCCCCC">Nama Pelanggan</td>
	  <td width="120" align="center" bgcolor="#CCCCCC">Alamat</td>
      <td width="100" align="center" bgcolor="#CCCCCC">Total Transaksi</td>

    </tr>
    <?php

	$rs2 = mysql_query("select pm.IdPelanggan as 'IdPelanggan',pm.IdPemesanan as 'IdPemesanan',pb.Total as 'Total',pm.Tanggal as 'Tanggal' from pemesanan pm,pembayaran pb where pm.IdPemesanan = pb.IdPemesanan and pm.Tanggal between '$date1' and '$date2' and pm.Status='Confirm' and pb.Status = 'Sudah Bayar'");
	if(mysql_num_rows($rs2) != 0)
	{
	while($row = mysql_fetch_array($rs2))
	{
	
	$a++;
	$total += $row['Total'];
	$pelanggan = mysql_fetch_array(mysql_query("select * from pelanggan where IdPelanggan='".$row['IdPelanggan']."'"));
	
	?>
    <form method="post" name="form<?php echo $a; ?>" id="form<?php echo $a; ?>" >
    <tr>
    	<td align="center"><?php echo $a; ?></td>
		<td align="center"><?php echo date("d-m-Y",strtotime($row["Tanggal"])); ?></td>
         <td align="center"><?php echo $row["IdPemesanan"]; ?></td>
        <td align="center"><?php echo $pelanggan["Nama"]; ?></td>
        <td align="center"><?php echo $pelanggan["Alamat"]; ?></td>
        <td align="center"><?php echo rp($row["Total"]); ?></td>
    </tr>
    </form>
    <?php
	}
	?>
    </table>
	<h4>Total Seluruh Transaksi :<?php echo rp($total); ?></h4>
	
	<a style="text-decoration:none" href="cetak_laporan_transaksi.php?tanggal1=<?php echo $tanggal1 ?>&tanggal2=<?php echo $tanggal2 ?>&bulan1=<?php echo $bulan1 ?>&bulan2=<?php echo $bulan2 ?>&tahun1=<?php echo $tahun1 ?>&tahun2=<?php echo $tahun2 ?>"><input class="button1" type="submit" value="Cetak Laporan"/></a>
	
<?php
	}
	else
	{
?>	
	<tr>
	<td colspan="5" align="center">Belum ada transaksi pada saat ini</td>
	</tr>
	 </table>
	<?php
	}
	}
?>			</div>
	
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