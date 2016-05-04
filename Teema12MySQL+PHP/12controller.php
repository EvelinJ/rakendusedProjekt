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