>>> nur zur Info beim Testen: <<< <br />
<? 
$dirArtikelbilder = $_SESSION['dirImgArtikelBreit270'];
//$dirArtikelbilder = $_SESSION['dirShopImgArtikel'];

if (!empty($_SESSION['filenameArtikelbildBreit270'])) { 
	// wenn das (270-breite) Bild vorhanden ist (in shirtbemaler/img/artikel/)
	if (file_exists($dirArtikelbilder. $_SESSION['filenameArtikelbildBreit270'])) {
		$arrBildgroesse = getimagesize($dirArtikelbilder. $_SESSION['filenameArtikelbildBreit270']); ?>
		Bildgr��e(Klamotte): <?=$arrBildgroesse[0]?>.<?=$arrBildgroesse[1]?>
		<br />
		<? 
		// wenn im selben Verzeichnis eine "Druck-Koordinaten"-Datei vorhanden ist 
		if (!empty($_SESSION['klamotteDruckmass'])) { ?>
			Druckma�: <?=$_SESSION['klamotteDruckmass'][0]?>.<?=$_SESSION['klamotteDruckmass'][1]?>.<?=$_SESSION['klamotteDruckmass'][2]?>.<?=$_SESSION['klamotteDruckmass'][3]?> -->
			<? 
			$druckBreite = $_SESSION['klamotteDruckmass'][2] - $_SESSION['klamotteDruckmass'][0];
			$druckHoehe = $_SESSION['klamotteDruckmass'][3] - $_SESSION['klamotteDruckmass'][1]; 
			?>
			(<?=$druckBreite?>,<?=$druckHoehe?>)		}
		<?} else {
			echo "F�r das Bild \"". $dirArtikelbilder. $_SESSION['filenameArtikelbildBreit270']. "\" sind noch keine Druck-Koordinaten erstellt worden!<br />";
		}
	} else {
		echo "Das Bild \"". $dirArtikelbilder. $_SESSION['filenameArtikelbildBreit270']. "\" ist nicht vorhanden!<br />";
	}
} ?>