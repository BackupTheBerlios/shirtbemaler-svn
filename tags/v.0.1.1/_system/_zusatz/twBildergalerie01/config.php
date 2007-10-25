<?php
#######################################################################
#  um-Galerie Skript V1.00                                            #
#  zur freien Verwendung, d. h. keinerlei Lizenzen oder Copyright     #
#  ein backlink w�re aber nett!                                       #
#  Auf jeden Fall aber bitte diesen Tag im XHTML Template einbinden:  #
#  <meta name="Generator" content="script by http://um-fritz.de" />   #
#  Danke und viel Spa�!                                               #
#  http://um-fritz.de                                                 #
#######################################################################
/*
Dieses Skript dient nur der Konfiguration
Weitere Anpassungen k�nnten noch im CSS Code der Dateien index.php oder frame.php erfolgen
*/

#Verzeichisse, Pfade, Links, sollte sich auf Grund der Konstantennamen erkl�ren, ansonsten anderen Wert ausprobieren
define("GALERIEVERZEICHNIS", "twBildergalerie01");
define("GALERIEPFAD" , $_SERVER['DOCUMENT_ROOT']."/".GALERIEVERZEICHNIS);
define("BACKLINK", "<a href=\"index.php\" title=\"zur�ck\">Galerie Start</a>");
define("VER_ALBEN", "bilder");
#Bildgr��e beachten, abh�ngig von den Ausma�en des Iframes
define("STANDARDBILD", "<img src=\"default.jpg\" height=\"510\" width=\"660\" alt=\"Bildergalerie\" />\n");
define("UEBERSCHRIFT", "� tw-Bildergalerie �");
#Wird nur bei mehr als einem Album ben�tigt
define("AKTIVES_ALBUM", "Aktives Album: ");
#Wird nur bei mehr als einem Album ben�tigt
define("LLEISTE_KAT", "Ordner: ");
#Wird nur bei mehr als einem Album ben�tigt
#hier kann eine Art "breadcrumb"-Anzeige eingeschaltet werden. false=nicht anzeigen, true=anzeigen. Ausprobieren
define("AKTIVES_ALBUM_ANZEIGEN", false);

#Ma�e und CSS Anweisungen
#Breite der Thumbnailsgrafiken- Nach �nderung ggf. Thumbnails l�schen und neu erstellen (lassen)
define("NEUE_BREITE", "50"); 
#Hintergrund der Galerie: CSS -> background:CSS Angaben;
$background_gal_body       = "rgb(255,255,255)";
#Schriftfarbe Galerie: CSS -> color:CSS Angaben;
$color_gal_body            = "rgb(150,150,150)";
#Schrifttype Galerie: CSS -> font_family:CSS Angaben;
$font_family_gal_body      = "Tahoma, sans-serife";
#Hintergrund der �berschriften
$background_gal_h          = "transparent";
#Farbe der �berschriften
$color_gal_h               = "#D67220";
#Hintergrund der Men�leiste
$background_gal_leiste     = "#FFF";
#Hintergrund Men�leisten link
$background_gal_link       = "transparent";
#Farbe Men�leisten Link
$color_gal_link            = "#D67220";
#Hintergrund Men�leistenlink gehovert
$background_gal_link_hover = "#D67220";
#Farbe Men�leistenlink gehovert
$color_gal_link_hover      = "rgb(230,230,230)";
#Hintergrund des Bereichs in dem die Thumbnails angezeigt werden
$background_gal_thumbnailleiste = "#FFF";
#Breite der Rahmen der Galerie, bei 0 rahmenlos
$rahmen_breite_galerie         = "1";
#Weitere CSS Angaben zur border Eigenschaft, art und Farbe.
$border_galerie                = $rahmen_breite_galerie."px solid #D67220";
#Hintergund der Seite, die in den Iframe geladen wird
$background_gal_iframedoc  = "#FFF";
#Schriftfarbe der Seite, die in den Iframe geladen wird
$color_gal_iframedoc       = "rgb(150,150,150)";
#Bordereigenschaften zu den Bildern, die in den Iframe geladen werden, das muss bei den Bildergr��en mit
#bedacht werden, sonst erscheinen m�glicherweise Bildlaufleisten.
$boder_iframedoc_bild      = "none";
#Background der unteren Leiste
$background_gal_umf        = "#FFF";
###########################################
#         DIMENSIONS�NDERUNGEN            #
###########################################
#Breite des IFrames
$gal_iframe_breite         = "660px";
#H�he der Galerie
$gal_hoehe                 = "510px";
#H�he der Menuleiste
$linkleiste_gal_hoehe      = "1.8em";
#Hier nichts ver�ndern, diese Breitenangaben sind abh�ngig von den vorherigen Angaben und ber�cksichtigen die
#verschiedenen Boxmodel von IE und anderen Browsern!
$gal_thumbnailleiste_breite = NEUE_BREITE + 22 ."px";
$totale_gal_breite = $gal_thumbnailleiste_breite + $gal_iframe_breite + $rahmen_breite_galerie."px";
$header_gal_breite = $totale_gal_breite + (2 * $rahmen_breite_galerie)."px";
$header_gal_breite_IElt6 = $totale_gal_breite + $rahmen_breite_galerie."px";
$totale_gal_breite_IElt6 = $gal_thumbnailleiste_breite + $gal_iframe_breite + (2 * $rahmen_breite_galerie)."px";
?>