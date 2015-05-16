<?php
require("header.php");
?>
	<div id="contentWrap">
 		<div id="contentPanel"> 
		<?php require("leftPanel.php"); ?>
		
<div id="middlePanel">
   				<div class="top">
    				<h2 align="center">Kelola Pelanggan</h2>
    				
   				</div>
   
                <div class="bottom">
   			<?php
		
				
			$rs = mysql_query("select * from pelanggan");
			
			while($row = mysql_fetch_array($rs))
			{
			
		?>
			<table border="0" class="message_box">
			<tr>
				<td>IDPelanggan : </td>
				<td><?php echo $row["IdPelanggan"]; ?></td>
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
				<td>No Telepon : </td>
				<td><?php echo $row["Phone"]; ?></td>
			</tr>
			<tr height="10px"><td colspan="2"></td></tr>
			<tr>
				<td><a href="ubah_pelanggan.php?id=<?php echo $row["IdPelanggan"]; ?>" style="text-decoration:none">Edit</a></td>
				<td><a href="controller/doHapusPelanggan.php?id=<?php echo $row["IdPelanggan"]; ?>" style="text-decoration:none">Hapus</a></td>
			</tr>
			</table>
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


