<?

	/*
	 * Allgemeines zu den Funktionen speziell für den Shirtbemaler
	 * 
	 * 
	 */
	
	
	/**
	 * Initialisiert die Session-Variablen (nur beim allerersten Seitenaufruf)
	 */
	function twInitSessionVariablen()	{
		$dirDocumentRoot = $_SERVER['DOCUMENT_ROOT']; // /var/www/
		$dirApplication  = "shirtbemaler/";     
		$urlServer       = "http://progtw.myftp.org/"; 
		$urlZencart      = "http://progtw.myftp.org/shop/";    
		
		// die Artikelnummer, auch Erkennungszeichen für "ersten Seitenaufruf"
		$_SESSION['artikel'] = ""; 
		$_SESSION['zencart_products_id'] = "";
		
		// Verzeichnisse (oder eben Ordner, Directories)
		$_SESSION['dirDocumentRoot']       = $dirDocumentRoot;  // /var/www/
		$_SESSION['dirApplication']        = $dirApplication;   // shirtbemaler/	
		$_SESSION['dirImg']                = "img/";            
		$_SESSION['dirImgMotive']          = "img/motive/";            
		$_SESSION['dirImgMotiveHoch40']    = "img/motive/hoch40/";             
		$_SESSION['dirImgArtikel']         = "img/artikel/";                    
		$_SESSION['dirImgArtikelBreit270'] = "img/artikel/breit270/";                 
		$_SESSION['dirImgArtikelHoch100']  = "img/artikel/hoch100/";                
		$_SESSION['dirImgArtikelHoch32']   = "img/artikel/hoch32/";  
		$_SESSION['dirFonts']              = "fonts/";    
		$_SESSION['dirDe']                 = "de/";
		$_SESSION['dir_fkt']               = "_system/_inc/_fkt/";         
		$_SESSION['dir_layout']            = "_system/_inc/_layout/";         
		$_SESSION['dir_css']               = "_system/_css/";        
		$_SESSION['dir_js']                = "_system/_js/";        
		$_SESSION['dir_frames']            = "_system/_frames/"; 
		///// besser dirZencartImgArtikel nennen... (oder weiter oben auch shop nennen):
		$_SESSION['dirShopImgArtikel']       = "../shop/images/artikel/";
		 
		$_SESSION['dirSess']               = "sess/";                                    // sess/
		$_SESSION['dirSessId']              = $_SESSION['dirSess']. session_id(). "/";    // sess/c9e8983f1fbe3ec00be80fd4e4dfe067/ 
		$_SESSION['dirText']                 = $_SESSION['dirSessId']. "text/";            // sess/c9e8983f1fbe3ec00be80fd4e4dfe067/text/
		$_SESSION['dirUpload']               = $_SESSION['dirSessId']. "upload/";          // sess/c9e8983f1fbe3ec00be80fd4e4dfe067/upload/
		$_SESSION['dirVorschau']             = $_SESSION['dirSessId']. "vorschau/";        // sess/c9e8983f1fbe3ec00be80fd4e4dfe067/vorschau/
		$_SESSION['dirVorschauVorne']         = $_SESSION['dirSessId']. "vorschau/vorne/";  // sess/c9e8983f1fbe3ec00be80fd4e4dfe067/vorschau/vorne/
		$_SESSION['dirVorschauVorneText']      = $_SESSION['dirSessId']. "vorschau/vorne/text/";   // sess/c9e8983f1fbe3ec00be80fd4e4dfe067/vorschau/vorne/text/
		$_SESSION['dirVorschauVorneMotiv']     = $_SESSION['dirSessId']. "vorschau/vorne/motiv/";  // sess/c9e8983f1fbe3ec00be80fd4e4dfe067/vorschau/vorne/motiv/
		$_SESSION['dirVorschauVorneUpload']    = $_SESSION['dirSessId']. "vorschau/vorne/upload/"; // sess/c9e8983f1fbe3ec00be80fd4e4dfe067/vorschau/vorne/upload/
		$_SESSION['dirVorschauHinten']        = $_SESSION['dirSessId']. "vorschau/hinten/"; // sess/c9e8983f1fbe3ec00be80fd4e4dfe067/vorschau/hinten/
		$_SESSION['dirVorschauFuerWarenkorb'] = $_SESSION['dirSessId']. "vorschau/fuerWarenkorb/"; // sess/c9e8983f1fbe3ec00be80fd4e4dfe067/vorschau/fuerWarenkorb/
		$_SESSION['dirDruck']                = $_SESSION['dirSessId']. "druck/";           // sess/c9e8983f1fbe3ec00be80fd4e4dfe067/druck/
		$_SESSION['dirDruckVorne']            = $_SESSION['dirSessId']. "druck/vorne/";     // sess/c9e8983f1fbe3ec00be80fd4e4dfe067/druck/vorne/
		$_SESSION['dirDruckHinten']           = $_SESSION['dirSessId']. "druck/hinten/";    // sess/c9e8983f1fbe3ec00be80fd4e4dfe067/druck/hinten/
		
		
		// folgende wurden meist mit ? als get an die Aufruf-URL gehängt (... oder auch nich mehr ...)
		$_SESSION['klamotteDruckmass']           = ""; 
		$_SESSION['filenameArtikelbildHoch32']   = ""; //die Mini-Vorschaubilder
		$_SESSION['filenameArtikelbildHoch100']  = "";
		$_SESSION['filenameArtikelbildBreit270'] = ""; 
		
		$_SESSION['filenameVorschaubildText']    = ""; 
		$_SESSION['filenameDruckbildText']       = ""; 		
		$_SESSION['filenameVorschaubildMotiv']   = ""; 
		$_SESSION['filenameDruckbildMotiv']      = ""; 
		$_SESSION['filenameMotivbildHoch40']     = ""; // evtl noch wegmachen/umbenennen???		
		$_SESSION['filenameVorschaubildUpload']  = ""; 
		$_SESSION['filenameDruckbildUpload']     = ""; 
		$_SESSION['filenameVorschaubildFuerWarenkorb'] = ""; 
		
		$_SESSION['filenameDruckbildVorne']      = ""; // zur Zeit nicht genutzt, sondern Textbild, Motivbild und Uploadbild
		
		$_SESSION['dataText'] = array();	
			
		// folgende werden noch gar nicht verwendet (dumm he?)
		$_SESSION['imgKlamotteHinten'] = ""; 
		$_SESSION['imgAufdruckVorn'] = ""; 
		$_SESSION['imgAufdruckHinten'] = ""; 
		$_SESSION['imgAufdruckText'] = ""; 
		$_SESSION['imgAufdruckMotiv'] = ""; 
		$_SESSION['imgAufdruckUpload'] = ""; 
		
		// Kennzeichen:
		// ob Text, Motiv oder Upload angezeigt werden soll
		$_SESSION['knzShowTextMotivUpload'] = ""; // Werte: text, motiv oder upload
		// von wo aus die index.php aufgerufen wurde
		// (Werte: neueSession, zencartBoxInfopages, zencartBtnOpenWithShirtbemaler, a1, a3Tab, a3Hochladen, a4Submit, a5Nein)
		$_SESSION['knzKommtVon'] = "neueSession";
		// ob die vom User eingebebenen Werte okay und vollständig sind (bei a4 okay)
		$_SESSION['knzValidEingaben'] = "";
		
		// URL's
		$_SESSION['urlServer']       = $urlServer;                                  // http://progtw.myftp.org/
		$_SESSION['urlApplication']	 = $urlServer. $dirApplication;                 // http://progtw.myftp.org/shirtbemaler/
		$_SESSION['urlImgMotive']    = $urlServer. $dirApplication. "img/motive/";  // http://progtw.myftp.org/shirtbemaler/img/motive/
		$_SESSION['urlUploads']      = $_SESSION['urlApplication']. $_SESSION['dirSessId']. "uploads/"; // http://progtw.myftp.org/shirtbemaler/sess/c9e8983f1fbe3ec00be80fd4e4dfe067/uploads/
		$_SESSION['urlFonts']        = $urlServer. $dirApplication. "fonts/";       // http://progtw.myftp.org/shirtbemaler/fonts/
		$_SESSION['url_css']         = $urlServer. $dirApplication. "_system/_css/";         // http://progtw.myftp.org/shirtbemaler/_system/_css/
		$_SESSION['url_js']          = $urlServer. $dirApplication. "_system/_js/";          // http://progtw.myftp.org/shirtbemaler/_system/_js/
		$_SESSION['url_fkt']         = $urlServer. $dirApplication. "_system/_inc/_fkt/";    // http://progtw.myftp.org/shirtbemaler/_system/_inc/_fkt/
		$_SESSION['url_layout']      = $urlServer. $dirApplication. "_system/_inc/_layout/"; // http://progtw.myftp.org/shirtbemaler/_system/_inc/_layout/
		
		$_SESSION['urlZencart']      = $urlZencart;                           // http://progtw.myftp.org/shop/
		
		
		// zum Managen der Class'es (meist die Hintergrundfarben)	  
		$_SESSION['classA1'] = "";    
		$_SESSION['classA2'] = "";      
		$_SESSION['classA3'] = "";      
		$_SESSION['classA3TabbedAll']    = "";     
		$_SESSION['classA3TabbedTabs']   = "";        
		$_SESSION['classA3TabbedInhalt'] = "";     
		$_SESSION['classA4'] = "";      
		$_SESSION['classA5'] = "";    
	}
	 
	/**
	 * Legt in sess/ ein Verzeichnis (mit Unterverz.) für eine Session an.
	 * z.B:
	 * --0da5b017b9d03d489b28cb53691e71f1
	 *   --text
	 *   --upload
	 *   --druck
	 *     --vorne
	 *     --hinten
	 *   --vorschau
	 *     --fuerWarenkorb
	 *     --hinten
	 *     --vorne
	 *       --text
	 *       --motiv
	 *       --upload
	 * @return	false bei fehler, sonst true
	 */
	function twInitSessionVerzeichnisse()	{
		///echo "in twInitSessionVerzeichnisse():". session_id(). "<br />";
		
		/*$verz = $_SESSION['dirSess']. session_id(). "/"; 
		$verzUpload       = $verz. "upload/";
		$verzDruck        = $verz. "druck/";
		$verzDruckVorne   = $verz. "druck/vorne/";
		$verzDruckHinten  = $verz. "druck/hinten/"; */
		if (mkdir($_SESSION['dirSessId'], 0777) == false ) {
			echo"Fehler beim Anlegen des Session-Verzeichnisses!<br />";
			return false;
		}
		// Text
		if (mkdir($_SESSION['dirText'], 0777) == false ) {
			echo"Fehler beim Anlegen des Session-Text-Verzeichnisses!<br />";
			return false;
		} 
		// Upload
		if (mkdir($_SESSION['dirUpload'], 0777) == false ) {
			echo"Fehler beim Anlegen des Session-Upload-Verzeichnisses!<br />";
			return false;
		} 
		// Vorschau
		if (mkdir($_SESSION['dirVorschau'], 0777) == false ) {
			echo"Fehler beim Anlegen des Session-Vorschau-Verzeichnisses!<br />";
			return false;
		}
		if (mkdir($_SESSION['dirVorschauFuerWarenkorb'], 0777) == false ) {
			echo"Fehler beim Anlegen des Session-Vorschau-FuerWarenkorb-Verzeichnisses!<br />";
			return false;
		} 
		if (mkdir($_SESSION['dirVorschauHinten'], 0777) == false ) {
			echo"Fehler beim Anlegen des Session-Vorschau-Hinten-Verzeichnisses!<br />";
			return false;
		}  
		if (mkdir($_SESSION['dirVorschauVorne'], 0777) == false ) {
			echo"Fehler beim Anlegen des Session-Vorschau-Vorne-Verzeichnisses!<br />";
			return false;
		} 
		if (mkdir($_SESSION['dirVorschauVorneText'], 0777) == false ) {
			echo"Fehler beim Anlegen des Session-Vorschau-Vorne-Text-Verzeichnisses!<br />";
			return false;
		} 
		if (mkdir($_SESSION['dirVorschauVorneMotiv'], 0777) == false ) {
			echo"Fehler beim Anlegen des Session-Vorschau-Vorne-Motiv-Verzeichnisses!<br />";
			return false;
		} 
		if (mkdir($_SESSION['dirVorschauVorneUpload'], 0777) == false ) {
			echo"Fehler beim Anlegen des Session-Vorschau-Vorne-Upload-Verzeichnisses!<br />";
			return false;
		} 
		// Druck
		if (mkdir($_SESSION['dirDruck'], 0777) == false ) {
			echo"Fehler beim Anlegen des Session-Druck-Verzeichnisses!<br />";
			return false;
		} 
		if (mkdir($_SESSION['dirDruckVorne'], 0777) == false ) {
			echo"Fehler beim Anlegen des Session-Druck-Vorne-Verzeichnisses!<br />";
			return false;
		} 
		if (mkdir($_SESSION['dirDruckHinten'], 0777) == false ) {
			echo"Fehler beim Anlegen des Session-Druck-Hinten-Verzeichnisses!<br />";
			return false;
		} 
		//echo"hat geklappt (Sessionverz.):". $_SESSION['urlApplication']. $_SESSION['dirSessId']. "<br />";
		return true;
	} 
	
	
	/**
	 * Setzt einige Session-Variablen, welche den Artikel betreffen.
	 */
	function twSetSessionvarArtikelzeug() {
		$filenameGross  = twHoleFilenameArtikelbildBreit270VonArtikel($_GET['artikel']);
		$filenameMittel = twHoleFilenameArtikelbildHoch100VonArtikel($_GET['artikel']);
		$filenameMini   = twHoleFilenameArtikelbildHoch32VonArtikel($_GET['artikel']);
		
		if ($filenameGross) {
			$_SESSION['filenameArtikelbildBreit270'] = $filenameGross;
			$_SESSION['artikel'] = twHoleArtikelVonFilename($filenameGross);
			$_SESSION['klamotteDruckmass'] = twHoleDruckmass2($_SESSION['dirImgArtikelBreit270'], $_SESSION['artikel']);
		} else {
			echo "Fehler beim Ermitteln des Dateinamens vom 270-breiten Artikelbild!<br />";
		}
		if ($filenameMittel) {
			$_SESSION['filenameArtikelbildHoch100'] = $filenameMittel;
		} else {
			echo "Fehler beim Ermitteln des Dateinamens vom 100px-hohen Artikelbild!<br />";
		} 
		if ($filenameMini) {
			$_SESSION['filenameArtikelbildHoch32'] = $filenameMini;
		} else {
			echo "Fehler beim Ermitteln des Dateinamens vom 32px-hohen (Mini-)Artikelbild!<br />";
		}
	}
	
	

	/*
	 * Liefert Artikel(-name) als String auf Grundlage eines Bild-Dateinamens.
	 * 
	 * @param	string	$filename	der Dateiname aus dem der Artikel 
	 *                          "herausgeschnitten" werden soll
	 * @return	string	der Artikel (z.B: sweat_han_H6810) (ohne Dateiendg.)	
	 *          false		wenn $filename keine Bilddatei ist
	 */
	function twHoleArtikelVonFilename($filename) {
		// Dateiendung abschneiden
		if (substr($filename, -4, 4) == ".jpg" ||
		    substr($filename, -4, 4) == ".png" ||
		    substr($filename, -4, 4) == ".gif" ||
		    substr($filename, -4, 4) == ".JPG" ||
		    substr($filename, -4, 4) == ".PNG" ||
		    substr($filename, -4, 4) == ".GIF"   ) {
			return substr($filename, 0, strlen($filename)-4);
		} else if (substr($filename, -5, 5) == ".jpeg" ||
		    substr($filename, -4, 4) == ".JPEG"  ) {
			return substr($filename, 0, strlen($filename)-5); 
		    } else {
			return false;
		}
	}
	
	
	/*
	 * Liefert Motiv(-name) als String auf Grundlage eines Bild-Dateinamens.
	 * 
	 * @param	string	$filename	der Dateiname aus dem das Motiv(-name) 
	 *                          "herausgeschnitten" werden soll
	 * @return	string	das Motiv (z.B: ameise) (ohne Dateiendg.)	
	 *          false		wenn $filename keine Bilddatei ist
	 */
	function twHoleMotivVonFilename($filename) {
		// Dateiendung abschneiden
		if (substr($filename, -4, 4) == ".jpg" ||
		    substr($filename, -4, 4) == ".png" ||
		    substr($filename, -4, 4) == ".gif" ||
		    substr($filename, -4, 4) == ".JPG" ||
		    substr($filename, -4, 4) == ".PNG" ||
		    substr($filename, -4, 4) == ".GIF"   ) {
			return substr($filename, 0, strlen($filename)-4);
		} else if (substr($filename, -5, 5) == ".jpeg" ||
		    substr($filename, -4, 4) == ".JPEG"  ) {
			return substr($filename, 0, strlen($filename)-5); 
		    } else {
			return false;
		}
	}
	
	
	/*
	 * Liefert den Dateiname für das normale (also große) Motiv-bild.
	 * 
	 * @param		string	$motiv	das Motiv (als String)
	 * @return	string	der Dateiname
	 *          false		wenn keine Datei gefunden wurde
	 */
	function twHoleFilenameOrigVonMotiv($motiv) {
		$dir = $_SESSION['dirImgMotive'];
		
		$arrExt = array(".jpg", ".png", ".gif", ".JPG", ".PNG", ".GIF", ".jpeg", ".JPEG");
		foreach ($arrExt as $ext) {
			if (file_exists($dir. $motiv. $ext)) {
				return $motiv. $ext;
			}
		}
		return false;
	}
	
	
	/*
	 * Liefert den Dateiname für das 270-Pixel-breite Artikelbild.
	 * 
	 * @artikel	string	der Artikel (als String)
	 * @return	string	der Dateiname
	 *          false		wenn keine Datei gefunden wurde
	 */
	function twHoleFilenameArtikelbildBreit270VonArtikel($artikel) {
		$dir = $_SESSION['dirImgArtikelBreit270'];
		
		$arrExt = array(".jpg", ".png", ".gif", ".JPG", ".PNG", ".GIF", ".jpeg", ".JPEG");
		foreach ($arrExt as $ext) {
			if (file_exists($dir. $artikel. $ext)) {
				return $artikel. $ext;
			}
		}
		return false;
	}
	
	
	/*
	 * Liefert den Dateiname für das 32-Pixel-hohe Artikelbild.
	 * 
	 * @artikel	string	der Artikel (als String)
	 * @return	string	der Dateiname
	 *          false		wenn keine Datei gefunden wurde
	 */
	function twHoleFilenameArtikelbildHoch32VonArtikel($artikel) {
		$dir = $_SESSION['dirImgArtikelHoch32'];
		
		$arrExt = array(".jpg", ".png", ".gif", ".JPG", ".PNG", ".GIF", ".jpeg", ".JPEG");
		foreach ($arrExt as $ext) {
			if (file_exists($dir. $artikel. $ext)) {
				return $artikel. $ext;
			}
		}
		return false;
	}
	
	
	/*
	 * Liefert den Dateiname für das 100-Pixel-hohe Artikelbild.
	 * 
	 * @artikel	string	der Artikel (als String)
	 * @return	string	der Dateiname
	 *          false		wenn keine Datei gefunden wurde
	 */
	function twHoleFilenameArtikelbildHoch100VonArtikel($artikel) {
		$dir = $_SESSION['dirImgArtikelHoch100'];
		
		$arrExt = array(".jpg", ".png", ".gif", ".JPG", ".PNG", ".GIF", ".jpeg", ".JPEG");
		foreach ($arrExt as $ext) {
			if (file_exists($dir. $artikel. $ext)) {
				return $artikel. $ext;
			}
		}
		return false;
	}
	
	
//	/*
//	 * Liefert den Dateiname des 270-Pixel-breiten Artikelbildes.
//	 */
//	function twHoleFilenameArtikelbildBreit270($artikel) {
//		// Verzeichnis in dem die 270-Pixel-breiten Bilder liegen
//		$dir = $_SESSION['dirImgArtikelBreit270'];
//		
//		// gucken ob Dateiname (ohne Endung) in dem Verzeichnis existiert + return
//		if (file_exists($dir. $artikel. ".jpg")) {
//			return $artikel. ".jpg";
//		}
//		if (file_exists($dir. $artikel. ".png")) {
//			return $artikel. ".png";
//		}
//		if (file_exists($dir. $artikel. ".gif")) {
//			return $artikel. ".gif";
//		}
//		if (file_exists($dir. $artikel. ".JPG")) {
//			return $artikel. ".JPG";
//		}
//		if (file_exists($dir. $artikel. ".PNG")) {
//			return $artikel. ".PNG";
//		}
//		if (file_exists($dir. $artikel. ".GIF")) {
//			return $artikel. ".GIF";
//		}
//		
//		return false;
//	}
	
	
	
	


	/* 
	 * !!! veraltet, benutze: twHoleArtikelVonFilename() !!!
	 * 
	 * Liefert die Namen aller Bilder in einem Verzeichnis (ohne Dateiendung).
	 * Falls zu einem Bild mehrere Dateien existieren (z.B. _mini, _klein), wird
	 * auch nur ein Name davon geliefert.
	 * 
	 * !!! HARDCODED !!! (jpg gif png _mini)
	 */ 
	function twHoleKlamottenNamen($verz) {
		$verzeichnis = dir($verz);
		$arr = array();
		$i = 0;
		while ($datei = $verzeichnis->read()) {
			// weil . und .. sonst mit gelistet wird
			if ($datei != "." && $datei != "..") {
				// nur Bild-Dateien
				if (substr($datei, -4, 4) == ".jpg" ||
				    substr($datei, -4, 4) == ".gif" ||
				    substr($datei, -4, 4) == ".png") {
				  // falls _mini im Dateiname: nicht listen
				  if (substr($datei, -9, 5) != "_mini") {
						$arr[$i] = substr($datei, 0, strlen($datei)-4);
						$i++;
				  }
				}
			}
		}
		$verzeichnis->close();		
		return $arr;
	}
	
	
	/* 
	 * !!! veraltet, verwende: twHoleBilderVonDir() !!!
	 * 
	 * Liefert die Dateinamen aller _mini-Bilder in einem Verzeichnis.
	 * Müsste eigentlich auch noch geändert werden, wenn dann die -mini-Bilder 
	 * mit php erzeugt werden ...
	 * 
	 * !!! HARDCODED !!! (jpg gif png _mini)
	 */ 
	function twHoleMinibilder($verz) {
		$verzeichnis = dir($verz);
		$arr = array();
		$i = 0;
		while ($datei = $verzeichnis->read()) {
			// weil . und .. sonst mit gelistet wird
			if ($datei != "." && $datei != "..") {
				// nur Bild-Dateien
				if (substr($datei, -4, 4) == ".jpg" ||
				    substr($datei, -4, 4) == ".gif" ||
				    substr($datei, -4, 4) == ".png") {
				  // wenn _mini im Dateiname: in Array schreiben
				  if (substr($datei, -9, 5) == "_mini") {
						$arr[$i] = $datei;
						$i++;
				  }
				}
			}
		}
		$verzeichnis->close();		
		return $arr;
	}
	
	
	/* 
	 * Liefert Dateinamen aller Bild-Dateien (jpg, png, gif) in einem Verzeichnis.
	 * 
	 * @param	string	$dir  		Verzeichnis, das nach den Bildern durchsucht wird
	 * @return	string-Array	mit den Dateinamen der Bild-Dateien,
	 *                        wenn keine gefunden: ein leeres Array
	 */ 
	function twHoleBilderVonDir($dir) {
		$verzeichnis = dir($dir);
		$arrFilenames = array();
		$i = 0;
		while ($filename = $verzeichnis->read()) {
			// weil . und .. sonst mit gelistet wird
			if ($filename != "." && $filename != "..") {
				// nur Bild-Dateien in Array schreiben
				if (substr($filename, -4, 4) == ".jpg" ||
				    substr($filename, -4, 4) == ".gif" ||
				    substr($filename, -4, 4) == ".png" ||
				    substr($filename, -4, 4) == ".JPG" ||
				    substr($filename, -4, 4) == ".GIF" ||
				    substr($filename, -4, 4) == ".PNG") {
						$arrFilenames[$i] = $filename;
						$i++;
				}
				if (substr($filename, -5, 5) == ".jpeg" ||
				    substr($filename, -5, 5) == ".JPEG") {
						$arrFilenames[$i] = $filename;
						$i++;
				}
			}
		}
		$verzeichnis->close();		
		return $arrFilenames;
	}
	
	
	/*
	 * !!! veraltet, benutze: twHoleBilderVonDir() !!!
	 *  
	 * Liefert die Dateinamen aller Motive in einem Verzeichnis.
	 * 
	 * !!! HARDCODED !!! (jpg gif png thumb_ resized_)
	 */ 
	function twHoleMotive($verz) {
		$verzeichnis = dir($verz);
		$arr = array();
		$i = 0;
		while ($datei = $verzeichnis->read()) {
			// weil . und .. sonst mit gelistet wird
			if ($datei != "." && 
			    $datei != ".." && 
			    stristr($datei, "thumb_") == false && 
			    stristr($datei, "resized_") == false) {
				// nur Bild-Dateien
				if (stristr($datei, ".jpg") != false ||
				    stristr($datei, ".gif") != false ||
				    stristr($datei, ".png") != false) {
					$arr[$i] = $datei;
					$i++;
				}
			}
		}
		$verzeichnis->close();		
		return $arr;
	}
	
	
	/* 
	 * !!! veraltet, benutze twHoleDruckmass2() !!!
	 * 
	 * Liefert das Druckmaß zu einem Artikel(-bild) als Array[x1, y1, x2, y2].
	 * links oben (x1, y1) und rechts unten(x1, y2) des Druckbereiches, relativ
	 * zum Artikelbild. (damit nicht z.B. der Kragen bedruckt wird ;-) ).
	 * Es wird in einem Verzeichnis nach einem Dateiname in der Form gesucht:
	 * z.B: "artikelname_73.31.196.186.mass" 
	 * (artikelname_x1.y1.x2.y2.mass) (artikelname ist der übergebene, mass is so)
	 * Dies ist ne leere Datei, es wird nur der Dateiname genutzt (73.31.196.186).
	 * Sie muss natürlich vorher manuell erstellt werden, weil zu jeder Klamotte
	 * andere Koordinaten sind.
	 * 
	 * !!! HARDCODED !!! (.mass)
	 * 
	 * @param	string	$dir  		Verzeichnis, das nach dem Artikel durchsucht wird
	 * @param	string	$artikel	Teil des zu suchenden Dateinamens
	 * @return	int-Array	mit den Koordinaten (x1,y1,x2,y2) des Druckmasses
	 */
	function twHoleDruckmass($dir, $artikel) {
		$verzeichnis = dir($dir);
		$druckmass = array();
		$i = 0;
		while ($filename = $verzeichnis->read()) {
			if (stristr($filename, $artikel)) {
				if (substr($filename, -5, 5) == ".mass") {
					$filename = substr($filename, strlen($artikel)+1);
					$druckmass = explode(".", $filename);
//					echo "aaa". $druckmass[0];
//					echo "aaa". $druckmass[1];
//					echo "aaa". $druckmass[2];
//					echo "aaa". $druckmass[3];
				}
			}
		}
		$verzeichnis->close();
		
		return $druckmass;
	}
	
	
	/*
	 * Liefert das Druckmaß zu einem Artikel(-bild) als Array[x1, y1, x2, y2].
	 * 
	 * links oben (x1, y1) und rechts unten(x1, y2) des Druckbereiches, relativ
	 * zum Artikelbild. (damit nicht z.B. der Kragen bedruckt wird ;-) ).
	 * Es wird in einem Verzeichnis nach einem Dateiname in der Form gesucht:
	 * z.B: "sweat_han_H6810.map" ("sweat_han_H6810" wäre hier der $artikel)
	 * 
	 * Die Datei muss natürlich vorher manuell erstellt werden (mit "Map This"), 
	 * weil zu jeder Klamotte andere Koordinaten sind. Sie muss eine Zeile wie
	 * z.B: "rect  61,67 209,259" enthalten. 
	 * 
	 * @param	string	$dir  		Verzeichnis, das nach dem Artikel durchsucht wird 
	 *                          (z.B: img/artikel/breit270/)
	 * @param	string	$artikel	Teil des zu suchenden Dateinamens 
	 *                          (z.B: sweat_han_H6810) (ohne Dateiendung)
	 * @return	int-Array	mit den Koordinaten (x1,y1,x2,y2) des Druckmasses
	 */
	function twHoleDruckmass2($dir, $artikel) {
		$verzeichnis = dir($dir);
		$druckmass = array();
		$i = 0;
		while ($filename = $verzeichnis->read()) {
			// wenn $artikel (ist ja ohne Dateiendung) in $filename enthalten ist
			if (stristr($filename, $artikel)) {
				// wenn es die .map-Datei ist (es jibt ja auch noch ne Bilddatei ...)
				if (substr($filename, -4, 4) == ".map") {
					// die Koordinaten aus der Datei auslesen:
					// Hier wird davon ausgegangen, dass die .map-Datei mit dem Tool
					// "Map This" erstellt wurde. Das bedeutet, dass in dieser Datei eine
					// Zeile existiert, die mit "rect" beginnt. (z.B: rect  61,67 209,259)
					$file = fopen($dir. $filename, "r");
					while ($zeile = fgets($file, 1024)) {
						// nur die Zeile nehmen, die mit "rect" beginnt
						if (substr($zeile, 0, 5) == "rect ") {
							// die Zeile zerstückeln (z.B: "rect  61,67 209,259")
							$str = substr($zeile, 5);     // $str ist " 61,67 209,259"
							$str = trim($str);            // Leerzeichen raus
							///echo "-". $str. "-<br />";
							///echo "-----<br />";
							
							$arrPunkte = explode(" ", $str);  // arrPunkte[0] ist "61,67"
							$arrPunkt1 = explode(",", $arrPunkte[0]); // arrPunkt1[0] ist "61"
							$arrPunkt2 = explode(",", $arrPunkte[1]);
							
							$druckmass[0] = $arrPunkt1[0]; //61
							$druckmass[1] = $arrPunkt1[1]; //67
							$druckmass[2] = $arrPunkt2[0]; //209
							$druckmass[3] = $arrPunkt2[1]; //259
							
							///echo $druckmass[0]. "<br />";
							///echo $druckmass[1]. "<br />";
							///echo $druckmass[2]. "<br />";
							///echo $druckmass[3]. "<br />";
							///echo "-----<br />";
						}
					}
					fclose($file);
				}
			}
		}
		$verzeichnis->close();
		
		return $druckmass;
	}
	
	
	/**
	 * Setzt Session-Variablen für die Ampelfarben, je nachdem, wo geklickt wurde.
	 * Die Session-Variablen enthalten dann nur den Name der jeweiligen CSS-Class.
	 * 
	 * Mögliche Werte für $_SESSION['knzKommtVon']:
	 * neueSession, zencartBoxInfopages, zencartBtnOpenWithShirtbemaler, a1, a3Tab, a3Hochladen, a4Submit, a5Nein
	 * 
	 * @param	String	$kommtVon	von wo aus der Aufruf kam (bzw. wo geklickt wurde)
	 * @return nix 
	 */
	function twManageAmpelfarben($kommtVon) {
		$ampelRot   = "boxRot";
		$ampelGelb  = "boxGelb";
		$ampelGruen = "boxGruen";
		$tabbedAll           = "tabbedAll";
		$tabbedAllAmpelGelb  = "tabbedAllAmpelGelb";
		$tabbedAllAmpelGruen = "tabbedAllAmpelGruen";
		$tabbedTabs           = "tabbedTabs";
		$tabbedTabsAmpelGelb  = "tabbedTabsAmpelGelb";
		$tabbedTabsAmpelGruen = "tabbedTabsAmpelGruen";
		$tabbedInhalt           = "tabbedInhalt";
		$tabbedInhaltAmpelGelb  = "tabbedInhaltAmpelGelb";
		$tabbedInhaltAmpelGruen = "tabbedInhaltAmpelGruen";
		
		// kommtVon: 'neueSession'
		if ($kommtVon == "neueSession") {	
			$_SESSION['classA1'] = $ampelRot;    
			$_SESSION['classA2'] = $ampelRot;      
			$_SESSION['classA3'] = $ampelRot;      
			$_SESSION['classA3TabbedAll']    = $tabbedAll;     
			$_SESSION['classA3TabbedTabs']   = $tabbedTabs;        
			$_SESSION['classA3TabbedInhalt'] = $tabbedInhalt;     
			$_SESSION['classA4'] = $ampelRot;      
			$_SESSION['classA5'] = $ampelRot;      
		}
		
		// kommtVon: 'zencartBoxInfopages'
		if ($kommtVon == "zencartBoxInfopages") {	
			$_SESSION['classA1'] = $ampelRot;    
			//$_SESSION['classA2'] = $ampelRot;      
			$_SESSION['classA3'] = $ampelRot;      
			$_SESSION['classA3TabbedAll']    = $tabbedAll;     
			$_SESSION['classA3TabbedTabs']   = $tabbedTabs;        
			$_SESSION['classA3TabbedInhalt'] = $tabbedInhalt;     
			$_SESSION['classA4'] = $ampelRot;      
			$_SESSION['classA5'] = $ampelRot;      
		}
		
		// kommtVon: 'zencartBtnOpenWithShirtbemaler'
		if ($kommtVon == "zencartBtnOpenWithShirtbemaler") {	
			$_SESSION['classA1'] = $ampelGelb;    
			//$_SESSION['classA2'] = $ampelRot;      
			$_SESSION['classA3'] = $ampelRot;      
			$_SESSION['classA3TabbedAll']    = $tabbedAll;     
			$_SESSION['classA3TabbedTabs']   = $tabbedTabs;        
			$_SESSION['classA3TabbedInhalt'] = $tabbedInhalt;     
			$_SESSION['classA4'] = $ampelRot;      
			$_SESSION['classA5'] = $ampelRot;      
		}

		// kommtVon: 'a1'
		if ($kommtVon == "a1") {  
			$_SESSION['classA1'] = $ampelGelb;   
			//$_SESSION['classA2'] = $ampelRot;      
			$_SESSION['classA3'] = $ampelRot;      
			$_SESSION['classA3TabbedAll']    = $tabbedAll;     
			$_SESSION['classA3TabbedTabs']   = $tabbedTabs;        
			$_SESSION['classA3TabbedInhalt'] = $tabbedInhalt;     
			$_SESSION['classA4'] = $ampelRot;      
			$_SESSION['classA5'] = $ampelRot;
			return true;      
		}
		
		// kommtVon: 'a3Tab'
		if ($kommtVon == "a3Tab") { 
			$_SESSION['classA1'] = $ampelGelb;   
			//$_SESSION['classA2'] = $ampelRot;      
			$_SESSION['classA3'] = $ampelGelb;
			$_SESSION['classA3TabbedAll']    = $tabbedAllAmpelGelb;    
			$_SESSION['classA3TabbedTabs']   = $tabbedTabs;        
			$_SESSION['classA3TabbedInhalt'] = $tabbedInhalt; 
			$_SESSION['classA4'] = $ampelRot;      
			$_SESSION['classA5'] = $ampelRot;
			return true;      
		}
		
		// kommtVon: 'a3Hochladen'
		if ($kommtVon == "a3Hochladen") {
			// erstmal noch nix hier :D
		}
		
		// kommtVon: 'a4Submit'
		if ($kommtVon == "a4Submit") {
			// wenn die Eingaben des Users okay sind
			if ($_SESSION['knzValidEingaben'] == "") {
				$_SESSION['classA1'] = $ampelGruen;    
				//$_SESSION['classA2'] = $ampelGruen;      
				$_SESSION['classA3'] = $ampelGruen;      
				$_SESSION['classA3TabbedAll']    = $tabbedAllAmpelGruen;     
				$_SESSION['classA3TabbedTabs']   = $tabbedTabsAmpelGruen;        
				$_SESSION['classA3TabbedInhalt'] = $tabbedInhaltAmpelGruen;     
				$_SESSION['classA4'] = $ampelGruen;      
				$_SESSION['classA5'] = $ampelGelb; 
				return true;  
			}
			// wenn die Eingaben des Users NICHT okay sind
			else {
				$_SESSION['classA1'] = $ampelGelb;   
				//$_SESSION['classA2'] = $ampelRot;      
				$_SESSION['classA3'] = $ampelGelb;
				$_SESSION['classA3TabbedAll']    = $tabbedAllAmpelGelb;    
				$_SESSION['classA3TabbedTabs']   = $tabbedTabsAmpelGelb;        
				$_SESSION['classA3TabbedInhalt'] = $tabbedInhaltAmpelGelb; 
				$_SESSION['classA4'] = $ampelRot;      
				$_SESSION['classA5'] = $ampelRot;
				return true;      
			}  
		}
		
		// kommtVon: 'a5Nein'
		if ($kommtVon == "a5Nein") {	
			$_SESSION['classA1'] = $ampelGelb;   
			//$_SESSION['classA2'] = $ampelRot;      
			$_SESSION['classA3'] = $ampelGelb;
			$_SESSION['classA3TabbedAll']    = $tabbedAllAmpelGelb;    
			$_SESSION['classA3TabbedTabs']   = $tabbedTabs;        
			$_SESSION['classA3TabbedInhalt'] = $tabbedInhalt; 
			$_SESSION['classA4'] = $ampelRot;      
			$_SESSION['classA5'] = $ampelRot;
			return true; 
		}
	}
	
	
	/**
	 * Setzt Session-Variablen für den Ablauf, je nachdem, wo geklickt wurde.
	 * 
	 * Mögliche Werte für $_SESSION['knzKommtVon']:
	 * neueSession, zencartBoxInfopages, zencartBtnOpenWithShirtbemaler, a1, a3Tab, a3Hochladen, a4Submit, a5Nein
	 * 
	 * @param	String	$kommtVon	von wo aus der Aufruf kam (wo geklickt wurde)
	 * @return nix 
	 */
	function twManageAblauf($kommtVon) {	
		// kommtVon: 'neueSession'
		if ($kommtVon == "neueSession") {	
			$_SESSION['artikel']                     = "";
			$_SESSION['zencart_products_id']         = "";
			$_SESSION['filenameArtikelbildBreit270'] = "";
			$_SESSION['filenameVorschaubildText']       = "";
			$_SESSION['filenameVorschaubildMotiv']      = "";
			$_SESSION['filenameVorschaubildUpload']     = "";
		}
			
		// kommtVon: 'zencartBoxInfopages'
		if ($kommtVon == "zencartBoxInfopages") {	
			$_SESSION['artikel']                     = "";
			$_SESSION['zencart_products_id']         = "";
			$_SESSION['filenameArtikelbildBreit270'] = "";
			$_SESSION['filenameVorschaubildText']       = "";
			$_SESSION['filenameVorschaubildMotiv']      = "";
			$_SESSION['filenameVorschaubildUpload']     = "";
		}
		
		// kommtVon: 'zencartBtnOpenWithShirtbemaler'
		if ($kommtVon == "zencartBtnOpenWithShirtbemaler") {	
			$_SESSION['artikel']                     = $_GET['artikel'];
			$_SESSION['zencart_products_id']         = $_GET['products_id'];
			//$_SESSION['filenameArtikelbildBreit270'] = "";
			$_SESSION['filenameVorschaubildText']       = "";
			$_SESSION['filenameVorschaubildMotiv']      = "";
			$_SESSION['filenameVorschaubildUpload']     = "";
		}
		
		// kommtVon: 'a1'
		if ($kommtVon == "a1") {	
			// wenn ein Artikel ausgewählt wurde ('artikel' wurde mit GET gesendet)
			if (!empty($_GET['artikel'])) {
				$_SESSION['artikel'] = $_GET['artikel'];
			} else {
				echo "Fehler beim Übernehmen des ausgewählten Artikels!";
				$_SESSION['artikel'] = "";
			}
			// wenn ein Artikel ausgewählt wurde (... nochmal ;-) )
			// ('products_id' wurde auch mit GET gesendet, falls Klamotte ausgewählt)
			if (!empty($_GET['products_id'])) {
				$_SESSION['zencart_products_id'] = $_GET['products_id']; 
			} else {
				echo "Fehler beim Übernehmen der zencart_products_id des Artikels!";
				$_SESSION['zencart_products_id'] = "";
			}
			// immer machen			
			$_SESSION['knzShowTextMotivUpload']     = "";
			$_SESSION['filenameVorschaubildText']   = "";
			$_SESSION['filenameVorschaubildMotiv']  = "";
			$_SESSION['filenameVorschaubildUpload'] = "";
		}
		
		// kommtVon: 'a3Tab'
		if ($kommtVon == "a3Tab") {
			if (!empty($_GET['knzShowTextMotivUpload'])) {
				$_SESSION['knzShowTextMotivUpload'] = $_GET['knzShowTextMotivUpload'];
			} else {
				echo "Fehler bei der Übergabe des Kennzeichens 'Text/Motiv/Upload'!";
				$_SESSION['knzShowTextMotivUpload'] = "";
			}			
		}
		
		// kommtVon: 'a3Hochladen'
		if ($kommtVon == "a3Hochladen") {
			// erstmal noch nix hier :D
		}
		
		// kommtVon: 'a4Submit'
		if ($kommtVon == "a4Submit") {
			// erstmal noch nix hier :D
		}
		
		// kommtVon: 'a5Nein'
		if ($kommtVon == "a5Nein") {	
			////////////////////////////////
		}
	}
	
	
	
	
	/**
	 * Setzt das Kennzeichen '$_SESSION['knzKommtVon']', je nachdem, von wo diese
	 * Seite (die index.php) aufgerufen wurde. (bzw. wo geklickt wurde ;-) )
	 * 
	 * Mögliche Werte sind:
	 * neueSession, zencartBoxInfopages, zencartBtnOpenWithShirtbemaler, a1, a3Tab, a3Hochladen, a4Submit, a5Nein
	 */
	function twManageSessionvarKnzKommtVon() {
				
		// nur beim aller-ersten Seitenaufruf (neue Session)
		if (!isset($_SESSION['artikel'])) {
			$_SESSION['knzKommtVon'] = "neueSession";
			return "aaaxxx";
		}
		
		
		// wenn in Zencart in der Box Infopages (auf Shirtbemaler) geklickt wurde
		if (!empty($_GET['kommtVon']) && $_GET['kommtVon'] == "zencartBoxInfopages") { 
			$_SESSION['knzKommtVon'] = "zencartBoxInfopages";
		} 
		
		
		// wenn im ZenCart der Button 'im Shirtbemaler bemalen' geklickt wurde
		// @see: includes/templates/twTemplate/templates/tpl_infopages_default.php
		// @see: twAnbindungShirtbemaler.php
		if (!empty($_GET['kommtVon']) && $_GET['kommtVon'] == "zencartBtnOpenWithShirtbemaler") {
			$_SESSION['knzKommtVon'] = "zencartBtnOpenWithShirtbemaler";
		}
		
		
		// nur wenn eine Klamotte NEU ausgesucht wurde 
		if (isset($_GET['kommtVon']) && $_GET['kommtVon'] == "a1") {
			$_SESSION['knzKommtVon'] = "a1";
		}
		
		
		// nur wenn Text/Motiv/Upload NEU ausgesucht wurde 
		if (isset($_GET['knzShowTextMotivUpload'])) {
			$_SESSION['knzKommtVon'] = "a3Tab";
		}
		
		
		// nur wenn in a3designKlamotte.inc.php der Button 'hochladen' geklickt wurde 
		if (isset($_POST['submit']) && $_POST['submit'] == 'hochladen') {
			$_SESSION['knzKommtVon'] = "a3Hochladen";
		}
		
		
		// nur wenn in a4AuswahlGroesse.inc.php der Button 'okay' geklickt wurde 
		if (isset($_POST['submit']) && $_POST['submit'] == 'okay') {
			$_SESSION['knzKommtVon'] = "a4Submit";
		}
		
		
		// nur wenn in a5inDenWarenkorb.inc.php der Button 'nein' geklickt wurde
		if (isset($_POST['submit']) && $_POST['submit'] == 'Nein, Werte nochmal ändern') {
			$_SESSION['knzKommtVon'] = "a5Nein";
		}
	}
	
	
	/**
	 * Prüft die vom User eingegebenen Werte, je nachdem wo geklickt wurde.
	 * ACHTUNG: twManageSessionvarKnzKommtVon() muss vorher aufgerufen werden, weil 
	 * dort ein Kennzeichen gesetzt wird, welches hier abgefragt wird.
	 * 
	 * Mögliche Werte für $_SESSION['knzKommtVon']:
	 * neueSession, zencartBoxInfopages, zencartBtnOpenWithShirtbemaler, a1, a3Tab, a3Hochladen, a4Submit, a5Nein
	 */
	function twManageSessionvarKnzValidEingaben() {		
		$errMsg              = "";
		$arrArtikelvarianten = twHoleArtikelvarianten($_POST);
		
		// kommtVon: 'a4Submit'
		if ($_SESSION['knzKommtVon'] == "a4Submit") {
			// wenn noch kein Artikel ausgewählt wurde
			if (empty($_SESSION['zencart_products_id'])) {
				$errMsg .= "Bitte zuerst einen Artikel auswählen!<br />";
			}
			// wenn KEINE Stückzahl eingegeben wurde
			if (!$arrArtikelvarianten[0]['anzahl'] > 0) { 
				$errMsg .= "Bitte eine Stückzahl angeben!<br />";
			}
			// wenn noch kein (Vorschau/Druck-)Bild ausgewählt wurde
			if ($_SESSION['filenameVorschaubildText'] == "" &&
			    $_SESSION['filenameVorschaubildMotiv']      == "" &&
			    $_SESSION['filenameVorschaubildUpload']     == ""   ) {
				$errMsg .= "Bitte die Klamotte bemalen!<br />";
			} 
		}
		
		$_SESSION['knzValidEingaben'] = $errMsg;
	}

	
	
	
	
	/**
	 * Liefert den Name der CSS-Class zu einem Objekt (id).
	 * Holt dabei den Name aus den Session-Variablen, oder wenn dort noch keiner 
	 * drinstaht, einen Default-Name.
	 * 
	 * @param String $a	Name des Objektes (meist gleich die id)
	 * @return String Name der dazugehörigen CSS-Class
	 */
	function twHoleClassZuId($a) {
		$a1 = "boxRot";
		$a2 = "boxRot";
		$a3 = "boxRot";
		$a3TabbedAll    = "tabbedAll";
		$a3TabbedTabs   = "tabbedTabs";
		$a3TabbedInhalt = "tabbedInhalt";
		$a4 = "boxRot";
		$a5 = "boxRot";
		$a6 = "boxRot";
		$a7 = "boxRot";
		$a8 = "boxRot";
		$a9 = "boxRot";
		
		if ($a == "a1") {
			if (!empty($_SESSION['classA1'])) {
				return $_SESSION['classA1'];
			} else {
				return $a1;
			}
		}
		if ($a == "a2") {
			if (!empty($_SESSION['classA2'])) {
				return $_SESSION['classA2'];
			} else {
				return $a2;
			}
		}
		if ($a == "a3") {
			if (!empty($_SESSION['classA3'])) {
				return $_SESSION['classA3'];
			} else {
				return $a3;
			}
		}
		if ($a == "a3TabbedAll") {
			if (!empty($_SESSION['classA3TabbedAll'])) {
				return $_SESSION['classA3TabbedAll'];
			} else {
				return $a3TabbedAll;
			}
		}
		if ($a == "a3TabbedTabs") {
			if (!empty($_SESSION['classA3TabbedTabs'])) {
				return $_SESSION['classA3TabbedTabs'];
			} else {
				return $a3TabbedTabs;
			}
		}
		if ($a == "a3TabbedInhalt") {
			if (!empty($_SESSION['classA3TabbedInhalt'])) {
				return $_SESSION['classA3TabbedInhalt'];
			} else {
				return $a3TabbedInhalt;
			}
		}
		if ($a == "a4") {
			if (!empty($_SESSION['classA4'])) {
				return $_SESSION['classA4'];
			} else {
				return $a4;
			}
		}
		if ($a == "a5") {
			if (!empty($_SESSION['classA5'])) {
				return $_SESSION['classA5'];
			} else {
				return $a5;
			}
		}
	}
	
	
	/**
	 * Liefert ein n-dimensionales Array aller Artikelvarianten.
	 * Das heißt, wenn ein Artikel 6 mal in Größe XL und 3 mal in Größe XXL bestellt
	 * wird, dann sind das sozusagen 2 verschiedene Artikelvarianten.
	 * Zur Zeit wird zwar nur mit einer Artikelvariante gearbeitet, aber ist halt
	 * schon vorbereitet für später...
	 * Jede Artikelvariante hat eine (Artikel-)Anzahl und ein Array der Attribute.
	 * 
	 * Die Werte werden aus $_POST geholt (siehe: a4auswahlGroesse.inc.php)
	 */
	function twHoleArtikelvarianten($_POST) {
		$varianten = array();
		$iVariante = 0;
		$iAttribut = 0;
		
		$varianten[0]['anzahl']    = "";
		$varianten[0]['attribute'] = array();
		
		// (da die Textfelder in der form 'anzahl-X-X' benannt wurden und X-X nicht 
		// bekannt ist, muss erstmal gesucht werden)
		while (list($key, $val) = each($_POST)) {
			//echo "aaa: ". $key. " --- ". $val. "<br />";
			
			// wenn der Name des Textfeldes mit 'anzahl-' beginnt (Anzahl UND Größe)
			if (substr($key, 0, 7) == "anzahl-") {
				// wenn das Feld einen Wert > 0 hat (es also das ausgewählte ist)
				if ($val > 0) {
					$temp = substr($key, 7);  // z.B: 1-3
					$arrTemp = split("-", $temp);
					$varianten[0]['anzahl']                                     = $val;
					$varianten[0]['attribute'][$iAttribut]['options_id']        = $arrTemp[0];
					$varianten[0]['attribute'][$iAttribut]['options_values_id'] = $arrTemp[1];
					$iAttribut++;
				}
			}
			
			// wenn der Name des Textfeldes 'id[XXX]' ist
			if ($key == "id") {
				//echo "aaa id: ". $key. " --- ". $val. "<br />";
				foreach ($val as $key2 => $val2) {
					///echo "aaa idd: ". $key2. " --- ". $val2. "<br />";
					// Workaround weil die Session beim Seitenaufbau geladen wird und da
					// noch nicht feststeht, wie der Dateiname des Bildes heißt.
					// (ein hidden-Feld in a4auswahlGröesse.inc.php hat diesen Wert...)
					// wenn 'Vorschaubild vorne'
					if ($val2 == "twKnzVorschaubildVorneValue") { 
						if ($_SESSION['knzShowTextMotivUpload'] == "text") {
							$val2 = $_SESSION['dirVorschauFuerWarenkorb']. $_SESSION['filenameVorschaubildText'];
						}
						if ($_SESSION['knzShowTextMotivUpload'] == "motiv") {
							$val2 = $_SESSION['dirVorschauFuerWarenkorb']. $_SESSION['filenameVorschaubildMotiv'];
						}
						if ($_SESSION['knzShowTextMotivUpload'] == "upload") {
							$val2 = $_SESSION['dirVorschauFuerWarenkorb']. $_SESSION['filenameVorschaubildUpload'];
						}
					}
					// wenn 'Druckbild vorne'
					if ($val2 == "twKnzDruckbildVorneValue") { 
						if ($_SESSION['knzShowTextMotivUpload'] == "text") {
							$val2 = $_SESSION['dirText']. $_SESSION['filenameDruckbildText'];
						}
						if ($_SESSION['knzShowTextMotivUpload'] == "motiv") {
							$val2 = $_SESSION['dirImgMotive']. $_SESSION['filenameDruckbildMotiv'];
						}
						if ($_SESSION['knzShowTextMotivUpload'] == "upload") {
							$val2 = $_SESSION['dirUpload']. $_SESSION['filenameDruckbildUpload'];
						}
						
					}
					$varianten[0]['attribute'][$iAttribut]['options_id']        = $key2;				
					$varianten[0]['attribute'][$iAttribut]['options_values_id'] = $val2;
					///echo "Attribut ". $iAttribut. ": ". $key2. " --- ". $val2. "<br />";
					$iAttribut++;
				}
			}
		}
		
		/* echo "Anzahl für diese Artikelvariante: ". $varianten[0]['anzahl']. " Stück<br />";
		foreach ($varianten[0]['attribute'] as $key => $val) {
			echo "Attribut: ". $val['options_id']. "-". $val['options_values_id']. "<br />";
		}
		echo "--------------------------------------<br />"; */
		
		return $varianten;
	}
	
	
	

?>
