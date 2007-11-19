»» <html>
»» <head>
»» <title>slider</title>
»» </head>
»» <body>
»»
»» <div style="position:absolute; margin-top:100; margin-left:100; height:22; width:160">
»» <div style="position:absolute; top:-1px; left:-1px;  height:1px; width:162px; background-color:#36309A; overflow:hidden"></div>
»» <div style="position:absolute; top:-1px; left:-1px;  height:17px; width:1px; background-color:#36309A; overflow:hidden"></div>
»» <div style="position:absolute; top:-1px; left:160px; height:17px; width:1px; background-color:#36309A; overflow:hidden"></div>
»» <div style="position:absolute; top:15px; left:-1px;  height:1px; width:162px; background-color:#36309A; overflow:hidden"></div>
»» <div id="slider" style="position:absolute; top:-4px; left:75px; height:20px; width:20px; cursor:pointer">
»» <img src="cross.gif" width=12 height=20>
»» </div></div>
»» <script language="javascript">
                     ^ ACHTUNG, veraltet! Besser (besser gesagt: richtig): <script type="text/javascript">

»» <!--
Die Kommentarklammern braucht man eigentlich nicht mehr wirklich, schon lange nicht mehr (ist aber auch nicht unbedingt falsch ;) )

»» var isDrag = false;
»» var sliderButton;
»» var xo = 0;
»»
»» slider.onmousedown = mouseDownSlider;
»» slider.onmousemove = mouseMoveSlider;
   document.onmousemove = mouseMoveSlider; (damit funktioniert es!)
Nötige Ergänzung:
  slider.onmouseup = mouseUpSlider;

und passend dazu dann die Funktion:

function mouseUpSlider () {
   isDrag = false;
   return true;
}

»»
»» // Abgreifen der Klick-Koordinate.
»» function mouseDownSlider(e) {
»»    isDrag = true;
»»    var tx = parseInt(slider.style.left);
»»    if (document.all) {
»»       xo = event.clientX + document.body.scrollLeft - tx;
»»    }
»»    else {
»»       xo = e.pageX - tx;
»»    }
»»    return false;
»» }
»»
»» // Slider verändern.
»» function mouseMoveSlider(e) {
»»    if (isDrag) {
»»       if (document.all) {
»»          x = event.clientX + document.body.scrollLeft;
»»       }
»»       else {
»»          x = e.pageX;
»»       }
»»       x = Math.max(1, Math.min(x - xo, 146));
»»       slider.style.left = x;
»»    }
»»    return false;
»» }
»»
»» //-->
»» </script>

»» </body>
»» </html>
»»
»» Meine Frage ist: Warum verliert man im Firefox gegenüber dem Internet Explorer mit dem Mauscursor auf dem Regler bei schnellen Bewegungen manchmal den Fokus? Hat das mit meiner Programmierung zu tun oder sind die Browser unterschiedlich?

Ich glaube, die beiden Browser verlieren beide bei schnellen Mausbewegungen den Focus, reagieren aber unterschiedlich darauf. Du kannst das gewünschte Verhalten relativ leicht erreichen, indem Du das MouseMove- Event nicht ausschliesslich auf das Objekt "slider", sondern auf das gesamte Dokument beziehst.
Die nötige Abfrage, ob der Slider sich auch wirklich bewegen soll, ist ja bereits in der Funktion MoveMouseSlider() implementiert. ( if(isDrag) ).

Was mich beim Testen allerdings gestört hat, war die Tatsache, daß man den Slider nicht wieder "loslassen" konnte. Dafür gibt es in meinem Vorschlag die zusätzliche Funktion mouseUpSlider(), die einfach nur die Kontrollvariable isDrag wieder auf "false" setzt.

Ich hoffe, damit konnte ich Dir helfen...

Viele liebe Grüße,
Der Dicki