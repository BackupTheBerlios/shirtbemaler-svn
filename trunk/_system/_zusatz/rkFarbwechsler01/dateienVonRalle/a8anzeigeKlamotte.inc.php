<!-- Anzeige Klamotte START (270x340)-->
<?
$dirArtikelbilder = $_SESSION['dirImgArtikelBreit270'];
//$dirArtikelbilder = $_SESSION['dirShopImgArtikel'];

?>
<div id="vorschauVorne" class="vorschau"
     style="background-image: url( <?
	if (empty($_SESSION['filenameArtikelbildBreit270'])) {
		echo "img/defaultVorschau.gif";
	} else {
		echo $dirArtikelbilder. $_SESSION['filenameArtikelbildBreit270'];
	}?>
     ); 
            background-repeat: no-repeat;" z-index="1">
    
    <?
    //****** Start NEU *****/
    	if($_SESSION['filenameArtikelbildBreit270'] == "t-shirt_orange.jpg") {
    ?>
    <div id="tshirtFarbe" class="vorschau" z-index="10">
    	<div id="tshirtLeer" class="vorschau" z-index="20">
    		<img id="shirttrans" src="img/shirtkurztrans.gif" />
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
                <td id="Farbe1" class="farbe" onclick="rkFarbeWechseln(this); return false" 
                        style=" cursor: pointer; background-color: #ffffff;">
                </td>
                <td id="Farbe2" class="farbe" onclick="rkFarbeWechseln(this); return false" 
                        style=" cursor: pointer; background-color: #e7e7ec;">
                </td>
                <td id="Farbe3" class="farbe" onclick="rkFarbeWechseln(this); return false" 
                        style=" cursor: pointer; background-color: #c8d0d9;">
                </td>
                <td id="Farbe4" class="farbe" onclick="rkFarbeWechseln(this); return false"
                        style=" cursor: pointer; background-color: #a6aeb5;">
                </td>
                <td id="Farbe5" class="farbe" onclick="rkFarbeWechseln(this); return false"
                        style=" cursor: pointer; background-color: #fdbb38;">
                </td>
                <td id="Farbe6" class="farbe" onclick="rkFarbeWechseln(this); return false"
                        style="cursor: pointer; background-color: #ff6600;">
                </td>
                <td id="Farbe7" class="farbe" onclick="rkFarbeWechseln(this); return false"
                        style=" cursor: pointer; background-color: #cd3243;">
                </td>
                <td id="Farbe8" class="farbe" onclick="rkFarbeWechseln(this); return false"
                        style=" cursor: pointer; background-color: #6c2f3e;">
                </td>
                <td id="Farbe9" class="farbe" onclick="rkFarbeWechseln(this); return false"
                        style=" cursor: pointer; background-color: #9a8e7a;">
                </td>
              </tr>
              <tr>                
                <td id="Farbe10" class="farbe" onclick="rkFarbeWechseln(this); return false"
                        style="cursor: pointer; background-color: #37523f;">
                </td>
                <td id="Farbe11" class="farbe" onclick="rkFarbeWechseln(this); return false"
                        style=" cursor: pointer; background-color: #415643;">
                </td>
                <td id="Farbe12" class="farbe" onclick="rkFarbeWechseln(this); return false"
                        style=" cursor: pointer; background-color: #8DD0F0;">
                </td>
                <td id="Farbe13" class="farbe" onclick="rkFarbeWechseln(this); return false"
                        style=" cursor: pointer; background-color: #4c7c9e;">
                </td>
                <td id="Farbe14" class="farbe" onclick="rkFarbeWechseln(this); return false"
                        style=" cursor: pointer; background-color: #3c5291;">
                </td>
                <td id="Farbe15" class="farbe" onclick="rkFarbeWechseln(this); return false"
                        style=" cursor: pointer; background-color: #313d57;">
                </td>
                <td id="Farbe16" class="farbe" onclick="rkFarbeWechseln(this); return false"
                        style=" cursor: pointer; background-color: #283844;">
                </td>
                <td id="Farbe17" class="farbe" onclick="rkFarbeWechseln(this); return false"
                        style=" cursor: pointer; background-color: #585d6d;">
                </td>
                <td id="Farbe18" class="farbe" onclick="rkFarbeWechseln(this); "
                        style=" cursor: pointer; background-color: #000000;">
                </td>
              </tr>
              
            </table>
          </td>
        </tr>        
        
    	</table>
  		</div>
    </div>
    <?	
    	} //if ende
   //****** ENDE NEU ******/
    ?>
	<img id="vorschauVorneDruckbild" style="border:0px;"> <?
		// wenn 'Text' ausgewählt ist
		if ($_SESSION['knzShowTextMotivUpload'] == "text") {
			if (!empty($_SESSION['filenameVorschaubildText'])) { ?>
				src="<?=$_SESSION['dirVorschauVorneText']. $_SESSION['filenameVorschaubildText']?>" <?
			} else { ?>
				src="img/einPixelTransp.gif" <?
			}
		} 
		// wenn 'Motiv' ausgewählt ist
		else if ($_SESSION['knzShowTextMotivUpload'] == "motiv") {
			if (!empty($_SESSION['filenameVorschaubildMotiv'])) { ?>
				src="<?=$_SESSION['dirVorschauVorneMotiv']. $_SESSION['filenameVorschaubildMotiv']?>" <?
			} else { ?>
				src="img/einPixelTransp.gif" <?
			}
		} 
		// wenn 'Upload' ausgewählt ist
		else if ($_SESSION['knzShowTextMotivUpload'] == "upload") {
			if (!empty($_SESSION['filenameVorschaubildUpload'])) { ?>
				src="<?=$_SESSION['dirVorschauVorneUpload']. $_SESSION['filenameVorschaubildUpload']?>" <?
			} else { ?>
				src="img/einPixelTransp.gif" <?
			}
		} 
		// wenn NICHT 'Text', 'Motiv' ODER 'Upload' ausgewählt ist
		else { ?>
			src="img/einPixelTransp.gif" <?
		} ?>
	</img>    
</div>
<!-- Anzeige Klamotte END -->
