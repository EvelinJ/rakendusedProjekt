<?php

$model_data = array();

function model_load() {
    global $model_data;
	
    if (empty($_SESSION['9Rakendus'])) {
        $model_data = array();
	} else {
        $model_data = json_decode( $_SESSION['9Rakendus'], true);
	}
}

function model_save() {
    global $model_data;
    $_SESSION['9Rakendus'] = json_encode($model_data);
	return true;
}

function model_get () {
    global $model_data;
    return $model_data;
}

model_load();

?>