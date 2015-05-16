<div id="leftPanel">
   				<div class="toplinks">
				
   					<img src="images/logo.png" style="margin-left:35px;margin-right:15px" width="200px" height="200px"/>
			
                    <ul>
                        <li><a href="index.php"><img src="images/logo.png" width="25px" height="25px"/>    Beranda</a></li>
						<?php
							if($nama == "")
							{
						?>
						 <li><a href="registrasi.php"><img src="images/logo.png" width="25px" height="25px"/>    Registrasi</a></li>
						 <?php
							}
						 ?>
                        <li><a href="buku.php"><img src="images/logo.png" width="25px" height="25px"/>    Buku</a></li>
                        <li><a href="tentang_kami.php"><img src="images/logo.png" width="25px" height="25px"/>    Tentang Kami</a></li>
                        <li><a href="hubungi_kami.php"><img src="images/logo.png" width="25px" height="25px"/>    Hubungi Kami</a></li><li><a href="informasi_transaksi.php"><img src="images/logo.png" width="25px" height="25px"/>    Informasi Transaksi</a></li>		
						<?php
							
							 if($nama != "" && $TipeAkses == "Pelanggan")
							{
						?>
						 <li><a href="keranjang_belanja.php"><img src="images/logo.png" width="25px" height="25px"/>    Keranjang Belanja</a></li>
						 <li><a href="konfirmasipembayaran.php"><img src="images/logo.png" width="25px" height="25px"/>    Konfirmasi Pembayaran</a></li>
                        <li><a href="status_transaksi.php"><img src="images/logo.png" width="25px" height="25px"/>    Status Transaksi</a></li>
                        
						<?php
						}						
						else if($nama != "" && ($TipeAkses == "Admin" || $TipeAkses == "Manager" ))
						{
							if($TipeAkses == "Manager")
							{
							?>
							<li>
							<a href="kelola_pengurus.php"><img src="images/logo.png" width="25px" height="25px"/>    Kelola Pengurus</a>
							</li>
							<?php
							}
						?>
						<!--
						<li><a href="cart.php"><img src="images/logo.png" width="25px" height="25px"/>    Cart</a></li>
						 <li><a href="konfirmasipembayaran.php"><img src="images/logo.png" width="25px" height="25px"/>    Konfirmasi Pembayaran</a></li>
						
						 <li><a href="history.php"><img src="images/logo.png" width="25px" height="25px"/>    History</a></li>
						  -->
						 <li><a href="kelola_pelanggan.php"><img src="images/logo.png" width="25px" height="25px"/>    Kelola Pelanggan</a></li>	
							<li><a href="promo.php"><img src="images/logo.png" width="25px" height="25px"/>    Kelola Promosi</a></li>
						  <li><a href="kelola_transaksi.php"><img src="images/logo.png" width="25px" height="25px"/>    Kelola Transaksi</a></li>
							
						
						<?php if($TipeAkses == "Manager")
						{
						?>
						<li><a href="laporanbuku.php"><img src="images/logo.png" width="25px" height="25px"/>    Laporan Buku</a></li>						
						<li><a href="laporantransaksi.php"><img src="images/logo.png" width="25px" height="25px"/>    Laporan Transaksi</a></li>
				
						<?php
						}
						?>
						
						<?php
						
							}
						?>
					
    				</ul>
   				</div>
   				
                <div id="loginPanel" align="center" style="font-size:12px">
				Email Kami : yasperin@yahoo.co.id<br/><br/>
    			<a href="ymsgr:sendIM?cadonetz" ><img src="http://opi.yahoo.com/online?u=username_anda&m=g&t=14/"></a>
   				</div>

                <div id="projectsPanel">
                	
                 
        
   				</div>
                
  			</div>