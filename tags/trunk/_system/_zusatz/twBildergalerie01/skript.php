<?php
#######################################################################
#  um-Galerie Skript V1.00                                            #
#  zur freien Verwendung, d. h. keinerlei Lizenzen oder Copyright     #
#  ein backlink wäre aber nett!                                       #
#  Auf jeden Fall aber bitte diesen Tag im XHTML Template einbinden:  #
#  <meta name="Generator" content="script by http://um-fritz.de" />   #
#  Danke und viel Spaß!                                               #
#  http://um-fritz.de                                                 #
#######################################################################
/*
Dieses Skript enthält die eigentliche Logik. Hier werden die Informationen aus der Albenliste und
den Bilderlisten eingelesen und verarbeitet. Entsprechend der angeforderten Bilder werden dann, links
konfiguriert und Thumbnails erstellt, wenn nötig.
*/
require_once "config.php";

#Ermitteln ob alben.txt exisitiert und entsprechend einlesen
$album = lese_alben_txt();

#Gewünschtes Album ermitteln, oder Standardalbum ausgeben
$get_album = auswerten_get_album($album);

#Links für Alben erzeugen, sofern mehrere Alben existieren
$alben_links = erstelle_alben_links($album, $get_album);

#Entsprechende Bilderliste aus angefordertem Album einlesen
$bild = lese_bilderliste($get_album);

#Links zu den Bildern erstellen und ggf. Verzeichis für Thumbnails bzw. Thumbnails erstellen
$gal_links = erstelle_gal_links_und_thumbs($bild, $get_album);

#Wenn mehrere Alben existieren und ein Album ausgewählt wurde, aktives Album anzeigen
$aktives_album = zeige_aktives_album($get_album, $album);

#Je nach $_GET Parametern wenn nötig Iframe Inhalt laden
#Dabei wird bei $get_album benutzt, da schon überprüft ob Anfrage $_GET['album']
if (isset($_GET['album'])) {
  if (isset($_GET['bild'])) {
    #Bilddimensionen des grossen Bildes einlesen
    $bild_info = getimagesize(VER_ALBEN."/$get_album/{$_GET['bild']}");
    #Bildbeschreibungstext auslesen
    foreach ($bild as $key=>$wert) {
      if ($wert['dateiname'] == $_GET['bild'] && !empty($wert['beschreibung'])) {
        $alttext = strip_tags($wert['beschreibung']);
        $bildbeschreibung = "<small>{$wert['beschreibung']}</small>";
        break;
      } elseif ($wert['dateiname'] == $_GET['bild'] && empty($wert['beschreibung'])) {
        $alttext = "Bild $key";
        break;
      }
    }
    $output = "<img src=\"".VER_ALBEN."/$get_album/{$_GET['bild']}\" $bild_info[3] alt=\"$alttext\" />$bildbeschreibung\n";
  } else { #$_GET['bild'] nicht gesetzt
    $frame_parameter = "?album={$_GET['album']}&bild={$bild[1]['dateiname']}";
  }
} else { #$_GET leer
    $output = STANDARDBILD;
}

#################################################
#                  Funktionen                   #
#################################################

function lese_alben_txt() {
  if (!file_exists(VER_ALBEN."/alben.txt")) { #Wenn alben.txt nicht exisitiert
    error("no_alben_text", "");
  } else { #alben.txt existiert, einlesen
    $albenliste = file(VER_ALBEN."/alben.txt");
    #Wenn alben.txt leere Datei, Fehlermeldung
    if (empty($albenliste)) {
      error("alben_txt_leer", "");
    } else { #alben.txt is nicht leer
      foreach ($albenliste as $key=>$wert) {
        $b = $key+1;
        if (!preg_match("@\w@", $wert)) { #Überprüfen ob album.txt Leerzeilen enthält
          error("album_txt_leerzeilen", "");
        } else { #album.txt Leerzeilen enthält keine Leerzeilen
          $albenliste[$key] = explode("++", $albenliste[$key]);
          $album[$b]['verzeichnis'] = trim($albenliste[$key][0]);
          $album[$b]['linktext'] = trim($albenliste[$key][1]);
          #Fehlermeldung, falls in album.txt gelistetes Verzeichnis nicht existiert
          if (!is_dir(VER_ALBEN."/".$album[$b]['verzeichnis'])) {
            error("verzeichnis_fehlt", $album[$b]['verzeichnis']);
          }
        }
      }
    }
  }
  return($album);
}

function auswerten_get_album($album) {
  #Aus dem Array album alle Verzeichniseinträge in ein Array schreiben
  foreach ($album as $key=>$wert) {
    $verzeichnisliste[] = $album[$key]['verzeichnis'];
  }
  #Wenn angefordertes Album nicht existiert oder $_GET['album'] leer ist, Standardalbum ausgeben
  if (!in_array($_GET['album'], $verzeichnisliste) || empty($_GET['album'])) {
    $get_album = $album[1]['verzeichnis'];
  } else {
    $get_album = $_GET['album'];
  }
  return($get_album);
}

function erstelle_alben_links($album, $get_album) {
  if (count($album)>1) { #Mehrere Alben vorhanden
    $alben_links = "<span id=\"lleiste_kat\">".LLEISTE_KAT."</span>\n";
    foreach($album as $key=>$wert) {
      if ($get_album == $album[$key]['verzeichnis']) {
        $alben_links .= "<span id=\"aktives_album\" title=\"Aktives Album\">{$album[$key]['linktext']}</span>\n";
      } else {
        $alben_links .= "<a href=\"index.php?album={$album[$key]['verzeichnis']}\" title=\"Ordner öffnen\">{$album[$key]['linktext']}</a>\n";
      }
    }
  } else { #Nur ein Album vorhanden
     $alben_links = "&nbsp;";
  }
return($alben_links);
}

function lese_bilderliste($get_album) {
  if (!file_exists(VER_ALBEN."/".$get_album."/bilderliste.txt")) { #Wenn bilderliste.txt nicht existiert
    error("keine_bilderliste", $get_album);
  } else { #bilderliste.txt existiert, einlesen
    $bilderliste = file(VER_ALBEN."/".$get_album."/bilderliste.txt");
    #Überprüfen, ob bilderliste.txt eine leere Datei ist
    if (empty($bilderliste)) {
      error("bilder_txt_leer", $get_album);
    }
    foreach ($bilderliste as $key=>$wert) {
      $b = $key+1;
      if (!preg_match("@\w@", $wert)) { #Überprüfen ob bilderliste.txt Leerzeilen enthält
        error("bilder_txt_leerzeilen", $get_album);
      } else { #bilderliste.txt enthält keine Leerzeilen
        $bilderliste[$key] = explode("++", $bilderliste[$key]);
        $bild[$b]['dateiname'] = trim($bilderliste[$key][0]);
        $bild[$b]['beschreibung'] = trim($bilderliste[$key][1]);
        #Fehlermeldung, falls in bilderliste.txt gelistetes Bild nicht existiert
        if (!file_exists(VER_ALBEN."/".$get_album."/".$bild[$b]['dateiname'])) {
          $error_txt .= GALERIEPFAD.VER_ALBEN."/".$get_album."/".$bild[$b]['dateiname']."<br />\n";
        }
      }
    }
  }
  if (isset($error_txt)) { #Wenn Bilder genannt werden, die nicht exsistieren:
  error("bild_fehlt", $error_txt);
  } else {
    return($bild);
  }
}

function erstelle_gal_links_und_thumbs($bild, $get_album) {
  foreach ($bild as $key=>$wert) {
  $thumbdateiname = preg_replace("@(.*)\.([jpg|jpeg|png|gif])@", "$1_klein.$2", $bild[$key]['dateiname']);
    if (!file_exists(VER_ALBEN."/".$get_album."/thumbs/".$thumbdateiname)) { #Wenn nicht vorhanden Thumbnail erstellen
      mache_thumbnail($get_album, $bild[$key]['dateiname'], $thumbdateiname);
    }
    $thumb_info = getimagesize(VER_ALBEN."/".$get_album."/thumbs/".$thumbdateiname);
    $alttext = strip_tags($bild[$key]['beschreibung']);
    if (empty($alttext)) {
      $alttext = "Bild $key";
    }
    $gal_links .= "      <a href=\"frame.php?album=$get_album&amp;bild={$bild[$key]['dateiname']}\" target=\"bild\" title=\"Vergrößern\"><img src=\"".VER_ALBEN."/$get_album/thumbs/$thumbdateiname\" $thumb_info[3] alt=\"$alttext\" /></a>\n";
  }
  return($gal_links);
}

function mache_thumbnail($get_album, $bildname, $thumbname) {
  $thumb_verz = VER_ALBEN."/".$get_album."/thumbs";
  if (!is_dir($thumb_verz)) { #Ordner /thumbs nicht vorhanden
    if(!mkdir($thumb_verz, "777")) {
      error("thumb_verz_erstellen", "$get_album");
      }
    }
  #Bildinformationen ermitteln
  $info = getimagesize(VER_ALBEN."/".$get_album."/".$bildname);
  #Ermitteln, welchen Grafiktyp die Datei hat
  switch ($info[2]) {
    case '1' :  #GIF
      #Bildgröße Thumbnail berechnen:
      $thumb_breite = NEUE_BREITE;
      $thumb_hoehe  = round($info[1]/($info[0]/$thumb_breite));
      $bild = imagecreatefromgif(VER_ALBEN."/".$get_album."/".$bildname);
      $neu_bild = imagecreate($thumb_breite, $thumb_hoehe);
      imagecopyresampled($neu_bild, $bild, 0, 0, 0, 0, $thumb_breite, $thumb_hoehe, $info[0], $info[1]);
      if (!imagegif($neu_bild, VER_ALBEN."/".$get_album."/thumbs/".$thumbname, 100)) {
        $thumb_ver_dat = VER_ALBEN."/".$get_album."/thumbs/";
        error("thumb_nicht_erstellt", $thumb_ver_dat);
      }
      imagedestroy($bild);
      imagedestroy($neu_bild);
      return;
    break;
    case '2' :  #JPG
      #Bildgröße Thumbnail berechnen:
      $thumb_breite = NEUE_BREITE;
      $thumb_hoehe  = round($info[1]/($info[0]/$thumb_breite));
      $bild = imagecreatefromjpeg(VER_ALBEN."/".$get_album."/".$bildname);
      $neu_bild = imagecreatetruecolor($thumb_breite, $thumb_hoehe);
      imagecopyresampled($neu_bild, $bild, 0, 0, 0, 0, $thumb_breite, $thumb_hoehe, $info[0], $info[1]);
      if (!imagejpeg($neu_bild, VER_ALBEN."/".$get_album."/thumbs/".$thumbname, 100)) {
        $thumb_ver_dat = VER_ALBEN."/".$get_album."/thumbs/";
        error("thumb_nicht_erstellt", $thumb_ver_dat);
      }
      imagedestroy($bild);
      imagedestroy($neu_bild);
      return;
    break;
    case '3' :  #PNG
      #Bildgröße Thumbnail berechnen:
      $thumb_breite = NEUE_BREITE;
      $thumb_hoehe  = round($info[1]/($info[0]/$thumb_breite));
      $bild = imagecreatefrompng(VER_ALBEN."/".$get_album."/".$bildname);
      $neu_bild = imagecreatetruecolor($thumb_breite, $thumb_hoehe);
      imagecopyresampled($neu_bild, $bild, 0, 0, 0, 0, $thumb_breite, $thumb_hoehe, $info[0], $info[1]);
      if (!imagepng($neu_bild, VER_ALBEN."/".$get_album."/thumbs/".$thumbname, 100)) {
        $thumb_ver_dat = VER_ALBEN."/".$get_album."/thumbs/";
        error("thumb_nicht_erstellt", $thumb_ver_dat);
      }
      imagedestroy($bild);
      imagedestroy($neu_bild);
      return;
    break;
    default:
    $ver_dat = "$get_album/$bildname";
    error ("falsches_grafik_format", $ver_dat);
    echo $content;
    exit;
    break;
  }
  return;
}

function zeige_aktives_album($get_album, $album) {
  if (count($album) > 1 && (AKTIVES_ALBUM_ANZEIGEN == true)) {
    foreach ($album as $key=>$wert) {
      if ($get_album == $album[$key]['verzeichnis']) {
        $aktives_album = "<h2>".AKTIVES_ALBUM.$album[$key]['linktext']."</h2>\n";
        break;
      }
    }
  }
  return ($aktives_album);
}

function error($error_handler, $ver_dat) {
  $content = "<h1>Fehlermeldung</h1>\n<p>";
    switch ($error_handler) {
      case "no_alben_text" :
        $content .= "Bevor Sie die Galerie einsetzen, legen Sie bitte die Datei <strong>".GALERIEPFAD."/".VER_ALBEN."/alben.txt</strong> an.";
        break;
      case "alben_txt_leer" :
        $content .= "Die Datei <strong>".GALERIEPFAD."/".VER_ALBEN."/alben.txt</strong> ist leer. Bitte tragen Sie zumindest ein Verzeichnis nach folgendem Schema ein:<br>\n verzeichnis ++ Name.";
        break;
      case "album_txt_leerzeilen" :
        $content .= "Die Datei <strong>".GALERIEPFAD."/".VER_ALBEN."/alben.txt</strong> enthält leere Zeilen. Bitte löschen Sie alle Leerzeilen.";
        break;
      case "verzeichnis_fehlt" :
        $content .= "Das Verzeichnis <strong>".GALERIEPFAD."/bilder/$ver_dat</strong> wurde in
        <strong>".GALERIEPFAD."/".VER_ALBEN."/alben.txt</strong> angegeben, existiert aber nicht.
        Bitte legen Sie das Verzeichnis an, oder löschen Sie den Eintrag.";
        break;
      case "keine_bilderliste" :
        $content .= "Bevor Sie die Galerie einsetzen, legen Sie bitte die Datei <strong>".GALERIEPFAD."/".VER_ALBEN."/$ver_dat/bilderliste.txt</strong> an.";
        break;
      case "bilder_txt_leer" :
       $content .="Die Datei <strong>".GALERIEPFAD."/".VER_ALBEN."/".$ver_dat."/bilderliste.txt</strong> ist leer. Bitte geben sie die Bilddateien ein.";
        break;
      case "bilder_txt_leerzeilen" :
       $content .="Die Datei <strong>".GALERIEPFAD."/".VER_ALBEN."/".$ver_dat."/bilderliste.txt</strong> enthält leere Zeilen. Bitte löschen Sie alle Leerzeilen.";
        break;
      case "bild_fehlt" :
        $content .="Die Dateien <br />\n<strong> $ver_dat</strong> sind in der Bilderliste angegeben, aber existieren nicht.";
        break;
      case "thumb_verz_erstellen" :
        $content .="Verzeichnis <strong>".GALERIEPFAD."/$ver_dat/thumbs</strong> konnte nicht erstellt werden. Vermutlich sind keine Schreibrechte gesetzt. Geben Sie chmod 777 für <strong>".GALERIEPFAD."/$ver_dat</strong>.";
        break;
      case "falsches_grafik_format" :
        $content .= "Thumbnail kann nicht erstellt werden:<br />\n Die Datei <strong>".GALERIEPFAD."/".VER_ALBEN.$get_album."/".$ver_dat."</strong> hat ein nicht unterstütztes Dateiformat<br />\n Es werden nur JPG und je nach Serverkonfiguration auch GIF und PNG Grafiken unterstützt.";
        break;
      case "thumb_nicht_erstellt" :
        $content .= "Fehler beim Erstellen des Thumbnails in <strong>".GALERIEPFAD."/$ver_dat</strong>. Überprüfen Sie die Rechte dieses Verzeichnisses (Wenn Save Mode aktiv: manuell chmod 777 setzen) oder ob
        <a href=\"http://www.php.net/manual/de/ref.image.php\" title=\"Dokumentation\" target=\_blank\">GD-Bibliothek</a> Ihres Webspaces dieses Format unterstützt";
        break;
        default :
        $content .= "Es ist ein unbekannter Fehler aufgetreten.";
        break;
    }
  $content .= "</p>";
  echo $content;
  exit;
}
?>