<!-- Auswahl Text-Motiv START -->
<?
/*
 * Hier wird vom User ausgew�hlt, ob Text, Motiv oder Bild-Upload drauf soll.
 * (es wird die index.php selbst aufgerufen und 'text', 'motiv' oder 'upload'
 *  mit GET �bergeben (...und dort dann die Session-Variable gesetzt) )
 */
?>

<form>
	<fieldset>
		<legend>2. Was soll drauf?</legend>
		
		<span>
			<a href="<?=$_SERVER['PHP_SELF']?>?knzShowTextMotivUpload=text">eigener Text</a>
		</span>
		---
		<span>
			<a href="<?=$_SERVER['PHP_SELF']?>?knzShowTextMotivUpload=upload">eigenes Bild</a>
		</span>
		---
		<span>
			<a href="<?=$_SERVER['PHP_SELF']?>?knzShowTextMotivUpload=motiv">oder ein Motiv</a>
		</span>
	</fieldset>
</form>
<!-- Auswahl Text-Motiv END -->




<!--von Martin...
		<a href='#' onclick="auswahl('klamote1')">eigenen Text eingeben</a><br />
		<a href='#' onclick="auswahl('klamote2')">vorhandenes Motiv ausw�hlen</a><br />
		<a href='#' onclick="auswahl('klamote3')">eigenes Bild benutzen (hochladen)</a>
		<div id='kla'>
			&nbsp;
		</div>
		<script type=text/javascript>
  		function auswahl(wert){
  			document.getElementById("kla").firstChild.nodeValue = wert;
  			document.getElementById("anzeigeTextMotiv").firstChild.nodeValue = wert;
  		}
		</script>
-->