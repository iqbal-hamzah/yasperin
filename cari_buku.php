<?php
require("header.php");
?>
	<div id="contentWrap">
 		<div id="contentPanel"> 
		<?php require("leftPanel.php"); ?>
		
<div id="middlePanel">
			
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  
  <meta name="viewport" content="width=device-width">

	<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.1.js"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.1.css" media="screen" />

  
  
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
  
  
<script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/

			$("a#example1").fancybox({
				'titleShow'		: false
			});

			$("a#example2").fancybox({
				'titleShow'		: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});

			$("a#example3").fancybox({
				'titleShow'		: false,
				'transitionIn'	: 'none',
				'transitionOut'	: 'none'
			});

			$("a#example4").fancybox();

			$("a#example5").fancybox({
				'titlePosition'	: 'inside'
			});

			$("a#example6").fancybox({
				'titlePosition'	: 'over'
			});

			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

			/*
			*   Examples - various
			*/

			$("#various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

			$("#various2").fancybox();

			$("#various3").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});

			$("#various4").fancybox({
				'padding'			: 0,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
		});
	</script>

			
   				<div class="top">
    				<h2 align="center">Buku</h2>
    				
   				</div>
   
                <div class="bottom">
		
		
  		<?php
			$name = $_POST["txtsearch"];
				
			$rs = mysql_query("select * from buku where Judul like '%".$name."%' or Sinopsis like '%".$name."%'");
			if(mysql_num_rows($rs) != 0)
			{
			while($row = mysql_fetch_array($rs))
			{
			$judul = $row["Judul"];
		?>
		<table border="0"  cellpadding="5px">
			<tr>
			<td>
				<table border="0" class="buku_box">
					<tr>
						<td width="195" rowspan="4">
						<a id="example4" href="images/buku/<?php echo $row['Sampul']; ?>" title="
						<?php 
				if(strlen($judul) > 40)
				echo substr($judul,0,35)." .....";
				else
				echo $judul;
				?>	
						"><img alt="" height="190" width="195" src="images/buku/<?php echo $row['Sampul']; ?>" /></a>
						
						</td>
						<td width="22" rowspan="3"></td><td width="518"><table border="0"> <tr><td width="480" height="30" style="color:blue"><strong><?php echo $judul; ?></strong></td>
						<td>
					<?php						
					if($TipeAkses == "Admin")
						{
					?>
					<a href="editbuku.php?id=<?php echo $row[0]; ?>" ><img src="images/edit.png" width="15px" height="15px"/></a>
					<?php
						}
					?>
						</td>
					</tr>
				</table>
			</td>
			</tr>
			<tr>
				<td height="95">
				<strong>Penulis : <?php echo $row['Penulis']; ?></strong><br/>
				<?php 
				if(strlen($row['Sinopsis']) > 75)
				echo substr($row['Sinopsis'],0,70)." .....";
				else
				echo $row['Sinopsis'];
				?>
				<br/><strong>Harga : <?php echo $row['Harga']; ?></strong>
				<a style="text-decoration:none"  href="detailbuku.php?id=<?php echo $row[0]; ?>" ><input type="button" value="Detail Buku" /></a>					
				</td>
			</tr>  
			
				
			</table>
			
			</td>
			</tr>
			
			</table>
			
		<?php
			}
		}
		else
		{
		?>
		<br/><br/>
		<div align="center">
		<h4>Mohon Maaf , Buku tidak ditemukan</h4>
		</div>
		<?php
		}
		?>
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


