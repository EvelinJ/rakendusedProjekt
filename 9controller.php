<?php

function controller_add ($nimetus, $kogus) {
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
	
    $uus_massiiv = array();
    foreach ($model_data as $key => $val) {
        if ($key != $index) {
            $uus_massiiv[] = $val;
		}
	}
	
    $model_data = $uus_massiiv;
    
    return model_save();
}

?>