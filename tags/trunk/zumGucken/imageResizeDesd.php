<?
twMachThumbnail("", "grins.jpg", 100);
echo "<img src=\"thumb_grins.jpg\" />";


	
	/*
	 * Erstellt ein Thumbnail eines Bildes im selben Verzeichnis mit dem Prefix
	 * "thumb_"
	 */
	function twMachThumbnail($pfad, $bild, $thumbBreite) {
		$bildMitPfad = $pfad. $bild;
		
		// wenn Bild nich gefunden wurde: Abbruch
		if (!file_exists($bildMitPfad)) {
			return false;
		}
		
		$bilddaten = getimagesize($bildMitPfad);
		
		$origBreite = $bilddaten[0];
		$origHoehe = $bilddaten[1];
		
		if ($origBreite < $thumbBreite) {
		  $thumbBreite=$origBreite;
		}
		
		$Skalierungsfaktor = $origBreite/$thumbBreite;
		$thumbHoehe = intval($origHoehe/$Skalierungsfaktor);
		
		// wenn es ein gif-Bild ist
		if ($bilddaten[2] == 1) {
		  $Originalgrafik = ImageCreateFromGIF($bildMitPfad);
		  $Thumbnailgrafik = ImageCreateTrueColor($thumbBreite, $thumbHoehe);
		  ImageCopyResized($Thumbnailgrafik, $Originalgrafik, 0, 0, 0, 0, $thumbBreite, $thumbHoehe, $origBreite, $origHoehe);
		  ImageGIF($Thumbnailgrafik, $pfad."thumb_".$bild);
		}
		// wenn es ein jpg-Bild ist
		elseif ($bilddaten[2] == 2) {
		  $Originalgrafik = ImageCreateFromJPEG($bildMitPfad);
		  $Thumbnailgrafik = ImageCreateTrueColor($thumbBreite, $thumbHoehe);
		  ImageCopyResized($Thumbnailgrafik, $Originalgrafik, 0, 0, 0, 0, $thumbBreite, $thumbHoehe, $origBreite, $origHoehe);
		  ///ImageJPEG($Thumbnailgrafik, $pfad."thumb_".$bild);
		  ImageJPEG($Thumbnailgrafik, $pfad."thumb_".$bild);
		}
		// wenn es ein png-Bild ist
		elseif ($bilddaten[2] == 3) {
		  $Originalgrafik = ImageCreateFromPNG($bildMitPfad);
		  $Thumbnailgrafik = ImageCreateTrueColor($thumbBreite, $thumbHoehe);
		  ImageCopyResized($Thumbnailgrafik, $Originalgrafik, 0, 0, 0, 0, $thumbBreite, $thumbHoehe, $origBreite, $origHoehe);
		  ImagePNG($Thumbnailgrafik, $pfad."thumb_".$bild);
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
?>