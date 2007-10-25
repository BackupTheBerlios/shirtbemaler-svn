/*
Javascript-Datei für 'hilfe.php'
*/



var twZuletztAngezeigteId = '';

function twManageStyleDisplay(id) {
	var elementAntwortLast; // die zuletzt angezeigte Antwort
	var elementAntwortNow;  // die jetzt (aktuell) angezeigte Antwort(-box)
	var elementFABoxLast    // die zuletzt angezeigte Frage-Antwort-Box
	var elementFABoxNow     // die jetzt (aktuell) angezeigte Frage-Antwort-Box
	
	// ... wenn die interne JS-Variable definiert ist
	if (typeof twZuletztAngezeigteId != "undefined") {
		
		// erstmal alles zuletzt angezeigte wieder zurücksetzen:
		// wenn schonmal eine Antwort angezeigt wurde
		if (twZuletztAngezeigteId != '') {			
			// zuletzt angezeigtes Element holen
			if (elementAntwortLast = document.getElementById(twZuletztAngezeigteId)) {
				// die (zuletzt angezeigte) Antwort wieder verstecken
				elementAntwortLast.style.display = "none";
				if (elementFABoxLast = elementAntwortLast.parentNode) {				
					// den Border um die (gesamte) Frage-Antwort-Box entfernen
					elementFABoxLast.style.border = "0px";
					// Abstände der Frage-Antwort-Box wieder zurücksetzen
					elementFABoxLast.style.margin = "0px"
					// Hintergrundfarbe der Frage-Antwort-Box wieder zurücksetzen
					elementFABoxLast.style.backgroundColor = "#ffffcc"
					// Hintergrundfarbe der Frage (<a>) wieder zurücksetzen
					elementFABoxLast.childNodes[1].style.backgroundColor = "#ffffcc"
					// Abstände der Frage (<a>) wieder zurücksetzen
					elementFABoxLast.childNodes[1].style.margin = "0px"
				}
			}
		} 
		
		// der (internen) JS-Variable den neuen (übergebenen) Wert zuweisen
		twZuletztAngezeigteId = id;
		
		// die "jetztige" Antwort anzeigen (und Aussehen machen)
		if (elementAntwortNow = document.getElementById(id)) {
			// die Antwort anzeigen
			elementAntwortNow.style.display = "block";
			if (elementFABoxNow = elementAntwortNow.parentNode) {
				// den Border um die (gesamte) Frage-Antwort-Box setzen
				elementFABoxNow.style.border = "2px groove #bbff00";
				// Abstände der Frage-Antwort-Box setzen
				elementFABoxNow.style.margin = "10px";
				// Hintergrundfarbe der Frage-Antwort-Box setzen
				elementFABoxNow.style.backgroundColor = "#ffffaa";
				// Hintergrundfarbe der Frage (<a>) setzen
				elementFABoxNow.childNodes[1].style.backgroundColor = "#ffffaa";
				// Abstände der Frage (<a>) setzen
				elementFABoxNow.childNodes[1].style.margin = "4px 12px 4px 12px";
			}
		}
	} 
}


/**
 * Versteckt alle Antworten beim Laden des <body>.
 */
function twVersteckeAlleAntworten() {
	var arrDivs = document.getElementsByTagName("div")
	
	for (i=0; i<arrDivs.length; i++) {
		var divId;
		var teilstring;
		var div;
		if (divId = document.getElementsByTagName("div")[i].id) {
			//alert ("divId: "+ divId);
			if (teilstring = divId.substr(0, 7)) {
				//alert ("teilstring: "+ teilstring);
				if (teilstring == "antwort") {
					if (div = document.getElementById(divId)) {
						div.style.display = "none";
						//alert ("style.display von "+ divId+ " ist: "+ div.style.display);
					}
				}
			}
		}
	}
}
