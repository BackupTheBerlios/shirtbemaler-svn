<?

	/*
	 * Allgemeines zu Upload
	 * 
	 * Wenn Datei hochgeladen wurde, liegt sie erstmal in einem temp. Verzeichnis
	 * (solange das Skript l�uft), m�sste bei Bedarf also extra noch irgendwohin
	 * abgespeichert werden. (mit move_uploaded_file(), evtl. is_uploaded_file())
	 * Dateiinfos stehen nach dem Upload als Array in $_FILES. 
	 * $_FILES['datei']['tmp_name']	tempor�rer Name der geuploadeten Datei
	 * $_FILES['datei']['name']			urspr�nglicher Dateiname der Datei
	 * $_FILES['datei']['size']			Gr��e der Datei in Bytes
	 * $_FILES['datei']['type']			MIME-Type der Datei
	 * $_FILES['datei']['error']		Fehlercode w�hrend des Uploads
	 * $_FILES['datei']['error'] == UPLOAD_ERR_OK(0)				alles Okay
	 * $_FILES['datei']['error'] == UPLOAD_ERR_SIZE(1)			zu gro�, php.ini
	 * $_FILES['datei']['error'] == UPLOAD_ERR_FORM_SIZE(2)	zu gro�, max_file_size
	 * $_FILES['datei']['error'] == UPLOAD_ERR_PARTIAL(3)		unvollst�ndiger Upload
	 * $_FILES['datei']['error'] == UPLOAD_ERR_NO_FILE(4)		keine Datei hochgeladen
	 * ('datei' ist der Name des Formularfeldes <input name='datei' type='file'...)
	 * Beispiel-Formular:
	 * <form enctype='multipart/form-data' method='post' action='blabla.php'>
	 *   <input type='hidden' name='MAX_FILE_SIZE' value='1000' /> <!--Bytes-->
	 *   Datei ausw�hlen<br />
	 *   <input type='file' name='datei' /><br />
	 *   <input type='submit' name='submit' value='hochladen' />
	 * </form>
	 * Beispiel-Abfrage:
	 * if( isset($_POST['submit']) && $_POST['submit']=="hochladen") {...}
	 */
	 
	 
	 
	
	/*
	 * Pr�ft, ob eine Datei hochgeladen wurde, einen zugelassenen MimeType hat,
	 * ob diese Datei wirklich hochgeladen wurde(wegen Betrug) ...un was noch?
	 * 
	 * @param 	array $dateiInfo		ist nur das �bergebene (globale) Array $_FILES
	 * @param 	array	$mimetypes		zugelassene MimeTypes z.B: "image/jpeg" 
	 * @return	string	"twOkay" wenn alles geklappt hat, 
	 *                  sonst eine spezielle Fehlermeldung
	 *                  wenn "" dann is auch was nich okay...
	 */
	function twUploadValid($dateiInfo, $mimetypes) {
		$errMsg = "";
		
		// pr�fen ob Datei hochgeladen wurde (in ein temp. Verz. auf den Server)
		// $dateiInfo enth�lt $_FILES (siehe Kommentar ganz oben)
		if (isset($dateiInfo)) {
			switch ($dateiInfo['error']) {
				case 0:
					$errMsg = "twOkay"; // alles Okay
					break;
				case 1:
					$errMsg = "Datei '". $dateiInfo['name']. "' ist zu gro� (siehe php.ini)!";
					break;
				case 2:
					$errMsg = "Datei '". $dateiInfo['name']. "' ist zu gro� (siehe max_file_size)!";
					break;
				case 3:
					$errMsg = "Datei '". $dateiInfo['name']. "' wurde nur unvollst�ndig hochgeladen!";
					break;
				case 4:
					$errMsg = "Datei '". $dateiInfo['name']. "' wurde nicht hochgeladen!";
					break;
				default:
					$errMsg = "Fehler beim hochladen der Datei '". $dateiInfo['name']. "'!";	
					break;				
			}	
			
			// pr�fen, ob Datei einem zugelassenen MimeType(Dateiendung) entspricht	
			$knz = "nein";
			foreach ($mimetypes as $type) {
				if ($type == $dateiInfo['type']) {
					$knz = "ja";
				}
			}
			if ($knz == "nein") {
				$errMsg = "Dateiendung '". $dateiInfo['type']. "' ist nicht zum Upload zugelassen!";
			}
			
			// pr�fen, ob diese Datei tats�chlich hochgeladen wurde (wegen Betrug)
			// ! den ['tmp_name'] nehmen
			if (!is_uploaded_file($dateiInfo['tmp_name'])) {
				$errMsg = "Datei '". $dateiInfo['name']. "' ist keine hochgelade Datei!";
			}	
			
		}				
		return $errMsg;		
	}
	
	
	/*
	 * Speichert eine geuploadete Datei aufm Server in ein bestimmtes Verzeichnis.
	 * 
	 * @param 	string	$verz		Verzeichnis aufm Server, in das gespeichert wird
	 * @return	string	"twOkay" wenn alles geklappt hat, 
	 *                  sonst eine spezielle Fehlermeldung
	 *                  wenn "" dann is auch was nich okay...
	 */
	function twUploadSave($verz) {
		///echo $verz. "<br />";
		$errMsg = "";
		$knz = move_uploaded_file($_FILES['datei']['tmp_name'], $verz.$_FILES['datei']['name']);
		if (isset($knz) && $knz == true) {
			$errMsg = "twOkay";
		} else {
			$errMsg = "Fehler beim Speichern in $verz";
		}
		return $errMsg;
	}
?>
	