<html>
<head>
	<title>twFarbwechsler01 - Demo</title>
	<link href="twFarbwechsler.css" rel="stylesheet" type="text/css" >
  <script src="twFarbwechsler.js" type="text/javascript"></script>
</head>
<body>


<div>
	bla<br />
	bla<br />
	bla<br />
	bla<br />
	bla<br />
</div>



<div id="shirtFarbig" z-index="10">
	<div id="shirtLeer" z-index="20">
		<img id="imgShirtTransp" src="shirtTransp.gif" />
	</div>
</div>


<div id="farbpalette" z-index="20">
	<?
	$arrFarben = array("ffffff", "e7e7ec", "c8d0d9", "a6aeb5", "fdbb38", "ff6600", "cd3243", "6c2f3e", "9a8e7a", "37523f", "415643", "8DD0F0", "4c7c9e", "3c5291", "313d57", "283844", "585d6d", "000000");
	$i = 0;
	foreach ($arrFarben as $farbe) {
		$i++; ?>
		<span class="farbe" 
		      onclick="rkFarbeWechseln(this); return false" 
					style=" cursor: pointer; background-color: #<?=$farbe?>;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</span> <?
	}
	?>
</div>




</body>
</html>