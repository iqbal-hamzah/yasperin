<?php
require("header.php");
?>
	<div id="contentWrap">
 		<div id="contentPanel"> 
		<?php require("leftPanel.php"); ?>
		<script src="script/validate.js" type="text/javascript"></script>
<div id="middlePanel">
   				<div class="top">
    				<h2 align="center">Lupa Password</h2>
    				
   				</div>
   
                <div class="bottom">
		
				<form method="post" action="controller/doLupaSandi.php">
				<table border="0" class="message_box" cellspacing="10px" cellspadding="10px">
				
				<tr>
					<td><label>Email</label></td>
					<td><input type="text" name="txtemail" id="txtemail" onblur="cekEmail()" /></td>
					<td><font color="red">*Maksimum 25 Karakter</font></td>
					<td><div id="pic_email"></div></td>
				</tr>
				
				<tr>
					<td><label>Handphone</label></td>
					<td><input type="text" name="txtcell" id="txtcell" onblur="cekCell()" /></td>
					<td><font color="red">*Maksimum 15 Karakter</font></td>
					<td><div id="pic_cell"></div></td>
				</tr>	
			
				
						<tr height="10px"></tr>
				<tr>
				<td colspan="4"><input type="submit" class="button1" value="Dapatkan Password" onclick="return cekLupaPassword()" style="margin-right:10px"/>
				<input type="reset" class="button1" value="Reset"/>
				</td>
				</tr>
		
					<tr height="10px"></tr>
					
					<tr>
						<td colspan="4" align="center"><label id="error" style="font-size:12px;color:red" >
						<?php
						if (!empty($_REQUEST['error'])) {
							$error = $_REQUEST['error'];
							if($error != NULL)
							echo $error;	
						}
						 ?></label></td>
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

