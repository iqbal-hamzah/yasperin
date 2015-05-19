<?php
require("header.php");
?>
	<div id="contentWrap">
 		<div id="contentPanel"> 
		<?php require("leftPanel.php"); ?>
		<script src="script/validate.js" type="text/javascript"></script>
<div id="middlePanel">
   				<div class="top">
    				<h2 align="center">Registrasi</h2>
    				
   				</div>
   
                <div class="bottom">
   	
            	<form action="controller/doRegis.php" method="post">
                <table border="0" align="center" cellspacing="5px" cellpadding="5px">
					<tr>
						<td><label>Nama</label></td>
						<td><input type="text" name="txtnama" id="txtnama" onblur="cekNama()" /></td>
						<td><font color="red">*Maksimum 25 Karakter</font></td>
						<td><div id="pic_nama"></div></td>
						
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
					
					<tr>
						<td><label>Jenis Kelamin</label></td>
						<td><input type="radio" name="txtgender" id="gender1" value="M" checked="checked" />Laki-Laki</td>
						<td><input type="radio" name="txtgender" id="gender2"  value="F"/>Perempuan</td>
					</tr>
		
					<tr>
						<td><label>Alamat</label></td>
						<td><textarea name="txtaddress" id="txtaddress" cols="20" rows="4" onblur="cekAddress()"></textarea></td>
						<td><font color="red">*Maksimum 100 Karakter</font></td>
						<td><div id="pic_address"></div></td>
					</tr>
					
					<tr>
						<td>Kota</td>
						<td><select name="txtkota">
							<option value="Bali">Bali</option>
							<option value="Balikpapan">Balikpapan</option>
							<option value="Bandung">Bandung</option>
							<option value="Banjarmasin">Banjarmasin</option>
							<option value="Batam">Batam</option>
							<option value="Bekasi">Bekasi</option>
							<option value="Bengkulu">Bengkulu</option>
							<option value="Biak">Biak</option>
							<option value="Bogor">Bogor</option>
							<option value="Bukittinggi">Bukittinggi</option>
							<option value="Cilegon">Cilegon</option>
							<option value="Depok">Depok</option>
							<option value="Gorontalo">Gorontalo</option>
							<option value="Jakarta">Jakarta</option>
							<option value="Jambi">Jambi</option>
							<option value="Jayapura">Jayapura</option>
							<option value="Lampung">Lampung</option>
							<option value="Makassar">Makassar</option>
							<option value="Malang">Malang</option>
							<option value="Manokwari">Manokwari</option>
							<option value="Medan">Medan</option>
							<option value="Menado">Menado</option>
							<option value="Nabire">Nabire</option>
							<option value="Padang">Padang</option>
							<option value="Palangkaraya">Palangkaraya</option>
							<option value="Palembang">Palembang</option>
							<option value="Pontianak">Pontianak</option>
							<option value="Purwokerto">Purwokerto</option>
							<option value="Salahtiga">Salahtiga</option>
							<option value="Samarinda">Samarinda</option>
							<option value="Singkawang">Singkawang</option>
							<option value="Sorong">Sorong</option>
							<option value="Surabaya">Surabaya</option>							
						</select></td>
						<td></td>
					</tr>	

					<tr>
						<td><label>Kode Pos</label></td>
						<td><input type="text" name="txtkodepos" id="txtkodepos" onblur="cekKodePos()" /></td>
						<td><font color="red">*Maksimum 10 Karakter</font></td>
						<td><div id="pic_kodepos"></div></td>
					</tr>
					
					<tr>
						<td><label>Telepon</label></td>
						<td><input type="text" name="txtphone" id="txtphone" onblur="cekPhone()" /></td>
						<td><font color="red">*Maksimum 15 Karakter</font></td>
						<td><div id="pic_phone"></div></td>
					</tr>
					
					<tr>
						<td><label>Handphone</label></td>
						<td><input type="text" name="txtcell" id="txtcell" onblur="cekCell()" /></td>
						<td><font color="red">*Maksimum 15 Karakter</font></td>
						<td><div id="pic_cell"></div></td>
					</tr>	
							
					<tr>
						<td><label>Email</label></td>
						<td><input type="text" name="txtemail" id="txtemail" onblur="cekEmail()" /></td>
						<td><font color="red">*Maksimum 25 Karakter</font></td>
						<td><div id="pic_email"></div></td>
					</tr>	
					
					<tr height="30px"></tr>
					<tr>
						<td colspan="4" align="center"><input type="submit" value="Registrasi" onclick="return cekForm();" /></td>
					</tr>
					
					<tr height="20px"></tr>
					
					<tr>
						<td colspan="4" align="center"><label id="error" style="font-size:12px;color:red" ><?php
						if (!empty($_REQUEST['error'])) {
							$error = $_REQUEST['error'];
							if($error != NULL)
							echo $error; 	
						}
						?></label></td>
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

