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
Dieses Skript baut die Seite auf, die den Iframe beinhaltet. Hier werden auch die CSS Variablen
aus der config.php eingelesen.
*/
require_once "skript.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de-DE" lang="de-DE">
  <head>
    <title>« Galerie »</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <meta name="Generator" content="script by http://um-fritz.de" />   
    <style type="text/css">
<?PHP
echo <<<CSS1
    * {margin:0; padding:0; border:0;}
    html {overflow:auto;}
    body {
      text-align:center; 
      background:$background_gal_body;
      color:$color_gal_body; 
      font-family:$font_family_gal_body; 
      font-size:100.1%;
    }
    body * {text-align:left;}
    div#header {
      width:$header_gal_breite; 
      margin:0 auto;
    }
    h1 {
      color:$color_gal_h;
      background:$background_gal_h;
      font-size:130%;
      line-height:2em; 
    }
    h2 {
      color:$color_gal_h;
      background:$background_gal_h;
      font-size:90%;
      font-weight:bold;
    }
    p.link {
      text-align:right; 
      margin-top:0.5em;
      padding-right:16px;
      line-height:$linkleiste_gal_hoehe;
      font-size:70%; 
      font-weight:bold;
      border:$border_galerie;
      border-bottom:none;
      background:$background_gal_leiste;
    }
    p.link a { 
      background:$background_gal_link; 
      color:$color_gal_link; 
      text-decoration:none; 
      line-height:$linkleiste_gal_hoehe;
    }
    span#aktives_album {
      cursor:pointer;
      background:$background_gal_link_hover; 
      color:$color_gal_link_hover;
    }
    p.link a, span#aktives_album, span#lleiste_kat {
      padding:0 2px;
      line-height:$linkleiste_gal_hoehe;
      margin:0 3px;
    }
    p.link a:hover, p.link a:focus {
      background:$background_gal_link_hover; 
      color:$color_gal_link_hover;
    }
    p#backlink {
      width:auto;
      float:left;
      border-right:none;
    }    
    p#backlink a {
      line-height:$linkleiste_gal_hoehe;
    }
    #gal_holder {
      width:$totale_gal_breite; 
      height:$gal_hoehe; 
      border:$border_galerie; 
      margin:0 auto;
      clear:both;
    }
    div#gal_tn {
      overflow:auto; 
      width:$gal_thumbnailleiste_breite; 
      height:$gal_hoehe; 
      white-space:nowrap;  
      float:right;
      text-align:center; 
      border-left:$border_galerie;
      background:$background_gal_thumbnailleiste;
    }
    div#gal_tn a {
      display:block; 
      margin:0 auto; 
      text-align:center;
      margin-top:3px;
      margin-bottom:3px;
      outline:none;
    }
    div#gal_tn a img { margin:0 auto;}
    iframe {
      width:$gal_iframe_breite; 
      height:$gal_hoehe; 
      padding:0; 
      float:right;
      overflow:auto;
      background:$background_gal_iframedoc;
    }
    p#umf {
    text-align:right;
    font-size:65%;
    width:$totale_gal_breite;
    margin:0 auto;
    background:$background_gal_umf;
    border:$border_galerie;
    border-top:none;
    }
    p#umf a {
      color:$color_gal_body; 
      font-weight:bold; 
      text-decoration:none; 
      line-height:1.4em;
      margin-right:16px;
    }
    p#umf a:hover, p#umf:focus {text-decoration:underline;}
CSS1;
?>

    </style>
    
<?PHP
echo <<<CSS2
    <!--[if lt IE 6]>
    <style type="text/css">
    div#header {
      width:$header_gal_breite_IElt6;
    }
    #gal_holder {
      width:$totale_gal_breite_IElt6;
    }
    </style>
    <![endif]-->
CSS2;
?>

  </head>
  
  
<body>
  <div id="header">
  	<!-- Überschrift -->
  	<h1><?php echo UEBERSCHRIFT; ?></h1>
  	<?php echo $aktives_album; ?>
  	<p id ="backlink" class="link"><?php echo BACKLINK; ?></p>
  	
  	<!-- Zeile mit 'Galerie Start' -->
  	<p class="link album"><?php echo $alben_links; ?></p>
  </div>
  
  
  <div id="gal_holder">	
    <div id="gal_tn">
			<?php echo $gal_links; ?>
    </div>    
    <iframe src="frame.php<?php echo $frame_parameter ?>" id="bild" name="bild" frameborder="0">
    	Ihr Browser unterstützt leider keine eingebetteten Frames
    </iframe>
  </div>
  
  <!-- Fußzeile -->
  <p id="umf">
  	script by 
  	<a href="http://um-fritz.de"  target="_blank" title="webseitenerstellung">um-fritz.de</a>
  </p>
</body>

</html>