<?php
require("header.php");
?>
	<div id="contentWrap">
 		<div id="contentPanel"> 
		<?php require("leftPanel.php"); ?>
		
<div id="middlePanel">
   				<div class="top">
    				<h2 align="center">Selamat Datang di Toko Buku Yasperin</h2>
    				
   				</div>
   
                <div class="bottom">
   				<ul id="slideshow">
		<li>
			<h3>YASPERIN merupakan singkatan dari Yayasan Perpustakaan Injil</h3>
			<span>photos/1.jpg</span>
			<p>Yasperin didirikan sejak 15 Oktober 1967 di Surabaya melalui rapat kesepakatan oleh para pengurus YASPERIN</p>
			<a href="#">
            <img src="photos/1.jpg" alt="1" width="125" height="75" /></a>
		</li>
		<li>
			<h3>Visi dari Yasperin</h3>
			<span>photos/2.jpg</span>
			<p>Menjadikan semua bangsa menjadi murid Tuhan melalui mengabarkan dan memberitakan Injil pada 3(tiga) bidang : sosial, keagamaan, dan kemanusiaan.</p>
			<img src="photos/2.jpg" alt="2" width="125" height="75" /> 
		</li>
		<li>
			<h3>Lokasi dari Yasperin</h3>
			<span>photos/3.jpg</span>
			<p>Hingga saat ini sudah meluas di kota-kota besar di Indonesia.Kantor Pusat, Bagian Penejemahan , Editorial dan Toko Buku berada di Jakarta</p>
			<a href="#">
            <img src="photos/3.jpg" alt="3" width="75" height="75" /></a>
		</li>

		

	</ul>
	<div id="wrapper">
		<div id="fullsize">
			<div id="imgprev" class="imgnav" title="Previous Image"></div>
			<div id="imglink"></div>
			<div id="imgnext" class="imgnav" title="Next Image"></div>
			<div id="image"></div>
			<div id="information">
				<h3></h3>
				<p></p>
			</div>
		</div>
		<div id="thumbnails">
			<div id="slideleft" title="Slide Left"></div>
			<div id="slidearea">
				<div id="slider"></div>
			</div>
			<div id="slideright" title="Slide Right"></div>
		</div>
	</div>
<script type="text/javascript" src="compressed.js"></script>
<script type="text/javascript">
	$('slideshow').style.display='none';
	$('wrapper').style.display='block';
	var slideshow=new TINY.slideshow("slideshow");
	window.onload=function(){
		slideshow.auto=true;
		slideshow.speed=5;
		slideshow.link="linkhover";
		slideshow.info="information";
		slideshow.thumbs="slider";
		slideshow.left="slideleft";
		slideshow.right="slideright";
		slideshow.scrollSpeed=4;
		slideshow.spacing=5;
		slideshow.active="#fff";
		slideshow.init("slideshow","image","imgprev","imgnext","imglink");
	}
    </script>
<div style="clear:both;"></div>

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


