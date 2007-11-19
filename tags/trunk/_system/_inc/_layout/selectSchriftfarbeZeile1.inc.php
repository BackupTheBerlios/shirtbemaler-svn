<?
/*
 * WIRD NICHT MEHR GENUTZT; (nur noch zum Gucken)
 */
?>

<span style="padding-left: 4px;">                  
	<table onclick="twMachBoxFarbauswahl('1');" onmouseout="javascript:document.getElementById('help_text_change_color').style.display ='none';" onmousemove="javascript:set_mouseposition('help_text_change_color')" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>
				<img src="img/color_selection.gif" alt="">
			</td>
			<td style="width: 16px; height: 16px; padding-top: 1px;" align="center">
				<img id="color_selection_preview_1" style="border: 1px solid rgb(0, 0, 0); background-color: rgb(255, 216, 1); width: 13px; height: 13px;" src="img/spacer.gif" alt="" height="13" width="13">
  		</td>
  	</tr>
	</table> 
	                 
	<input id="farbe1_id" name="farbe1" value="FFD801/Gelb/gelb/FFFFFF" type="hidden">
	
	<div id="color_selection_1" style="border: 1px solid rgb(0, 0, 0); position: absolute; top: 100px; left: 100px; z-index: 998; background-color: rgb(255, 255, 255); display: none;" onmousemove="twMachBoxFarbauswahl('1')">
		<table style="z-index: 999;" cellpadding="0" cellspacing="0" width="96">
			<tr>                          
				<td style="padding: 1px;" height="16" width="16">
					<img src="img/spacer.gif" alt="" title="" style="width: 16px; height: 16px; background-color: rgb(0, 0, 0);" onclick="twCloseBoxFarbauswahl('1');document.getElementById('farbe1_id').value = document.getElementById('farben_1_0').value;
								twMachVorschaubildTextOhneSave();" onmouseout="javascript:document.getElementById('tooltip').style.display ='none';" onmousemove="javascript:set_tooltip('Schwarz')">
					<input id="farben_1_0" value="000000/Schwarz/schwarz/FFFFFF" type="hidden">
				</td> 
				                         
				<td style="padding: 1px;" height="16" width="16">
					<img src="img/spacer.gif" alt="" title="" style="width: 16px; height: 16px; background-color: rgb(0, 73, 148);" onclick="twCloseBoxFarbauswahl('1');document.getElementById('farbe1_id').value = document.getElementById('farben_1_1').value;
							twMachVorschaubildTextOhneSave();" onmouseout="javascript:document.getElementById('tooltip').style.display ='none';" onmousemove="javascript:set_tooltip('Königsblau')">
					<input id="farben_1_1" value="004994/Königsblau/koenigsblau/FFFFFF" type="hidden">
				</td>                          
				<td style="padding: 1px;" height="16" width="16">
					<img src="img/spacer.gif" alt="" title="" style="width: 16px; height: 16px; background-color: rgb(0, 113, 8);" onclick="twCloseBoxFarbauswahl('1');document.getElementById('farbe1_id').value = document.getElementById('farben_1_2').value;
  							twMachVorschaubildTextOhneSave();" onmouseout="javascript:document.getElementById('tooltip').style.display ='none';" onmousemove="javascript:set_tooltip('Grün')">
  				<input id="farben_1_2" value="007108/Grün/gruen/FFFFFF" type="hidden">
  			</td>                          
  			<td style="padding: 1px;" height="16" width="16">
  				<img src="img/spacer.gif" alt="" title="" style="width: 16px; height: 16px; background-color: rgb(57, 150, 214);" onclick="twCloseBoxFarbauswahl('1');document.getElementById('farbe1_id').value = document.getElementById('farben_1_3').value;
  							twMachVorschaubildTextOhneSave();" onmouseout="javascript:document.getElementById('tooltip').style.display ='none';" onmousemove="javascript:set_tooltip('Hellblau')">
  				<input id="farben_1_3" value="3996D6/Hellblau/himmelblau/FFFFFF" type="hidden">
  			</td>                          
  			<td style="padding: 1px;" height="16" width="16">
  				<img src="img/spacer.gif" alt="" title="" style="width: 16px; height: 16px; background-color: rgb(107, 0, 0);" onclick="twCloseBoxFarbauswahl('1');document.getElementById('farbe1_id').value = document.getElementById('farben_1_4').value;
  							twMachVorschaubildTextOhneSave();" onmouseout="javascript:document.getElementById('tooltip').style.display ='none';" onmousemove="javascript:set_tooltip('Bordeaux')">
  				<input id="farben_1_4" value="6B0000/Bordeaux/bordeaux/FFFFFF" type="hidden">
  			</td>                          
  			<td style="padding: 1px;" height="16" width="16">
  				<img src="img/spacer.gif" alt="" title="" style="width: 16px; height: 16px; background-color: rgb(173, 173, 173);" onclick="twCloseBoxFarbauswahl('1');document.getElementById('farbe1_id').value = document.getElementById('farben_1_5').value;
  							twMachVorschaubildTextOhneSave();" onmouseout="javascript:document.getElementById('tooltip').style.display ='none';" onmousemove="javascript:set_tooltip('Silber')">
  				<input id="farben_1_5" value="ADADAD/Silber/silber/FFFFFF" type="hidden">
  			</td>
    	</tr>
    	<tr>
			</tr>                          
			<tr>
				<td style="padding: 1px;" height="16" width="16">
					<img src="img/spacer.gif" alt="" title="" style="width: 16px; height: 16px; background-color: rgb(206, 182, 115);" onclick="twCloseBoxFarbauswahl('1');document.getElementById('farbe1_id').value = document.getElementById('farben_1_6').value;
								twMachVorschaubildTextOhneSave();" onmouseout="javascript:document.getElementById('tooltip').style.display ='none';" onmousemove="javascript:set_tooltip('Gold')">
					<input id="farben_1_6" value="CEB673/Gold/gold/FFFFFF" type="hidden">
				</td>                          
				<td style="padding: 1px;" height="16" width="16">
					<img src="img/spacer.gif" alt="" title="" style="width: 16px; height: 16px; background-color: rgb(214, 48, 24);" onclick="twCloseBoxFarbauswahl('1');document.getElementById('farbe1_id').value = document.getElementById('farben_1_7').value;
								twMachVorschaubildTextOhneSave();" onmouseout="javascript:document.getElementById('tooltip').style.display ='none';" onmousemove="javascript:set_tooltip('Rot')">
					<input id="farben_1_7" value="D63018/Rot/rot/FFFFFF" type="hidden">
				</td>                          
				<td style="padding: 1px;" height="16" width="16">
					<img src="img/spacer.gif" alt="" title="" style="width: 16px; height: 16px; background-color: rgb(239, 130, 165);" onclick="twCloseBoxFarbauswahl('1');document.getElementById('farbe1_id').value = document.getElementById('farben_1_8').value;
								twMachVorschaubildTextOhneSave();" onmouseout="javascript:document.getElementById('tooltip').style.display ='none';" onmousemove="javascript:set_tooltip('Rosa')">
					<input id="farben_1_8" value="EF82A5/Rosa/rosa/FFFFFF" type="hidden">
				</td>                          
				<td style="padding: 1px;" height="16" width="16">
					<img src="img/spacer.gif" alt="" title="" style="width: 16px; height: 16px; background-color: rgb(239, 255, 41);" onclick="twCloseBoxFarbauswahl('1');document.getElementById('farbe1_id').value = document.getElementById('farben_1_9').value;
								twMachVorschaubildTextOhneSave();" onmouseout="javascript:document.getElementById('tooltip').style.display ='none';" onmousemove="javascript:set_tooltip('Neongelb')">
					<input id="farben_1_9" value="EFFF29/Neongelb/gelbfluor/000000" type="hidden">
				</td>                          
				<td style="padding: 1px;" height="16" width="16">
					<img src="img/spacer.gif" alt="" title="" style="width: 16px; height: 16px; background-color: rgb(255, 151, 15);" onclick="twCloseBoxFarbauswahl('1');document.getElementById('farbe1_id').value = document.getElementById('farben_1_10').value;
							twMachVorschaubildTextOhneSave();" onmouseout="javascript:document.getElementById('tooltip').style.display ='none';" onmousemove="javascript:set_tooltip('Orange')">
  				<input id="farben_1_10" value="FF970F/Orange/orange/FFFFFF" type="hidden">
  			</td>                          
  			<td style="padding: 1px;" height="16" width="16">
  				<img src="img/spacer.gif" alt="" title="" style="width: 16px; height: 16px; background-color: rgb(255, 216, 1);" onclick="twCloseBoxFarbauswahl('1');document.getElementById('farbe1_id').value = document.getElementById('farben_1_11').value;
  							twMachVorschaubildTextOhneSave();" onmouseout="javascript:document.getElementById('tooltip').style.display ='none';" onmousemove="javascript:set_tooltip('Gelb')">
  				<input id="farben_1_11" value="FFD801/Gelb/gelb/FFFFFF" type="hidden">
  			</td>
  		</tr>
  		<tr>
    	</tr>                          
    	<tr>
    		<td style="padding: 1px;" height="16" width="16">
      		<img src="img/spacer.gif" alt="" title="" style="border: 1px solid rgb(0, 0, 0); width: 14px; height: 14px; background-color: rgb(255, 255, 255);" onclick="twCloseBoxFarbauswahl('1');document.getElementById('farbe1_id').value = document.getElementById('farben_1_12').value;
      					twMachVorschaubildTextOhneSave();" onmouseout="javascript:document.getElementById('tooltip').style.display ='none';" onmousemove="javascript:set_tooltip('Weiß')">
      		<input id="farben_1_12" value="FFFFFF/Weiß/weiss/000000" type="hidden">
      	</td>                      
			</tr>
		</table>
	</div>
</span>
