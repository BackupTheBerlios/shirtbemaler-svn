<?php
/*
 * 
 */
 
session_start();


// get-Variablen initialisieren
//twInitVars();

include_once($_SESSION['url_fkt']. "fkt_image.inc.php");

// die (Original-)Bild-Datei laden (nach $imgOrig)
$pfad     = "../". $_GET['dirUpload']; // erstmal aus 'de' zurück !!! HARDCODED !!!
$filename = $_GET['filenameUpload'];
$imgOrig  = twHoleImgOrig($pfad, $filename);

// das neue Image mit Größenänderung abhängig von der Klamotte (nach $imgNeu)
$imgNeu = twMachImgNeu($imgOrig, 270, 400);

// Transparenz-Versuch (mit $ziel)
$imgNeu = twMachTransparent($imgNeu);

// Anzeige (bei Aufruf mit <img src:"designer_show_price.php" />)
header("Content-type: image/png");
imagepng($imgNeu);
// Speicher aufräumen
imagedestroy($imgOrig);
imagedestroy($imgNeu);

// Session-Variablen setzen
$_SESSION['filenameVorschaubildUpload'] = $filename;


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
				
		return $imgNeu;
	}

	
	
	function twHoleImgOrig($pfad, $datei) {
		//$pfad = "http://progtw.myftp.org/shirtbemaler/img/uploads/";
		//$datei = "grins.jpg";
		$dateiMitPfad = $pfad. $datei;
		if (stristr($datei, ".jpg") != false || stristr($datei, ".jpeg") != false) {
   		$im = @imagecreatefromjpeg($dateiMitPfad);
		}
		if (stristr($datei, ".gif") != false) {
   		$im = @imagecreatefromgif($dateiMitPfad);
		}
		if (stristr($datei, ".png") != false) {
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


	
  function twInitVars() {
		// Get-Werte initialisieren
		///$grafik = $_GET['grafik'];	// 
		$neue_grafik = $_GET['neue_grafik'];			// 
		$vorne_print_method = $_GET['vorne_print_method'];			// 
		$change_preview = $_GET['change_preview'];			// 
  }

	
?>
