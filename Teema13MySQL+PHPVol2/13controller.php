<?php

    function controller_add($nimetus, $kogus) {
		if ($nimetus == '' || $kogus <= 0) {
			return false;
		}
		
		return model_add($nimetus, $kogus);
	}
	
	function controller_delete($id) {
		return model_delete($id);
	}
	
	function controller_user() {
		if( empty($_SESSION['user']) ) {
			return false;
		}
		return $_SESSION['user'];
	}
	
	function controller_register($kasutajanimi, $parool) {
		if ($kasutajanimi == '' || $parool == '') {
			return false;
		}
		
		return model_user_add($kasutajanimi, $parool);
	}
	
	function controller_login ($kasutajanimi, $parool) {
		if ($kasutajanimi == '' || $parool == '') {
			return false;
		}
		
		$id = model_user_get($kasutajanimi, $parool);
		
		if (!$id) {
			return false;
		}
		
		$_SESSION['user'] = $id;
		
		return $id;
	}