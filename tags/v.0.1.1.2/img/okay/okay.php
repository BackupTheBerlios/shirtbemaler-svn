<?php

// Get-Werte initialisieren
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
$sgc1 = $_GET['sgc1'];	// Schriftgröße aus Zeile 1
$sgc2 = $_GET['sgc2'];
$sgc3 = $_GET['sgc3'];
$sgc4 = $_GET['sgc4'];
$sgc5 = $_GET['sgc5'];
$c1 = $_GET['c1'];			// Schriftfarbe aus Zeile 1
$c2 = $_GET['c2'];
$c3 = $_GET['c3'];
$c4 = $_GET['c4'];
$c5 = $_GET['c5'];
$fw = $_GET['fw'];			// ?
$am = $_GET['am'];			// ? (alignment)
$pc = $_GET['pc'];			// ?



// das Bild erstellen
$bild = imagecreate(300, 300);
$rot = imagecolorallocate($bild, 255, 0, 0);
imagecolortransparent($bild, $rot);
$blau = imagecolorallocate($bild, 0, 0, 255);

// ImageString(zielgrafik,schrift,X,Y,text,textfarbe)
imagestring($bild, 5, $x1, $y1, "Hahihu", $blau);

imagepng($bild, "okay.png", 75);
imagedestroy($bild);



?>
