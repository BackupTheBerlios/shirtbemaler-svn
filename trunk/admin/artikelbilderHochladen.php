<html><head><title>Shirtbemaler -> Admin -> Artikelbilder hochladen</title></head>
<body>

<h3>Artikelbilder hochladen</h3>

<?
include_once("../_system/_inc/_fkt/fkt_upload.inc.php");

$twDirUpload = "tempUpload/";

twShowFormUpload($twDirUpload);
?>

</body>
</html>

<?
/* Funktionen --------------------------------------------------------------- */


/**
 * guck mal extra:  http://www.verot.net/php_class_upload.htm
 */
function twShowFormUpload($verz) {
	// Upload-Button wurde geklickt
	if( isset($_POST['submit']) && $_POST['submit']=="hochladen") {
		
		// prüfen, ob Datei hochgeladen wurde (in ein temp. Verz auf dem Server)
		// und ob sie von einem zugelassenen MimeType (Dateiendung) ist.	
		$arrMimetypes = array("image/jpg", "image/jpeg", "image/png", "image/gif");
		$errMsg = twUploadValid($_FILES['datei'], $arrMimetypes);
		// wenn ein Fehler beim Upload auftrat
		if ($errMsg != "twOkay") {
			echo $errMsg. "<br />";
				?><a href="<?=$_SERVER['PHP_SELF'];?>">nochmal probieren</a><br /><?
		}
		// wenn Datei OKAY (in ein temp. Verz.) hochgeladen wurde		
		else {
			///echo "erstma ins temp-Verzeichnis uffn Server geladn OKAY<br />";
			// nun diese Datei in Verzeichnis aufm Server speichern (tempUpload/)
			$errMsg = twUploadSave($verz);
			if ($errMsg != "twOkay") {
				echo $errMsg. "<br />";
					?><a href="<?=$_SERVER['PHP_SELF'];?>">nochmal probieren</a><br /><?
			}
			else {
				// alles hat geklappt... (Bild anzeigen und Frage wies weitergehn soll)
				echo "Das Bild <b>". $_FILES['datei']['name']. "</b> wurde erfolgreich hochgeladen.<br /><br />";
				$bild = $verz. $_FILES['datei']['name'] ?>
				<img src="<?=$bild?>" />
				<br /><br /> <?
				twShowFormNext($verz, $_FILES['datei']['name']);
			}
		}			
	} 
	// Upload-Button wurde noch NICHT geklickt (Formular anzeigen)
	else {?>
		<form enctype='multipart/form-data' method='post' action='<?=$_SERVER['PHP_SELF']?>'>
 			<input type='hidden' name='MAX_FILE_SIZE' value='1000000000000' /> 
			1. Artikel-Bild auswählen (das größte, was da is...):<br />
 			<input type='file' name='datei' /><br />
 			2. und hochladen:<br />
 			<input type='submit' name='submit' value='hochladen' />
 		</form> <?
	}
}


function twShowFormNext($dir, $filename) { ?>
	<form action="artikelbilderHochladen02.php" method="post">
		Nun 
		<input type="hidden" name="dir" value="<?=$dir?>" />
		<input type="hidden" name="filename" value="<?=$filename?>" />
		<input type="submit" name="submit" value="weiter" />
		oder oder ein 
		<a href="<?=$_SERVER['PHP_SELF']?>">anderes Bild hochladen</a>
	</form> <?
}
