<?php
/*
 * Erzeuschd e Bild.
 * is noch e bissl anzebassn middn Variablennemens ($pfad, $dirMotiv...)
 * 
 * Bekommt (von twMachVorschaubildMotivOhneSave() in js01.js) die Motivbilder
 * 
 * Setzt am Ende Session-Variablen 'filenameVorschaubildMotiv'
 * 
 * !!! HARDCODED $pfad "../" !!!
 * 
 * @param		$_GET['dirMotiv']
 * @param		$_GET['filenameMotiv']
 * 
 * @return	erzeugt das Motiv-Bild (nur für die Anzeige auf der Webseite)
 * @return	setzt Sessionvariable: $_SESSION['filenameVorschaubildMotiv']
 */
 
session_start();

// GET-Variablen holen (von twMachVorschaubildMotivOhneSave() in js01.js)
$dirMotiv          = $_GET['dirMotiv'];
$filenameMotiv     = $_GET['filenameMotiv'];

// die (Original-)Datei laden (nach $imgOrig)  !!! HARDCODED $pfad "../" !!!
$pfad  = "../". $dirMotiv;   // erstmal aus 'de' zurück
$datei = $filenameMotiv;
///$pfad = $_SESSION['urlImgMotive'];       // http://progtw.myftp.org/shirtbemaler/img/motive/
///$datei = $_GET['grafik'];                // z.B. schwein.jpg

$imgOrig = twHoleImgOrig($pfad, $datei); // http://progtw.myftp.org/shirtbemaler/img/motive/schwein.jpg

// das neue Image mit Größenänderung abhängig von der Klamotte (nach $imgNeu)
$imgNeu = twMachImgNeu($imgOrig, 270, 400); // das (zu druckende) Motiv

// Transparenz-Versuch (mit $ziel)
$imgNeu = twMachTransparent($imgNeu);

// Anzeige des Bildes ohne Speichern (vorher noch header setzen)
header("Content-type: image/png");
imagepng($imgNeu);
// Speicher aufräumen
imagedestroy($imgOrig);
imagedestroy($imgNeu);

// Session-Variablen setzen
$_SESSION['filenameVorschaubildMotiv']       = $filenameMotiv;


/* Funktionen --------------------------------------------------------------- */

	function twMachTransparent($img) {
		$farbePixel = imagecolorat($img, $_SESSION['klamotteDruckmass'][0]+1, $_SESSION['klamotteDruckmass'][1]+1);
		$farbwerte = imagecolorsforindex($img, $farbePixel);
		$transp = imagecolorresolve($img, $farbwerte["red"], $farbwerte["green"], $farbwerte["blue"]);
		///$transp = imagecolorallocate($ziel, $farbwerte["red"], $farbwerte["green"], $farbwerte["blue"]);
		///$transp = imagecolorallocatealpha($ziel, $farbwerte["red"], $farbwerte["green"], $farbwerte["blue"], 53);
		imagefill($img, 0, 0, $transp);  // sonst is Rest des Bildes schwarz
		imagecolortransparent($img, $transp); 

		//imagealphablending ($ziel, false);
		//imagesavealpha($target, true);
		
		return $img;
	}

	function twMachImgNeu($imgOrig, $breiteNeu, $hoeheNeu) {
		if (!empty($_SESSION['klamotteDruckmass'])) {
			$x1 = $_SESSION['klamotteDruckmass'][0]; // oben links X
			$y1 = $_SESSION['klamotteDruckmass'][1]; // oben links Y
			$x2 = $_SESSION['klamotteDruckmass'][2]; // unten rechts X
			$y2 = $_SESSION['klamotteDruckmass'][3]; // unten rechts Y
			$druckBreite = $_SESSION['klamotteDruckmass'][2] - $_SESSION['klamotteDruckmass'][0];
			$druckHoehe = $_SESSION['klamotteDruckmass'][3] - $_SESSION['klamotteDruckmass'][1]; 
		} else {
			// irgend paar Werte nehmen ... (is wohl erstmal noch nich soo die Lösung)
			$x1          = 100;
			$y1          = 100;
			$druckBreite = 50;
			$druckHoehe  = 50;
		}
		
		$imgNeu = imagecreatetruecolor($breiteNeu, $hoeheNeu);
		imagecopyresampled($imgNeu, $imgOrig, $x1, $y1, 0, 0, $druckBreite, $druckHoehe ,imagesx($imgOrig), imagesy($imgOrig));
		///imagecopyresampled($imgNeu, $imgOrig, 50, 50, 0, 0, 100, 100 ,imagesx($imgOrig), imagesy($imgOrig));
				
		return $imgNeu;
	}

	function twHoleImgOrig($pfad, $datei) {
		$dateiMitPfad = $pfad. $datei;
		if (stristr($datei, ".jpg") == true || stristr($datei, ".jpeg") == true) {
   		$im = @ImageCreateFromJPEG($dateiMitPfad);
		}
		if (stristr($datei, ".gif") == true) {
   		$im = @imagecreatefromgif($dateiMitPfad);
		}
		if (stristr($datei, ".png") == true) {
   		$im = @imagecreatefrompng($dateiMitPfad);
		}		
		
		// Fehler-Bild
   	if (!$im) { 
      $im = ImageCreate (150, 30); 
      $bgc = ImageColorAllocate ($im, 255, 255, 255);
      $tc  = ImageColorAllocate ($im, 0, 0, 0);
      ImageFilledRectangle ($im, 0, 0, 150, 30, $bgc);
      ImageString($im, 1, 5, 5, "Fehler beim Öffnen von: $dateiMitPfad", $tc);
   	}
   	return $im;
	}
	
	





	function twResizeMotiv($pfad, $datei, $thumbBreite) {
		$bildMitPfad = $pfad. $datei;
		$bilddaten = getimagesize($bildMitPfad);
		
		$origBreite = $bilddaten[0];
		$origHoehe = $bilddaten[1];
		
		if ($origBreite < $thumbBreite) {
		  $thumbBreite=$origBreite;
		}
		
		$Skalierungsfaktor = $origBreite/$thumbBreite;
		$thumbHoehe = intval($origHoehe/$Skalierungsfaktor);
		
		// wenn es ein gif-Bild ist
		if ($bilddaten[2] == 1) {
		  $Originalgrafik = ImageCreateFromGIF($bildMitPfad);
		  $Thumbnailgrafik = ImageCreateTrueColor($thumbBreite, $thumbHoehe);
		  ImageCopyResized($Thumbnailgrafik, $Originalgrafik, 0, 0, 0, 0, $thumbBreite, $thumbHoehe, $origBreite, $origHoehe);
		  ImageGIF($Thumbnailgrafik, $pfad."resized_".$datei);
		}
		// wenn es ein jpg-Bild ist
		elseif ($bilddaten[2] == 2) {
		  $Originalgrafik = ImageCreateFromJPEG($bildMitPfad);
		  $Thumbnailgrafik = ImageCreateTrueColor($thumbBreite, $thumbHoehe);
		  ImageCopyResized($Thumbnailgrafik, $Originalgrafik, 0, 0, 0, 0, $thumbBreite, $thumbHoehe, $origBreite, $origHoehe);
		  ///ImageJPEG($Thumbnailgrafik, $pfad."thumb_".$bild);
		  ImageJPEG($Thumbnailgrafik, $pfad."resized_".$datei);
		}
		// wenn es ein png-Bild ist
		elseif ($bilddaten[2] == 3) {
		  $Originalgrafik = ImageCreateFromPNG($bildMitPfad);
		  $Thumbnailgrafik = ImageCreateTrueColor($thumbBreite, $thumbHoehe);
		  ImageCopyResized($Thumbnailgrafik, $Originalgrafik, 0, 0, 0, 0, $thumbBreite, $thumbHoehe, $origBreite, $origHoehe);
		  ImagePNG($Thumbnailgrafik, $pfad."resized_".$datei);
		}
		// wenns nich geklappt hat
		else {
			return false;
		}
		
		// Speicher leeren
		if ($Originalgrafik) {
			imagedestroy($Originalgrafik);
		}
		if ($Thumbnailgrafik) {
			imagedestroy($Thumbnailgrafik);
		}
	}
	
?>
