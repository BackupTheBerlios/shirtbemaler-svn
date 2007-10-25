<?php
session_start();

//imageCopyResampled($druckbild, $vorschaubild, $zielX, $zielY, $quelleX, $quelleY, $zielBreite, $zielHoehe, $quelleBreite, $quelleHoehe); 




//$arrGet = array();
//foreach ($_GET as $key =>$val) {
//	$arrGet[$key] = $val;
//}
//foreach ($arrGet as $key => $val) {
//	echo $key. ": ". $val. "<br />";
//}


/*
 * Hier wird aus dem vom User eingegebenen Text ein Bild erzeugt.
 * Alle Werte wurden dabei mit GET übermittelt und werden hier zuerst gleich
 * als Session-Variablen abgespeichert.
 * Das "Ergebnis" dieser Seite ist ein Bild (siehe header() und imagepng()).
 * Im Shirtbemaler wird dieses Bild(diese php-Seite) im img mit der id 
 * "vorschauVorneDruckbild" abgebildet.
 */

// Dir-Prefix (von 'de' erstmal rückwärts, wegen ZenCart<->Shirtbemaler)
$twPrefixDir = "../";

// (zur Zeit) einheitlichen Dateiname für die zu speichernden Bilder festlegen
// (ein timestamp mit drin, da sonst bei einer Bildänderung bei selben Dateiname 
//  im Browser immer noch das erste Bild aus dem Cache angezeigt wird)
$filename = $_SESSION['artikel']. "___". time(). ".png";







/*
 * -leeres Bild erzeugen (270x400, so groß wie das ganze Vorschaubild)
 * -Hintergrundfarbe (schwarz) erstellen
 * -diese Hintergrundfarbe transparent machen
 * -den Text auf dem Bild abbilden
 * -(speichern erst am Ende des Skriptes)
 */
$vorschaubild = imageCreateTrueColor(270, 400);
$hintergrundfarbe = imageColorAllocate($vorschaubild, 0, 0, 0);
imageColorTransparent($vorschaubild, $hintergrundfarbe);
$vorschaubild = twMachTextzeilenForVorschaubild($vorschaubild);
/*----- Vorschau-Bild (270x400-) END -----*/







/*----- Textbild (nur Text ohne transp. Rand) START -----*/
$textbild = imageCreateTrueColor(500, 500);
$hintergrundfarbe2 = imageColorAllocate($textbild, 0, 0, 0);
imageColorTransparent($textbild, $hintergrundfarbe2);
$textbild = twMachTextzeilenForTextbild($textbild);
/*----- Textbild (nur Text ohne transp. Rand) END -----*/






/*----- VorschaubildFuerWarenkorb (100 hoch) START -----*/
$vorschaubildFuerWarenkorb = twMachImgWarenkorb($vorschaubild, 270, 400, 4);
$vorschaubildFuerWarenkorb = twMachTransparent($vorschaubildFuerWarenkorb);
/*----- VorschaubildFuerWarenkorb (100 hoch) END -----*/






/*----- alles speichern START -----*/
// Vorschaubild
$filenameVorschaubild = $filename;
$wohinV = "". $twPrefixDir. $_SESSION['dirVorschauVorneText']. $filenameVorschaubild;
imagePng($vorschaubild, $wohinV);

// Textbild
$filenameTextbild = $filename;
$wohinT = "". $twPrefixDir. $_SESSION['dirText']. $filenameTextbild;
imagePng($textbild, $wohinT);

// VorschaubildFuerWarenkorb
$filenameVorschaubildFuerWarenkorb = $filename;
$wohinVW = "". $twPrefixDir. $_SESSION['dirVorschauFuerWarenkorb']. $filenameVorschaubildFuerWarenkorb;
imagepng($vorschaubildFuerWarenkorb, $wohinVW);
/*----- alles speichern END -----*/






/*----- aufräumen START -----*/
imageDestroy($vorschaubild);
imageDestroy($textbild);
imageDestroy($vorschaubildFuerWarenkorb);
//imageDestroy($druckbild);
/*----- aufräumen END -----*/






/*----- 6. Session-Variablen speichern START -----*/
$dataText = array();
$dataText[0] = array($t1, $f1, $g1, $c1);
$dataText[1] = array($t2, $f2, $g2, $c2);
$dataText[2] = array($t3, $f3, $g3, $c3);
$dataText[3] = array($t4, $f4, $g4, $c4);
$dataText[4] = array($t5, $f5, $g5, $c5);
$_SESSION['dataText']               = $dataText;
$_SESSION['filenameVorschaubildText']          = $filenameVorschaubild;
$_SESSION['filenameVorschaubildFuerWarenkorb'] = $filenameVorschaubildFuerWarenkorb;
$_SESSION['filenameDruckbildText']             = $filenameTextbild;
/*----- 6. Session-Variablen speichern END -----*/






/* Funktionen --------------------------------------------------------------- */

	/**
	 * Zeichnet die Textzeilen auf das (270x400) Vorschaubild.
	 * 
	 * Nimmt alle nötigen Werte von $_GET.
	 * -erstmal die $_GET-Variablen in kurze Variablen umwandeln (übersichtlicher)
	 * -die jeweiligen Klamotten-Druck-Koordinaten holen
   * -die (sich daraus ergebende) Druck-Breite und Druck-Höhe ermitteln
   * -(Stelle, an der das Schrift-Bild auf der Klamotte beginnen soll(x1, y1)
   * -Zeilenhöhe setzen (Schriftgröße)
   * -alle 5 TextZeilen zeichnen (Schrifthöhe abziehen beachten)
	 */
	function twMachTextzeilenForVorschaubild($vorschaubild) {
		// get-Variablen initialisieren
		$t1 = $_GET['t1'];			// text aus Zeile 1
		$t2 = $_GET['t2'];
		$t3 = $_GET['t3'];
		$t4 = $_GET['t4'];
		$t5 = $_GET['t5'];
		$f1 = $_GET['f1'];			// Schriftart aus Zeile 1
		$f2 = $_GET['f2'];
		$f3 = $_GET['f3'];
		$f4 = $_GET['f4'];
		$f5 = $_GET['f5'];
		$g1 = $_GET['g1'];	   // Schriftgröße aus Zeile 1
		$g2 = $_GET['g2'];
		$g3 = $_GET['g3'];
		$g4 = $_GET['g4'];
		$g5 = $_GET['g5'];
		$c1 = $_GET['c1'];			// Schriftfarbe aus Zeile 1
		$c2 = $_GET['c2'];
		$c3 = $_GET['c3'];
		$c4 = $_GET['c4'];
		$c5 = $_GET['c5'];
		
		// Druckkoordinaten holen und daraus gleich Breite und Höhe ermitteln
		// (x1/y1 ist oben links, wo der Druck auf der Klamotte beginnt, nicht das Bild oben links...)
		$x1          = $_SESSION['klamotteDruckmass'][0]; // oben links X
		$y1          = $_SESSION['klamotteDruckmass'][1]; // oben links Y
		$x2          = $_SESSION['klamotteDruckmass'][2]; // unten rechts X
		$y2          = $_SESSION['klamotteDruckmass'][3]; // unten rechts Y
		$druckBreite = $x2 - $x1;
		$druckHoehe  = $y2 - $y1; 
		
		// Schriftgrößen ($h) anhand der g(schriftGradCode) ermitteln
		$h1 = twFormatSchriftgroesse($g1);
		$h2 = twFormatSchriftgroesse($g2);
		$h3 = twFormatSchriftgroesse($g3);
		$h4 = twFormatSchriftgroesse($g4);
		$h5 = twFormatSchriftgroesse($g5);
		
		// die 5 Zeilen (jeweils vorher noch Schriftgröße abziehen wegen imagettftext())
		$y1 = $y1 + $h1 + 6;
		twMachZeile($vorschaubild, $c1, $h1, $x1, $y1, $f1, $t1);
		$y1 = $y1 + $h2 + 6;
		twMachZeile($vorschaubild, $c2, $h2, $x1, $y1, $f2, $t2);
		$y1 = $y1 + $h3 + 6;
		twMachZeile($vorschaubild, $c3, $h3, $x1, $y1, $f3, $t3);
		$y1 = $y1 + $h4 + 6;
		twMachZeile($vorschaubild, $c4, $h4, $x1, $y1, $f4, $t4);
		$y1 = $y1 + $h5 + 6;
		twMachZeile($vorschaubild, $c5, $h5, $x1, $y1, $f5, $t5);
		
		return $vorschaubild;
	}
	
	
	/**
	 * Zeichnet die Textzeilen auf das Textbild.
	 * 
	 * wie twMachTextzeilenForVorschaubild(), nur mit Startpunkt 0/0 und größer
	 */
	function twMachTextzeilenForTextbild($textbild) {
		// get-Variablen initialisieren
		$t1 = $_GET['t1'];			// text aus Zeile 1
		$t2 = $_GET['t2'];
		$t3 = $_GET['t3'];
		$t4 = $_GET['t4'];
		$t5 = $_GET['t5'];
		$f1 = $_GET['f1'];			// Schriftart aus Zeile 1
		$f2 = $_GET['f2'];
		$f3 = $_GET['f3'];
		$f4 = $_GET['f4'];
		$f5 = $_GET['f5'];
		$g1 = $_GET['g1'];	   // Schriftgröße aus Zeile 1
		$g2 = $_GET['g2'];
		$g3 = $_GET['g3'];
		$g4 = $_GET['g4'];
		$g5 = $_GET['g5'];
		$c1 = $_GET['c1'];			// Schriftfarbe aus Zeile 1
		$c2 = $_GET['c2'];
		$c3 = $_GET['c3'];
		$c4 = $_GET['c4'];
		$c5 = $_GET['c5'];
		
		// Startpunkt
		$x1 = 0;
		$y1 = 0;
		// Schriftgrößen ($h) anhand der sgc(schriftGradCode) ermitteln
		$h1 = twFormatSchriftgroesse($g1) * 2;
		$h2 = twFormatSchriftgroesse($g2) * 2;
		$h3 = twFormatSchriftgroesse($g3) * 2;
		$h4 = twFormatSchriftgroesse($g4) * 2;
		$h5 = twFormatSchriftgroesse($g5) * 2;
		// die 5 Zeilen (jeweils vorher noch Schriftgröße abziehen wegen imagettftext())
		$y1 = $y1 + $h1 + 12;
		twMachZeile($textbild, $c1, $h1, $x1, $y1, $f1, $t1);
		$y1 = $y1 + $h2 + 12;
		twMachZeile($textbild, $c2, $h2, $x1, $y1, $f2, $t2);
		$y1 = $y1 + $h3 + 12;
		twMachZeile($textbild, $c3, $h3, $x1, $y1, $f3, $t3);
		$y1 = $y1 + $h4 + 12;
		twMachZeile($textbild, $c4, $h4, $x1, $y1, $f4, $t4);
		$y1 = $y1 + $h5 + 12;
		twMachZeile($textbild, $c5, $h5, $x1, $y1, $f5, $t5);
		
		return $textbild;
	}
	

	/**
	 * Zeichnet eine Textzeile.
	 */
	function twMachZeile($bild, $textfarbe, $schriftgroesse, $x, $y, $f, $text) {
		// Textfarbe (noch von hex in rgb umwandeln)
		$arrFarbe = rgb2hex2rgb($textfarbe);  
		$textfarbe = imagecolorallocate($bild, $arrFarbe[r], $arrFarbe[g], $arrFarbe[b]);
		// Schriftart ("/var/www/shirtbemaler/schriften/". $f. ".ttf";)
		$font = $_SESSION['dirDocumentRoot']. $_SESSION['dirApplication']. $_SESSION['dirFonts']. $f. ".ttf";
		if (!file_exists($font)) {
			$font = $_SESSION['dirDocumentRoot']. $_SESSION['dirApplication']. $_SESSION['dirFonts']. "arial.ttf";
		}
		
		// Nun entweder mit imagestring() oder mit imagettftext() den Text als Bild
		// erstellen. imagestring() is Scheiße, weil nur 5 schriften(-größen) gehen
		// und keine Neigung einstellbar ist(nur 90grad).
		// Also imagettftext(): 
		// array imagefttext(bild, fontgroesse, neigung, x, y, textfarbe, schriftdatei, text)
		// array imagefttext(image, float, float, int, int int, string, string [, array extrainfo] )
		// bild vorher mit imagecreate (oder mit imagecreatefromjpg(png)) erzeugen
		// x und y ist die linke untere Ecke des Textes (anders als bei imagestring)
		// textfarbe vorher mit imagecolorallocate() erzeugen
		// die Fontdatei am Besten gleich mit auf den Server legen
		imagettftext($bild, $schriftgroesse, 0, $x, $y, $textfarbe, $font, $text);
		///imagettftext($bild, 16, 0, 10, 10, imagecolorallocate($bild, 255, 0, 0), "/var/www/shirtbemaler/fonts/arial.ttf", "Test-Text");
		///array imagettftext ( resource $im, int $size, int $angle, int $x, int $y, int $col, string $fontfile, string $text )
		// oder
		///imagestring($bild, $schriftgroesse, $x, $y, $text, $textfarbe);
	}
	
	
	/**
	 * Liefert das VorschaubildFuerWarenkorb (hoch 100) (nach der Erstellung ;-))
	 */
	function twMachImgWarenkorb($imgOrig, $breiteNeu, $hoeheNeu, $divisor) {
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
		
		$x1          = (int)($x1 / $divisor);
		$y1          = (int)($y1 / $divisor);
		$x2          = (int)($x2 / $divisor);
		$y2          = (int)($y2 / $divisor);
		$breiteNeu   = (int)($breiteNeu / $divisor);
		$hoeheNeu    = (int)($hoeheNeu / $divisor);
		$druckBreite = (int)($druckBreite / $divisor);
		$druckHoehe  = (int)($druckHoehe / $divisor);
		
		$imgNeu = imagecreatetruecolor($breiteNeu, $hoeheNeu);
		imagecopyresampled($imgNeu, $imgOrig, $x1, $y1, 0, 0, $druckBreite, $druckHoehe ,imagesx($imgOrig), imagesy($imgOrig));
		///imagecopyresampled($imgNeu, $imgOrig, 50, 50, 0, 0, 100, 100 ,imagesx($imgOrig), imagesy($imgOrig));
				
		return $imgNeu;
	}
	
	
	/**
	 * Macht ein übergeben bekommenes Bild transparent, und liefert es zurück.
	 */
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
	

	/**
	 * Müsste noch abgeändert werden (besser Schriftgröße gleich als Zahl bekommen...)
	 */
	function twFormatSchriftgroesse($str) {
		if ($str == "x-small") { return 10; }
		if ($str == "small") { return 14; }
		if ($str == "medium") { return 18; }
		if ($str == "large") { return 24; }
		if ($str == "x-large") { return 36; }
		return (int)$str;
	}
	
	
	/**
	 * RGB-Hex-Umrechnung und zurück.
	 */
	function rgb2hex2rgb($c) {
		// guck: http://www.php.net/hexdec
    if (!$c) { return false; }
    $c = trim($c);
    $out = false;
    if (eregi("^[0-9ABCDEFabcdef\#]+$", $c)) {
      $c = str_replace('#','', $c);
      $l = strlen($c);
      if ($l == 3) {
        unset($out);
        $out[0] = $out['r'] = $out['red'] = hexdec(substr($c, 0,1));
        $out[1] = $out['g'] = $out['green'] = hexdec(substr($c, 1,1));
        $out[2] = $out['b'] = $out['blue'] = hexdec(substr($c, 2,1));
      }	
      elseif ($l == 6) {
        unset($out);
        $out[0] = $out['r'] = $out['red'] = hexdec(substr($c, 0,2));
        $out[1] = $out['g'] = $out['green'] = hexdec(substr($c, 2,2));
        $out[2] = $out['b'] = $out['blue'] = hexdec(substr($c, 4,2));
      }
      else {
      	$out = false;
      }              
    }
    elseif (eregi("^[0-9]+(,| |.)+[0-9]+(,| |.)+[0-9]+$", $c)) {
      if (eregi(",", $c)) {
        $e = explode(",",$c);
      }
      else if (eregi(" ", $c)) {
        $e = explode(" ",$c);
      }
      else if (eregi(".", $c)) {
        $e = explode(".",$c);
      }
      else {
      	return false;
      }
               
			if (count($e) != 3) {
				return false;
			}
               
      $out = '#';
      for ($i = 0; $i<3; $i++) {
        $e[$i] = dechex(($e[$i] <= 0)?0:(($e[$i] >= 255)?255:$e[$i]));
      }               
      for ($i = 0; $i<3; $i++) {
        $out .= ((strlen($e[$i]) < 2)?'0':'').$e[$i];
      }                   
      $out = strtoupper($out);
    }
    else {
    	$out = false;
    }           
     
    return $out;
    
    // zum gucken:
//    echo '#FFFFFF => '.rgb2hex2rgb('#FFFFFF').'<br>';
//    echo '#FFCCEE => '.rgb2hex2rgb('#FFCCEE').'<br>';
//    echo 'CC22FF => '.rgb2hex2rgb('CC22FF').'<br>';
//    echo '0 65 255 => '.rgb2hex2rgb('0 65 255').'<br>';
//    echo '255.150.3 => '.rgb2hex2rgb('255.150.3').'<br>';
//    echo '100,100,250 => '.rgb2hex2rgb('100,100,250').'<br>';

//#FFFFFF =>
// Array{
//   red=>255,
//   green=>255,
//   blue=>255,
//   r=>255,
//   g=>255,
//   b=>255,
//   0=>255,
//   1=>255,
//   2=>255
// }
//
//#FFCCEE =>
// Array{
//   red=>255,
//   green=>204,
//   blue=>238,
//   r=>255,
//   g=>204,
//   b=>238,
//   0=>255,
//   1=>204,
//   2=>238
// }
//
//CC22FF =>
// Array{
//   red=>204,
//   green=>34,
//   blue=>255,
//   r=>204,
//   g=>34,
//   b=>255,
//   0=>204,
//   1=>34,
//   2=>255
// }
//
//0 65 255 => #0041FF
//255.150.3 => #FF9603
//100,100,250 => #6464FA
    
  }
	
?>
