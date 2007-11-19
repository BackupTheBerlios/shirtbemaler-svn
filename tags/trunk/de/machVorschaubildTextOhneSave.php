<?php
session_start();

// dem Browser sagen, dass nun ein Bild kommt (png is besser wegen transparenz)
header("Content-type: image/png");

/*
 * Hier wird aus dem vom User eingegebenen Text ein Bild erzeugt.
 * Alle Werte wurden dabei mit GET übermittelt und werden hier zuerst gleich
 * als Session-Variablen abgespeichert.
 * Das "Ergebnis" dieser Seite ist ein Bild (siehe header() und imagepng()).
 * Im Shirtbemaler wird dieses Bild(diese php-Seite) im img mit der id 
 * "vorschauVorneDruckbild" abgebildet.
 */

// get-Variablen initialisieren
$mode = $_GET['mode'];	// 1
$x1 = $_GET['x1'];			// 185
$x2 = $_GET['x2'];			// 0.675
$y1 = $_GET['y1'];			// 320
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
$fw = $_GET['fw'];			// ?
$am = $_GET['am'];			// ? (alignment)
$pc = $_GET['pc'];			// ?

// das Bild erzeugen (und temporär speichern)
$bild = imagecreate(270, 400);
// Hintergrundfarbe setzen und transparent machen
$hintergrundfarbe = imagecolorallocate($bild, 255, 0, 255);
imagecolortransparent($bild, $hintergrundfarbe);

// Stelle angeben, an der's Schrift-Bild auf der Klamotte beginnen soll(x1, y1)
// dazu die jeweiligen Klamotten-Druck-Koordinaten holen
$x1          = $_SESSION['klamotteDruckmass'][0]; // oben links X
$y1          = $_SESSION['klamotteDruckmass'][1]; // oben links Y
$x2          = $_SESSION['klamotteDruckmass'][2]; // unten rechts X
$y2          = $_SESSION['klamotteDruckmass'][3]; // unten rechts Y
$druckBreite = $x2 - $x1;
$druckHoehe  = $y2 - $y1; 

// Schriftgrößen ($h) anhand der sgc(schriftGradCode) ermitteln
$h1 = twFormatSchriftgroesse($g1);
$h2 = twFormatSchriftgroesse($g2);
$h3 = twFormatSchriftgroesse($g3);
$h4 = twFormatSchriftgroesse($g4);
$h5 = twFormatSchriftgroesse($g5);

// die 5 Zeilen (jeweils vorher noch Schriftgröße abziehen wegen imagettftext())
$y1 = $y1 + $h1 + 6;
twMachZeile($bild, $c1, $h1, $x1, $y1, $f1, $t1);
$y1 = $y1 + $h2 + 6;
twMachZeile($bild, $c2, $h2, $x1, $y1, $f2, $t2);
$y1 = $y1 + $h3 + 6;
twMachZeile($bild, $c3, $h3, $x1, $y1, $f3, $t3);
$y1 = $y1 + $h4 + 6;
twMachZeile($bild, $c4, $h4, $x1, $y1, $f4, $t4);
$y1 = $y1 + $h5 + 6;
twMachZeile($bild, $c5, $h5, $x1, $y1, $f5, $t5);

// Ausgabe des Bildes im Browser
imagepng($bild, null, 100); // (mit null wirs nich gespeichert, nur ausgegeben)
imagedestroy($bild);



/* Funktionen --------------------------------------------------------------- */

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

//  function twInitVars() {
//		// Get-Werte initialisieren
//		$mode = $_GET['mode'];	// 1
//		$x1 = $_GET['x1'];			// 185
//		$x2 = $_GET['x2'];			// 0.675
//		$y1 = $_GET['y1'];			// 320
//		$t1 = $_GET['t1'];			// text aus Zeile 1
//		$t2 = $_GET['t2'];
//		$t3 = $_GET['t3'];
//		$t4 = $_GET['t4'];
//		$t5 = $_GET['t5'];
//		$f1 = $_GET['f1'];			// Schriftart aus Zeile 1
//		$f2 = $_GET['f2'];
//		$f3 = $_GET['f3'];
//		$f4 = $_GET['f4'];
//		$f5 = $_GET['f5'];
//		$sgc1 = $_GET['sgc1'];	// Schriftgröße aus Zeile 1
//		$sgc2 = $_GET['sgc2'];
//		$sgc3 = $_GET['sgc3'];
//		$sgc4 = $_GET['sgc4'];
//		$sgc5 = $_GET['sgc5'];
//		$c1 = $_GET['c1'];			// Schriftfarbe aus Zeile 1
//		$c2 = $_GET['c2'];
//		$c3 = $_GET['c3'];
//		$c4 = $_GET['c4'];
//		$c5 = $_GET['c5'];
//		$fw = $_GET['fw'];			// ?
//		$am = $_GET['am'];			// ? (alignment)
//		$pc = $_GET['pc'];			// ?
// }

	function twFormatSchriftgroesse($str) {
		if ($str == "x-small") { return 10; }
		if ($str == "small") { return 14; }
		if ($str == "medium") { return 18; }
		if ($str == "large") { return 24; }
		if ($str == "x-large") { return 36; }
		return (int)$str;
	}
	
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
