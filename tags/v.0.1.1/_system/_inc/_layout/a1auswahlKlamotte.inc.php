<?
/**
 * Wird von index.php includet.
 * 
 * 1. Lädt ein Array mit allen Dateinamen der Bild-Dateien, die sich in 
 *    $_SESSION['dirImgArtikelHoch32'] befinden.
 * 2. Zeigt alle diese (Mini-) Bilder an.
 * 3. Klickt man so ein (Mini-)Bild an, wird die (selbe)Seite neu geladen.
 *    (das ist natürlich index.php, weil diese hier ja nur includet wird...)
 *    Dabei wird 'artikel' (der dateiname ohne dateiendung) mit GET übergeben.
 *    (in index.php werden dann anhand von 'artikel' die Bildnamen und 
 *     -verzeichnisse ermittelt und in den Session-Variablen gespeichert)
 *    (und von 'a8anzeigeKlamotte.inc.php' sofort als Hintergrundbild angezeigt)
 */
?>
 

<!-- Klamottenauswahl START --> <?
$dirMinibilder = $_SESSION['dirImgArtikelHoch32'];
$arrMinibilder = twHoleBilderVonDir($dirMinibilder);
// hier das Design der Anzeige auswählen (durch auskommentieren...)
twA1ShowArtikelauswahl($dirMinibilder, $arrMinibilder);
//twA1ShowArtikelauswahlMitSlider($dirMinibilder, $arrMinibilder); ?>
<!-- Klamottenauswahl END --> <?



/* Funktionen --------------------------------------------------------------- */

/**
 * Anzeige der Artikel-Mini-Bilder ohne alle Schnörkel.
 */
function twA1ShowArtikelauswahl($dirMinibilder, $arrMinibilder) { ?>
	<fieldset>
		<legend>
			1. Klamotte auswählen 
			<a href="index.htm" onmouseover="TagToTip('tttA1FieldsetLegend')">
				<img src="<?=$_SESSION['dirImg']?>icon16-fragezeichen.png" />
			</a>
		</legend>
		
		<table class="a1Table">
			<tr>
				<?
				foreach ($arrMinibilder as $minibild) {
					$artikel     = twHoleArtikelVonFilename($minibild); // aus dem Shirtbemaler-Bilder-Verzeichnis
					$products_id = twDbSelect_products_id($artikel);    // nur wenn der auch im ZenCart-Shop existiert
					$kommtVon    = "a1";                                // Kennzeichen "kommtVon"
					if (!empty($artikel) && !empty($products_id)) { ?>
						<td class="a1Table">
							<img src="<?=$dirMinibilder?><?=$minibild?>" 
						       onclick="window.location.href = '<?=$_SERVER['PHP_SELF']?>?artikel=<?=$artikel?>&products_id=<?=$products_id?>&kommtVon=<?=$kommtVon?>'" 
						       style="cursor:pointer; cursor:hand;" >
						  </img> 
					  </td> <?
					} else {
						//echo "Artikel-----: ". $artikel. "<br />";
						//echo "products_id-: ". $artikel. "<br />";
						//echo "----------------------------<br />";
					}			
				} ?>
			</tr>
		</table>
		
	</fieldset> <?
}


/**
 * Anzeige der Artikel-Mini-Bilder in einem Slider von Ralle.
 * @see shirtbemaler/_system/_zusatz/rkSlider01/
 */
function twA1ShowArtikelauswahlMitSlider($dirMinibilder, $arrMinibilder) { ?>
	<div id="slideshow">
		<div id="scrollbox">
			<div id="thumbs"> <?
				foreach ($arrMinibilder as $minibild) {
					$artikel     = twHoleArtikelVonFilename($minibild); // aus dem Shirtbemaler-Bilder-Verzeichnis
					$products_id = twDbSelect_products_id($artikel);    // nur wenn der auch im ZenCart-Shop existiert
					if (!empty($artikel) && !empty($products_id)) { ?>
						<a class="gallery slidea" href="#">
		        	<span>
		        		<img src="<?=$dirMinibilder?><?=$minibild?>"
		        				 onclick="window.location.href = '<?=$_SERVER['PHP_SELF']?>?artikel=<?=$artikel?>&products_id=<?=$products_id?>'" 
					     			 style="cursor:pointer; cursor:hand;" ></img>
		        	</span>
		      	</a> <?
					} else {
						//echo "Artikel-----: ". $artikel. "<br />";
						//echo "products_id-: ". $artikel. "<br />";
						//echo "----------------------------<br />";
					}			
				} ?>
			</div> 
	  </div>
	</div> <?
}
?>