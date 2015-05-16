<?php
require("header.php");
?>
	<div id="contentWrap">
 		<div id="contentPanel"> 
		<?php require("leftPanel.php"); ?>
		
<div id="middlePanel">
   				<div class="top">
    				<h2 align="center">Kelola Pengurus</h2>
    				
   				</div>
   
                <div class="bottom">
   			<?php
		
				
			$rs = mysql_query("select * from pengurus");
			
			while($row = mysql_fetch_array($rs))
			{
			
		?>
			<table border="0" class="message_box">
			<tr>
				<td>IDPengurus : </td>
				<td><?php echo $row["IdPengurus"]; ?></td>
			</tr>
			<tr>
				<td>Nama : </td>
				<td><?php echo $row["Nama"]; ?></td>
			</tr>
			<tr>
				<td>Alamat : </td>
				<td><?php echo $row["Alamat"]; ?></td>
			</tr>
			<tr>
				<td>Email : </td>
				<td><?php echo $row["Email"]; ?></td>
			</tr>
			<tr>
				<td>No Handphone : </td>
				<td><?php echo $row["Handphone"]; ?></td>
			</tr>
			<tr height="10px"><td colspan="2"></td></tr>
			<tr>
				<td><a href="ubah_pengurus.php?id=<?php echo $row["IdPengurus"]; ?>" style="text-decoration:none">Edit</a></td>
				<td><a href="controller/doHapusPengurus.php?id=<?php echo $row["IdPengurus"]; ?>" style="text-decoration:none">Hapus</a></td>
			</tr>
			</table>
		<?php
			}
		?>

				<?php
				
				if($TipeAkses == "Manager")
				{
			?><br/><br/>
			<div align="center">
			<input type="button" value="Tambah" style="font-size:15px;width:100px;height:30px" onclick='location.href="tambah_pengurus.php"'>
			</div>
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


