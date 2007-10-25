<html>
<head>
	<title>rkFarbwechsler01 - Demo</title>
	<link href="rkFarbwechsler.css" rel="stylesheet" type="text/css" >
  <script src="rkFarbwechsler.js" type="text/javascript"></script>
</head>
<body>




<div id="tshirtFarbe" class="vorschau" z-index="10">
	<div id="tshirtLeer" class="vorschau" z-index="20">
		<img id="shirttrans" src="shirtkurztrans.gif" />
	</div>
	<div id="farbpalette" z-index="20">
		<table id="tbfarbpalette">
			<tr>
				<td>Shirt-Farbe wählen
			</tr>
			<tr>
				<td colspan="6" align="center">
					<table id="tbpalette" border="1">
						<tr>
							<?
							$arrFarben = array("ffffff", "e7e7ec", "c8d0d9", "a6aeb5", "fdbb38", "ff6600", "cd3243", "6c2f3e", "9a8e7a", "37523f", "415643", "8DD0F0", "4c7c9e", "3c5291", "313d57", "283844", "585d6d", "000000");
							$i = 0;
							foreach ($arrFarben as $farbe) {
								$i++; ?>
								<td id="Farbe<?=$i?>" class="farbe" onclick="rkFarbeWechseln(this); return false" 
    							style=" cursor: pointer; background-color: #<?=$farbe?>;">
								</td> <?
							}
							?>
						</tr>
					</table>
				</td>
			</tr>        
		</table>
	</div>
</div>



</body>
</html>