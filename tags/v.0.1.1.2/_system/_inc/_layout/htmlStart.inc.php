<?
//$css = "http://progtw.myftp.org/shirtbemaler/_system/_css/style.css";
//$js1  = "http://progtw.myftp.org/shirtbemaler/_system/_js/js01.js";
//$js2  = "http://progtw.myftp.org/shirtbemaler/_system/_js/managerFarbe.js";
$css = $_SESSION['url_css']. "style.css";
$js1 = $_SESSION['url_js']. "js01.js";
$js2 = $_SESSION['url_js']. "twManagerFarbe.js";
$js3 = $_SESSION['url_js']. "twManagerAblauf.js";
?>

<html>
<head>
  <title>Shirtbemaler</title>
  <link rel="stylesheet" type="text/css" href="<?=$css?>">
  <script src="<?=$js1?>" type="text/javascript"></script>
  <script src="<?=$js2?>" type="text/javascript"></script>
  <script src="<?=$js3?>" type="text/javascript"></script>
  <script type="text/javascript" src="http://progtw.myftp.org/shirtbemaler/_system/_zusatz/twSchatten01/twSchatten01.js"></script>
  <script type="text/javascript">
		window.onload = function() {
			/* twMachSchatten("className","styleName"); */ 
			twMachSchatten("img.schattenbild1","schatten1");
			twMachSchatten("img.schattenbild2","schatten2");
			twMachSchatten("img.schattenbild3","schatten3");
			}
	</script>
</head>
<body>
<script type="text/javascript" src="_system/_zusatz/tooltips/walterzorn_de/wz_tooltip.js"></script>
<script type="text/javascript" src="_system/_zusatz/tooltips/walterzorn_de/tip_balloon.js"></script>
