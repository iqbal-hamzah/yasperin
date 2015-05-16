<?php
require("header.php");
?>
	<div id="contentWrap">
 		<div id="contentPanel"> 
		<?php require("leftPanel.php"); ?>
		
<div id="middlePanel">
   				<div class="top">
    				<h2 align="center">Promosi</h2>
    				
   				</div>
   
                <div class="bottom">
   		
<br/><br/>

 <?php
 $rs = mysql_query("select * from promo order by IDPromosi desc");
 
 while($row = mysql_fetch_array($rs))
 {
 
 $date = new DateTime($row["Date"]);
 $date2 = $date->format('d-F-y');
	$id = $row[0];
 ?>
 
 <div>
<h2><?php echo $row["JudulPromo"] ?></h2>


<?php 
			
				echo $row['IsiPromo'];
				?> 
<div class="meta"><span><?php echo $date2; if($TipeAkses == "Admin" || $TipeAkses == "Manager") { ?>
     |      <a style="text-decoration:none" href="ubah_promo.php?id=<?php echo $id; ?>">Ubah</a>
     |      <a style="text-decoration:none" href="controller/doHapusPromo.php?id=<?php echo $id; ?>">Hapus</a>
	 <?php } ?></span></div><!-- meta -->
<div class="clear"></div>
</div><!-- news -->
 
<?php
}
?>	

				</div>
				
						<?php
				
				if($TipeAkses == "Admin" || $TipeAkses == "Manager")
				{
			?><br/><br/>
			<div align="center">
	
			<input type="button" value="Tambah" style="font-size:15px;width:100px;height:30px" onclick='location.href="tambah_promosi.php"'>
			</div>
			<?php
				}
			?>
	
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


