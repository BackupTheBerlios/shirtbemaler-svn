<html><head><title>Shirtbemaler -> Admin -> Artikelbilder hochladen (02)</title></head>
<body>

<h3>Artikelbilder hochladen (02)</h3>

<?
$dir      = $_POST['dir'];
$filename = $_POST['filename'];
$arrKategorien  = array("sweat", "tsk", "tsl", "polo");
$arrDruckereien = array("cold", "doeb", "dres1", "dres2");
$arrHersteller  = array("fotl", "han", "aaa", "bbbbb");

?>

Dateiname für <img src="<?=$dir. $filename?>" /> festlegen:
<br /><br />
Generiere hier den Artikelname, Artikelnummer und Dateiname.<br />
(Dateiname ohne Dateiendung == Artikelname == Artikelnummer)<br />
<span style="font-size:1.2em;">kategorie_druckerei_hersteller_name.dateiendung</span>
<br />

<form action="artikelbilderHochladen03.php" method="post"> <?
	twShowSelectionKategorien($arrKategorien);
	echo "_";
	twShowSelectionDruckereien($arrDruckereien);
	echo "_";
	twShowSelectionHersteller($arrHersteller);
	echo "_";
	twShowInputFilename(twParseFilename($filename)); ?>
	
	<input type="hidden" name="dir" value="<?=$dir?>" />
	<input type="hidden" name="filename" value="<?=$filename?>" />
	<input type="submit" name="submit" value="generiere" />
</form>

<hr>
<a href="artikelbilderHochladen.php">zurück zu Artikelbild hochladen</a>


</body>
</html>

<?
/* Funktionen --------------------------------------------------------------- */


function twShowSelectionKategorien($arrKategorien) { ?>
	<select name="selectKategorien" size="1"> <?
		foreach($arrKategorien as $kategorie) { ?>
			<option><?=$kategorie?></option> <?
		} ?>
  </select> <?
}

function twShowSelectionDruckereien($arrDruckereien) { ?>
	<select name="selectDruckereien" size="1"> <?
		foreach($arrDruckereien as $druckerei) { ?>
			<option><?=$druckerei?></option> <?
		} ?>
  </select> <?
}

function twShowSelectionHersteller($arrHersteller) { ?>
	<select name="selectHersteller" size="1"> <?
		foreach($arrHersteller as $hersteller) { ?>
			<option><?=$hersteller?></option> <?
		} ?>
  </select> <?
}

function twShowInputFilename($arrFilename) { 
	$name        = $arrFilename[0];
	$dateiendung = $arrFilename[1]; 
	//echo "---". $name. "---". $dateiendung. "---"; 
	?>
	<input name="hiddenDateiendung" type="hidden" value="<?=$dateiendung?>" />
	<input name="inputName" type="text" size="10" value="<?=$name?>" />
	.<?=$dateiendung?> <?
}

function twParseFilename($filename) {
	$index = strpos($filename, '.');
	$name = substr($filename, 0, $index);     // z.B: grins
	$dateiendung = substr($filename, $index + 1); // z.B: jpg
	// echo "---". $name. "---". $dateiendung. "---";
	return array($name, $dateiendung);
}
