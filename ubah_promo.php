<?php
require("header.php");
?>
	<div id="contentWrap">
 		<div id="contentPanel"> 
		<?php require("leftPanel.php"); ?>
		
<div id="middlePanel">
<?php
	 $id = $_REQUEST['id'];
	 $rs = mysql_query("select * from promo where IDPromosi='$id'");
	 $row = mysql_fetch_array($rs);

?>


   				<div class="top">
    				<h2 align="center">Ubah Promo</h2>
    				
   				</div>
   
                <div class="bottom">
	
		
				
				<form method="post" action="controller/doUbahPromo.php">
				<table border="0" class="add_testi_box" cellspacing="10px" cellspadding="10px">
				<input type="hidden" name="idnews" id="idnews" value="<?php echo $row['IDPromosi']; ?>" />
				<tr>
				<td>Judul</td>
				<td><input type="text" name="txtjudul" value="<?php echo $row['JudulPromo']; ?>"/></td>
				</tr>
				
		
				<tr>
					<td>Konten</td>
				<td>
					<textarea name="elm1" id="elm1" rows="15" cols="55" ><?php echo $row['IsiPromo']; ?></textarea>
				</td>
				</tr>
				
				
				<tr>
				<td><input type="submit" value="Ubah Promosi"/></td>
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

