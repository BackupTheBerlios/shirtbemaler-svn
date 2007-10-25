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
Dieses Skript wir in den Iframe geladen und stellt das gewünschte grosse Bild dar.
*/
require_once "skript.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de-DE" lang="de-DE">
  <head>
  <title>frame.php</title>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="Generator" content="script by http://um-fritz.de" />   
  <style type="text/css">
<?PHP
echo <<<CSS
  * {margin:0; padding:0; border:none;}
  html, body {height:100%; width:100%; font-family:$font_family_gal_body;}
  body {background:$background_gal_iframedoc; color:$color_gal_iframedoc;}
  table {height:100%; width:$gal_iframe_breite; border-collapse:collapse;}
  td {height:100%; vertical-align:middle; text-align:center; font-weight:bold;}
  small {display:block; padding-top:3px; font-size:70%;}
  img {display:block; margin:0 auto; border:$boder_iframedoc_bild;}
  a {color:$color_gal_link;}
  a:hover {background:$background_gal_link_hover; color:$color_gal_link_hover;}
CSS;
?>
  </style>
  </head>
  <body>
    <table>
      <tr>
        <td>
          <?php echo $output; ?>
        </td>
      </tr>
    </table>
  </body>
</html>