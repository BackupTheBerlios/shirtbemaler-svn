<?
session_start();

$datei = $_GET['datei'];
 
// http://progtw.myftp.org/shirtbemaler/img/motive/
echo "<img src='". $_SESSION['urlImgMotive']. $datei. "' />";
?>


<!--
<a href="#" 
   onclick="javascript:window.open('/de/fensterBildansicht.php?zoom_graphic=zoom_3293.png&PHPSESSID=578f73b19503f363db5eb2ed183cf69c',
                                   'Fonts',
                                   'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=245,height=250'); return false;">
-->								
									