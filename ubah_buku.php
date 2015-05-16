<?php
require("header.php");
?>
	<div id="contentWrap">
 		<div id="contentPanel"> 
		<?php require("leftPanel.php");
	$id = $_GET["id"];
	$rs = mysql_query("select * from buku where IdBuku='".$id."'");
	$row = mysql_fetch_array($rs);

		?>
 

<script type="text/javascript" src="plugins/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
  			<div id="">
   				<div class="top">
    				<h2 align="center" style="font-family:georgia">Edit Buku</h2>
    				
   				</div>
   
                <div class="bottom" style="font-family:georgia;">
				<br/><br/>
   			<form method="post" enctype="multipart/form-data" action="controller/doUbahBuku.php">
				<table border="0"  style="margin-left:15px"cellspacing="10px" cellspadding="10px">
				<input type="hidden"/>
				<tr>
				<td>Judul</td>
				<td><input type="hidden" name="idbuku" value="<?php echo $id; ?>" /><input type="text" size="33" name="txtname" value="<?php echo $row['Judul']; ?>"/></td>
				</tr>
				
				<tr>
				<td>Kategori</td>
				<td><select name="category">
				<option value="<?php echo $row['Kategori']; ?>"><?php echo $row['Kategori']; ?></option>
				<option value="Hayat">Hayat</option>
				<option value="Injil">Injil</option>
				<option value="Karakter">Karakter</option>
				<option value="Pembinaan Dasar">Pembinaan Dasar</option>
				</select></td>
				</tr>
				
				<tr>
				<td>Sampul</td>
				<td>
				<input type="file" name="file" id="file"><br></td>
				</tr>

				<tr>
				<td>Penulis</td>
				<td><input type="text" name="txtpenulis" value="<?php echo $row['Penulis']; ?>"/></td>
				</tr>
				
				<tr>
				<td>Harga</td>
				<td><input type="text" name="txtprice" value="<?php echo $row['Harga']; ?>"/></td>
				</tr>
				
				<tr>
				<td>Sinopsis</td>
				<td><textarea id="elm1" name="txtdesc" rows="10"><?php echo $row['Sinopsis']; ?></textarea>
				</td>
				</tr>
				
				
				<tr>
				<td><input type="submit" value="Ubah"/></td>
				<td><input type="button" value="Hapus" onclick='location.href="controller/doHapusBuku.php?id=<?php echo $id; ?>"'/>
				</td>
				</tr>
				
				<tr>
				<td colspan="2"><label id="error" style="font-size:12px;color:red" ><?php
						$error = $_REQUEST['err'];
						if($error != NULL)
						echo $error; ?></label></td>
				</tr>
				
				</table>
				</form>

  				</div>
  			</div>
  
  			
 		</div>
	</div>
	<?php
		require("footer.php");
	?>



</body>

</html>


