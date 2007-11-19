<?php
//$url = $HTTP_REFERER;
//$url = $_SERVER['HTTP_REFERER'];
$url = $_SERVER['REDIRECT_SCRIPT_URI'];
echo "Wir haben die Struktur unserer Webseite umgestellt.<br />";
echo "Eventuell ist deshalb Ihre angeforderte Seite nicht mehr unter dieser speziellen Adresse erreichbar.<br /><br /><hr>";
echo "<a href=\"http://www.progtw.de\">zur neuen Startseite von progtw.de</a> <hr>";
echo "<a href=\"http://blog.progtw.de\">Zum Blog von Thomas Weise (blog.progtw.de)</a> <hr>";

?>
<!-- interne Suche mit Google START -->
<form action=http://www.google.de/search
      method="get">
      <!-- target="_new" (könnte noch mit rein) -->
  progtw.de durchsuchen:
  <input style="font-size: 8pt"
         size="15"
         name="q">
  <input type="hidden"
         value="site:progtw.de"
         name="q">
  <input style="font-size: 8pt"
         type="submit"
         value="los"
         name="btng">
</form>
<hr>
<!-- interne Suche mit Google END -->
<?



$serverdaten = "";
foreach ($_SERVER as $key => $val) {
        $serverdaten .= $key. ": \t". $val. "\n";
}

$meel = "w";
$meel .= "eb";
$meel .= "mas";
$meel .= "ter";
$meel .= "@";
$meel .= "pro";
$meel .= "gtw";
$meel .= ".";
$meel .= "de";

$from = "\"Fehlermeldung: 404\" <". $meel. ">\nReturn-Path: ". $meel. "\n";
$recipient = $meel;
$maildata  = "Diese Mail wurde von der eigenen Fehlerseite generiert ;-) \n";
$maildata .= "(404 File not found).:\n". $url. " \n\n";
$maildata .= "Das Array _SERVER enthält folgende Daten: \n\n";
$maildata .= $serverdaten;
@mail($recipient, "Fehlermeldung 404", $maildata, "FROM: $from");
?>