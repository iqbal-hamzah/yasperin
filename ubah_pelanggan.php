<?php
require("header.php");
?>
	<div id="contentWrap">
 		<div id="contentPanel"> 
		<?php require("leftPanel.php"); ?>
		<script src="script/validate.js" type="text/javascript"></script>
<div id="middlePanel">
   				<div class="top">
    				<h2 align="center">Edit Pelanggan</h2>
    				<?php
						$iduser= $_GET['id'];
						$rs = mysql_query("select * from pelanggan where IdPelanggan='$iduser'");
						$row = mysql_fetch_array($rs);
					?>
   				</div>
   
                <div class="bottom">
   	
            	<form action="controller/doUbahPelanggan.php?id=<?php echo $iduser; ?>" method="post">
                <table border="0" align="center" cellspacing="5px" cellpadding="5px">
					<tr>
						<td><label>Nama</label></td>
						<td><input type="text" name="txtnama" id="txtnama" onblur="cekNama()" value="<?php echo $row['Nama'] ?>"/></td>
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
						<td>Kota</td>
						<td><select name="txtkota">
							<option selected="selected" value="<?php echo $row['Kota']; ?>"><?php echo $row['Kota']; ?></option>
							<option value="Jakarta Utara">Jakarta Utara</option>
							<option value="Jakarta Pusat">Jakarta Pusat</option>
							<option value="Jakarta Barat">Jakarta Barat</option>
							<option value="Jakarta Timur">Jakarta Timur</option>
							<option value="Jakarta Selatan">Jakarta Selatan</option>
							<option value="Bogor">Bogor</option>
							<option value="Bekasi">Bekasi</option>
							<option value="Bandung">Bandung</option>
							<option value="Surabaya">Surabaya</option>
							<option value="Yogyakarta">Yogyakarta</option>
						</select></td>
						<td></td>
					</tr>	

					<tr>
						<td><label>Kode Pos</label></td>
						<td><input type="text" name="txtkodepos" id="txtkodepos" onblur="cekKodePos()" value="<?php echo $row['KodePos'] ?>" /></td>
						<td><font color="red">*Maksimum 10 Karakter</font></td>
						<td><div id="pic_kodepos"></div></td>
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
						<td colspan="4" align="center"><input type="submit" value="Edit Pelanggan" onclick="return cekEditProfile();" /></td>
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
				<h2 align="center">Management Pelanggan</h2>
		</div>
	
        <div class="bottom">
   	
            	<form action="controller/doUbahSandiPelanggan.php?id=<?php echo $iduser; ?>" method="post">
                <table border="0" align="center" cellspacing="5px" cellpadding="5px">
					
					<tr>
						<td><label>ID Pelanggan</label></td>
						<td><input type="text" name="txtUsername" id="txtUsername" value="<?php echo $row['IdPelanggan']; ?>" onblur="cekUsername()" disabled="disabled"/></td>
						<td></td>
						<td><div id="pic_username"></div></td>
					</tr>
					
					<tr>
						<td><label>Change Password</label></td>
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
						
					<tr>
						<td colspan="4" align="center"><input type="submit" value="Change Password" onclick="return cekEditPassword();" /></td>
					</tr>
					
					 </form>
					<tr>
						<td colspan="4" align="center"><label id="error" style="font-size:12px;color:red" ><?php
						$error2 = $_REQUEST['error2'];
						if($error2 != NULL)
						echo $error2; ?></label></td>
					</tr>
				</table>
				    
               
				

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

