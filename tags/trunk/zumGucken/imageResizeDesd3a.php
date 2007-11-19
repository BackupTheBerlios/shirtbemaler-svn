<?
// Werte, die von der aufrufenden Seite übermittelt wurden.
// Aufruf in der aufrufenden Seite mit <img src="imageResizeDesd3a.php$pfad=..."
$pfad = $_GET['pfad'];
$datei = $_GET['datei'];
$maxBreiteThumb = $_GET['breite'];
$maxHoeheThumb = $_GET['hoehe'];

twImageResize($pfad, $datei, $maxBreiteThumb, $maxHoeheThumb);



/* Funktionen --------------------------------------------------------------- */

	/*
	 * Gibt ein mit PHP neu gezeichnetes Bild aus.
	 * z.B: für dynamische Erzeugung von Thumbnails, ohne diese abzuspeichern
	 * guck: http://www.selfphp.info/kochbuch/kochbuch.php?code=62
	 * 
	 * @param	string	$pfad		Pfad zum Verzeichnis des zu verändernden Bildes
	 * @param	string	$datei	Dateiname des Bildes, welches verändert werden soll
	 * @param	int			$maxBreiteThumb		Breite des zu erstellenden neuen Bildes
	 * @param	int			$maxHoeheThumb		Höhe des zu erstellenden neuen Bildes
	 * @return	false bei Fehler, sonst nix (das neue Bild wird halt generiert)
	 */
	function twImageResize($pfad, $datei, $maxBreiteThumb, $maxHoeheThumb) {
		$dateiMitPfad = $pfad. $datei;
		
		// wenn Bild nich gefunden wurde: Abbruch
		if (!file_exists($dateiMitPfad)) {
			return false;
		}
		
		// Datei-Informationen zu dieser Datei holen
		$dateiinfos = getimagesize($dateiMitPfad);
		$imgOrigBreite = $dateiinfos[0];
		$imgOrigHoehe = $dateiinfos[1];
		$imgOrigTyp = $dateiinfos[2];   // (1=GIF, 2=JPG, 3=PNG, 4=SWF)
		//$imgOrigString = $dateiinfos[3] // z.B: "width=xx height=xx"
		
		// header senden
		header('Content-type: image/png');
		
		// (das zu "resizende") Original-Bild holen, wenn nich klappt: return false
		if ($imgOrigTyp == 1) {
			$imgOrig = imagecreatefromgif($dateiMitPfad);
		} elseif ($imgOrigTyp == 2) {
			$imgOrig = imagecreatefromjpeg($dateiMitPfad);
		} elseif ($imgOrigTyp == 3) {
			$imgOrig = imagecreatefrompng($dateiMitPfad);
		} else {
			return false;
		}
		
		// wenn es ein Hochformat-Bild ist
		if ($maxBreiteThumb && ($imgOrigBreite < $imgOrigHoehe)) {
			$maxBreiteThumb = ($maxHoeheThumb / $imgOrigHoehe) * $imgOrigBreite;
		}
		// wenn es ein Breitformat-Bild ist
		else {
			$maxHoeheThumb = ($maxBreiteThumb / $imgOrigBreite) * $imgOrigHoehe;
		}
		
		// neues ("resizedes") Bild erzeugen
		$imgNeu = imagecreatetruecolor($maxBreiteThumb, $maxHoeheThumb);
		
		// und das Orig auf das Neue "resizen" (bzw. eben hier "resamplen")
		imagecopyresampled($imgNeu, $imgOrig, 0, 0, 0, 0, $maxBreiteThumb, $maxHoeheThumb, $imgOrigBreite, $imgOrigHoehe);
		
		// das Neue Bild ausgeben (wenn speichern, dann bei null den Dateiname rein)
		imagepng($imgNeu, null, 100);
		
		// Speicher leeren
		imagedestroy($imgOrig);
		imagedestroy($imgNeu);
	}
?>