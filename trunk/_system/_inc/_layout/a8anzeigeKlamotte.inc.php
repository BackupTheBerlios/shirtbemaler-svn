<!-- Anzeige Klamotte START (270x340)-->
<?
$dirArtikelbilder = $_SESSION['dirImgArtikelBreit270'];
//$dirArtikelbilder = $_SESSION['dirShopImgArtikel'];
?>
<div id="vorschauVorne" 
     style="background-image: url( <?
	if (empty($_SESSION['filenameArtikelbildBreit270'])) {
		echo "img/defaultVorschau.gif";
	} else {
		echo $dirArtikelbilder. $_SESSION['filenameArtikelbildBreit270'];
	}?>
     ); 
            background-repeat: no-repeat;
            width:270px; 
            height:400px;">
	<img id="vorschauVorneDruckbild" style="border:0px;" <?
		// wenn 'Text' ausgewählt ist
		if ($_SESSION['knzShowTextMotivUpload'] == "text") {
			if (!empty($_SESSION['filenameVorschaubildText'])) { ?>
				src="<?=$_SESSION['dirVorschauVorneText']. $_SESSION['filenameVorschaubildText']?>" <?
			} else { ?>
				src="img/einPixelTransp.gif" <?
			}
		} 
		// wenn 'Motiv' ausgewählt ist
		else if ($_SESSION['knzShowTextMotivUpload'] == "motiv") {
			if (!empty($_SESSION['filenameVorschaubildMotiv'])) { ?>
				src="<?=$_SESSION['dirVorschauVorneMotiv']. $_SESSION['filenameVorschaubildMotiv']?>" <?
			} else { ?>
				src="img/einPixelTransp.gif" <?
			}
		} 
		// wenn 'Upload' ausgewählt ist
		else if ($_SESSION['knzShowTextMotivUpload'] == "upload") {
			if (!empty($_SESSION['filenameVorschaubildUpload'])) { ?>
				src="<?=$_SESSION['dirVorschauVorneUpload']. $_SESSION['filenameVorschaubildUpload']?>" <?
			} else { ?>
				src="img/einPixelTransp.gif" <?
			}
		} 
		// wenn NICHT 'Text', 'Motiv' ODER 'Upload' ausgewählt ist
		else { ?>
			src="img/einPixelTransp.gif" <?
		} ?>
	</img>    
</div>
<!-- Anzeige Klamotte END -->
