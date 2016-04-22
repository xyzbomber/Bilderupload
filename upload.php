<?php
$upload_folder = 'upload/'; //Das Upload-Verzeichnis
$filename = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
$extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));
 
 
//Überprüfung der Dateiendung
$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
if(!in_array($extension, $allowed_extensions)) {
	die("Ung&uuml;ltige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt | <a href='index.php'>zur&uuml;ck</a>");
}
 
//Überprüfung der Dateigröße
$max_size = 500*1024; //500 KB
if($_FILES['datei']['size'] > $max_size) {
	die("Bitte keine Dateien größer 500kb hochladen | <a href='index.php'>zur&uuml;ck</a>");
}
 
//Überprüfung dass das Bild keine Fehler enthält
$allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
$detected_type = exif_imagetype($_FILES['datei']['tmp_name']);
if(!in_array($detected_type, $allowed_types)) {
	die("Nur der Upload von Bilddateien ist gestattet | <a href='index.php'>zur&uuml;ck</a>");
}
 
//Pfad zum Upload
$new_path = $upload_folder.$filename.'.'.$extension;
 
//Neuer Dateiname falls die Datei bereits existiert
if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
	$id = 1;
	do {
		$new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
		$id++;
	} while(file_exists($new_path));
}
 
//Alles okay, verschiebe Datei an neuen Pfad
move_uploaded_file($_FILES['datei']['tmp_name'], $new_path);
echo 'Bild erfolgreich hochgeladen: <a href="'.$new_path.'">'.$new_path.'</a> | <a href=\'index.php\'>zur&uuml;ck</a>';
?>
