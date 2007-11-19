<?
/**
 * FAQ-Bereich  (mit Javascript).
 * Es werden nur die Fragen angezeigt. 
 * Bei Klick auf eine Frage wird die Antwort dazu direkt darunter angezeigt.
 * Um neue Frage-Antwort zu erstellen, einfach einen Block mit copy/paste 
 * einf�gen und den Text als HTML-Code eingeben -> Fertisch.
 * Ben�tigt die Dateien: 'hilfe.js' und 'hilfe.css'.
 */
?>
<?
/* ZUM COPY/PASTE: ;-) ---------------------------------------------
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Wie kann ich (Frage <?=$count?>)? 
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		So geht das ... (Antwort <?=$count?>)
		blablabla
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
------------------------------------------------------------------ */
?>




<head>
	<title>Hilfe zu pimp-dein-shirt</title>
	<link rel="stylesheet" type="text/css" href="twHilfe.css" />
	<script type="text/javascript" src="twHilfe.js"></script>
</head>
<body onload="twVersteckeAlleAntworten()">
<script type="text/javascript" src="walterzorn_de/wz_tooltip.js"></script>



<!-- Header START -->
<div id="oben">
	oft gestellte Fragen (FAQ)
</div>
<!-- Header END -->





<!-- mitte START -->
<div id="mitte">
<?
	
	
	
	
	
	twMachKategorieHeader("Anmeldung und Kundenkonto:");

	
	
	

	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Was ist der Unterschied zwischen 'angemeldet' und 'nicht angemeldet'?
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		Solange man nicht zur Kasse geht (also den Bestellvorgang einleitet), 
		muss man auch nicht angemeldet sein.<br />
		Wenn man jedoch unangemeldet eine l�ngere Pause macht (also l�nger als ca. 15 Minuten nichts anklickt), 
		dann wird vom System der Inhalt des Warenkorbes gel�scht. <br />
		Ist man angemeldet, dann erfolgt diese L�schung des Warenkorbinhaltes nicht. 
		Im Gegenteil, der Warenkorbinhalt ist dann sogar beim n�chsten Anmelden bei 
		<span class="spanPimpdeinshirt">pimp-dein-shirt</span> noch vorhanden 
		(also sogar auch, wenn man sich irgendwann von einem anderen PC aus anmeldet).
	<? 
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END	
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Wie kann ich mich anmelden?
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		Man meldet sich entweder gleich an, wenn man auf 
		<span class="spanPimpdeinshirt">pimp-dein-shirt</span> kommt, 
		oder erst wenn man wirklich einen Bestellvorgang einleiten m�chte.<br />
		Um sich anzumelden, klickt man einfach auf der Seite oben rechts auf 
		<?=twMachTooltipDirekt("Anmelden", "hier oben links<br /><img src=\'img/imgInTooltips/Screenshot_3.jpg\' />")?>  . <br />
		<hr>
		Nun gibt es zwei M�glichkeiten: Entweder man ist schon 
		<?=twMachTooltipDirekt("Kunde", "siehe Frage: \'wie ...\'")?> 
		bei <span class="spanPimpdeinshirt">pimp-dein-shirt</span>, 
		oder man ist noch kein Kunde.<br />
		Wenn man schon Kunde ist, dann gibt man einfach seine Email-Adresse und Passwort ein 
		und klickt auf 
		<?=twMachTooltipDirekt("Anmelden(nochMachen...)", "hier oben links<br /><img src=\'img/imgInTooltips/Screenshot_3.jpg\' />")?> .<br />
		Wenn man noch kein Kunde ist, dann muss man erst einmal ein neues 
		<?=twMachTooltipDirekt("Kundenkonto", "siehe Frage: \'wie ...\'")?> 
		erstellen.<br />
		Aber keine Angst, das ist ganz einfach. Ben�tigt wird nur Ihre 
		<?=twMachTooltipDirekt("Anschrift", "... Also Ihre Adresse<br />" .
				"(dass wir die Bestellung irgendwo hinschicken k�nnen).")?>, 
		Ihre 
		<?=twMachTooltipDirekt("eMail-Adresse", "... An die wir dann <br />" .
				"- bei einer Bestellung die <b>Auftrags-Best�tigung</b>,<br />" .
				"- nach Ihrer Bezahlung eine <b>Zahlungseingangs-Best�tigung</b><br />" .
				"- und wenn wir die Ware abgeschickt haben, eine <b>Versand-Nachricht</b><br />" .
				"schicken k�nnen.<br />" .
				"UND: Falls Sie einmal Ihr Passwort vergessen,<br />" .
				"k�nnen Sie nur �ber diese eMail-Adresse ein neues anfordern. ")?>  
		und ein 
		<?=twMachTooltipDirekt("Passwort", "... Welches Sie sich selbst ausdenken m�ssen<br />" .
				"und mit dem Sie sich dann immer anmelden k�nnen.")?>.<br />  
		Nur die mit '*' gekennzeichneten Felder sind 
		<?=twMachTooltipDirekt("Pflichtfelder", "Das hei�t:<br />" .
				"Wenn Sie bei den Pflichtfeldern vergessen etwas einzutippen,<br />" .
				"oder etwas falsches eintippen (z.B: bei Postleitzahl ein Wort eingeben),<br />" .
				"dann bekommen Sie eine Fehlermeldung.<br />" .
				"Die Felder ohne \'*\' k�nnen Sie frei lassen , wenn Sie m�chten.")?>.<br />
		Das Passwort muss 
		<?=twMachTooltipDirekt("zweimal", "Zweimal, weil das System nur auf diese Weise pr�fen kann<br />" .
				"dass Sie sich nicht eventuell beim Eingeben des Passwortes vertippt haben.<br />" .
				"(und Sie w�rden den Vertipper ja auch nicht merken,<br />" .
				"da Sie bei der Eingabe nur ******* sehen)")?> eingegeben werden.<br />
		Unten klickt man dann auf 
		<?=twMachTooltipDirekt("Information senden", "siehe Bild...nochMachen")?>.
		<hr>
		Das System pr�ft nun kurz, ob alle Daten ordnungsgem�� eingegeben wurden.<br />
		Falls irgendeine Eingabe noch nicht korrekt ist, wird eine 
		<?=twMachTooltipDirekt("Fehlermeldung", "Bild nochMachen")?> angezeigt.<br />
		Ist alles okay, dann k�nnen Sie das an einer 
		<?=twMachTooltipDirekt("Erfolgsmeldung", "Bild nochMachen")?> erkennen
		und Sie bekommen eine automatische E-Mail mit der 
		<?=twMachTooltipDirekt("Auftragsbest�tigung", " nochMachen")?> 
		an Ihre soeben angegebene eMail-Adresse gesendet.
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END



	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Entsprechen die Artikelbilder 100%ig dem Original? 
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		Damit Sie auch wirklich sehen was Sie kaufen, haben wir uns gro�e M�he mit 
		der Bildbehandlung gegeben. Dennoch k�nnen die Farben der Abbildungen von 
		den Farben der tats�chlichen Artikel abweichen. Die Darstellung h�ngt von 
		der jeweils benutzten Hardware und den Monitoreinstellungen ab. 
		Wir empfehlen eine Monitoraufl�sung von 1024*768 Punkten und maximale Farben.
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Kann ich bei Ihnen auch einen Katalog aller gezeigten Artikel bekommen? 
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		Wir bieten keinen gedruckten Katalog unserer Artikel an. 
		Der Katalog besteht aus unseren Internetseiten, in die wir viel zeitlichen 
		Aufwand und Geld investieren. Einige der gezeigten Sachen sind Modeartikel, 
		die nur f�r eine Saison erh�tllich sind und das Internet erm�glicht es uns, 
		diese Sachen zeitnah zu pr�sentieren.
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	twMachKategorieFooter();
	twMachTrenner();
	twMachKategorieHeader("Versandkosten, Lieferung und R�ckgabe:");
	
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Gibt es einen Mindestbestellwert?
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		Bei pimp-dein-shirt k�nnen Sie ohne einen bestimmten Mindestbestellwert einkaufen. 
		Bitte beachten Sie jedoch, dass in manchen F�llen die Versandkosten den 
		eigentlichen Warenwert �bersteigen k�nnen. 
		Ab einem Warenwert von 50,00 EUR versenden wir Ihre Bestellung innerhalb der 
		Bundesrepublik Deutschland versandkostenfrei.
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		In welche L�nder wird versendet? 
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		Wir liefern Ihre Bestellungen praktisch in alle Welt. Die jeweiligen 
		Versandkosten werden Ihnen im Warenkorb und innerhalb des Bestellvorganges angezeigt. 
		Bitte beachten Sie, das durch regionale Unterschiede bez�glich Sendungen ins 
		Ausland h�here Versandkosten anfallen k�nnen, auf die wir keinen Einflu� haben. 
		Sollte dieser Fall eintreten, nehmen wir schnellstm�glich mit Ihnen Kontakt auf 
		und teilen Ihnen die Versandkosten und eventuell aufkommende Kosten f�r 
		Zollabwicklung/Zollbestimmungen mit.<br />
		Detaillierte Angaben zu unseren Liefer- und Versandkosten finden Sie hier.
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Wie lange dauert eine Lieferung?
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		Die Lieferzeit betr�gt innerhalb Deutschlands zwischen 2 und 5 Werktagen. 
		Bestellungen ins Ausland dauern etwas l�nger, und auch wenn es mal bei 
		nationalen Lieferungen kleinere Verz�gerungen gibt, bitten wir um Nachsicht. 
		Bestellungen f�r Selbstabholer liegen in der Regel innerhalb von 2 Werktagen 
		in der von Ihnen gew�hlten Abholstelle f�r Sie bereit. 
		�ber den Abholtermin informieren wir Sie nat�rlich rechtzeitig.
		Wir sind stets bem�ht, Ihre Bestellungen schnellstm�glich zu bearbeiten. 
		Auch am Wochenende.
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Wie werden die Lieferungen versendet? 
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		Wir versenden Ihre Bestellungen ausschlie�lich mit DHL. 
		Dies betrifft sowohl Sendungen innerhalb Deutschlands als auch Sendungen die 
		ins Ausland verschickt werden sollen.
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Kann ich abweichende Liefer- und Rechnungsadressen angeben? 
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		wei� ich doch nich ;-)
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Wie ist die R�ckgabe von Lieferungen geregelt?
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		Sie haben das Recht, die Ware innerhalb von zwei Wochen nach Eingang zur�ckzugeben. 
		Bitte entnehmen Sie die genauen Bedingungen unseren Allgemeinen Gesch�ftsbedingungen (AGB).
		Unsere Allgemeine Gesch�ftsbedingungen (AGB) finden Sie hier.
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	twMachKategorieFooter();
	twMachTrenner();
	twMachKategorieHeader("Sicherheit und Datenschutz:");
	
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Werden meine Daten sicher �bertragen? 
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		Ihre pers�nlichen Daten werden �ber eine stark verschl�sselte Verbindung 
		(sog. SSL-Verschl�ssellung) �bertragen und sind damit maximal gegen Aussp�hung gesichert.
		Durch die Verschl�sselung Ihrer Transaktionsdaten k�nnen diese Informationen 
		bei der �bertragung im Internet nicht von Unbefugten gelesen werden. 
		Bei der Verschl�sselung werden die von Ihnen eingegebenen Zeichen in einen 
		SSL-Code verwandelt, der sicher im Internet �bertragen werden kann.
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Wie werden meine Daten verwendet? 
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		Die erfassten Daten werden bei uns grunds�tzlich nur f�r interne gesch�ftliche 
		Zwecke zur Abwicklung und Verbesserung unseres Angebotes erfasst und nicht 
		an Dritte weitergegeben. 
		Keinesfalls geben wir Ihre personenbezogenen Daten einschlie�lich Ihrer 
		Adresse und eMailadresse an Dritte weiter. 
		Ausgenommen hiervon sind unsere Dienstleistungspartner, die zur Bestellabwicklung 
		die �bermittlung von Daten ben�tigen: das mit der Lieferung beauftragte Versandunternehmen, 
		das Versandlager und das mit der Zahlungsabwicklung beauftragte Kreditinstitut. 
		In diesen F�llen beschr�nkt sich der Umfang der �bermittelten Daten jedoch 
		nur auf das erforderliche Minimum.
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Werden Cookies verwendet?
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		Nur wenn Ihr Webbrowser diese Technik unterst�tzt. 
		Bei pimp-dein-shirt werden Cookies nicht vorausgesetzt: 
		Wenn Ihr Internet-Browser keine Cookies akzeptiert, schalten wir auf eine 
		andere technische Alternative ohne Cookies um � ganz automatisch.
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Wo finde ich weitere Informationen zum Datenschutz und zur Privatsph�re?
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		Der Schutz Ihrer Privatsph�re und Ihrer personenbezogenen Daten ist uns wichtig! 
		Bitte entnehmen Sie weitere Informationen zum Datenschutz und zur Privatsph�re 
		unseren Allgemeinen Gesch�ftsbedingungen (AGB). Hier
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	
	twMachKategorieFooter();
	twMachTrenner();
	twMachKategorieHeader("Bestellung und Bezahlung:");
	
	
	
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Welche Bezahlm�glichkeiten gibt es?
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		Wir akzeptieren momentan folgende Bezahlm�glichkeiten:<br />
		<ul>
			<li>
				Bestellung per Bankeinzug/Lastschriftverfahren:<br />
				F�r den Bankeinzug teilen Sie uns innerhalb des Bestellvorganges Ihre 
				Bankverbindung mit. Bitte beachten Sie, dass der Bankeinzug nur von 
				einem deutschen Girokonto aus m�glich ist.
   			Zu Ihrer Sicherheit erfolgt der Versand Ihrer Bankverbindungsdaten 
   			ausschlie�lich SSL-verschl�sselt.					
			</li>
			<li>
				Bestellung per Vorkasse:<br />
				Beim Bezahlen per Vorkasse senden wir Ihnen unsere Bankverbindungsdaten 
				innerhalb der Best�tigungs-eMail Ihrer Bestellung zu.
			</li>
			<li>
				Bestellung per Nachnahme:<br />
				Bei Bestellungen per Nachnahme fallen zus�tzliche Nachnahmegeb�hren an.
				Bitte beachten Sie bei dieser Bezahlm�glichkeit, dass die anfallenden 
				Nachnahmegeb�hren vom Empf�nger an den �berbringer/Boten zu entrichten sind.
			</li>
			<li>
				Bestellung auf Rechnung (nur f�r Firmenkunden):<br />
				Firmenkunden k�nnen auch auf Rechnung bestellen.
				Bitte geben Sie uns hierzu im Kommentarfeld innerhalb des Bestellvorganges 
				einen entsprechenden Hinweis (z.b. �Bitte Lieferung auf Rechnung�).					
			</li>
			<li>
				Barzahlung (nur f�r Selbstabholer):<br />
				Ihre Bestellung k�nnen Sie auch direkt bei uns abholen. 
				In diesem Fall bezahlen Sie Ihre Bestellung in Bar bei Abholung.
				Selbstverst�ndlich fallen bei der Selbstabholung keine Versandkosten an.					
			</li>
		</ul>
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Anleitung: Bestellung 
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		-Klamotte im Shirtbemaler bemalen (oder ne unbemalte ausm Shop) in den 
		Warenkorb legen. Solange bis man genug davon hat.<br />
		-Klick auf "zur Bestellung"<br />
		-anmelden (falls noch nicht vorher geschehen)<br />
		-Lieferanschrift gucken, Versandart w�hlen, 
		klick auf "weiter"<br />
		-Rechnungsanschrift gucken, evtl. Aktionscupon eingeben, Zahlungsart w�hlen, 
		klick auf "weiter"<br />
		-alles nochmal kontrollieren (ggf. �ndern),
		klick auf "Bestellung best�tigen"<br />
		-wenn Erfolgsnachricht -> FERTISCH<br />
		-abmelden (oder sonstwas)<br />
		-Nun bekommen Sie eine automatisch generierte eMail, die die 
		Bestellbest�tigung (=Auftragsbest�tigung) enth�lt. Darin ist unter Anderem 
		eine Zahlungsanforderung mit unseren Kontodaten enthalten.<br />
		-Ihre Bestellung wird versendet, sobald wir den Betrag erhalten haben.
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Auftragsbest�tigung 
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
			Sie erhalten kurz nach Absendung Ihrer Bestellung eine automatische 
			Auftragsbest�tigung. Bewahren Sie diese Mail bitte gut auf, denn sie enth�t 
			alle Daten Ihrer Bestellung (au�er Zahlungsdetails aus Datenschutzgr�nden). 
			Um die Bearbeitung Ihrer Bestellung zu �berwachen, klicken Sie am Ende 
			der E-Mail einfach auf den dort angegebenen Link. Es wird sich dann ein 
			Browserfenster �ffnen, in dem der Bearbeitungsstand Ihrer Bestellung 
			angezeigt wird. Sie k�nnen dort Ihre Bestellung �berpr�fen und uns ggf. eine Nachricht zusenden.
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	twMachKategorieFooter();
	twMachTrenner();
	twMachKategorieHeader("Fragen zum Shirtbemaler:");
	
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Wieso die Namen "Shirtbemaler" und "pimp-dein-shirt"? 
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		Ganz einfach: Diese Namen waren gerade mal noch frei bei der Denic, und 
		unsere Pr�fungen ergaben eben bei diesen Namen keinerlei Urheberrechts-Verletzungen.
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Wie kann ich mein Shirt mit Text bemalen? 
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		So geht das ... (Antwort <?=$count?>)
		blablabla
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Wie kann ich mein Shirt mit einem vorhandenem Motiv bemalen? 
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		So geht das ... (Antwort <?=$count?>)
		blablabla
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Wie kann ich mein Shirt mit einem eigenem Bild bemalen? 
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		So geht das ... (Antwort <?=$count?>)
		blablabla
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Welches Format/Gr��e sollte ein Bild haben, das ich f�r das Drucken selbst hochladen m�chte? 
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		So geht das ... (Antwort <?=$count?>)
		blablabla
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Wie kann ich ein Bild mit einem transparentem Hintergrund selbst erstellen?
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		So geht das ... (Antwort <?=$count?>)
		blablabla
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Welche Unterschiede haben die unterschiedlichen Druckverfahren? 
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		So geht das ... (Antwort <?=$count?>)
		blablabla
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Wie kann ich (Frage <?=$count?>)? 
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		So geht das ... (Antwort <?=$count?>)
		blablabla
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Wie kann ich (Frage <?=$count?>)? 
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		So geht das ... (Antwort <?=$count?>)
		blablabla
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Wie kann ich (Frage <?=$count?>)? 
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		So geht das ... (Antwort <?=$count?>)
		blablabla
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END
	
	
	
	// Frage-Antwort-Block START
	$count++; 
	twMachFrageHeader($count); ?>
		Wie kann ich (Frage <?=$count?>)? 
	<?
	twMachFrageFooter($count); 
	
	twMachAntwortHeader($count) ?>
		So geht das ... (Antwort <?=$count?>)
		blablabla
	<?
	twMachAntwortFooter($count); 
	// Frage-Antwort-Block END

	
	
	twMachKategorieFooter();



?>
</div> 
<!-- mitte END -->



<!-- Footer START -->
<div id="unten">
	<br /><br />
	<input class="btnClose" 
	       type="button" 
	       value="dieses Fenster schlie�en" 
	       onclick="window.close()" />
</div>
<!-- Footer END -->



</body>
</html>














<?
/* Funktionen --------------------------------------------------------------- */

function twMachKategorieHeader($ueberschrift) {
	$str = "";
	$str .= "<!-- Kategorie-Box START --> \n";
	$str .= "<div class='boxKategorie'> \n";
	$str .= "  <div class='kategorieUeberschrift'> \n";
	$str .=      $ueberschrift;
	$str .= "  </div> \n";
	echo $str;
}

function twMachKategorieFooter() {
	$str = "";
	$str .= "</div> \n";
	$str .= "<!-- Kategorie-Box END --> \n";
	echo $str;
}

function twMachTrenner() {
	$str = "";
	$str .= "<!-- Trenner START --> \n";
	$str .= "<div class='boxTrenner'> \n";
	$str .= "  &nbsp; \n";
	$str .= "</div> \n";
	$str .= "<!-- Trenner END --> \n";
	$str .= " \n";
	echo $str;
}

/**
 * Header-Code einer Frage.
 * id    = "frage"
 * class = "frage"
 */
function twMachFrageHeader($count) {
	$str = "";
	$str .= "<!-- Frage-Antwort-Box START --> \n";
	$str .= "<div id='frageAntwortBox". $count. "' class='frageAntwortBox' > \n";	
	$str .= "  <div id='frage". $count. "' class='frage' > \n";
	$str .= "    <a href='#". $count. "' ";
	//$str .= "       onmouseover='TagToTip(\"antwort". $count. "\")' ";
	$str .= "       onclick='twManageStyleDisplay(\"antwort". $count. "\")' ";
	//$str .= "       onfocus='twManageStyleDisplay(\"antwort". $count. "\")' ";
	$str .= " > \n";
	echo $str;
}


function twMachFrageFooter($count) {
	$str = "";
	$str .= "    \n";
	$str .= "    </a> \n";
	$str .= "  </div> \n";
	echo $str;
}


function twMachAntwortHeader($count) {
	$str ="";
	$str .= "  <div id='antwort". $count. "' class='antwort' > \n";
	//$str .= "    <a name='anker". $count. "'></a> \n";
	echo $str;
}


function twMachAntwortFooter($count) {
	$str = "";
	$str .= "  \n";
	$str .= "  </div> \n";
	$str .= "</div> \n";
	$str .= "<!-- Frage-Antwort-Box END --> \n";
	$str .= "\n\n\n";
	echo $str;
}


/**
 * Zeigt einen Link zu einem Tooltip.
 * einbinden z.B: <?=twMachTooltipDirekt("zum ToolTip", "der ToolTipInhalt")?>
 * @param String $link der Link-Text, also das was beim Dr�berfahren den ToolTip anzeigt
 * @param String $tip das was als Tooltip angezeigt wird (der ToolTip ansich)
 */
function twMachTooltipDirekt($link, $tip) {
	$str = "";
	$str .= "<a href=\"#\" onmouseover=\"Tip('". $tip. "')\" class=\"tooltipLink\" >";
	///$str .=    $link ."<img src='img/icon12-fragezeichen02dunkelblau.gif' border='0'/>";
	$str .=    $link;
	$str .= "</a>";
	echo $str;
}

?>