<html><head><title>Shirtbemaler -> Admin -> Artikelbilder hochladen (03)</title></head>
<body>

<h3>Artikelbilder hochladen (03)</h3>

<?
// diese Variablen hier anpassen:
$dirShirtbemalerBreit270   = "../img/artikel/breit270/";
$maxBreiteFuerBildBreit270 = 270;
$maxHoeheFuerBildBreit270  = 400;
$dirShirtbemalerHoch100   = "../img/artikel/hoch100/";
$maxBreiteFuerBildHoch100 = 700;                        // unwichtig
$maxHoeheFuerBildHoch100  = 100;
$dirShirtbemalerHoch32   = "../img/artikel/hoch32/";
$maxBreiteFuerBildHoch32 = 300;                         // unwichtig
$maxHoeheFuerBildHoch32  = 32;

// sonstige Variablen
$kategorie   = $_POST['selectKategorien'];
$druckerei   = $_POST['selectDruckereien'];
$hersteller  = $_POST['selectHersteller'];
$name        = $_POST['inputName'];
$dateiendung = $_POST['hiddenDateiendung'];

$uplDir      = $_POST['dir'];
$uplFilename = $_POST['filename'];

$artikelname   = $kategorie. "_". $druckerei. "_". $hersteller. "_". $name; 
$artikelnummer = $artikelname;
$filename      = $artikelname. ".". $dateiendung;

?>

<style>
.gelb {border:1px solid green; background-color:#ffffcc;}
.rot {border:2px solid blue; background-color:fuchsia;}
</style>

<h4>für den Artikel: <span class="gelb"><?=$artikelname?></span></h4>

<h4>Nun werden die vom Shirtbemaler benötigten Bilder erzeugt und gespeichert:</h4> 

<?
$imgUpload = twHoleImg($uplDir, $uplFilename);
if ($imgUpload != false) {
	twMachBildAndSave($imgUpload, 
	                  $maxBreiteFuerBildBreit270, 
	                  $maxHoeheFuerBildBreit270, 
	                  $dirShirtbemalerBreit270, 
	                  $filename,
	                  "b");
	twMachBildAndSave($imgUpload, 
	                  $maxBreiteFuerBildHoch100, 
	                  $maxHoeheFuerBildHoch100, 
	                  $dirShirtbemalerHoch100, 
	                  $filename,
	                  "h");
	twMachBildAndSave($imgUpload, 
	                  $maxBreiteFuerBildHoch32, 
	                  $maxHoeheFuerBildHoch32, 
	                  $dirShirtbemalerHoch32, 
	                  $filename,
	                  "h");
} 
?>

<hr>
<a href="artikelbilderHochladen.php">nächstes Artikelbild hochladen</a>

</body>
</html>

<?
/* Funktionen --------------------------------------------------------------- */


/**
 * Liefert ein Image mit dem Bild aus $dir und $filename.
 */
function twHoleImg($dir, $filename) {
		$dirMitFilename = $dir. $filename;
		if (stristr($filename, ".jpg") == true || stristr($datei, ".jpeg") == true) {
   		if (! ($im = ImageCreateFromJPEG($dirMitFilename))) {
   			echo "Fehler beim laden des Upload-Bildes '". $dirMitFilename. "'!<br />";
   		} 
		}
		else if (stristr($filename, ".gif") == true) {
			if (! ($im = ImageCreateFromGif($dirMitFilename))) {
   			echo "Fehler beim laden des Upload-Bildes '". $dirMitFilename. "'!<br />";
   		}
		}
		else if (stristr($filename, ".png") == true) {
			if (! ($im = ImageCreateFromPng($dirMitFilename))) {
   			echo "Fehler beim laden des Upload-Bildes '". $dirMitFilename. "'!<br />";
   		} 
		}
		else {
			echo "Fehler: das ist kein Bildformat: '". $filename. "'!";
		}		
		
		// Fehler-Bild
   	if ($im == "") { 
      /*
      $im = ImageCreate (150, 30); 
      $bgc = ImageColorAllocate ($im, 255, 255, 255);
      $tc  = ImageColorAllocate ($im, 0, 0, 0);
      ImageFilledRectangle ($im, 0, 0, 150, 30, $bgc);
      ImageString($im, 1, 5, 5, "Fehler beim Öffnen von: $dateiMitPfad", $tc);
      */
      return false;
   	} else {
   		return $im;
   	}   	
	}



/**
 * Erzeugt ein Bild und speichert es in ein Verzeichnis auf dem Server.
 * 
 * @param Image $imgQuelle 
 * @param int $maxBreite   Die maximale Breite des zu erzeugenden Bildes
 * @param int $maxHoehe    Die maximale Höhe des zu erzeugenden Bildes
 * @param String $dir      Das Verzeichnis, in das das Bild gespeichert werden soll
 * @param String $filename Der Dateiname (mit Endg.) des zu erzeugenbden Bildes
 * @param String $wie      Auf Breite skalieren_"b", Auf Höhe skalieren_"h"
 * 
 * @return True, wenns geklappt hat, sonst false
 */
function twMachBildAndSave($imgQuelle, $maxBreite, $maxHoehe, $dir, $filename, $wie) {
	// Maße des (übergebenen) Upload-Bildes ermitteln
	$breiteQuelle = imagesx($imgQuelle);
	$hoeheQuelle  = imagesy($imgQuelle);	
	
	// Maße für das neu zu erstellende Bild ermitteln
	if ($wie == "b") {
		$arr = twHoleBildmassNachBreite($breiteQuelle, $hoeheQuelle, $maxBreite, $maxHoehe);
	} else if ($wie == "h") {
		$arr = twHoleBildmassNachHoehe($breiteQuelle, $hoeheQuelle, $maxBreite, $maxHoehe);
	}	else {
		echo "interner Fehler bei der Parameterübergabe!<br />";
		exit;
	}
	$breiteNeu = $arr[0];
	$hoeheNeu  = $arr[1];
	
	// das neue Bild erstellen
	if (! ($imgNeu = imageCreateTrueColor($breiteNeu, $hoeheNeu))) {
		echo "Fehler beim Erstellen des Bildes '". $filename. "'!<br />";
		return false;
	}
	
	// skalieren
	if (! (imagecopyresampled($imgNeu, $imgQuelle, 
	                          0, 0, 0, 0, 
	                          $breiteNeu, $hoeheNeu, $breiteQuelle, $hoeheQuelle))) {
		echo "Fehler beim Skalieren des Bildes '". $filename. "'!<br />";
		return false;
	} 
	
	// und speichern
	$wohin = $dir. $filename;
	if (imagepng($imgNeu, $wohin)) {
		// alles OKAY
		echo "Bild <span class='gelb'>". $filename. "</span> erfolgreich nach <span class='gelb'>". $dir. "</span> gespeichert.";
		echo "<img src='". $dir. $filename. "' alt='Bildtest' /><br />";
		return true;
	} else {
		echo "Fehler beim Speichern des Bildes '". $filename. "'!<br />";
		return false;
	}
}


function twHoleBildmassNachBreite($breiteQuelle, $hoeheQuelle, $maxBreite, $maxHoehe) {
	// Maße für das neu zu erstellende Bild (erstmal 0)
	$breiteNeu = 0;
	$hoeheNeu  = 0;
	
	// wenn das Upload-Bild kleiner als die max-Werte ist (nix skalieren)
	if (($breiteQuelle <= $maxBreite) && ($hoeheQuelle <= $maxHoehe)) {
		$breiteNeu = $breiteQuelle;
		$hoeheNeu  = $hoeheQuelle;
	}
	
	// wenn das Upload-Bild breiter als $maxBreite ist 
	if ($breiteQuelle > $maxBreite) {
		// z.B: aus 300x800 wird 270x720
		$faktor    = $maxBreite / $breiteQuelle;  // z.B: 270 / 300 =   0,9
		$breiteNeu = $breiteQuelle * $faktor;     // immer:           270
		$hoeheNeu  = $hoeheQuelle  * $faktor;     // z.B: 800 * 0,9 = 720
	}
	
	// wenn NUN die NEUE Höhe immer noch größer als $maxHoehe ist 
	if ($hoeheNeu > $maxHoehe) {
		// z.B: aus 270x720 wird dann nochmal 150x400 
		$faktor = $maxHoehe / $hoeheNeu;          // z.B: 400 / 720   =   0,55
		$breiteNeu = $breiteNeu * $faktor;        // z.B: 270 * 0,555 = 150
		$hoeheNeu  = $hoeheNeu  * $faktor;        // immer:             400
	}
	///echo "breite:". $breiteNeu. "---hoehe:". $hoeheNeu. "---<br />";
	
	return array($breiteNeu, $hoeheNeu);
}

function twHoleBildmassNachHoehe($breiteQuelle, $hoeheQuelle, $maxBreite, $maxHoehe) {
	// Maße für das neu zu erstellende Bild (erstmal 0)
	$breiteNeu = 0;
	$hoeheNeu  = 0;
	
	// wenn das Upload-Bild kleiner als die max-Werte ist (nix skalieren)
	if (($breiteQuelle <= $maxBreite) && ($hoeheQuelle <= $maxHoehe)) {
		$breiteNeu = $breiteQuelle;
		$hoeheNeu  = $hoeheQuelle;
	}	
	
	// wenn das Upload-Bild höher als $maxHoehe ist 
	if ($hoeheQuelle > $maxHoehe) {
		// z.B: aus 700x800 wird 350x400
		$faktor    = $maxHoehe / $hoeheQuelle;  // z.B: 400 / 800   =   0,5
		$breiteNeu = $breiteQuelle * $faktor;     // z.B: 700 * 0,5 = 350
		$hoeheNeu  = $hoeheQuelle  * $faktor;     // immer:           400
	}
	
	// wenn NUN die NEUE Höhe immer noch größer als $maxHoehe ist 
	if ($hoeheNeu > $maxHoehe) {
		// z.B: aus 350x400 wird dann nochmal 270x308 
		$faktor = $maxHoehe / $hoeheNeu;          // z.B: 350 / 270  =   0,77
		$breiteNeu = $breiteNeu * $faktor;        // immer:            270
		$hoeheNeu  = $hoeheNeu  * $faktor;        // z.B: 400 * 0,77 = 308
	}
	///echo "breite:". $breiteNeu. "---hoehe:". $hoeheNeu. "---<br />";
	
	return array($breiteNeu, $hoeheNeu);
}