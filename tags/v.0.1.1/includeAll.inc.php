<?
/*
 * Bindet hier alle Include-Dateien ein, da es sonst Pfad-Probleme geben könnte.
 * Diese Datei hier wird in die index.php (im gleichen Verz.) eingebunden.
 * Bei der Benutzung von Variablen (z.B: $_SESSION['blabla']) in den 
 * Include-Dateien kann es Probleme geben, wenn zur Includierung absolute Pfade 
 * (z.B: include("http://www.server.de/includedatei.inc.php")) verwendet werden.
 * Weil dann nämlich nicht die Datei selbst includiert wird, sondern das was der 
 * Server ausliefert (der führt ja php aus... und liefert html). Siehe dazu: 
 * http://forum.de.selfhtml.org/archiv/2007/4/t151475/
 * Also: besser mit relativen Pfaden includen (z.B: include("./bla/bla.inc.php")
 */
?>
<?
// z.B: include_once("./_system/_inc/_fkt/fkt_shirtbemaler.inc.php");
// hier mal ohne Session-Variablen, weil diese beim ersten Aufruf der index.php
// noch nicht initialisiert sind
include_once("./_system/_inc/_fkt/fkt_shirtbemaler.inc.php");
include_once("./_system/_inc/_fkt/fkt_upload.inc.php");
include_once("./_system/_inc/_fkt/fkt_image.inc.php");
include_once("./_system/_inc/_fkt/fkt_anbindungZencart.inc.php");
include_once("./_system/_inc/_ttt/ttt.inc.php");
//include_once("./_system/_inc/_fkt/fkt_nocache.inc.php");
?>
