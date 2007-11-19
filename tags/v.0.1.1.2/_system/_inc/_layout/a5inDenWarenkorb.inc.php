<?
/**
 * Wird von index.php includet.
 * 
 * -Wenn in ./a4auswahlGroesse.inc.php der Button 'okay' geklickt wurde:
 *    wird hier eine kurze Zusammenfassung des Artikels 
 *    und 1 Reset-Button und 1 Submit-Button ('in den Warenkorb'') angezeigt
 * 
 * -Wenn in ./a4auswahlGroesse.inc.php der Button 'okay' NICHT geklickt wurde:
 *    nur ne Meldung anzeigen, dass noch was fehlt
 */

// wenn der Shop zum aller-ersten mal aufgerufen wurde (neue Session)
if ($_SESSION['knzKommtVon'] == "neueSession") {
	twA5ShowFormLeer("");
}
// wenn in Zencart in der Box Infopages (auf Shirtbemaler) geklickt wurde
else if ($_SESSION['knzKommtVon'] == "zencartBoxInfopages") {
	twA5ShowFormLeer("");
}
// wenn in ZENCART der Button "im Shirtbemaler bemalen" geklickt wurde
else if ($_SESSION['knzKommtVon'] == "zencartBtnOpenWithShirtbemaler") {
	twA5ShowFormLeer("");
}
// nur wenn eine Klamotte NEU ausgesucht wurde 
else if ($_SESSION['knzKommtVon'] == "a1") {
	twA5ShowFormLeer("");
}
// nur wenn Text/Motiv/Upload NEU ausgesucht wurde 
else if ($_SESSION['knzKommtVon'] == "a3Tab") {
	twA5ShowFormLeer("");
}
// nur wenn in a4auswahlGroesse.inc.php auf 'hochladen' geklickt wurde 
else if ($_SESSION['knzKommtVon'] == "a3Hochladen") {
	twA5ShowFormLeer("");
} 
// nur wenn in a4AuswahlGroesse.inc.php der Button 'okay' geklickt wurde 
else if ($_SESSION['knzKommtVon'] == "a4Submit") {
	if ($_SESSION['knzValidEingaben'] == "") {
		twA5ShowForm();
	} else {
		twA5ShowFormLeer("");
	}
} 
// nur wenn in a5inDenWarenkorb.inc.php der Button 'nein' geklickt wurde 
else if ($_SESSION['knzKommtVon'] == "a5Nein") {
	twA5ShowFormLeer("");
}
else {
}
 


/*
// wenn der 'okay'-Button (in a4auswahlGroesse.inc.php) geklickt wurde
if (!empty($_POST['submit']) && $_POST['submit']=="okay") {
	twA5InDenWarenkorb();
}
// wenn der 'okay'-Button (in a4auswahlGroesse.inc.php) NICHT geklickt wurde
else {
	twA5ShowFormLeer("");
}
*/
?>



<?
/* Funktionen --------------------------------------------------------------- */

/**
 * Wird angezeigt, solange der Button 'okay' in a4auswahlGroesse.inc.php 
 * noch NICHT geklickt wurde.
 */
function twA5ShowFormLeer($str) { ?>
	<!-- a5-inDenWarenkorb (okay wurde nicht geklickt) START -->
	<form>
		<fieldset>
			<legend>
				5. in den Warenkorb legen 
				<a href="index.htm" onmouseover="TagToTip('tttA5FieldsetLegend')">
					<img src="<?=$_SESSION['dirImg']?>icon16-fragezeichen02.jpg" />
				</a>
			</legend>
			<?=$str?>
		</fieldset>
	</form>
	<!-- a5-inDenWarenkorb (okay wurde nicht geklickt) END -->
<?
}


/**
 * Formular, um den/die Artikel in den Warenkorb zu legen.
 * 
 * Wird aufgerufen, wenn der Button 'okay' in a4auswahlGroesse.inc.php 
 * geklickt wurde.
 * Zeigt eine kurze Zusammenfassung des vom User zusammengestellten Artikels und
 * einen Reset-Button und einen Submit-Button an.
 * 
 * bekommt:
 * von a4auswahlGroesse.inc.php:
 *   $_POST['............']        // ???
 *   ... (noch machen: text/motiv/upload - druckbildsache)
 * 
 * übergibt:
 * bei Klick auf 'in den Warenkorb'(submit) wird index.php aufgerufen:
 * mit folgenden GET-Variablen:
 *   $_GET['main_page']   = "product_info"       // damit index.php weiß, was angezeigt werden soll
 *   $_GET['cPath']       =                      // Kategorie-Nummer
 *   $_GET['products_id'] =                      // product_id von ZenCart (wird ja eigentlich auch schon mit POST(hidden) übergeben)
 *   $_GET['action']      = "add_product"        // sagt, dass der/die Artikel in den Warenkorb gelegt werden soll/en
 *   $_GET['twIsComingFromInternalFrame'] = "ja" //Knz für ein Javascript, das Frames killt (in .../twTemplate/common/tpl_main_page.php)
 * mit folgenden POST-Variablen:
 *   $_POST['products_id']     //(hidden)(die ZenCart-ID des Artikels)
 *   $_POST['cart_quantity']   //(hidden)(die Anzahl der Artikels)
 *   $_POST['id[XXX]']         //(hidden)(die ID des Attributes)
 *   $_POST['reset']  = 'Nein, Werte nochmal ändern'  oder:
 *   $_POST['submit'] = 'Ja, in den Warenkorb legen'
 * 
 * !!! noch machen:
 * - die "products_id" ermitteln
 * - die "cPath" ermitteln
 * - Attribute (zB: Größe, Anzahl) mit übergeben, bzw. vor der Übergabe $productsArray aktualisieren 
 * (siehe ZenCart: /includes/modules/pages/shoppimg_cart/header.php
 *                 /includes/templates/twTemplate/templates/tpl_shopping_cart_default.php
 *                 /includes/classes/shopping_cart.php) 
 */
function twA5ShowForm() {
	
	// vorhandene Session-Variablen
	$artikel                 = $_SESSION['artikel'];              // Name des Artikels (Shirtbemaler)
	$products_id             = $_SESSION['zencart_products_id'];  // Artikel-ID für ZenCart
	// bekommene POST-Variablen (mit twHoleArtikelvarianten in ein Array gemacht)
	$artikelvarianten = twHoleArtikelvarianten($_POST);
	$anzahl           = $artikelvarianten[0]['anzahl'];             // Anzahl zu kaufender Artikel dieser Größe
	$attribute        = $artikelvarianten[0]['attribute'];
	
//	$options_id          = $artikelvarianten[0]['attribute'][$i]['options_id'];         // (z.B: 1 (id von Größe))
//	$options_values_id   = $artikelvarianten[0]['attribute'][$i]['options_values_id'];  // (z.B: 3 (id von XXL))	
//	$options_name        = twDbSelect_products_options_name($options_id);               //Attribut-Name   (zB Größe)
//	$options_values_name = twDbSelect_products_options_values_name($options_values_id); //Attributmerkmal (zB XXL)	
	
	// sonstige Variablen	
	$artikelBildKlein      = "<img src='". $_SESSION['dirImgArtikelHoch32']. $_SESSION['filenameArtikelbildHoch32']. "' />";
	$artikelBildGross      = "<img src='". $_SESSION['dirImgArtikelBreit270']. $_SESSION['filenameArtikelbildBreit270']. "' />";
	$artikelDruckbildKlein = "";
	$artikelDruckbildGross = ""; 
	$artikelDruckbildVorne = "<img src='". $_SESSION['dirVorschauVorneText']. $_SESSION['filenameVorschaubildText']. "' />";
	///echo "aaa". $artikelDruckbildVorne. "<br />";
	
	if ($_SESSION['knzShowTextMotivUpload'] == "motiv") {
		$artikelDruckbildKlein   = "<img src='". $_SESSION['dirImgMotiveHoch40']. $_SESSION['filenameMotivbildHoch40']. "' />";
		$artikelDruckbildGross   = "<img src='". $_SESSION['dirImgMotive']. $_SESSION['filenameVorschaubildMotiv']. "' />";
		/*$artikelDruckbildGross   = "<img id='arschloch' />";*/
	}
	if ($_SESSION['knzShowTextMotivUpload'] == "text") {	
		$artikelDruckbildKlein = "<img src='". $_SESSION['dirVorschauVorneText']. $_SESSION['artikel']. ".png' />";
		$artikelDruckbildGross = ""; 
	}
	if ($_SESSION['knzShowTextMotivUpload'] == "upload") {		
	}	
	// Variablen für die GET-Übergabe (mit der URL)
	$twForGet_zencartUrl  = $_SESSION['urlZencart']. "index.php";
	$twForGet_main_page   = "product_info";
	$twForGet_cPath       = twDbSelect_master_categories_id($_SESSION['artikel']);
	$twForGet_action      = "add_product";
	$twForGet_twIsComingFromInternalFrame = "ja";
	
	// Variablen für die Attribute der Artikel
	// !!! teilweise noch HARDCODED !!! 
	$twAttribut_products_options_name        = "Größe";
	$twAttribut_options_values_id            = "5";
	$twAttribut_products_options_values_name = "XXL";
	$twAttribut_options_values_price         = 0.0000;
	$twAttribut_price_prefix                 = "+";
	//$twForPost_attributes = array($twAttribut_products_options_name, $twAttribut_options_values_id, $twAttribut_products_options_values_name, $twAttribut_options_values_price, $twAttribut_price_prefix);
	?>
	
	
	
	<!-- a5-inDenWarenkorb START -->
	<form name="cart_quantity" 
      	action="<?=$twForGet_zencartUrl?>?main_page=<?=$twForGet_main_page?>&cPath=<?=$twForGet_cPath?>&action=<?=$twForGet_action?>&twIsComingFromInternalFrame=<?=$twForGet_twIsComingFromInternalFrame?>" 
      	method="post" 
      	enctype="multipart/form-data">
		<fieldset>
			<legend>
				5. in den Warenkorb legen 
				<a href="index.htm" onmouseover="TagToTip('tttA5FieldsetLegend')">
					<img src="<?=$_SESSION['dirImg']?>icon16-fragezeichen02.jpg" />
				</a>
			</legend>
			<?
			// Ausgabe einer Meldung (entweder fehlt was, oder alles okay)
			echo twMachMeldung($artikel, 
			                   $anzahl,
			                   $attribute); 
			
			// hidden-Felder:
			// products_id
			?>
			<input type="hidden" 
  	         name="products_id" 
  	         value="<?=$products_id?>" 
  	  /> <?
  	  
  	  // Anzahl 
  	  ?>    
  	  <input type="hidden" 
  	         name="cart_quantity" 
  	         value="<?=$anzahl?>" 
  	  /> <?
			
			// Attribute
			foreach ($attribute as $attribut) { ?>  	  
	  	  <input type="hidden" 
	  	         name="id[<?=$attribut['options_id']?>]" 
	  	         value="<?=$attribut['options_values_id']?>" 
	  	  /> <?
			} ?>
			
			<input type="submit" 
  	         value="Ja, in den Warenkorb legen" 
  	  /> 
		</fieldset>
	</form>
	
	<form method='post' action='<?=$_SERVER['PHP_SELF']?>'>
		<input type='submit'
			   	 name='submit' 
		       value='Nein, Werte nochmal ändern' 
		/>  
	</form>
	<!-- a5-inDenWarenkorb END --> 
	<?	
}



/* Funktionen --------------------------------------------------------------- */

/**
 * Liefert einen String. Entweder die Zusammenfassung des Artikels oder eine
 * Meldung über das, was noch fehlt.
 */
function twMachMeldung($artikel, $anzahl, $attribute) {	
	$arrFehler = array();	
	$str = "";
	
	$str .= "kurze Zusammenfassung:<br />";
	$str .= "<table class='a5Table'>";
				
	// Artikel
	if (!empty($artikel)) {
		$str .= "<tr><td class='a5TableTd'>Artikel</td><td class='a5TableTd'>". $artikel. "</td></tr>";
	} else {
		$arrFehler[] = "- Bitte einen Artikel auswählen!<br />";
	}
	
	// Anzahl
	if (!empty($anzahl)) {
		$str .= "<tr><td class='a5TableTd'>Anzahl</td><td class='a5TableTd'>". $anzahl. "</td></tr>";
	} else {
		$arrFehler[] = "- Bitte eine Anzahl angeben!<br />";
	}
	
	// Attribute (ACHTUNG: entweder $attributwertId ODER $attributwertName)
	foreach ($attribute as $attribut) {
		$attributName     = twDbSelect_products_options_name($attribut['options_id']);
		$attributwertId   = $attribut['options_values_id'];
		$attributwertName = twDbSelect_products_options_values_name($attribut['options_values_id']);
		
		if ($attributName == "Größe") {
			$str .= "<tr><td class='a5TableTd'>". $attributName. "</td><td class='a5TableTd'>". $attributwertName. "</td></tr>";
		}
		if ($attributName == "Vorschaubild vorn") {
			$str .= "<tr><td class='a5TableTd'>". $attributName. "</td><td class='a5TableTd'>". twToStringVorschaubildFuerA5(). "</td></tr>";
		}
		if ($attributName == "Druckbild vorn") {
			// nix
		}
		if ($attributName == "Druckart") {
			$str .= "<tr><td class='a5TableTd'>". $attributName. "</td><td class='a5TableTd'>". $attributwertName. "</td></tr>";
		}
	}
	$str .= "</table>";
	
	// wenn alles OKAY ist (also alle wichtigen Werte vorhanden sind)
	if (empty($arrFehler)) {
		// nix tun, alles okay
	} else {
		return $arrFehler;
	}	
	
	return $str;
}





/* Funktionen --------------------------------------------------------------- */

/**
	 * Liefert einen String, der das vollständige html-Tag '<img>' enthält.
	 * Das <img>-Bild ist das Vorschaubild für den Warenkorb (100hoch).
	 * Das Bild hat als Hintergrund (mit style eingebunden) das Artikelbild (100).
	 * Das Hintergrundbild sieht man aber nur, weil das Vorschaubild transp. ist.
	 */
	function twToStringVorschaubildFuerA5() {
		$str = "";
		$hintergrundbild = $_SESSION['dirImgArtikelHoch100']. $_SESSION['filenameArtikelbildHoch100'];	
		$vorschaubild = "";
		if ($_SESSION['knzShowTextMotivUpload'] == "text") {
			$vorschaubild = $_SESSION['dirVorschauFuerWarenkorb']. $_SESSION['filenameVorschaubildText'];
		}
		if ($_SESSION['knzShowTextMotivUpload'] == "motiv") {
			$vorschaubild = $_SESSION['dirVorschauFuerWarenkorb']. $_SESSION['filenameVorschaubildMotiv'];
		}
		if ($_SESSION['knzShowTextMotivUpload'] == "upload") {
			$vorschaubild = $_SESSION['dirVorschauFuerWarenkorb']. $_SESSION['filenameVorschaubildUpload'];
		}
		
		$size            = getimagesize($hintergrundbild); // : "height=xxx width=xxx"	
		
		// ACHTUNG: \"-Sache...
		$str .= "<img ";
		$str .= "src=\"". $vorschaubild. "\" ";
		$str .= "style=\"background-image: url(". $hintergrundbild. ")\" ";
		$str .= "width=\"". $size[0]. "\" ";
		$str .= "height=\"". $size[1]. "\" ";
		$str .= "/>";
		
		///$str = "<img src=\"". $vorschaubild. "\" style=\"border:1px solid red; background-image: url(". $hintergrundbild. ");\" />";
		return $str;  
	}




?>
