<html>
	<head>
		<title>
			[De-Clans] Bild-Upload
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
<table>
<tr>
<center><h1>[De-Clans] Bild-Upload</h1></center>
</tr>
<tr>
<td>
&nbsp;&nbsp;
</td>
<td width="300px">
<center><h3>Navigation</h3></center>
<hr/>
<a href="index.php">Home</a><br />
<a href="#">Bilder</a><br />
</td>
<td width="30px">
</td>
<td width="100%">
<center>
<?php
$ordner = "upload";
$alledateien = scandir($ordner);          				
 
foreach ($alledateien as $datei) {
	$dateiinfo = pathinfo($ordner."/".$datei); 
	$size = ceil(filesize($ordner."/".$datei)/1024); 
	if ($datei != "." && $datei != ".."  && $datei != "_notes" && $bildinfo['basename'] != "Thumbs.db") { 
 
			//Bildtypen sammeln
			$bildtypen= array("jpg", "jpeg", "gif", "png");
			//Dateien nach Typ prüfen, in dem Fall nach Endungen für Bilder filtern
			if(in_array($dateiinfo['extension'],$bildtypen))
  			{
	?>
            <div class="galerie">
                <a href="<?php echo $dateiinfo['dirname']."/".$dateiinfo['basename'];?>">
                <img src="<?php echo $dateiinfo['dirname']."/".$dateiinfo['basename'];?>" width="140" alt="Vorschau" /></a> 
                <span><?php echo $dateiinfo['filename']; ?> (<?php echo $size ; ?>kb)</span>
            </div>
    		<?php 
			// wenn keine Bildeindung dann normale Liste für Dateien ausgeben
			} else { ?>
            <div class="file">
            	<a href="<?php echo $dateiinfo['dirname']."/".$dateiinfo['basename'];?>">  <?php echo $dateiinfo['filename']; ?></a> (<?php echo $dateiinfo['extension']; ?> | <?php echo $size ; ?>kb)
            </div>
            <?php } ?>
<?php
	};
 };
?>
&copy; 2015 - 2016 | <a href="https://de-clans.de/">[De-Clans] Community</a>
</center>
</td>
</table>
</body>
</html>
