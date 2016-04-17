<?php

// Fail peab olema veebiserveri kasutaja jaoks kirjutatav
$baas = 'Rakenduse andmebaas.txt';

// loeme faili sisu tekstina muutujasse
$andmebaas = file_get_contents($baas);
// deserialiseerime teksti JSON formaadist masiiviks
$andmebaas = json_decode($andmebaas, true);

//kontrollib kas on post (vormi lisamise post või kustutamise post)
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

	//isset kontrollib on olmas kustuta nimeline muutuja (vastav post on 9Rakendus.php failis), kui on siis kustutab unsetiga massiivist vastavalt indeksilt elemendi ära, kui ei ole siis lisab kirje
    if (isset ($_POST['kustuta'])) {
		// eemaldame valitud indeksiga elemendi massiivist
        $kustuta = intval($_POST['kustuta']);
        unset($andmebaas[$kustuta]);
	} else {
	    //kirje lisamine
        $nimetus = $_POST['nimetus'];
		// kogus on number seega peame stringisisendi numbriks sundima
        $kogus = intval($_POST['kogus']);
	
        // kontrollime kas sisendväärtused on oodatud kujul või mitte
		if ( $nimetus == '' || $kogus <= 0) {
            header('Content-type: text/plain; charset="utf-8"');
            echo 'Vigased väärtused!';
		    exit;
        }
		
	    //anname andmebaasi uue elemendi, mis on ka massiiv oma nimetuse ja koguse väärtusega
        $andmebaas[] = array(
            'nimetus' => $nimetus, 
            'kogus' => $kogus
        );
	}
	
	// salvestame muudetud massiivi
	//kõigepealt serialiseerime massiivi JSON stringiks
    $andmebaas = json_encode($andmebaas);
	// salvestatakse faili, mis alles jäi peale eelmist if lauset
    file_put_contents($baas, $andmebaas);
	
    //mine tagasi esialgsele lehele
    header('location: 7Rakendus.php');
    exit;
}

?>
