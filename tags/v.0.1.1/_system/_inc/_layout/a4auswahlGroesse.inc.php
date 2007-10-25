<?
/*
 * Wird von index.php includet.
 * 
 * -wenn der 'okay'-Button NICHT geklickt wurde (Standard):
 *    Formular zur Eingabe von Größe und Stückzahl anzeigen.
 *    Dabei wird in ZenCart geguckt, welche Attribute angegeben werden sollen.
 * -wenn der 'okay'-Button geklickt wurde:
 *    -wird erst geprüft, ob der User wirklich eine Anzahl eingegeben hat,
 *     wenn ja:   leeres Feld anzeigen (alles okay)
 *     wenn nein: Hinweis + Formular erneut anzeigen
 */
?>

<script src="<?=$_SESSION['dir_js']?>a4auswahlGroesse.js" language="JavaScript">
</script>




<?
// kommtVon: 'neueSession'
if ($_SESSION['knzKommtVon'] == "neueSession") {
	twA4ShowFormLeer("");
} 
// kommtVon: 'zencartBoxInfopages'
else if ($_SESSION['knzKommtVon'] == "zencartBoxInfopages") {
	twA4ShowFormLeer("");
}
// kommtVon: 'zencartBtnOpenWithShirtbemaler'
else if ($_SESSION['knzKommtVon'] == "zencartBtnOpenWithShirtbemaler") {
	twA4ShowFormLeer("");
} 
// kommtVon: 'a1'
else if ($_SESSION['knzKommtVon'] == "a1") {
	twA4ShowFormLeer("");
}
// kommtVon: 'a3Tab'
else if ($_SESSION['knzKommtVon'] == "a3Tab") {
	twA4ShowForm("");
}
// kommtVon: 'a3Hochladen'
else if ($_SESSION['knzKommtVon'] == "a3Hochladen") {
	twA4ShowForm("");
} 
// kommtVon: 'a4Submit'
else if ($_SESSION['knzKommtVon'] == "a4Submit") {
	if ($_SESSION['knzValidEingaben'] == "") {
		twA4ShowFormLeer("okay");
	} else {
		twA4ShowForm($_SESSION['knzValidEingaben']);
	}
}
// kommtVon: 'a5Nein'
else if ($_SESSION['knzKommtVon'] == "a5Nein") {
	twA4ShowForm("");
}
else {
}
?>




<?
/* Funktionen --------------------------------------------------------------- */

/**
 * Zeigt das 'Formular zur Eingabe von Größe und Stückzahl' an.
 * 
 * Die Attribute werden anhand der 'products_id' aus ZenCart geholt.
 * In diesem Formular ist ne kleine Besonderheit:
 * -Für 'Größe' sind in ZenCart eigentlich Radiobuttons ausgewählt. Um jedoch 
 *  die Benutzbarkeit dieses Formulares zu verbessern, werden diese Radiobuttons
 *  nicht angezeigt, sondern gleich Textfelder zur Eingabe der Anzahl.
 *  Über Javascript, wird gesteuert, dass bei Eingabe in ein Texteingabefeld 
 *  die anderen Texteingabefelder auf 0 gesetzt werden.
 *  Da aber die Werte der (nicht angezeigten) Radiobuttons später noch benötigt
 *  werden, muss getrickst werden: ('options_id' und 'options_values_id' werden
 *  deshalb im Textfeld-name in der Form 'anzahl-1-3' übergeben, siehe unten).
 * 
 * Das Formular liefert bei Klick auf 'in den Warenkorb' folgende POST-Variablen
 *   5 mal $_POST['anzahl-XXX-XXX']  // Anzahl zu kaufender Artikel, je nachdem, welche Größe
 *         $_POST['submit'] = 'okay' ...
 */
function twA4ShowForm($str) { 
	// Zähler für Attribut 'Größe' (wegen <table>, hat genau 5 Werte)
	$twCountAttributDruckart = 0;
	$twCountAttributGroesse  = 0; 
	
	// Array zum Auslesen der Attribute des Artikels aus ZenCart
	$arrAttributeIds = array();  // die ID's aller für diesen Artikel (in ZenCart definierten) Attribute
	$arrAttribute    = array();  // zweidimensionales Array aller (in ZenCart definierten) Attribute für diesen Artikel
	if (!empty($_SESSION['zencart_products_id'])) {
		$arrAttributeIds = twDbSelectArr_products_attributes_id($_SESSION['zencart_products_id']); 
		$arrAttribute    = twDbSelectArrTw_AttributeVonArtikel($_SESSION['zencart_products_id']);
	}
	
	// wenn ein String (Fehlermeldung) mit übergeben wurde
	if (!empty($str)) {
		echo "<h4 style='color:red; text-align:center;'>". $str. "</h4>";
	}
	
	
	?>		
	<!-- Anzeige der Attribute dieses Artikels START -->	
	<form name='frmA4' method='post' action='<?=$_SERVER['PHP_SELF']?>'>
		<fieldset>
			<legend>
				4. Größe, Anzahl und Druckart wählen 
				<a href="index.htm" onmouseover="TagToTip('tttA4FieldsetLegend')">
					<img src="<?=$_SESSION['dirImg']?>icon16-fragezeichen02.jpg" />
				</a>
			</legend>
	<?
	
	
	
	// wenn Attribute für diesen Artikel existieren (in ZenCart)
	if (is_array($arrAttribute)) {
		$i=0;
		// für jedes Attribut dieses Artikels (z.B: für 'Größe' und für 'Farbe')
		while (list($key, $val) = each($arrAttribute)) {
			// nur Testausgabe
			/* echo "products_attributes_id------: ". $arrAttribute[$i]['products_attributes_id']. "<br />";
			echo "options_id------------------: ". $arrAttribute[$i]['options_id']. "<br />";
			echo "options_values_id-----------: ". $arrAttribute[$i]['options_values_id']. "<br />";
			echo "options_values_price--------: ". $arrAttribute[$i]['options_values_price']. "<br />";
			echo "price_prefix----------------: ". $arrAttribute[$i]['price_prefix']. "<br />";
			echo "products_options_sort_order-: ". $arrAttribute[$i]['products_options_sort_order']. "<br />";
			echo "attributes_default----------: ". $arrAttribute[$i]['attributes_default']. "<br />";
			echo "attributes_image------------: ". $arrAttribute[$i]['attributes_image']. "<br />";
			echo "attributes_required---------: ". $arrAttribute[$i]['attributes_required']. "<br />"; */
			
			// Variablen nur für diese while-Schleife
			$options_id            = $arrAttribute[$i]['options_id'];                             //Attribut-ID        (zB 1 (für Größe))
			$options_name          = twDbSelect_products_options_name($options_id);               //Attribut-Name      (zB Größe)
			$options_values_id     = $arrAttribute[$i]['options_values_id'];                      //Attributmerkmal-ID (zB 3 (für XXL))
			$options_values_name   = twDbSelect_products_options_values_name($options_values_id); //Attributmerkmal    (zB XXL)
			$products_options_type = twDbSelect_products_options_type($arrAttribute[$i]['options_id']); //Attributtyp (zB 2 (für Radio))
			
			// Sonderbehandlung für das Attribut 'Größe':
			/* Wenn es sich um das Attribut "Größe" handelt, wird der Radio-Button
			 *  im Shirtbemaler gar nicht angezeigt, sondern gleich ein Textfeld 
			 *  zur Eingabe der Anzahl wird angezeigt.
			 *  Da aber der Wert des Radio-Buttons später noch benötigt wird, muss
			 *  er irgendwie mit übermittelt werden.
			 *  Hier geschieht das provisorisch über den Name des Textfeldes, z.B:
			 *    Textfeld-name: 'anzahl-1-3' bedeutet: 
			 *      Radiobutton-name: 'id[1]' (options_id)
			 *      Radiobutton-wert: '3'     (options_values_id)
			 *  twOnfocusXXX ruft ein Javascript auf, welches das Textfeld, das den 
			 *  Focus hat, leert und in die anderen Textfelder 0 einträgt.
			 *  id wird von dem Javascript zur Erkennung benötigt.
			 */
			if ($options_name == "Größe") { 
				$twCountAttributGroesse ++;
				if ($twCountAttributGroesse == 1) { ?>
					<table class='a4TableGroesse'><tr> <?
				}
				
			 	?>
			 	<td class='a4TableGroesseTd'> 
				 	<?=$options_values_name?><br />
				  <input type='text' 
				         name='anzahl-<?=$options_id?>-<?=$options_values_id?>' 
				         style='text-align: center; font-size:1.2em;'
				         value='0' 
				         size='1'
				         id='<?=$options_values_name?>'
				         onfocus='twOnfocusAnzahl<?=$options_values_name?>() 
				                  twManageFarbe("a4")'>
				  </input>
			  </td>
			  <?
			  if ($twCountAttributGroesse == 5) { ?>
					</tr></table> <?
				}
			}
			
			// Sonderbehandlung für das Attribut 'Druckbild vorn':
			/*
			 * In ZenCart als Attribut 'Text' festgelegt. Wird hier nicht zur Auswahl
			 * angezeigt, sondern dynamisch gefüllt mit Pfad/Name der Bilddatei des
			 * zu druckenden Bildes. (wird mit 'hidden' übermittelt)
			 * Achtung: id mit 'txt_'...
			 * value wird erst später belegt, weil hier die Session-Variable
			 * für das Druckbild noch nicht feststeht
			 * (siehe twHoleArtikelvarianten() )
			 */
			else if ($options_name == "Druckbild vorn") { ?>
				<input type="hidden" 
				       name="id[txt_<?=$options_id?>]" 
				       value="twKnzDruckbildVorneValue" 
				       id="attrib-<?=$options_id?>-<?=$options_values_id?>" 
				/>
				<?
			}
			
			// Sonderbehandlung für das Attribut 'Vorschaubild vorn' (wie Druckbild):
			/*
			 * In ZenCart als Attribut 'Text' festgelegt. Wird hier nicht zur Auswahl
			 * angezeigt, sondern dynamisch gefüllt mit Pfad/Name der Bilddatei des
			 * zu druckenden Bildes. (wird mit 'hidden' übermittelt)
			 * Achtung: id mit 'txt_'...
			 * value wird erst später belegt, weil hier die Session-Variable
			 * für das Druckbild noch nicht feststeht
			 * (siehe twHoleArtikelvarianten() )
			 */
			else if ($options_name == "Vorschaubild vorn") { ?>
				<input type="hidden" 
				       name="id[txt_<?=$options_id?>]" 
				       value="twKnzVorschaubildVorneValue" 
				       id="attrib-<?=$options_id?>-<?=$options_values_id?>" 
				/>
				<?
			}
			
			// wenn "Druckart"
			else if ($options_name == "Druckart") { 
				$twCountAttributDruckart ++;
				if ($twCountAttributDruckart == 1) { ?>
					<table class='a4TableDruckart'><tr> <?
				} 
				?>
				<td class='a4TableDruckartTd'>
					<?=$options_values_name?>
					<input type='radio'
							   name='id[<?=$options_id?>]'
							   value='<?=$options_values_id?>'
							   id='attrib-<?=$options_id?>-<?=$options_values_id?>' 
					/>
				</td>
				<?
				if ($twCountAttributDruckart == 2) { ?>
					</tr></table> <?
				}
			}
			
			// und für alle restlichen Attribute (naja, sind hier ja gar keine...):
			else {		
				// Es muss unterschieden werden, was für'n (ZenCart-)Attribut-Typ es ist:
				//    (0=Dropdown, 1=Text, 2=Radio, 3=Checkbox, 4=File, 5=ReadOnly)
				// (Ist ja eigentlich hier egal, weil im Shirtbemaler sowieso gleich ein
				//  Textfeld zur Eingabe der Stückzahl für jeweilige Größe angezeigt wird.
				//  Aber zum 'Begreifen' der 'Materie' isses mal so hier mit drinne...)
				switch ($products_options_type) {
					
					// Dropdown			
					case 0:
						// an ZenCart übergeben wird sowas wie:
						// <select name="id[1]" id="attrib-1"> <option value="3">L</option> (...)</select>
						break;
						
					// Text	
					case 1:
						// an ZenCart übergeben wird sowas wie:
						// <input type="text" name="id[txt_1]" size="32" maxlength="32" value="" id="attrib-1-5" />	
						?>
						<input type="text" 
						       name="id[txt_<?=$options_id?>]" 
						       size="32" 
						       maxlength="32" 
						       value="" 
						       id="attrib-<?=$options_id?>-<?=$options_values_id?>" 
						/>
						<?
						break;
						
					// Radio
					case 2:					
						// an ZenCart übergeben wird sowas wie:
						// <input type="radio" name="id[1]" value="3" id="attrib-1-3" />					
					  echo $options_values_name. " ";
					  ?>
					  <input type='radio'
						       name='id[<?=$options_id?>]'
						       value='<?=$options_values_id?>'
						       id='attrib-<?=$options_id?>-<?=$options_values_id?>' 
						/>
						<?
						break;
					
					// Checkbox
					case 3:		
						// an ZenCart übergeben wird sowas wie:
						// <input type="checkbox" name="id[1][3]" value="3" id="attrib-1-3" />
						break;
					
					// File
					case 4:				
						// an ZenCart übergeben wird sowas wie:
						// <input type="file" name="id[txt_1]"  id="attrib-1-5" /><br />
	          // <input type="hidden" name="upload_5" value="1" />
						// <input type="hidden" name="txt_upload_5" />
						break;
					
					// Read Only
					case 5:					
						// an ZenCart übergeben wird sowas wie:
						// L<br />M<br />S<br />XL<br />XXL<br />
						break;
					default:
						break;
				} // (ENDE switch)
			} // (ENDE if)
			
			$i++;
		} // (ENDE while)
		
		// der Button 'okay' (Submit) 
		// Je nachdem, ob text/motiv/upload ausgewählt ist, wird über Javascript
		// ein Vorschaubild gespeichert. (aber NICHT, wenn dieses kurz zuvor schon 
		// gespeichert wurde, zB. wenn User nur vergessen hat, Stückzahl anzugeben)
		?>
		<input type='submit' 
				   name='submit' 
				   value='okay' 
				   <? 
				  	if ($_SESSION['knzShowTextMotivUpload'] == "text") { 
				  		// wenn nicht kurz zuvor schonmal das Bild gespeichert wurde 
				  		if ($_SESSION['filenameVorschaubildText'] == "") { ?>
				  			onkeydown="twMachVorschaubildTextMitSave() "
				   	 		onmousedown="twMachVorschaubildTextMitSave() " <?
				  		} 
				   	}
				   	if ($_SESSION['knzShowTextMotivUpload'] == "motiv") { 
				   		// wenn nicht kurz zuvor schonmal das Bild gespeichert wurde 
				  		if ($_SESSION['filenameVorschaubildMotiv'] == "") { ?>
				  			onkeydown="twMachVorschaubildMotivMitSave() "
				   	 		onmousedown="twMachVorschaubildMotivMitSave() " <?
				  		}
				   	} 
				   	if ($_SESSION['knzShowTextMotivUpload'] == "upload") { 
				   		// wenn nicht kurz zuvor schonmal das Bild gespeichert wurde 
				  		if ($_SESSION['filenameVorschaubildUpload'] == "") { ?>
				  			onkeydown="twMachVorschaubildUploadMitSave() "
				   	 		onmousedown="twMachVorschaubildUploadMitSave() " <?
				  		}
				   	} ?>
		/> <? // (ende submit-Button)
	} // (ENDE if) 
	
	// wenn KEINE Attribute für diesen Artikel existieren (in ZenCart)
	else {
		echo "Zu diesem Artikel existieren keine Attribute!<br />";
	} ?>
	
		</fieldset>
	</form>
	<!-- Anzeige der Attribute dieses Artikels END --> <?
} 





/**
 * 
 */
function twA4ShowFormLeer($str) { ?>
	<!-- Auswahl Größen (leeres Fieldset) START -->	
	<form name='frmA4' method='post' action='<?=$_SERVER['PHP_SELF']?>'>
		<fieldset>
			<legend>
				4. Größe, Anzahl und Druckart wählen 
				<a href="index.htm" onmouseover="TagToTip('tttA4FieldsetLegend')">
					<img src="<?=$_SESSION['dirImg']?>icon16-fragezeichen02.jpg" />
				</a>
			</legend> <?
			if (!empty($str)) {
				echo $str;
			} else {
				echo "&nbsp;";
			} ?>
		</fieldset>
	</form>
	<!-- Auswahl Größen (leeres Fieldset) END -->	
	<?		
}

?>
