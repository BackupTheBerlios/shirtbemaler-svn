<?php
/*>====O-------------------------------------------------O====>\
|             ##### s h i r t b e m a l e r #####              |
|      Copyright (c) by progtw (Thomas Weise), 2005-2007       |
|                     http://www.progtw.de                     |
|         Diese Datei ist ein Teil von 'shirtbemaler'.         |
| Dieses Programm ist freie Software. Sie k�nnen es unter den  |
| Bedingungen der GNU General Public License 3 (wie von der    |
| Free Software Foundation herausgegeben) weitergeben und/oder |
| modifizieren.                                                |
| Eine Kopie der Lizenzbedingungen finden Sie in lizenz.txt.   |                                                 |
\<====O-------------------------------------------------O====<*/
?>

<?
/*
 * Bindet hier alle Include-Dateien ein, da es sonst Pfad-Probleme geben k�nnte.
 * Diese Datei hier wird in die index.php (im gleichen Verz.) eingebunden.
 * Bei der Benutzung von Variablen (z.B: $_SESSION['blabla']) in den 
 * Include-Dateien kann es Probleme geben, wenn zur Includierung absolute Pfade 
 * (z.B: include("http://www.server.de/includedatei.inc.php")) verwendet werden.
 * Weil dann n�mlich nicht die Datei selbst includiert wird, sondern das was der 
 * Server ausliefert (der f�hrt ja php aus... und liefert html). Siehe dazu: 
 * http://forum.de.selfhtml.org/archiv/2007/4/t151475/
 * Also: besser mit relativen Pfaden includen (z.B: include("./bla/bla.inc.php")
 */
?>


<?
// z.B: include_once("./_system/_inc/_fkt/fkt_shirtbemaler.inc.php");
// hier mal ohne Session-Variablen, weil diese beim ersten Aufruf der index.php
// noch nicht initialisiert sind
include_once("./admin/log/twLogfile.inc.php");
include_once("./_system/_inc/_fkt/fkt_shirtbemaler.inc.php");
include_once("./_system/_inc/_fkt/fkt_upload.inc.php");
include_once("./_system/_inc/_fkt/fkt_image.inc.php");
include_once("./_system/_inc/_fkt/fkt_anbindungZencart.inc.php");
///include_once("./_system/_inc/_ttt/ttt.inc.php");
//include_once("./_system/_inc/_fkt/fkt_nocache.inc.php");
?>


<?
// Array aller (in htmlStart.inc.php) einzubindenden Javascript-Dateien
$twArrFilesJs = array();
$twArrFilesJs[] = "_system/_js/twInitWindowOnload.js";
$twArrFilesJs[] = "_system/_js/js01.js";
$twArrFilesJs[] = "_system/_js/twGd.js";
$twArrFilesJs[] = "_system/_js/twManagerFarbe.js";
$twArrFilesJs[] = "_system/_js/twManagerAblauf.js";
$twArrFilesJs[] = "_system/_js/_zusatz/twText01.js";
$twArrFilesJs[] = "_system/_js/_zusatz/twSlider01.js";
$twArrFilesJs[] = "_system/_zusatz/twSchatten01/twSchatten01.js";


// Array aller (in htmlStart.inc.php) einzubindenden Stylesheet-Dateien
$twArrFilesCss = array();
$twArrFilesCss[] = "_system/_css/style.css"; 
$twArrFilesCss[] = "_system/_css/_zusatz/twText01.css"; 
$twArrFilesCss[] = "_system/_css/_zusatz/twSlider01.css"; 
$twArrFilesCss[] = "_system/_css/_zusatz/twButton01.css"; 


// Array aller (in htmlStart.inc.php) einzubindenden Stylesheet-HACKS-Dateien
$twArrFilesCssIeHacks = array();
$twArrFilesCssIeHacks[] = "_system/_css/_zusatz/twButton01-IE.css";
