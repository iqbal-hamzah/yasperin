<?php
require("header.php");
?>
	<div id="contentWrap">
 		<div id="contentPanel"> 
		<?php require("leftPanel.php"); ?>
		
<div id="middlePanel">
   				<div class="top">
    				<h2 align="center">Tambah Promosi</h2>
    				
   				</div>
   
                <div class="bottom">
	
		
				
				<form method="post" action="controller/doTambahPromo.php">
				<table border="0" class="message_box" cellspacing="10px" cellspadding="10px">
				
				<tr>
				<td>Judul</td>
				<td><input type="text" name="txtjudul"/></td>
				</tr>
				
		
				<tr>
					<td>Konten</td>
				<td>
					<textarea name="elm1" id="elm1" rows="15" cols="55" ></textarea>
				</td>
				</tr>
				
				
				<tr>
				<td><input type="submit" value="Tambah Promo"/></td>
				<td><input type="reset" value="Reset"/>
				</td>
				</tr>
		
				<tr>
				<td colspan="2"><label id="error" style="font-size:12px;color:red"/></td>
				</tr>
			
				</table>
				</form>
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

