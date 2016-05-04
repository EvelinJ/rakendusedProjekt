<?php

function controller_add ($nimetus, $kogus) {
    //kutsub välja andmebaasi
	global $model_data;
	
	$kogus = intval($kogus);
	
    // kontrollime kas sisendväärtused on oodatud kujul või mitte
	if ( $nimetus == '' || $kogus <= 0) {
        return false;
    }
		
	//anname andmebaasi uue elemendi, mis on ka massiiv oma nimetuse ja koguse väärtusega
    $model_data[] = array(
        'nimetus' => $nimetus, 
        'kogus' => $kogus
    );
	
	return model_save();
}

function controller_delete ($index) {
    global $model_data;
	
	$index = intval($index);
	
	//teeme uue massiivi, millest saab model_data koopia, aga me ei kopeeri sinna kustutatava indeksiga rida
    $uus_massiiv = array();
	//käime massiivi läbi ja kopeerime uude massiivi kõik read, väljaarvatud selle indeksiga, mida kustutatakse
    foreach ($model_data as $key => $val) {
        if ($key != $index) {
            $uus_massiiv[] = $val;
		}
	}
	
    $model_data = $uus_massiiv;
    //salvestame mudeli
    return model_save();
}

?>