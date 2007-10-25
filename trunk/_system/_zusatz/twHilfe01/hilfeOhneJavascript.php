<?
$fragen = array();
$antworten = array();


/* Fragen und Antworten verwalten START */
$fragen[0] = "Was ist der Unterschied zwischen 'angemeldet' und 'nicht angemeldet'?";
$antworten[0] = "Solange man nicht zur Kasse geht (also den Bestellvorgang einleitet), " .
		"muss man auch nicht angemeldet sein. " .
		"Wenn man jedoch unangemeldet eine längere Pause macht (also länger als ca. 15 Minuten nix anklickt), " .
		"dann wird vom System der Inhalt des Warenkorbes gelöscht. <br />" .
		"Ist man jedoch angemeldet, dann erfolgt diese Löschung des Warenkorbinhaltes nicht. " .
		"Im Gegenteil, der Warenkorbinhalt ist dann sogar beim nächsten Anmelden bei 'pimp-dein-shirt' noch vorhanden " .
		"(also sogar auch, wenn man sich irgendwann von einem anderen PC aus anmeldet).";

$fragen[1] = "Wie kann ich mich anmelden?";
$antworten[1] = "Man meldet sich entweder gleich an, wenn man auf 'pimp-dein-shirt' kommt, " .
		"oder erst wenn man wirklich einen Bestellvorgang einleiten möchte.<br />" .
		"Um sich anzumelden, klickt man einfach auf der Seite ganz oben rechts auf 'Anmelden'. <br />" .
		"Nun gibt es zwei Möglichkeiten, Entweder man ist schon Kunde bei 'pimp-dein-shirt', " .
		"oder man ist noch kein Kunde.<br />" .
		"Wenn man schon Kunde ist, dann gibt man einfach seine Email-Adresse und Passwort ein " .
		"und klickt auf 'Anmelden'.<br />" .
		"Wenn man noch kein Kunde bei 'pimp-dein-shirt' ist, dann muss man erst einmal " .
		"ein neues Kundenkonto erstellen. Aber keine Angst, das ist ganz einfach. <br />" .
		"" .
		"Benötigt wird nur die Adresse (dass die Bestellung auch an Sie gesendet werden kann), Email und einem  " .
		"(nur die mit '*' gekennzeichneten Felder sind Pflichtfelder).<br />" .
		"Dort wird nach der Adresse, der Email und nach einem Passwort gefragt. " .
		"Ein Passwort muss man sich selbst ausdenken und dieses dann zweimal eingeben " .
		"(Zweimal-Eingabe deshalb, weil nur so auf evtl. Tippfehler geprüft werden kann).<br />" .
		"Unten klickt man dann auf 'Information senden'.<br /> " .
		"Das System prüft nun kurz, ob alle Daten ordnungsgemäß eingegeben wurden und sendet eine E-Mail an die soeben angegebene E-Mail-Adresse.";

$fragen[2] = "Test mit html-Code";
$antworten[2] = "So kann ich 02";

$fragen[3] = "Wie kann ich 03";
$antworten[3] = "So kann ich 03";

$fragen[4] = "Wie kann ich 04";
$antworten[4] = "So kann ich 04";

$fragen[5] = "Wie kann ich 05";
$antworten[5] = "So kann ich 05";

$fragen[6] = "Wie kann ich 06";
$antworten[6] = "So kann ich 06";

$fragen[7] = "Wie kann ich 07";
$antworten[7] = "So kann ich 07";

$fragen[8] = "Wie kann ich 08";
$antworten[8] = "So kann ich 08";

$fragen[9] = "Wie kann ich 09";
$antworten[9] = "So kann ich 09";
/* Fragen und Antworten verwalten END */



// das Style (in Funktion, wegen Übersichtlichkeit)
twMachStylesheet();


// die Überschrift
twShowUeberschrift();


// alle Fragen anzeigen
twShowAlleFragen($fragen);


// alle Antworten anzeigen
$i = 0;
foreach ($antworten as $antwort) {
	echo '<a name="anker'. $i. '"></a>';  // der Anker
	twShowFrageBeiAntwort($fragen[$i]);             // die Frage
	twShowAntwort($antwort);              // die Antwort
	twShowButtons();                      // die Buttons 'Inhalt' und 'Schließen'
	$i++;
}



/* Funktionen --------------------------------------------------------------- */

function twMachStylesheet() { ?>
	<style>
		.frage {
			font-size: 1.1em;
			text-align: center;	
		}
		.frage a {
			
		}
		.antwort {
			
		}
		.boxButtons {
			text-align: right;
		}
		.btnInhalt {
			text-decoration: none;
		}
		.btnClose {
			
		}
	</style> <?
}


function twShowUeberschrift() { ?>
	<a name="ankerUeberschrift"></a>
	<h3>Hilfe zum Shirtbemaler</h3> <?
}


function twShowAlleFragen($fragen) { ?>
	<a name="ankerAlleFragen"></a> <?
	$i = 0;
	foreach ($fragen as $frage) { ?>
		<div class="frage">
			<a href="#anker<?=$i?>" ><?=$frage?></a>
		</div> <?
		$i++;
	} ?>
	<hr> <?
}


function twShowFrageBeiAntwort($frage) { ?>
	<div class="frage">
		<?=$frage?>
	</div> <?
}


function twShowAntwort($antwort) { ?>
	<div class="antwort">
		<?=$antwort?>
	</div> <?
}


function twShowButtons() { ?>
	<div class="boxButtons">
		<a class="btnInhalt" href="#ankerAlleFragen"><input type="button" value="zum Inhalt" /></a>
		<input class="btnClose" type="button" value="Fenster schließen" onclick="window.close()" style="text-align:right;">
	</div> <?
}

