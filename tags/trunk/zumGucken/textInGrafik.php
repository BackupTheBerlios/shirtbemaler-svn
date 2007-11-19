<?php
/**
 * von: http://koffeinkoma.de/index.php/2007/01/22/tutorial-grafikfunktionen-in-php-teil-1/
 */	
?>
<html><head></head> 
<body>


<?
// erstmal ein neues leeres Bild erstellen (breite, höhe)
$buchbild=imagecreate(140,180);

// ne Hintergrundfarbe erstellen, die später zur Transparenz genutzt wird
// (am Besten ne Farbe, die selten in Bildern verwendet wird)
$hintergrundfarbe=imagecolorallocate($buchbild, 255, 0, 255);

// eine Grafik erstellen von nem vorhandenen Bild (buch2.gif muss da sein)
$buchgrafik = ImageCreateFromGIF("buch2.gif");

// diese Grafik in unser Bild kopieren
// Imagecopy(zielgrafik, quellgrafik, zielX, zielY, quelleX, quelleY, quB, quH)
Imagecopy($buchbild,$buchgrafik,0,0,0,0,140,180);

// eine Textfarbe erstellen
$textfarbe=imagecolorallocate($buchbild, 0, 0, 0);

// einen Text ALS BILD erstellen
// ImageString(zielgrafik,schrift,X,Y,text,textfarbe)
ImageString($buchbild,5,23,50,"mein Text",$textfarbe);
ImageString($buchbild,2,23,65,"noch einer",$textfarbe);
ImageString($buchbild,1,23,100,"von: mir",$textfarbe);

// nun unser (evtl. vorher schon transparentes) GIF transparent machen
// imagecolortransparent(grafik, farbe) 
imagecolortransparent($buchbild, $hintergrundfarbe);

// und abspeichern (Imagegif(bild, zielort, qualität))
Imagegif($buchbild,"erstelltesBild.gif",100);
?>


<img src="erstelltesBild.gif">

</body>
</html>
