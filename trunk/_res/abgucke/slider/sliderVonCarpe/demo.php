<?
/*
 * Slider mit CSS und Javascript. (von http://carpe.ambiprospect.com/slider/)
 * im head-Bereich die js- und css-Dateien einbinden
 * 
 * guck für kommerzielle Nutzung musste nachfrage...
 * für nicht-kommerzielle Nutzung nen Link.
 */
?>

<head>
	<title>Carpe-Slider von carpe.ambiprospect.com/slider/ --- Demo</title>
	<link rel="stylesheet" type="text/css" href="default.css" />
	<script type="text/javascript" src="slider.js"></script>
</head>
<body>
<h3>Carpe-Slider von carpe.ambiprospect.com/slider/ --- Demo</h3>


<!-- Carpe-Slider START -->
<?/*
style="left/top"   -> position des Sliders
display id         -> die id des <input> im zweiten <div> (Anzeige mit der Zahl)
from - to          -> von-bis
value              -> der derzeitige Wert
typelock="off"     -> User kann auch in display(Anzeige) ne zahl eintippen
*/?>
<!-- der Slider ansich -->
<div class="carpe_horizontal_slider_track">
	<div class="carpe_slider_slit">
		&nbsp;
	</div>
	<div class="carpe_slider"
       id="your_slider_id"
       orientation="horizontal"
       distance="100"
       display="your_display_id"
       style="left: 0px;">
		&nbsp;
	</div>
</div>

<!-- die Anzeige zum Slider (display) -->
<div class="carpe_slider_display_holder" >
	<input class="carpe_slider_display"
         id="your_display_id"
         name="your_var_name"
         type="text"
         from="0"
         to="100"
         valuecount="101"
         value="0"
         typelock="off" />
</div>
<!-- Carpe-Slider END -->


<!-- nur zum Testen START -->
<br /><br />
<script>
function guck() {
	var aaa = document.getElementById('your_display_id').value;
	alert ("derzeitiger Wert des Sliders (in value):\n" + aaa);
}
</script>
<a href="" onclick="guck()">guck</a>
<!-- nur zum Testen END -->


</body>
</html>
