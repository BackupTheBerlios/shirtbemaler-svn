<?php
/* !!! Is gar ni eingebaut !!! */


// Die 'Laufzeit' der Datei wird auf den 10.1.1970 gesetzt, also schon lange abgelaufen ;)
header("Expires: Mon, 10 Jan 1970 01:01:01 GMT");
// Der 'Last-Modified' Parameter wird auf das aktuelle Datum gesetzt.
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
// Die für die Proxys interessante Cache-Control wird eingestellt.
header("Cache-Control: no-store, no-cache, must-revalidate");
// Siehe einen Kommentar weiter oben ...
header("Pragma: no-cache");
// jetzt folgt der Inhalt der Seite ...
?>

