	<div id="rigtPanel">
				<div id="header-search" >
				<form method="post" action="cari_buku.php">
				<input type="text" name="txtsearch" class="search" placeholder="Buku Yasperin.." id="search" />
				<input type="submit" value=" Cari "  />
				</form>
				</div>
			
			
				   <div class="contacts">
				   	<br/><br/>
					<?php 
						if($nama == NULL || $nama == "") 
						{
					?>
    				<h2>Login</h2>
					<form method="POST" action="controller/doLoginUser.php">
    				<input class="inp" name="txtusername" type="text" value="-- Email --" onfocus="if(this.value=='-- Email --')this.value=''" onblur="if(this.value=='')this.value='-- Email --'"/>
    				<input class="inp" name="txtpassword" type="password" value="-- Password --" onfocus="if(this.value=='-- Password --')this.value=''" onblur="if(this.value=='')this.value='-- Password --'"/>
    				
    				<div style="clear:both;"></div>
					<br/>
					<input type="submit" value="Login" style="width:70px;height:25px;margin-right:10px"/>
					<br/>
					<a href="lupasandi.php">Lupa Password ?</a>
					<br/>
					<div class="error">
					 <?php	
						$err = $_REQUEST['err'];
						if ($err)
						{
							echo("$err");
						}
					?>	
					</div>
					
					</form>
	
					<?php
						}
						else
						{
					?>
						<h4>Selamat Datang , <?php echo $nama; ?></h4>
						<table>
						<tr>
						<?php 
							if($TipeAkses == "Pelanggan")
							{
						?>
							<td><a href="ubah_profil_pelanggan.php">My Profile</a></td>
						<?php
							}
							else
							{
						?>
							<td><a href="ubah_profil_pengurus.php">My Profile</a></td>
						<?php
							}
						?>
							<td><a href="controller/doLogout.php">, Logout</a> </td>
						</tr>
						
						</table>
					<?php
						}
					?>
<!-- CHANGE TEXT LINK -->
	
   				</div>
			
   				<div class="services">
				<br/><br/>
				<br/><br/>
    				<h2>Promosi</h2>
    				<ul>
					
					<?php
					$rs = mysql_query("select * from promo order by IDPromosi desc");
					$i = 0;
					while($row = mysql_fetch_array($rs))
					{
					$i++;
					if($i == 4) break;
					$date = $row["TglPromo"];
					
					?>
     					<li>
       						<div class="cal"><?php echo date("d", strtotime($date)); ?><span><?php echo date("F", strtotime($date)); ?></span></div>
       						<h2><?php echo $row["JudulPromo"]; ?></h2>
       						<p><?php echo $row["IsiPromo"]; ?></p>
 
       						<div class="author"><span>BY</span> administrator</div>
     					</li>
						
					<?php
						}
					?>
     				
    				</ul>
   				</div>
   				
             
  			</div>
 