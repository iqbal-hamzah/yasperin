<?php
require("header.php");
?>
	<div id="contentWrap">
 		<div id="contentPanel"> 
		<?php require("leftPanel.php"); ?>
		<script src="script/validate.js" type="text/javascript"></script>
<div id="middlePanel">
   				<div class="top">
    				<h2 align="center">Profile</h2>
    				<?php
						$rs = mysql_query("select * from pengurus where IdPengurus='$IdUser'");
						$row = mysql_fetch_array($rs);
					?>
   				</div>
   
                <div class="bottom">
   	
            	<form action="controller/doUbahProfilePengurus.php" method="post">
                <table border="0" align="center" cellspacing="5px" cellpadding="5px">
					<tr>
						<td><label>Nama</label></td>
						<td><input type="text" name="txtnama" id="txtnama" onblur="cekNama()" value="<?php echo $nama ?>"/></td>
						<td><font color="red">*Maksimum 25 Karakter</font></td>
						<td><div id="pic_nama"></div></td>
						
					</tr>
					                 
					<tr>
						<td><label>Jenis Kelamin</label></td>
						<td><input type="radio" name="txtgender" id="gender1" value="M" <?php if($row['JenisKelamin'] == "M") echo "checked='checked'"; ?> />Laki-Laki</td>
						<td><input type="radio" name="txtgender" id="gender2"  value="F" <?php if($row['JenisKelamin'] == "F") echo "checked='checked'"; ?>/>Perempuan</td>
					</tr>
		
					<tr>
						<td><label>Alamat</label></td>
						<td><textarea name="txtaddress" id="txtaddress" cols="20" rows="4" onblur="cekAddress()"><?php echo $row['Alamat']; ?></textarea></td>
						<td><font color="red">*Maksimum 100 Karakter</font></td>
						<td><div id="pic_address"></div></td>
					</tr>
					
					<tr>
						<td><label>Telepon</label></td>
						<td><input type="text" name="txtphone" id="txtphone" onblur="cekPhone()" value="<?php echo $row['Phone']; ?>"/></td>
						<td><font color="red">*Maksimum 15 Karakter</font></td>
						<td><div id="pic_phone"></div></td>
					</tr>
					
					<tr>
						<td><label>Handphone</label></td>
						<td><input type="text" name="txtcell" id="txtcell" onblur="cekCell()" value="<?php echo $row['Handphone'] ?>"/></td>
						<td><font color="red">*Maksimum 15 Karakter</font></td>
						<td><div id="pic_cell"></div></td>
					</tr>	
							
					<tr>
						<td><label>Email</label></td>
						<td><input type="text" name="txtemail" id="txtemail" onblur="cekEmail()" value="<?php echo $row['Email'] ?>" /></td>
						<td><font color="red">*Maksimum 25 Karakter</font></td>
						<td><div id="pic_email"></div></td>
					</tr>	
					
					<tr height="30px"></tr>
					<tr>
						<td colspan="4" align="center"><input type="submit" value="Edit Profile" onclick="return cekEditPengurus();" /></td>
					</tr>
					
					<tr height="20px"></tr>
					
					<tr>
						<td colspan="4" align="center"><label id="error" style="font-size:12px;color:red" ><?php
						$error = $_REQUEST['error'];
						if($error != NULL)
						echo $error; ?></label></td>
					</tr>
				</table>
				    
                </form>			
	
	</div>
	
	
	
		<div class="top">
		<br/><br/>
				<h2 align="center">Change Password</h2>
		</div>
	
        <div class="bottom">
   	
            	<form action="controller/doUbahPasswordPengurus.php?id=<?php echo $IdUser; ?>" method="post">
                <table border="0" align="center" cellspacing="5px" cellpadding="5px">
					
					<tr>
						<td><label>Old Password</label></td>
						<td><input type="password" name="txtoldpassword" id="txtoldpassword"  onblur="cekOldPassword()"/></td>
						<td><font color="red">*Maksimum 12 Karakter</font></td>
						<td><div id="pic_oldpassword"></div></td>
					</tr>
					  
					<tr>
						<td><label>Password</label></td>
						<td><input type="password" name="txtpassword" id="txtpassword"  onblur="cekPassword()"/></td>
						<td><font color="red">*Maksimum 12 Karakter</font></td>
						<td><div id="pic_password"></div></td>
					</tr>
					
					<tr>
						<td><label>Konfirmasi Password</label></td>
						<td><input type="password" name="txtconfirm" id="txtconfirm" onblur="cekConfirm()" /></td>
						<td><font color="red">*Maksimum 12 Karakter</font></td>
						<td><div id="pic_confirm"></div></td>
					</tr>
					
					<tr height="30px"></tr>
					<tr>
						<td colspan="4" align="center"><input type="submit" value="Change Password" onclick="return cekChangePassword();" /></td>
					</tr>
					
					<tr height="20px"></tr>
					
					<tr>
						<td colspan="4" align="center"><label id="error" style="font-size:12px;color:red" ><?php
						$error2 = $_REQUEST['error2'];
						if($error2 != NULL)
						echo $error2; ?></label></td>
					</tr>
				</table>
				    
                </form>
				

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

