<?php

//defineerime muutaja
$model_data = array();

function model_load() {
	//kutsume muutuja välja, muidu seda ei ole funktsiooni sees
    global $model_data;
	
    if (empty($_SESSION['9Rakendus'])) {
        $model_data = array();
	} else {
		//kui muutuja on olemas, siis laeme sessiooni muutujast
        $model_data = json_decode( $_SESSION['9Rakendus'], true);
	}
}

function model_save() {
    global $model_data;
	//salvestame sessiooni muutujasse massiivi
    $_SESSION['9Rakendus'] = json_encode($model_data);
	return true;
}

function model_get () {
    global $model_data;
    return $model_data;
}

model_load();

?>