<?
/*
 * Je nachdem, was der User ausgewählt hat, wird hier entweder die Auswahl von
 * Text, Motiv oder Upload angezeigt.
 * bei Text: -wenn User in ein Formularelement klickt, wird twMachVorschaubildTextOhneSave()
 *            in js01.js aufgerufen (dort wird dann ein Bild aus den 
 *            User-Eingaben erzeugt und auf der Klamotte abgebildet)
 * bei Motiv: -hier werden alle Mini-Bilder der vorhandenen Motive angezeigt
 *            -wenn der User eins anklickt, wird twMachVorschaubildMotivOhneSave in js01.js
 *             aufgerufen (dort wird dann das ausgewählte Bild auf der 
 *             Klamotte abgebildet und Session-Variablen gesetzt)
 * bei Upload: -hier kann der User eine Datei auf seinem PC zum Upload auswählen
 *             -wenn er nach der Auswahl auf 'hochladen' klickt, wird Mimetype
 *              geprüft, die Datei in ein temp. Verz. auf den Server geladen und
 *              auf der Webseite angezeigt
 *             -klickt man auf dieses angezeigte Bild, wird twMachVorschaubildUploadOhneSave
 *              in js01.js aufgerufen (dort wird dann das ausgewählte Bild auf 
 *              der Klamotte abgebildet und Session-Variablen gesetzt)
 * 
 * !!! das Formular ist hier noch IM Fiedset, weiß nich ob das Probs macht? !!!
 */

?>



<!-- Anzeige Text/Motiv/Upload START -->
<fieldset>
	<legend>
		3. Klamotte bemalen 
		<a href="index.htm" onmouseover="TagToTip('tttA3FieldsetLegend')">
			<img src="<?=$_SESSION['dirImg']?>icon16-fragezeichen02.jpg" />
		</a>
	</legend>

	<!-- Tabbed Navigation Alles START -->
	<div id="a3TabbedAll" class="<?=twHoleClassZuId('a3TabbedAll')?>">
	
		<!-- Tabbed Navigation: Tabbeds START -->
		<ul id="a3TabbedTabs" class="<?=twHoleClassZuId('a3TabbedTabs')?>">
			<li<?=twMachIdHier("text");  ?>>
				<a href="<?=$_SERVER['PHP_SELF']?>?knzShowTextMotivUpload=text">
					Text
				</a>
				<!--
				<a href="index.htm" onmouseover="TagToTip('tttA3TabText')">
					<img src="<?=$_SESSION['dirImg']?>icon16-fragezeichen02.jpg" />
				</a>
				-->
			</li>
			<li<?=twMachIdHier("motiv");  ?>>
				<a href="<?=$_SERVER['PHP_SELF']?>?knzShowTextMotivUpload=motiv">
					Motiv
				</a>
				<!--
				<a href="index.htm" onmouseover="TagToTip('tttA3TabMotiv')">
					<img src="<?=$_SESSION['dirImg']?>icon16-fragezeichen02.jpg" />
				</a>
				-->
			</li>
			<li<?=twMachIdHier("upload");  ?>>
				<a href="<?=$_SERVER['PHP_SELF']?>?knzShowTextMotivUpload=upload">
					Upload
				</a>
				<!--
				<a href="index.htm" onmouseover="TagToTip('tttA3TabUpload')">
					<img src="<?=$_SESSION['dirImg']?>icon16-fragezeichen02.jpg" />
				</a>
				-->
			</li>
		</ul>
		<!-- Tabbed Navigation: Tabbeds END -->
		
		
		<!-- Tabbed Navigation: Inhalt START -->
		<div id="a3TabbedInhalt" class="<?=twHoleClassZuId('a3TabbedInhalt')?>">
			
			<?
			// kommtVon: 'neueSession'
			if ($_SESSION['knzKommtVon'] == "neueSession") {
				echo "";
			} 
			
			// kommtVon: 'zencartBoxInfopages'
			else if ($_SESSION['knzKommtVon'] == "zencartBoxInfopages") {
				echo "";
			} 
			
			// kommtVon: 'zencartBtnOpenWithShirtbemaler'
			else if ($_SESSION['knzKommtVon'] == "zencartBtnOpenWithShirtbemaler") {
				echo "";
			} 
			
			// kommtVon: 'a1'
			else if ($_SESSION['knzKommtVon'] == "a1") {
				echo "Einfach Text, Motiv oder Upload auswählen, je nachdem, was aufgedruckt werden soll.";
			}
			
			// kommtVon: 'a3Tab'
			else if ($_SESSION['knzKommtVon'] == "a3Tab") {
				// wenn "eigenen Text eingeben" gewählt wurde
				if ($_SESSION['knzShowTextMotivUpload'] == "text") {
					twA3ShowText();			
				}	
				// wenn "vorgegebenes Motiv benutzen" gewählt wurde
				if ($_SESSION['knzShowTextMotivUpload'] == "motiv") {
					twA3ShowMotiv();			
				}	
				// wenn "eigenes Bild hochladen" gewählt wurde
				if ($_SESSION['knzShowTextMotivUpload'] == "upload") {
					twA3ShowUpload();			
				}	
			}
			
			// kommtVon: 'a3Hochladen'
			else if ($_SESSION['knzKommtVon'] == "a3Hochladen") {
				twA3ShowUpload();
			} 
			
			// kommtVon: 'a4Submit'
			else if ($_SESSION['knzKommtVon'] == "a4Submit") {				
				// wenn die Eingaben okay sind
				if ($_SESSION['knzValidEingaben'] == "") {
					echo "okay";
				} 				
				// wenn die Eingaben NICHT okay sind
				else {
					// wenn das Tab "eigenen Text eingeben" gewählt wurde
					if ($_SESSION['knzShowTextMotivUpload'] == "text") {
						// wenn noch KEIN Text-Bild erstellt wurde (vom User)
						if ($_SESSION['filenameVorschaubildText'] == "") {
							twA3ShowText();			
						}
						// wenn schon ein Text-Bild erstellt wurde (vom User)
						else {
							echo "okay";
						}
					}	
					// wenn "vorgegebenes Notiv benutzen" gewählt wurde
					if ($_SESSION['knzShowTextMotivUpload'] == "motiv") {
						twA3ShowMotiv();			
					}	
					// wenn "eigenes Bild hochladen" gewählt wurde
					if ($_SESSION['knzShowTextMotivUpload'] == "upload") {
						twA3ShowUpload();			
					}	
				}
			}
			
			// kommtVon: 'a5Nein'
			else if ($_SESSION['knzKommtVon'] == "a5Nein") {
				// wenn "eigenen Text eingeben" gewählt wurde
				if ($_SESSION['knzShowTextMotivUpload'] == "text") {
					twA3ShowText();			
				}	
				// wenn "vorgegebenes Motiv benutzen" gewählt wurde
				if ($_SESSION['knzShowTextMotivUpload'] == "motiv") {
					twA3ShowMotiv();			
				}	
				// wenn "eigenes Bild hochladen" gewählt wurde
				if ($_SESSION['knzShowTextMotivUpload'] == "upload") {
					twA3ShowUpload();			
				}	
			}  
			else {
				// nix
			} 
			?>

		</div>
		<!-- Tabbed Navigation: Inhalt END-->
		
	</div>
	<!-- Tabbed Navigation Alles END -->

</fieldset>
<!-- Anzeige Text/Motiv/Upload END -->





<?
/* Funktionen --------------------------------------------------------------- */

/**
 * Zeigt die Texteingabe an, in der der User seinen Text zusammenstellen kann.
 * 
 * In der Auswahl-Listbox werden die Schriftarten-Bezeichnungen gleich in der
 * jeweiligen Schriftart angezeigt (mit Bildern und Pseudoelement :before),
 * das klappt aber im IE und Opera leider nich !!! (die kleinen Bilderchens
 * liegen auch im Schriften-Verzeichnis und wurden vorher mühevoll erstellt..)
 * siehe: js:twMachVorschaubildTextOhneSave(), id="schrift1" bis 5, schriftarten.inc.php
 * vorschauVorneDruckbild, 
 */
function twA3ShowText() { ?>
	<input id="delete_starttext" name="delete_starttext" value="True" type="hidden">
	<form>				
		<div> <?
			$arrZeilen = array("1", "2", "3", "4", "5");
			foreach ($arrZeilen as $zeile) { ?>
				<span> <? 
					twZeigeAuswahlSchriftart($zeile); ?>
				</span>
				<span> <? 
					twZeigeAuswahlSchriftfarbe($zeile); ?>
      	</span>
      	<span> <? 
      		twZeigeAuswahlSchriftgroesse($zeile); ?>
      	</span> 
				<span> <? 
					twZeigeTexteingabe($zeile); ?>
				</span> <?
			} ?>
		</div>				
	</form> <?
}


/**
 * Zeigt die Motivauswahl an, in der der User ein Motiv auswählen kann.
 * 
 * Die Transparenz der Motive auf der Klamotte sieht noch Scheiße aus!!!
 * siehe: twHoleBilderVonDir(), twMachTumbnail(), js:twMachVorschaubildMotivOhneSave(),
 * js:window.open
 * Verzeichnis- und Dateinamen noch ändern...!!!
 * Zu überlegen wäre noch die Thumbs zu speichern und mit readfile() zu prüfen
 */
function twA3ShowMotiv() {
	$verzMotive       = $_SESSION['dirImgMotive'];        // (img/motive/)
	$verzMotiveMini   = $_SESSION['dirImgMotiveHoch40'];  // (img/motive/hoch60/)
	$rootdirMotive    = $_SESSION['dirDocumentRoot']. $_SESSION['dirApplication']. $verzMotive; // /var/www/shirtbemaler/img/motive/
	$arrFilenamesMotivMini = twHoleBilderVonDir($verzMotiveMini);
	?>
	
	
	<table class="a3TableMotive"><tr>
	<?
	// für jedes einzelne Motiv
	foreach ($arrFilenamesMotivMini as $filenameMotivMini) {
		$motiv         = twHoleMotivVonFilename($filenameMotivMini);
		$filenameMotiv = twHoleFilenameOrigVonMotiv($motiv);
		$size          = getimagesize($verzMotive. $filenameMotiv);
		?>
		
		<td class="a3TableMotiveTd">
			<span style="float: left;">
				<img src="<? echo $verzMotiveMini. $filenameMotivMini; ?>" 
				     style="cursor:pointer; cursor:hand;" 
				     onclick="javascript:twMachVorschaubildMotivOhneSave('<?=$verzMotive?>', '<?=$filenameMotiv?>')
				              javascript:twManageFarbe('a3') " />
				<br />
				<a href="#" 
				   onclick="javascript:window.open('<?=$_SESSION['dirDe']?>fensterBildansicht.php?datei=<?=$filenameMotiv?>',
				                                   'Motiv',
				                                   'dependent=yes,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,width=<?=$size[0]+16?>,height=<?=$size[1]+16?>'); return false;">
					<img src="<?=$_SESSION['dirImg']?>zoom.png" width="16" height="16" border="0" title="Zoom" />
				</a>
			</span> 
		</td>
		<?
	} ?>
	</tr></table> <?
}



/**
 * guck mal extra:  http://www.verot.net/php_class_upload.htm
 */
function twA3ShowUpload() {
	// Upload-Button wurde geklickt
	if( isset($_POST['submit']) && $_POST['submit']=="hochladen") {
		
		// prüfen, ob Datei hochgeladen wurde (in ein temp. Verz auf dem Server)
		// und ob sie von einem zugelassenen MimeType (Dateiendung) ist.	
		$arrMimetypes = array("image/jpg", "image/jpeg", "image/png", "image/gif");
		$errMsg = twUploadValid($_FILES['datei'], $arrMimetypes);
		// wenn ein Fehler beim Upload auftrat
		if ($errMsg != "twOkay") {
			echo $errMsg. "<br />";
				?><a href="<?=$_SERVER['PHP_SELF'];?>">nochmal probieren</a><br /><?
		}
		// wenn Datei OKAY (in ein temp. Verz.) hochgeladen wurde		
		else {
			///echo "erstma ins temp-Verzeichnis uffn Server geladn OKAY<br />";
			// nun diese Datei in Verzeichnis aufm Server speichern (img/uploads/)
			$errMsg = twUploadSave($_SESSION['dirUpload']);
			if ($errMsg != "twOkay") {
				echo $errMsg. "<br />";
					?><a href="<?=$_SERVER['PHP_SELF'];?>">nochmal probieren</a><br /><?
			}
			else {
				// alles hat geklappt...
				echo "Das Bild <b>". $_FILES['datei']['name']. "</b> wurde erfolgreich hochgeladen.<br /><br />";
				echo "Nun das Bild einfach anklicken, um es auf der Klamotte anzuzeigen.<br />";
				?>
				<img src="<?=$_SESSION['dirUpload']?><?=$_FILES['datei']['name']?>" 
				     style="cursor:pointer; cursor:hand;" 
				     onclick="javascript:twMachVorschaubildUploadOhneSave('<?=$_SESSION['dirUpload']?>', '<?=$_FILES['datei']['name']?>');
				              javascript:twManageFarbe('a3')"
				/>
				<br /><br />
				oder ein 
				<a href="<?=$_SERVER['PHP_SELF'];?>">anderes Bild hochladen</a><br /><?
			}
		}			
	} 
	// Upload-Button wurde noch NICHT geklickt (Formular anzeigen)
	else {?>
		<form enctype='multipart/form-data' method='post' action='<?=$_SERVER['PHP_SELF']?>'>
 			<input type='hidden' name='MAX_FILE_SIZE' value='1000000000000' /> 
			ein Bild auf deinem PC auswählen<br />
 			<input type='file' name='datei' /><br />
 			und dieses ausgewählte Bild hochladen<br />
 			<input type='submit' name='submit' value='hochladen' />
 		</form> <?
	}
}




/**
 * Zeigt eine Box zur Auswahl der Schriftfarbe an an.
 * ID's:
 *   "auswahl_schriftfarbe_anzeige_zeile_<?=$zeile?>" -das sichtbare Feld (img) in einer Zeile
 *   "auswahl_schriftfarbe_hidden_zeile_<?=$zeile?>"  -zum Übermitteln
 *   "auswahl_schriftfarbe_box_zeile_<?=$zeile?>"     -die gesamte Auswahl-Box für eine Zeile
 *   "farben_<?=$zeile?>_<?=$i?>"                     -jede einzelne Schriftgröße für eine Zeile
 */
function twZeigeAuswahlSchriftfarbe($zeile) { 
	// die vorgegebenen Farben
	$arrFarben = array("000000", 
                     "004994",
                     "007108",
                     "3996D6",
                     "6B0000",
                     "ADADAD",
                     "CEB673",
                     "D63018",
                     "EF82A5",
                     "EFFF29",
                     "FF970F",
                     "FFD801",
                     "FFFFFF");
	?>
	
	<?/* das sichtbare Feld zur Auswahl der Schriftfarbe */?> 
	<input id="auswahl_schriftfarbe_anzeige_zeile_<?=$zeile?>"
	       onclick="twMachBoxFarbauswahl(<?=$zeile?>);" 
	       style="border: 1px solid fuchsia; 
	              background-color: #ffd801; 
	              cursor:pointer; cursor:hand;
	              width: 22px; 
	              height: 22px;" 	       
         readonly="readonly" >
	</input>
	
	<?/* hidden-Feld zum Übermitteln der vom User gewählten Schriftfarbe */?>
	<input id="auswahl_schriftfarbe_hidden_zeile_<?=$zeile?>" 
	       name="farbe<?=$zeile?>" 
	       value="FFD801" 
	       type="hidden" >
	</input>
	
	<?/* die Box mit der Schrftfarben-Auswahl für diese Zeile */?>
	<div id="auswahl_schriftfarbe_box_zeile_<?=$zeile?>" 
	     style="position: absolute; 
	            top: 100px; 
	            left: 100px; 
	            border: 1px solid fuchsia;  
	            background-color: lavender; 
	            z-index: 998;
	            display: none;" 
	     onmousemove="twMachBoxFarbauswahl('<?=$zeile?>')">
		<?
		$i=0;
		// für jede einzelne Schriftfarbe (ID: farben_X_X) dieser Zeile
		foreach ($arrFarben as $farbe) { ?>
			<span>
				<?// EINE mögliche Schriftfarbe dieser Zeile (in der Box)
				// (color und bg gleich, weil value den Wert für Javascript enthält)
				?>
				<input id="farben_<?=$zeile?>_<?=$i?>" 
				       type="text" 
				       value="<?=$farbe?>"
				       style="width: 16px; 
				              height: 16px; 
				              background-color: #<?=substr($farbe, 0, 6)?>;
				              color: #<?=substr($farbe, 0, 6)?>;" 
				       onclick="twCloseBoxFarbauswahl('<?=$zeile?>');
				                document.getElementById('auswahl_schriftfarbe_hidden_zeile_<?=$zeile?>').value = document.getElementById('farben_<?=$zeile?>_<?=$i?>').value;
				                twMachVorschaubildTextOhneSave();" 	       
     					 readonly="readonly" >
     		</input>
			</span> <?
			$i++;
		} ?>
	</div> <?
}




/* Funktionen --------------------------------------------------------------- */

/**
 * Zeigt eine Box zur Auswahl der Schriftgröße an an.
 * ID's:
 *   "auswahl_schriftgroesse_anzeige_zeile_<?=$zeile?>" -das sichtbare Feld in einer Zeile
 *   "auswahl_schriftgroesse_hidden_zeile_<?=$zeile?>"  -zum Übermitteln
 *   "auswahl_schriftgroesse_box_zeile_<?=$zeile?>"     -die gesamte Auswahl-Box für eine Zeile
 *   "groessen_<?=$zeile?>_<?=$i?>"                     -jede einzelne Schriftgröße für eine Zeile
 */
function twZeigeAuswahlSchriftgroesse($zeile) { 
	// die vorgegebenen Schriftgrößen
	$arrGroessen = array("10", 
                       "14",
                       "18",
                       "24",
                       "36");
	?>
	
	<?/* das sichtbare Feld zur Auswahl der Schriftgröße */?> 
	<input id="auswahl_schriftgroesse_anzeige_zeile_<?=$zeile?>" 
	       onclick="twMachBoxAuswahlSchriftgroesse(<?=$zeile?>);"
	       style="border: 1px solid fuchsia; 
	              background-color: lavender;
	              cursor:pointer; cursor:hand; 
	              width: 22px; 
	              height: 22px;"
	       value="18" 
         readonly="readonly" >
	</input>
  	
	<?/* hidden-Feld zum Übermitteln der vom User gewählten Schriftgröße */?>
	<input id="auswahl_schriftgroesse_hidden_zeile_<?=$zeile?>" 
	       name="groesse<?=$zeile?>" 
	       value="18" 
	       type="hidden" >
	</input>
	
	<?/* die Box mit der Schrftgrößen-Auswahl für diese Zeile */?>
	<div id="auswahl_schriftgroesse_box_zeile_<?=$zeile?>" 
	     style="position: absolute; 
	            top: 100px; 
	            left: 100px; 
	            border: 2px solid fuchsia;
	            background-color: #ffcccc;  
	            z-index: 998; 
	            display: none;" 
	     onmousemove="twMachBoxAuswahlSchriftgroesse('<?=$zeile?>')">
		
		<?
		$i=0;
		// für jede einzelne Schriftgröße (ID: groessen_X_X) dieser Zeile
		foreach ($arrGroessen as $groesse) { ?>
			<?/* EINE mögliche Schriftgröße dieser Zeile (in der Box)*/?>
			<input id="groessen_<?=$zeile?>_<?=$i?>" 
		       	 type="text" 
		         value="<?=$groesse?>"
		         style="width: 20px; 
			              height: 20px;
			              margin:1px;
	             			cursor:pointer; cursor:hand; 
			              background-color: #ffffcc" 
			       onclick="twCloseBoxAuswahlSchriftgroesse('<?=$zeile?>');
			                document.getElementById('auswahl_schriftgroesse_hidden_zeile_<?=$zeile?>').value = document.getElementById('groessen_<?=$zeile?>_<?=$i?>').value;
			                twMachVorschaubildTextOhneSave();" 	       
    				 readonly="readonly" >
    </input>
		<?
		$i++;
		} ?>
	</div> <?
}


/**
 * Zeigt ein Feld (<input readonly>) zur Auswahl einer Schriftart an.
 * Beim Anklicken öffnet sich eine (schon erstellte) Auswahlbox.
 * Diese Auswahlbox existiert vorher schon, war jedoch mit CSS auf display:none;
 * Die Schriftarten-Namen werden als Bild(vorher separat erstellen!)dargestellt
 * (das ist zwar etwas umständlich, aber wegen dem IE zur Anzeige nötig).
 * ID's:
 *   "auswahl_schriftart_anzeige_zeile_<?=$zeile?>"      -das sichtbare Feld in einer Zeile
 *   "auswahl_schriftart_hidden_zeile_<?=$zeile?>"       -zum Übermitteln
 *   "auswahl_schriftart_vorschaubild_zeile_<?=$zeile?>" -wegen der URL
 *   "auswahl_schriftart_box_zeile_<?=$zeile?>"          -die gesamte Auswahl-Box für eine Zeile
 *   "arten_<?=$zeile?>_<?=$i?>"                      -jede einzelne Schriftgröße für eine Zeile
 *   "vorschaubilder_<?=$zeile?>_<?=$i?>"             -und das Vorschaubild dazu
 */
function twZeigeAuswahlSchriftart($zeile) { 
	// die vorgegebenen Schriftarten
	$arrSchriften = array("augie", "CoventryGarden", "Creampuff", "Ding-DongDaddyO", "DymaxionScript", "HerzogVonGraf", "LittleLordFontleroy", "LittleRickeyNF", "LostWages", "MiddleEarthNF", "MiltonBurlesque", "MondoRedondo", "Monkey-Fingers", "Nickelodeon", "Nickley-NormalA", "PackardClipperNF", "PleasinglyPlump", "PublicEnemy", "QuigleyWiggly", "RhumbaScript", "ShangriLaNFSmallCaps", "SmorgasbordNF", "SnappyService", "TeamSpirit", "TradingPostNF", "TwoForJuanNF", "Underground", "Unicorn", "UppenArmsNF");
	?>
	<?/* das sichtbare Feld zur Auswahl der Schriftart */?>  
	<input id="auswahl_schriftart_anzeige_zeile_<?=$zeile?>" 
         onclick="twMachBoxAuswahlSchriftart(<?=$zeile?>);"
         style="border: 1px solid fuchsia; 
                background-image: url('<?=$_SESSION['urlFonts']?>augie.gif'); 
	              cursor:pointer; cursor:hand;
                width: 100px; 
                height: 22px;" 
         readonly="readonly" >
	</input>
		
	<?/* hidden-Feld zum Übermitteln der vom User gewählten Schriftart */?>
	<input id="auswahl_schriftart_hidden_zeile_<?=$zeile?>" 
	       name="art<?=$zeile?>" 
	       value="augie" 
	       type="hidden" >
	</input>
	
	<?/* und für die URL zum Schrift-Vorschaubild */?>
	<input id="auswahl_schriftart_vorschaubild_zeile_<?=$zeile?>" 
	       value="url('<?=$_SESSION['urlFonts']?>augie.gif')" 
	       type="hidden" >
	</input>
	
	<?/* die Box mit der Schrftart-Auswahl für diese Zeile */?>
	<div id="auswahl_schriftart_box_zeile_<?=$zeile?>" 
	     style="border: 1px solid rgb(0, 0, 0); z-index: 999; position: absolute; top: 100px; left: 100px; z-index: 998; background-color: rgb(255, 255, 255); display: none;" 
	     onmousemove="twMachBoxAuswahlSchriftart('<?=$zeile?>')">
		<?
		$i=0;
		// für jede einzelne Schriftart (ID: arten_X_X) dieser Zeile
		foreach ($arrSchriften as $schrift) { ?>
			<?/* ein Feld in den Auswahlfeldern */?>
			<input style="background-image: url('<?=$_SESSION['urlFonts']?><?=$schrift?>.gif');
			              border: 1px solid blue;" 
			       onclick="twCloseBoxAuswahlSchriftart('<?=$zeile?>');
			                document.getElementById('auswahl_schriftart_hidden_zeile_<?=$zeile?>').value = document.getElementById('arten_<?=$zeile?>_<?=$i?>').value;
			                document.getElementById('auswahl_schriftart_vorschaubild_zeile_<?=$zeile?>').value = document.getElementById('vorschaubilder_<?=$zeile?>_<?=$i?>').value;
			                twMachVorschaubildTextOhneSave();"
             readonly="readonly">
			</input>
			
			<?/* EINE mögliche Schriftart dieser Zeile (in der Box)*/?>
			<input id="arten_<?=$zeile?>_<?=$i?>" 
			       value="<?=$schrift?>" 
			       type="hidden" 
			/>
			       
			<?/* und die URL für das Vorschaubild der Schriftart*/?>
			<input id="vorschaubilder_<?=$zeile?>_<?=$i?>" 
			       value="url('<?=$_SESSION['urlFonts']?><?=$schrift?>.gif')" 
			       type="hidden" 
			/>
			 <?
			$i++;
		}
		?>
   	
	</div>
 <?
}


/**
 * Zeigt ein Textfeld zur Eingabe des Textes für eine Zeile an.
 */
function twZeigeTexteingabe($zeile) { 
	?>
	
	<input type="text"
	       id="text<?=$zeile?>" 
	       value="Textzeile <?=$zeile?>"
	       style="font-size:1.2em;" 
	       size="6" 
	       maxlength="30" 
	       onmouseup="javascript:twMachVorschaubildTextOhneSave()" 
	       onkeyup=  "javascript:twMachVorschaubildTextOhneSave()
	                  javascript:twManageFarbe('a3')" 
	       name="zeile1" 
	       tabindex="1"  /> 
	
	<?	
}


function twMachIdHier($str) {
	if ($str == $_SESSION['knzShowTextMotivUpload']) {
		return " id=\"hier\"";
	}
	return "";
}	

?>
