/**
Diese Datei versucht das Problem zu umgehen, dass wenn in einer Webseite mehrere
window.onload-Events existieren, nur der letzte benutzt wird.

Also (vereinfacht) zB. im <head> einer Webseite:

<script type="text/javascript">

	// irgendwo die 'zusammenfassende' Funktion hinschreiben
	function twInitWindowOnload() {
		...blablablaNr01...
		...blablablaNr02... usw.
	}
	// und nun aufrufen
	window.onload = function() {
		twInitWindowOnload();
	}
	
</script>

*/

function twInitWindowOnload() {
	alert ("aaa in twInitWindowOnload()");

	/*
	 * für twSchatten:
	 */
	// twMachSchatten("className","styleName");
	twMachSchatten("img.schattenbild1","schatten1");
	twMachSchatten("img.schattenbild2","schatten2");
	twMachSchatten("img.schattenbild3","schatten3");
	
	/*
	 * für twSlider01:
	 */
	twWindowOnloadTwSlider01();

}