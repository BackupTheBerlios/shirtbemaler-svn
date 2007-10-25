<? 
session_start(); 
error_reporting(E_ALL);
include_once("./includeAll.inc.php");
$twDbConn = twDbConn(); // NEUE Db-Verbindung (am Skriptende soll: twDbClose())

 

twManageSessionvarKnzKommtVon();
twManageSessionvarKnzValidEingaben();

//echo "(in index)-session-id: ". session_id(). "<br />";
//echo "aaa index Textbild:". $_SESSION['filenameVorschaubildText']. "<br />";
//echo "aaa index VorschaubildMotiv:". $_SESSION['filenameVorschaubildMotiv']. "<br />";
//echo "aaa index Uploadbild:". $_SESSION['filenameVorschaubildUpload']. "<br />";

?>
<!--
<a href="index.htm" onmouseover="Tip('Irgendein<br /> Text')">ToolTipTest</a>
<br />
<a href="index.htm" onmouseover="TagToTip('ttt01')">ToolTipTest mit TagToTip() </a>
<br />
--> 
<?




 
// wenn der Shop zum aller-ersten mal aufgerufen wurde (neue Session)
if ($_SESSION['knzKommtVon'] == "neueSession") { 
	///echo "aaa index kommtVon 'neueSession'<br />";	
	
	// erstmal die Session-Variablen initialisieren
	twInitSessionVariablen();
	// Session-Verzeichnisse für diese Session anlegen (mit Unterverzeichnissen)
	if (twInitSessionVerzeichnisse() == false) {
		echo"Fehler beim Anlegen der Session-Verzeichnisse!<br />";
	}
	
	twManageAblauf("neueSession");
	twManageAmpelfarben("neueSession");
} 




 
// wenn in Zencart in der Box Infopages (auf Shirtbemaler) geklickt wurde
if ($_SESSION['knzKommtVon'] == "zencartBoxInfopages") { 
	///echo "aaa index kommtVon 'zencartBoxInfopages'<br />";
	
	twManageAblauf("start");
	twManageAmpelfarben("start");
	//twSetSessionvarArtikelzeug();
} 




// wenn in ZENCART der Button "im Shirtbemaler bemalen" geklickt wurde
if ($_SESSION['knzKommtVon'] == "zencartBtnOpenWithShirtbemaler") {
	///echo "aaa index kommtVon 'zencartBtnOpenWithShirtbemaler'<br />";
	
	twManageAblauf("zencartBtnOpenWithShirtbemaler");
	twManageAmpelfarben("zencartBtnOpenWithShirtbemaler");
	twSetSessionvarArtikelzeug();
}
 



 
// nur wenn eine Klamotte NEU ausgesucht wurde 
if ($_SESSION['knzKommtVon'] == "a1") {
	///echo "aaa index kommtVon 'a1'<br />";
	
	twManageAblauf("a1");
	twManageAmpelfarben("a1");
	twSetSessionvarArtikelzeug();
}





 
// nur wenn Text/Motiv/Upload NEU ausgesucht wurde 
if ($_SESSION['knzKommtVon'] == "a3Tab") {
	///echo "aaa index kommtVon 'a3Tab'<br />";
	
	twManageAblauf("a3Tab");
	twManageAmpelfarben("a3Tab");
} 




 
// nur wenn in a4auswahlGroesse.inc.php auf 'hochladen' geklickt wurde 
if ($_SESSION['knzKommtVon'] == "a3Hochladen") {
	///echo "aaa index kommtVon 'a3Hochladen'<br />";
	
	twManageAblauf("a3Hochladen");
	twManageAmpelfarben("a3Hochladen");
} 





// nur wenn in a4AuswahlGroesse.inc.php der Button 'okay' geklickt wurde 
if ($_SESSION['knzKommtVon'] == "a4Submit") { 
	///echo "aaa index kommtVon 'a4Submit'<br />";
	
	twManageAblauf("a4Submit");
	twManageAmpelfarben("a4Submit");
} 




 
// nur wenn in a5inDenWarenkorb.inc.php der Button 'nein' geklickt wurde 
if ($_SESSION['knzKommtVon'] == "a5Nein") { 
	///echo "aaa index kommtVon 'a5Nein'<br />";
	
	twManageAblauf("a5Nein");
	twManageAmpelfarben("a5Nein");
} 






// immer machen:
include_once($_SESSION['dir_layout']. "htmlStart.inc.php");

/*// nur Testausgabe der Session-Variablen
foreach ($_SESSION as $key => $val) {
	echo $key. ": ". $val. "<br />";
}*/
?>
<table id="aTable">
	<tr>
		<td id="a1" class="<?=twHoleClassZuId('a1')?>" colspan="2">
			<!-- a1 - Auswahl Klamotte START -->
			<? include_once($_SESSION['dir_layout']. "a1auswahlKlamotte.inc.php"); ?>
			<!-- a1 - Auswahl Klamotte END -->
		</td>
	</tr>


	<tr>
		<td id="a3" class="<?=twHoleClassZuId('a3')?>">
			<!-- a3 - Design Klamotte START -->
			<? include_once($_SESSION['dir_layout']. "a3designKlamotte.inc.php"); ?>
			<!-- a3 - Design Klamotte END -->
		</td>		
		<td id="a8" rowspan="3" width="276">
			<!-- a8 - Anzeige Klamotte START -->
			<? include_once($_SESSION['dir_layout']. "a8anzeigeKlamotte.inc.php"); ?>
			<!-- a8 - Anzeige Klamotte END -->
		</td>
	</tr>
	<tr>		
		<td id="a4" class="<?=twHoleClassZuId('a4')?>">
			<!-- a4 - Auswahl Größe START -->
			<? include_once($_SESSION['dir_layout']. "a4auswahlGroesse.inc.php"); ?>
			<!-- a4 - Auswahl Größe END -->
		</td>		
	</tr>
	<tr>
		<td id="a5" class="<?=twHoleClassZuId('a5')?>">
			<!-- a5 - in den Warenkorb START -->
			<? include_once($_SESSION['dir_layout']. "a5inDenWarenkorb.inc.php"); ?>
			<!-- a5 - in den Warenkorb END -->
		</td>
	</tr>
</table>

<?
/*
while (list($key, $val) = each($_SESSION)) {
	echo $key. "---". $val. "<br />";
}
*/
?>




<!-- hidden-Werte START -->
<!--<input name="mode" id="mode_id" value="1" type="hidden">-->
<!--<input name="preview_param_x" id="preview_param_x_id" value="72.56" type="hidden">-->
<!--<input name="preview_param_y" id="preview_param_y_id" value="47.25" type="hidden">-->
<!--<input name="preview_param_y_own" id="preview_param_y_own_id" value="31.05" type="hidden">-->
<!--<input name="preview_param_y_text" id="preview_param_y_text_id" value="51.30" type="hidden">-->
<!--<input name="path_product" id="path_product_id" value="../grafiken/2002/produkte/270/tsbpvorne.jpg" type="hidden">-->
<!--<input name="print_width" id="print_width_id" value="124.88" type="hidden">-->
<!--<input name="pc" id="pc_id" value="ts" type="hidden">-->
<!-- hidden-Werte END -->





<!-- wees nich START -->
<img id="save_schrift_php_values" border="0" height="1" width="1">
<img id="save_additional_designer_values" border="0" height="1" width="1">
<!-- wees nich END -->


<?
twDbClose($twDbConn);
include_once($_SESSION['dir_layout']. "htmlEnd.inc.php"); 
?>
