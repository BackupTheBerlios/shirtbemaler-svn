<?

	/*
	 * allg Info:
	 * 
	 */
	
	
	/*
	 * Erstellt Thumbnail eines Bildes im selben Verzeichnis mit Prefix "thumb_".
	 * Es kann nur die Thumbnail-Breite angegeben werden.
	 * Arbeitet noch mit ImageCopyResized(), besser wäre ImageCopyResampled(),naja
	 * Das Bild wird auch ausgegeben.
	 * !!! es darf vorher keine Ausgabe sein, sonst headerAlreadySend-Sache...
	 * 
	 * @param	string	$pfad		Pfad zum Verzeichnis des zu verändernden Bildes
	 *                        ACHTUNG: mit documentRoot (z.B: /var/www/blabla/...)
	 * @param	string	$datei	Dateiname des Bildes, welches verändert werden soll
	 * @param	int			$breiteThumb		Breite des zu erstellenden neuen Bildes
	 * @param string	$prefix					Prefix vor den neuen Dateiname
	 * @return	false bei Fehler, sonst nix (das neue Bild wird halt generiert)
	 */
	function twMachThumbnail($serverPfad, $datei, $breiteThumb, $prefix) {
		// Bild-Datei (mit Pfad)
		$bildDatei = $serverPfad. $datei;
		
		// wenn dieses Bild nich gefunden wurde: Abbruch
		if (!file_exists($bildDatei)) {
			return false;
		}
		
		// wenn dieses Bild schon ein Thumbnail ist: Abbruch
		if (substr($datei, 0, strlen($prefix)) == $prefix) {
			//echo $datei. "<br />";
			//echo strlen($prefix). "<br />";
			//echo $prefix. "<br />";
			//echo substr($datei, strlen($prefix)). "<br />";
			//echo "-----<br />";
			
			return false;
		}
		
		
		
		// Bilddaten zu dieser Bild-Datei
		$bilddaten = getimagesize($bildDatei);		
		$imgOrigBreite = $bilddaten[0];
		$imgOrigHoehe = $bilddaten[1];
		$imgOrigTyp = $bilddaten[2];   // (1=GIF, 2=JPG, 3=PNG, 4=SWF)
		
		if ($imgOrigBreite < $breiteThumb) {
		  $breiteThumb=$imgOrigBreite;
		}
		
		$Skalierungsfaktor = $imgOrigBreite/$breiteThumb;
		$thumbHoehe = intval($imgOrigHoehe/$Skalierungsfaktor);
		
		// wenn es ein gif-Bild ist
		if ($imgOrigTyp == 1) {
		  $Originalgrafik = ImageCreateFromGIF($bildDatei);
		  $Thumbnailgrafik = ImageCreateTrueColor($breiteThumb, $thumbHoehe);
		  ImageCopyResized($Thumbnailgrafik, $Originalgrafik, 0, 0, 0, 0, $breiteThumb, $thumbHoehe, $imgOrigBreite, $imgOrigHoehe);
		  ImageGIF($Thumbnailgrafik, $serverPfad.$prefix.$datei, 100);
		}
		// wenn es ein jpg-Bild ist
		elseif ($imgOrigTyp == 2) {
		  $Originalgrafik = ImageCreateFromJPEG($bildDatei);
		  $Thumbnailgrafik = ImageCreateTrueColor($breiteThumb, $thumbHoehe);
		  ImageCopyResized($Thumbnailgrafik, $Originalgrafik, 0, 0, 0, 0, $breiteThumb, $thumbHoehe, $imgOrigBreite, $imgOrigHoehe);
		  ///ImageJPEG($Thumbnailgrafik, $pfad."thumb_".$bild);
		  ImageJPEG($Thumbnailgrafik, $serverPfad.$prefix.$datei, 100);
		}
		// wenn es ein png-Bild ist
		elseif ($imgOrigTyp == 3) {
		  $Originalgrafik = ImageCreateFromPNG($bildDatei);
		  $Thumbnailgrafik = ImageCreateTrueColor($breiteThumb, $thumbHoehe);
		  ImageCopyResized($Thumbnailgrafik, $Originalgrafik, 0, 0, 0, 0, $breiteThumb, $thumbHoehe, $imgOrigBreite, $imgOrigHoehe);
		  ImagePNG($Thumbnailgrafik, $serverPfad.$prefix.$datei, 100);
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
	
	
	
	/*
	 * Gibt ein mit PHP neu gezeichnetes Bild aus.
	 * z.B: für dynamische Erzeugung von Thumbnails, ohne diese abzuspeichern.
	 * wenn speichern, dann unten bei imagepng() bei null einen Dateiname rein.
	 * !!! es darf vorher keine Ausgabe sein, sonst headerAlreadySend-Sache...
	 * Zu überlegen wäre noch die Thumbs zu speichern und mit readfile() zu prüfen
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
		
		// Bild-Daten zu dieser Datei holen
		$bilddaten = getimagesize($dateiMitPfad);
		$imgOrigBreite = $bilddaten[0];
		$imgOrigHoehe = $bilddaten[1];
		$imgOrigTyp = $bilddaten[2];   // (1=GIF, 2=JPG, 3=PNG, 4=SWF)
		//$imgOrigString = $bilddaten[3] // z.B: "width=xx height=xx"
		
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
		
		// header senden
		header('Content-type: image/png');
		
		// das Neue Bild ausgeben
		imagepng($imgNeu, null, 100);
		
		// Speicher leeren
		imagedestroy($imgOrig);
		imagedestroy($imgNeu);
	}
	
	
	
	
?>
