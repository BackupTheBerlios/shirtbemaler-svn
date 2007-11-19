<?php
/*>====O-------------------------------------------------O====>\
|             ##### s h i r t b e m a l e r #####              |
|      Copyright (c) by progtw (Thomas Weise), 2005-2007       |
|                     http://www.progtw.de                     |
| Dieses Programm ist freie Software. Sie können es unter den  |
| Bedingungen der GNU General Public License 3 (wie von der    |
| Free Software Foundation herausgegeben) weitergeben und/oder |
| modifizieren.                                                |
| Eine Kopie der Lizenzbedingungen finden Sie in lizenz.txt.   |                                                 |
\<====O-------------------------------------------------O====<*/

session_start(); 
error_reporting(E_ALL);
include_once("./includeAll.inc.php");
$twDbConn = twDbConn(); // NEUE Db-Verbindung (am Skriptende soll: twDbClose())

 

twManageSessionvarKnzKommtVon();
twManageSessionvarKnzValidEingaben();
twManageAblauf();
twManageAmpelfarben();

// nur Testausgaben:
///echo "(aaa in index)-session-id : ". session_id(). "<br />";
///echo "aaa in index Textbild :". $_SESSION['filenameVorschaubildText']. "<br />";
///echo "aaa in index VorschaubildMotiv :". $_SESSION['filenameVorschaubildMotiv']. "<br />";
///echo "aaa in index Uploadbild : ". $_SESSION['filenameVorschaubildUpload']. "<br />";
///echo "aaa in index knzKommtVon : ". $_SESSION['knzKommtVon']. "<br />";
///echo "aaa in index knzJavascript : ". $_SESSION['knzJavascript']. "<br />";
///echo "aaa in index knzBrowser : ". $_SESSION['knzBrowser']. "<br />";

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
	///twManageAblauf("neueSession");
	///twManageAmpelfarben("neueSession");
} 




 
// wenn in Zencart in der Box Infopages (auf Shirtbemaler) geklickt wurde
if ($_SESSION['knzKommtVon'] == "zencartBoxInfopages") { 
	///echo "aaa index kommtVon 'zencartBoxInfopages'<br />";	
	///twManageAblauf("start");
	///twManageAmpelfarben("start");
	
	//twSetSessionvarArtikelzeug();
} 




// wenn in ZENCART der Button "im Shirtbemaler bemalen" geklickt wurde
if ($_SESSION['knzKommtVon'] == "zencartBtnOpenWithShirtbemaler") {
	///echo "aaa index kommtVon 'zencartBtnOpenWithShirtbemaler'<br />";	
	///twManageAblauf("zencartBtnOpenWithShirtbemaler");
	///twManageAmpelfarben("zencartBtnOpenWithShirtbemaler");
	
	twSetSessionvarArtikelzeug();
}
 



 
// nur wenn eine Klamotte NEU ausgesucht wurde 
if ($_SESSION['knzKommtVon'] == "a1") {
	///echo "aaa index kommtVon 'a1'<br />";	
	///twManageAblauf("a1");
	///twManageAmpelfarben("a1");
	
	twSetSessionvarArtikelzeug();
}





 
// nur wenn Text/Motiv/Upload NEU ausgesucht wurde 
if ($_SESSION['knzKommtVon'] == "a3Tab") {
	///echo "aaa index kommtVon 'a3Tab'<br />";	
	///twManageAblauf("a3Tab");
	///twManageAmpelfarben("a3Tab");
} 




 
// nur wenn in a4auswahlGroesse.inc.php auf 'hochladen' geklickt wurde 
if ($_SESSION['knzKommtVon'] == "a3Hochladen") {
	///echo "aaa index kommtVon 'a3Hochladen'<br />";	
	///twManageAblauf("a3Hochladen");
	///twManageAmpelfarben("a3Hochladen");
} 





// nur wenn in a4AuswahlGroesse.inc.php der Button 'okay' geklickt wurde 
if ($_SESSION['knzKommtVon'] == "a4Submit") { 
	///echo "aaa index kommtVon 'a4Submit'<br />";	
	///twManageAblauf("a4Submit");
	///twManageAmpelfarben("a4Submit");
} 




 
// nur wenn in a5inDenWarenkorb.inc.php der Button 'nein' geklickt wurde 
if ($_SESSION['knzKommtVon'] == "a5Nein") { 
	///echo "aaa index kommtVon 'a5Nein'<br />";	
	///twManageAblauf("a5Nein");
	///twManageAmpelfarben("a5Nein");
} 






// immer machen:
include_once($_SESSION['dir_layout']. "htmlStart.inc.php");

/*// nur Testausgabe der Session-Variablen
foreach ($_SESSION as $key => $val) {
	echo $key. ": ". $val. "<br />";
}*/
?>
<table id="tableIndex">
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




<!-- wees nich START -->
<img id="save_schrift_php_values" border="0" height="1" width="1">
<img id="save_additional_designer_values" border="0" height="1" width="1">
<!-- wees nich END -->



<?
include_once("./_system/_inc/_ttt/ttt.inc.php");
?>


<?
twDbClose($twDbConn);
include_once($_SESSION['dir_layout']. "htmlEnd.inc.php"); 
?>
