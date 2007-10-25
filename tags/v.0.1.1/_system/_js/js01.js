var twjsDirMotiv      = '';
var twjsFilenameMotiv = '';
var twjsDirUpload      = '';
var twjsFilenameUpload = '';
//var twjsDirVorschaubild      = '';
//var twjsFilenameFuerWarenkorb = '';


  /* Zeigt eine Box an zur Auswahl einer Schriftfarbe */
  function twMachBoxFarbauswahl(zeile) {
    if (document.getElementById('auswahl_schriftfarbe_box_zeile_'+zeile) != null) {
      if (document.getElementById('auswahl_schriftfarbe_box_zeile_'+zeile).style.display == "none") {
        document.getElementById('auswahl_schriftfarbe_box_zeile_'+zeile).style.top = document.getElementById('auswahl_schriftfarbe_anzeige_zeile_'+zeile).style.top;
        document.getElementById('auswahl_schriftfarbe_box_zeile_'+zeile).style.left = document.getElementById('auswahl_schriftfarbe_anzeige_zeile_'+zeile).style.left;
        document.getElementById('auswahl_schriftfarbe_box_zeile_'+zeile).style.display = "inline";
      }
    }
  }

  /* Schließt die Box zur Auswahl einer Schriftfarbe */
  function twCloseBoxFarbauswahl(zeile) {
    if (document.getElementById('auswahl_schriftfarbe_box_zeile_'+zeile) != null) {
      if (document.getElementById('auswahl_schriftfarbe_box_zeile_'+zeile).style.display == "inline") {
        document.getElementById('auswahl_schriftfarbe_box_zeile_'+zeile).style.display = "none";
      }
    }
  }
  
  /* Zeigt eine Box an zur Auswahl einer Schriftgröße */
  function twMachBoxAuswahlSchriftgroesse(zeile) {
    if (document.getElementById('auswahl_schriftgroesse_box_zeile_'+zeile) != null) {
      if (document.getElementById('auswahl_schriftgroesse_box_zeile_'+zeile).style.display == "none") {
        document.getElementById('auswahl_schriftgroesse_box_zeile_'+zeile).style.top = document.getElementById('auswahl_schriftgroesse_anzeige_zeile_'+zeile).style.top;
        document.getElementById('auswahl_schriftgroesse_box_zeile_'+zeile).style.left = document.getElementById('auswahl_schriftgroesse_anzeige_zeile_'+zeile).style.left;
        document.getElementById('auswahl_schriftgroesse_box_zeile_'+zeile).style.display = "inline"; /*block*/
      }
    }
  }

  /* Schließt die Box zur Auswahl einer Schriftgröße */
  function twCloseBoxAuswahlSchriftgroesse(zeile) {
    if (document.getElementById('auswahl_schriftgroesse_box_zeile_'+zeile) != null) {
      if (document.getElementById('auswahl_schriftgroesse_box_zeile_'+zeile).style.display == "inline") {
        document.getElementById('auswahl_schriftgroesse_box_zeile_'+zeile).style.display = "none";
      }
    }
  }
  
  /* Zeigt eine Box an zur Auswahl einer Schriftart */
  function twMachBoxAuswahlSchriftart(zeile) {
    if (document.getElementById('auswahl_schriftart_box_zeile_'+zeile) != null) {
      if (document.getElementById('auswahl_schriftart_box_zeile_'+zeile).style.display == "none") {
        document.getElementById('auswahl_schriftart_box_zeile_'+zeile).style.top = document.getElementById('auswahl_schriftart_anzeige_zeile_'+zeile).style.top;
        document.getElementById('auswahl_schriftart_box_zeile_'+zeile).style.left = document.getElementById('auswahl_schriftart_anzeige_zeile_'+zeile).style.left;
        document.getElementById('auswahl_schriftart_box_zeile_'+zeile).style.display = "block";
      }
    }
  }

  /* Schließt die Box zur Auswahl einer Schriftart */
  function twCloseBoxAuswahlSchriftart(zeile) {
    if (document.getElementById('auswahl_schriftart_box_zeile_'+zeile) != null) {
      if (document.getElementById('auswahl_schriftart_box_zeile_'+zeile).style.display == "block") {
        document.getElementById('auswahl_schriftart_box_zeile_'+zeile).style.display = "none";
      }
    }
  }
  
  /* Macht den Link zur Neu-Erzeugung des Text-Bildes auf der Klamotte 
     und leert gleich noch die Eingabefelder beim ersten anklicken */
  function twMachVorschaubildTextOhneSave(no_text, text_alignment_value) {
    // Initialisierung
    var textzeilen = 5;
    var textarray = new Array();
    var farbparam_array_1 = new Array();
    var farbparam_array_2 = new Array();
    var farbparam_array_3 = new Array();
    var farbparam_array_4 = new Array();
    var farbparam_array_5 = new Array();
    var fArt_z1 = "";  // Font-Art in Zeile 1 (Schriftart)
    var fArt_z2 = "";
    var fArt_z3 = "";
    var fArt_z4 = "";
    var fArt_z5 = "";
    var fGroesse_z1 = "";  // Font-Größe in Zeile 1
    var fGroesse_z2 = "";
    var fGroesse_z3 = "";
    var fGroesse_z4 = "";
    var fGroesse_z5 = "";
    var flock_ok = "True";
    var text_alignment_read = "center";
    var helper_1 = "";
    var farbanzahl = 0;
    var mode = 0;
    var y_offset_text = 0;
    var y_offset_text_mini_vorne = 0;
    var y_offset_text_mini_hinten = 0;
    var path_product = '';
    var path_product_mini_vorne = '';
    var path_product_mini_hinten = '';
    
    
    textarray[1] = "";
    textarray[2] = "";
    textarray[3] = "";
    textarray[4] = "";
    textarray[5] = "";
    farbparam_array_1[0] = "";  farbparam_array_2[0] = "";  farbparam_array_3[0] = "";  farbparam_array_4[0] = "";  farbparam_array_5[0] = "";
    farbparam_array_1[1] = "";  farbparam_array_2[1] = "";  farbparam_array_3[1] = "";  farbparam_array_4[1] = "";  farbparam_array_5[1] = "";
    farbparam_array_1[2] = "";  farbparam_array_2[2] = "";  farbparam_array_3[2] = "";  farbparam_array_4[2] = "";  farbparam_array_5[2] = "";
    farbparam_array_1[3] = "";  farbparam_array_2[3] = "";  farbparam_array_3[3] = "";  farbparam_array_4[3] = "";  farbparam_array_5[3] = "";
  
    // beim ersten Klick in ein Textfeld den Starttext loeschen
    no_text = 'True';
    //ueberpruefen der werte:
    for (i=1; i<=textzeilen; i++) {
      if (document.getElementById('text1') != null) { 
        if(document.getElementById('text1').value != 'Textzeile 1') {
          no_text = 'false';
        }
      }
      if (document.getElementById('text2') != null) { 
        if(document.getElementById('text2').value != 'Textzeile 2') {
          no_text = 'false';
        }
      }
      if (document.getElementById('text3') != null) { 
        if(document.getElementById('text3').value != 'Textzeile 3') {
          no_text = 'false';
        }
      }
      if (document.getElementById('text4') != null) { 
        if(document.getElementById('text4').value != 'Textzeile 4') {
          no_text = 'false';
        }
      }
      if (document.getElementById('text5') != null) { 
        if(document.getElementById('text5').value != 'Textzeile 5') {
          no_text = 'false';
        }
      }
    }
    
    if (no_text != 'True') {
      // Werte nur lesen wenn vorhanden
      for (i=1; i<=textzeilen; i++) {
        if (document.getElementById('text'+i) != null) { textarray[i] = document.getElementById('text'+i).value;}
      }
    } else {
      // kein Text - Werte loeschen
      for (i=1; i<=textzeilen; i++) {
        textarray[i] = "";
        if (document.getElementById('text'+i) != null) { document.getElementById('text'+i).value = ''; }
      }
    }
    
    if (document.getElementById('mode_id') != null) { mode = document.getElementById('mode_id').value; }
    if (document.getElementById('preview_param_y_text_id') != null) { y_offset_text = document.getElementById('preview_param_y_text_id').value; }
    if (document.getElementById('preview_param_y_text_mini_id_vorne') != null) { y_offset_text_mini_vorne = document.getElementById('preview_param_y_text_mini_id_vorne').value; }
    if (document.getElementById('preview_param_y_text_mini_id_hinten') != null) { y_offset_text_mini_hinten = document.getElementById('preview_param_y_text_mini_id_hinten').value; }
    if (document.getElementById('path_product_id') != null) { path_product = document.getElementById('path_product_id').value.substr(2); }
    // das muss falsch rum eingelesen, werden, da bei den kleinansichten die $_SESSION['ansicht'] vertauscht wurde:
    if (document.getElementById('path_product_mini_id_hinten') != null) { path_product_mini_vorne = document.getElementById('path_product_mini_id_hinten').value.substr(2); }
    if (document.getElementById('path_product_mini_id_vorne') != null) { path_product_mini_hinten = document.getElementById('path_product_mini_id_vorne').value.substr(2); }
    
    
    //ueberpruefung ob die Schrift zugelassen ist:
    var blocked_font_zoom = '';
    var designer_zoom_helper = '100';
    var text_position_helper = 'mitte';
    var show_font_alertbox = "False";
    var row_helper = '0';
        
    //ausgabe dass die font in der ansicht nicht moeglich ist:
    if (show_font_alertbox == "True") {
      show_sc_alert_box("Leider kann dein Text in Zeile "+row_helper+" mit der gewählten Schriftart nur mittig gedruckt werden.");
      return;
    }
    
    // Unterscheidung ob Flock (in)aktiv
    if (flock_ok == "True") {
       if (document.getElementById('flock_print_method_id') != null) {
         document.getElementById('flock_print_method_id').disabled = false;
       }
    } else {
      //alert("aus");
      if (document.getElementById('flock_print_method_id') != null) {
        document.getElementById('flock_print_method_id').disabled = true;
        document.getElementById('flock_print_method_id').checked = false;
      }
      if (document.getElementById('flex_print_method_id') != null) {
        document.getElementById('flex_print_method_id').checked = true;
      }
      //flex als druckmethode speichern:
      var save_data_link = '/shirtbemaler/de/save_additional_designer_values.php';
      var save_data_link_options = '&PHPSESSID=45f5c58613c3a1aa076f0c65b9b97591'
      document.getElementById('save_additional_designer_values').src = save_data_link + '?vorne_print_method=flextransfer' + save_data_link_options;
    
      //anszeige aendern:
      document.getElementById('print_method_text').firstChild.nodeValue = 'Flexdruck';
      document.getElementById('print_method_help_button').href = "javascript:show_print_method('flextransfer');";
      //preis neu berechnen:
      ///document.getElementById('designer_show_price_id').src = '/shirtbemaler/de/designer_show_price.php?PHPSESSID=45f5c58613c3a1aa076f0c65b9b97591';
    }
    
    // Schriftfarbe im Anzeigefeld setzen
    if (document.getElementById('auswahl_schriftfarbe_hidden_zeile_1') != null) { 
      farbparam_array_1 = document.getElementById('auswahl_schriftfarbe_hidden_zeile_1').value.split('/');
      if (document.getElementById('auswahl_schriftfarbe_anzeige_zeile_1') != null) { 
        document.getElementById('auswahl_schriftfarbe_anzeige_zeile_1').style.backgroundColor = '#'+farbparam_array_1[0];
      }
    }
    if (document.getElementById('auswahl_schriftfarbe_hidden_zeile_2') != null) { 
      farbparam_array_2 = document.getElementById('auswahl_schriftfarbe_hidden_zeile_2').value.split('/'); 
      if (document.getElementById('auswahl_schriftfarbe_anzeige_zeile_2') != null) { 
        document.getElementById('auswahl_schriftfarbe_anzeige_zeile_2').style.backgroundColor = '#'+farbparam_array_2[0];
      }
    }
    if (document.getElementById('auswahl_schriftfarbe_hidden_zeile_3') != null) {
      farbparam_array_3 = document.getElementById('auswahl_schriftfarbe_hidden_zeile_3').value.split('/');
      if (document.getElementById('auswahl_schriftfarbe_anzeige_zeile_3') != null) { 
        document.getElementById('auswahl_schriftfarbe_anzeige_zeile_3').style.backgroundColor = '#'+farbparam_array_3[0];
      }
    }
    if (document.getElementById('auswahl_schriftfarbe_hidden_zeile_4') != null) {
      farbparam_array_4 = document.getElementById('auswahl_schriftfarbe_hidden_zeile_4').value.split('/');
      if (document.getElementById('auswahl_schriftfarbe_anzeige_zeile_4') != null) { 
        document.getElementById('auswahl_schriftfarbe_anzeige_zeile_4').style.backgroundColor = '#'+farbparam_array_4[0];
      }
    }
    if (document.getElementById('auswahl_schriftfarbe_hidden_zeile_5') != null) {
      farbparam_array_5 = document.getElementById('auswahl_schriftfarbe_hidden_zeile_5').value.split('/');
      if (document.getElementById('auswahl_schriftfarbe_anzeige_zeile_5') != null) { 
        document.getElementById('auswahl_schriftfarbe_anzeige_zeile_5').style.backgroundColor = '#'+farbparam_array_5[0];
      }
    }
    
    
    // Schriftgrößen einlesen
    if (document.getElementById('auswahl_schriftgroesse_hidden_zeile_1') != null) {fGroesse_z1 = document.getElementById('auswahl_schriftgroesse_hidden_zeile_1').value;}
    if (document.getElementById('auswahl_schriftgroesse_hidden_zeile_2') != null) {fGroesse_z2 = document.getElementById('auswahl_schriftgroesse_hidden_zeile_2').value;}
    if (document.getElementById('auswahl_schriftgroesse_hidden_zeile_3') != null) {fGroesse_z3 = document.getElementById('auswahl_schriftgroesse_hidden_zeile_3').value;}
    if (document.getElementById('auswahl_schriftgroesse_hidden_zeile_4') != null) {fGroesse_z4 = document.getElementById('auswahl_schriftgroesse_hidden_zeile_4').value;}
    if (document.getElementById('auswahl_schriftgroesse_hidden_zeile_5') != null) {fGroesse_z5 = document.getElementById('auswahl_schriftgroesse_hidden_zeile_5').value;}
        
    // Schriftgröß im Anzeigefeld setzen
    if (document.getElementById('auswahl_schriftgroesse_hidden_zeile_1') != null) {
      if (document.getElementById('auswahl_schriftgroesse_anzeige_zeile_1') != null) { 
        document.getElementById('auswahl_schriftgroesse_anzeige_zeile_1').value = document.getElementById('auswahl_schriftgroesse_hidden_zeile_1').value;
      }
    }
    if (document.getElementById('auswahl_schriftgroesse_hidden_zeile_2') != null) {
      if (document.getElementById('auswahl_schriftgroesse_anzeige_zeile_2') != null) { 
        document.getElementById('auswahl_schriftgroesse_anzeige_zeile_2').value = document.getElementById('auswahl_schriftgroesse_hidden_zeile_2').value;
      }
    }
    if (document.getElementById('auswahl_schriftgroesse_hidden_zeile_3') != null) {
      if (document.getElementById('auswahl_schriftgroesse_anzeige_zeile_3') != null) { 
        document.getElementById('auswahl_schriftgroesse_anzeige_zeile_3').value = document.getElementById('auswahl_schriftgroesse_hidden_zeile_3').value;
      }
    }
    if (document.getElementById('auswahl_schriftgroesse_hidden_zeile_4') != null) {
      if (document.getElementById('auswahl_schriftgroesse_anzeige_zeile_4') != null) { 
        document.getElementById('auswahl_schriftgroesse_anzeige_zeile_4').value = document.getElementById('auswahl_schriftgroesse_hidden_zeile_4').value;
      }
    }
    if (document.getElementById('auswahl_schriftgroesse_hidden_zeile_5') != null) {
      if (document.getElementById('auswahl_schriftgroesse_anzeige_zeile_5') != null) { 
        document.getElementById('auswahl_schriftgroesse_anzeige_zeile_5').value = document.getElementById('auswahl_schriftgroesse_hidden_zeile_5').value;
      }
    }
    
    
    // Schriftarten einlesen
    if (document.getElementById('auswahl_schriftart_hidden_zeile_1') != null) { fArt_z1 = document.getElementById('auswahl_schriftart_hidden_zeile_1').value; }
    if (document.getElementById('auswahl_schriftart_hidden_zeile_2') != null) { fArt_z2 = document.getElementById('auswahl_schriftart_hidden_zeile_2').value; }
    if (document.getElementById('auswahl_schriftart_hidden_zeile_3') != null) { fArt_z3 = document.getElementById('auswahl_schriftart_hidden_zeile_3').value; }
    if (document.getElementById('auswahl_schriftart_hidden_zeile_4') != null) { fArt_z4 = document.getElementById('auswahl_schriftart_hidden_zeile_4').value; }
    if (document.getElementById('auswahl_schriftart_hidden_zeile_5') != null) { fArt_z5 = document.getElementById('auswahl_schriftart_hidden_zeile_5').value; }
    
    // Schriftar im Anzeigefeld setzen
    if (document.getElementById('auswahl_schriftart_hidden_zeile_1') != null) {
      if (document.getElementById('auswahl_schriftart_anzeige_zeile_1') != null) { 
        document.getElementById('auswahl_schriftart_anzeige_zeile_1').style.backgroundImage = document.getElementById('auswahl_schriftart_vorschaubild_zeile_1').value;
      }
    }
    if (document.getElementById('auswahl_schriftart_hidden_zeile_2') != null) {
      if (document.getElementById('auswahl_schriftart_anzeige_zeile_2') != null) { 
        document.getElementById('auswahl_schriftart_anzeige_zeile_2').style.backgroundImage = document.getElementById('auswahl_schriftart_vorschaubild_zeile_2').value;
      }
    }
    if (document.getElementById('auswahl_schriftart_hidden_zeile_3') != null) {
      if (document.getElementById('auswahl_schriftart_anzeige_zeile_3') != null) { 
        document.getElementById('auswahl_schriftart_anzeige_zeile_3').style.backgroundImage = document.getElementById('auswahl_schriftart_vorschaubild_zeile_3').value;
      }
    }
    if (document.getElementById('auswahl_schriftart_hidden_zeile_4') != null) {
      if (document.getElementById('auswahl_schriftart_anzeige_zeile_4') != null) { 
        document.getElementById('auswahl_schriftart_anzeige_zeile_4').style.backgroundImage = document.getElementById('auswahl_schriftart_vorschaubild_zeile_4').value;
      }
    }
    if (document.getElementById('auswahl_schriftart_hidden_zeile_5') != null) {
      if (document.getElementById('auswahl_schriftart_anzeige_zeile_5') != null) { 
        document.getElementById('auswahl_schriftart_anzeige_zeile_5').style.backgroundImage = document.getElementById('auswahl_schriftart_vorschaubild_zeile_5').value;
      }
    }
    
    
    // Textalignment Grafiken richtig setzten
    if (text_alignment_value == 'left' || text_alignment_value == 'center' || text_alignment_value == 'right') {
      document.getElementById('textalignment').value = text_alignment_value;
      if (document.getElementById('left') != null) { 
        document.getElementById('text_left_active').style.display  = 'none';
        document.getElementById('text_left_inactive').style.display  = 'block';
      }
      if (document.getElementById('center') != null) { 
        document.getElementById('text_center_active').style.display  = 'none';
        document.getElementById('text_center_inactive').style.display  = 'block';
      }
      if (document.getElementById('right') != null) { 
        document.getElementById('text_right_active').style.display  = 'none';
        document.getElementById('text_right_inactive').style.display  = 'block';
      }
      if (text_alignment_value == 'left') { 
        if (document.getElementById(text_alignment_value) != null) { 
          document.getElementById('text_left_active').style.display  = 'block';
          document.getElementById('text_left_inactive').style.display  = 'none';
        }
      }
      if (text_alignment_value == 'center') { 
        if (document.getElementById(text_alignment_value) != null) { 
          document.getElementById('text_center_active').style.display  = "block";
          document.getElementById('text_center_inactive').style.display  = "none";
        }
      }
      if (text_alignment_value == 'right') { 
        if (document.getElementById(text_alignment_value) != null) {
          document.getElementById('text_right_active').style.display  = "block";
          document.getElementById('text_right_inactive').style.display  = "none";
        }
      }
    }
    if (document.getElementById('textalignment') != null) { text_alignment_read = document.getElementById('textalignment').value; }
    
    // Sonderzeichen ersetzen -> URL encode
    for (i=1; i<=textzeilen; i++) {
      textarray[i] = textarray[i].replace(/</gi, "-3C");
      textarray[i] = textarray[i].replace(/>/gi, "-3E");
      textarray[i] = textarray[i].replace(/&/gi, "-26");
      textarray[i] = textarray[i].replace(/#/gi, "-23");
      textarray[i] = textarray[i].replace(/\+/gi, "-2B");
      textarray[i] = textarray[i].replace(/\"/gi, "-22"); // " <- wegen syntax hilighting
      textarray[i] = encodeURI(textarray[i]); // fuer ua. japanische zeichen
      //muss durchgeschleift werden, da es sonst zu darstellungsproblemen kommt
      textarray[i] = textarray[i].replace(/-3C/gi, "%3C");
      textarray[i] = textarray[i].replace(/-3E/gi, "%3E");
      textarray[i] = textarray[i].replace(/-26/gi, "%26");
      textarray[i] = textarray[i].replace(/-23/gi, "%23");
      textarray[i] = textarray[i].replace(/-2B/gi, "%2B");
      textarray[i] = textarray[i].replace(/-22/gi, "%22"); // " <- wegen syntax hilighting
    }
    
    var text_shrink_factor_id_vorne = '';
    var text_pp_graphic_height_reference_vorne = '';
    
    if (document.getElementById('text_shrink_factor_id_vorne') != null) {
      text_shrink_factor_id_vorne = document.getElementById('text_shrink_factor_id_vorne').value;
    }
    if (document.getElementById('text_pp_graphic_height_reference_vorne') != null) {
      text_pp_graphic_height_reference_vorne = document.getElementById('text_pp_graphic_height_reference_vorne').value;
    }
      
    // Link erzeugen für machVorschaubildTextOhneSave.php
  	var link_params_1 = "/shirtbemaler/de/machVorschaubildTextOhneSave.php?mode="+mode+"&x1=185&x2=0.675&y1=320";
  	///zumDesden//var link_params_1 = "/shirtbemaler/de/machBildText___zumTesten.php?mode="+mode+"&x1=185&x2=0.675&y1=320"; 
    var link_params_1_mini = "/shirtbelaler/de/machVorschaubildTextOhneSave.php?mode="+mode+"&x1=185&x2="+text_shrink_factor_id_vorne+"&y1="+text_pp_graphic_height_reference_vorne;
    var link_text = "&t1="+textarray[1]+"&t2="+textarray[2]+"&t3="+textarray[3]+"&t4="+textarray[4]+"&t5="+textarray[5];
    ///var link_font_name = "&f1="+schriftparam_array_1[1]+"&f2="+schriftparam_array_2[1]+"&f3="+schriftparam_array_3[1]+"&f4="+schriftparam_array_4[1]+"&f5="+schriftparam_array_5[1]; 
    var link_font_name = "&f1="+fArt_z1+"&f2="+fArt_z2+"&f3="+fArt_z3+"&f4="+fArt_z4+"&f5="+fArt_z5;                 
    var link_color = "&c1="+farbparam_array_1[0]+"&c2="+farbparam_array_2[0]+"&c3="+farbparam_array_3[0]+"&c4="+farbparam_array_4[0]+"&c5="+farbparam_array_5[0];
    //var link_color = "&c1=FFD801&c2=FFD801&c3=FFD801&c4=FFD801&c5=FFD801";
    var link_font_size = "&g1="+fGroesse_z1+"&g2="+fGroesse_z2+"&g3="+fGroesse_z3+"&g4="+fGroesse_z4+"&g5="+fGroesse_z5;
    var link_params_2 = "&fw=525A10&am="+text_alignment_read+"&pc=ts";                  
    var machBildText_link = link_params_1 + link_text + link_font_name + link_font_size + link_color + link_params_2;
    var machBildText_link_mini = link_params_1_mini + link_text + link_font_name + link_font_size + link_color + link_params_2;
    
    // link fuer save_schrift_php_values.php zusammenbauen -> javascriptwerte in sessionvariablen speichern
    var save_data_link_text = '/shirtbemaler/de/save_schrift_php_values.php?t1='+textarray[1]+'&t2='+textarray[2]+'&t3='+textarray[3]+'&t4='+textarray[4]+'&t5='+textarray[5];
    var save_data_link_fontname = '&schriftcode1=aaa&schriftname1=aaa&schriftcode2=aaa&schriftname2=aaa&schriftcode3=aaa&schriftname3=aaa&schriftcode4=aaa&schriftname4=aaa&schriftcode5=aaa&schriftname5=aaa';
    var save_data_link_color_1 = '&farbwert1='+farbparam_array_1[0]+'&farbname1='+farbparam_array_1[1]+'&farbcode1='+farbparam_array_1[2]+'&helper1='+farbparam_array_1[3];
    var save_data_link_color_2 = '&farbwert2='+farbparam_array_2[0]+'&farbname2='+farbparam_array_2[1]+'&farbcode2='+farbparam_array_2[2]+'&helper2='+farbparam_array_2[3];
    var save_data_link_color_3 = '&farbwert3='+farbparam_array_3[0]+'&farbname3='+farbparam_array_3[1]+'&farbcode3='+farbparam_array_3[2]+'&helper3='+farbparam_array_3[3];
    var save_data_link_color_4 = '&farbwert4='+farbparam_array_4[0]+'&farbname4='+farbparam_array_4[1]+'&farbcode4='+farbparam_array_4[2]+'&helper4='+farbparam_array_4[3];
    var save_data_link_color_5 = '&farbwert5='+farbparam_array_5[0]+'&farbname5='+farbparam_array_5[1]+'&farbcode5='+farbparam_array_5[2]+'&helper5='+farbparam_array_5[3];
    var save_data_link_fontsize = '&g1='+fGroesse_z1+'&g2='+fGroesse_z2+'&g3='+fGroesse_z3+'&g4='+fGroesse_z4+'&g5='+fGroesse_z5;
    var save_data_link_options = '&am='+text_alignment_read+'&PHPSESSID=45f5c58613c3a1aa076f0c65b9b97591';
    
    // javascript variablen in session speichern
    ///rausgenommen START
    document.getElementById('save_schrift_php_values').src = save_data_link_text + save_data_link_fontname + save_data_link_fontsize + save_data_link_color_1 + save_data_link_color_2 + save_data_link_color_3 + save_data_link_color_4 + save_data_link_color_5 + save_data_link_options;
		/////desd///document.getElementById('save_schrift_php_values').src = '/shirtbemaler/de/save_schrift_php_values.php';
		///rausgenommen END

    // Shirtdesigner Vorschau aktualisieren
    document.getElementById('vorschauVorneDruckbild').src = machBildText_link;
    ///document.getElementById('vorschauVorneDruckbild').style.marginTop = y_offset_text;
    ///rausgenommen START
    ///document.getElementById('vorschauVorne').style.backgroundImage = 'url('+ path_product + ')';
    ///rausgenommen END
      if (document.getElementById('pic_preview_hinten_mini')) {
        document.getElementById('pic_preview_hinten_mini').style.marginTop = y_offset_text_mini_vorne;
        document.getElementById('designer_article_preview_hinten_mini').style.backgroundImage = 'url('+ path_product_mini_hinten + ')';
        document.getElementById('pic_preview_hinten_mini').src = machBildText_link_mini;
      }     
    
    // Preis neu berechnen
    ///rausgenommen START
    ///document.getElementById('designer_show_price_id').src = '/shirtbemaler/de/designer_show_price.php?PHPSESSID=45f5c58613c3a1aa076f0c65b9b97591';
    ///rausgenommen END
  }
  
  
  /**
   * Speichert ein Druckbild (Text)
   */
  function twMachVorschaubildTextMitSave() {
  	// erstmal interne Variablen initialisieren (für Link mit GET)
  	phpdatei = "/shirtbemaler/de/machVorschaubildTextMitSave.php";
  	t1 = t2 = t3 = t4 = t5 = "";
  	f1 = f2 = f3 = f4 = f5 = "";
  	g1 = g2 = g3 = g4 = g5 = "";
  	c1 = c2 = c3 = c4 = c5 = "";
  	
  	// Werte aus dem Formular holen
  	if (document.getElementById('text1') != null) { t1 = document.getElementById('text1').value;}
  	if (document.getElementById('text2') != null) { t2 = document.getElementById('text2').value;}
  	if (document.getElementById('text3') != null) { t3 = document.getElementById('text3').value;}
  	if (document.getElementById('text4') != null) { t4 = document.getElementById('text4').value;}
  	if (document.getElementById('text5') != null) { t5 = document.getElementById('text5').value;}  	
  	if (document.getElementById('auswahl_schriftart_hidden_zeile_1') != null) { f1 = document.getElementById('auswahl_schriftart_hidden_zeile_1').value;}
  	if (document.getElementById('auswahl_schriftart_hidden_zeile_2') != null) { f2 = document.getElementById('auswahl_schriftart_hidden_zeile_2').value;}
  	if (document.getElementById('auswahl_schriftart_hidden_zeile_3') != null) { f3 = document.getElementById('auswahl_schriftart_hidden_zeile_3').value;}
  	if (document.getElementById('auswahl_schriftart_hidden_zeile_4') != null) { f4 = document.getElementById('auswahl_schriftart_hidden_zeile_4').value;}
  	if (document.getElementById('auswahl_schriftart_hidden_zeile_5') != null) { f5 = document.getElementById('auswahl_schriftart_hidden_zeile_5').value;}
  	if (document.getElementById('auswahl_schriftgroesse_hidden_zeile_1') != null) { g1 = document.getElementById('auswahl_schriftgroesse_hidden_zeile_1').value;}
  	if (document.getElementById('auswahl_schriftgroesse_hidden_zeile_2') != null) { g2 = document.getElementById('auswahl_schriftgroesse_hidden_zeile_2').value;}
  	if (document.getElementById('auswahl_schriftgroesse_hidden_zeile_3') != null) { g3 = document.getElementById('auswahl_schriftgroesse_hidden_zeile_3').value;}
  	if (document.getElementById('auswahl_schriftgroesse_hidden_zeile_4') != null) { g4 = document.getElementById('auswahl_schriftgroesse_hidden_zeile_4').value;}
  	if (document.getElementById('auswahl_schriftgroesse_hidden_zeile_5') != null) { g5 = document.getElementById('auswahl_schriftgroesse_hidden_zeile_5').value;}
  	if (document.getElementById('auswahl_schriftfarbe_hidden_zeile_1') != null) { c1 = document.getElementById('auswahl_schriftfarbe_hidden_zeile_1').value;}
  	if (document.getElementById('auswahl_schriftfarbe_hidden_zeile_2') != null) { c2 = document.getElementById('auswahl_schriftfarbe_hidden_zeile_2').value;}
  	if (document.getElementById('auswahl_schriftfarbe_hidden_zeile_3') != null) { c3 = document.getElementById('auswahl_schriftfarbe_hidden_zeile_3').value;}
  	if (document.getElementById('auswahl_schriftfarbe_hidden_zeile_4') != null) { c4 = document.getElementById('auswahl_schriftfarbe_hidden_zeile_4').value;}
  	if (document.getElementById('auswahl_schriftfarbe_hidden_zeile_5') != null) { c5 = document.getElementById('auswahl_schriftfarbe_hidden_zeile_5').value;}
  	
  	// Link zusammenbasteln (Link, der das Druckbild abspeichert)
  	link01 = phpdatei;
  	link02 = "?t1="+t1+"&t2="+t2+"&t3="+t3+"&t4="+t4+"&t5="+t5;
  	link03 = "&f1="+f1+"&f2="+f2+"&f3="+f3+"&f4="+f4+"&f5="+f5;
  	link04 = "&g1="+g1+"&g2="+g2+"&g3="+g3+"&g4="+g4+"&g5="+g5;
  	link05 = "&c1="+c1+"&c2="+c2+"&c3="+c3+"&c4="+c4+"&c5="+c5;  	
  	
  	// und aufrufen
  	//alert("aaa");
  	window.location.href = link01 + link02 + link03 + link04 + link05;
  	
  }
  
  
  /** 
   * Macht den Link zur Neu-Erzeugung des Motiv-Bildes auf der Klamotte .
   * (/shirtbemaler/de/machVorschaubildMotivOhneSave.php)
   */
  function twMachVorschaubildMotivOhneSave(dirMotiv, filenameMotiv) {   
  	var phpdatei = '/shirtbemaler/de/machVorschaubildMotivOhneSave.php';
    var linkzusatz = '?dirMotiv='+dirMotiv+'&filenameMotiv='+filenameMotiv;
  	document.getElementById('vorschauVorneDruckbild').src = phpdatei+linkzusatz;
  	/*document.getElementById('arschloch').src = dirMotiv+filenameMotiv;*/ 
  	
  	// interne JS-Variablen setzen (für twMachVorschaubildMotivMitSave() )
  	twjsDirMotiv      = dirMotiv;
  	twjsFilenameMotiv = filenameMotiv;
  }  
  
  function twMachVorschaubildMotivMitSave() {
  	//alert ("aaa: "+twjsDirMotiv+twjsFilenameMotiv);  	
  	var phpdatei = '/shirtbemaler/de/machVorschaubildMotivMitSave.php';
    var linkzusatz = '?dirMotiv='+twjsDirMotiv+'&filenameMotiv='+twjsFilenameMotiv;
    document.getElementById('vorschauVorneDruckbild').src = phpdatei+linkzusatz;
  }
  
  
  /* Macht den Link zur Neu-Erzeugung des Upload-Bildes auf der Klamotte */
  function twMachVorschaubildUploadOhneSave(dirUpload, filenameUpload) { 
  	//alert (dir+filename);
  	var phpdatei = '/shirtbemaler/de/machVorschaubildUploadOhneSave.php';
    var linkzusatz = '?dirUpload='+dirUpload+'&filenameUpload='+filenameUpload;
  	document.getElementById('vorschauVorneDruckbild').src = phpdatei+linkzusatz;
  	
  	// interne JS-Variablen setzen (für twMachVorschaubildUploadMitSave() )
  	twjsDirUpload      = dirUpload;
  	twjsFilenameUpload = filenameUpload;
  }
  
  function twMachVorschaubildUploadMitSave() {
  	var phpdatei = '/shirtbemaler/de/machVorschaubildUploadMitSave.php';
    var linkzusatz = '?dirUpload='+twjsDirUpload+'&filenameUpload='+twjsFilenameUpload;
    document.getElementById('vorschauVorneDruckbild').src = phpdatei+linkzusatz;
  }
  
  
  function desd() {
  	alert ("aaa in desd");
  }
  
  
  