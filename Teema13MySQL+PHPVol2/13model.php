<?php 
    $host = 'localhost';
    $user = 'test';
    $pass = 't3st3r123';
    $db = 'test';

    $l = mysqli_connect($host, $user, $pass, $db);
    mysqli_query($l, 'SET CHARACTER SET UTF8') or
            die('Error, ei saa andmebaasi charsetti seatud');
    
	//laeme kõik read korraga alla, sorteerime nimetuse järgi kasvavas järjekorras
    function model_load() {
	    global $l;
		
		$query = 'SELECT Id, Nimetus, Kogus FROM ejogi__kaubad ORDER BY Nimetus ASC';
		
		$stmt = mysqli_prepare($l, $query);
		
		mysqli_stmt_execute($stmt);
		
		//muutujad peavad olema samas järjekorras, mis select lauses
		mysqli_stmt_bind_result($stmt, $id, $nimetus, $kogus);
		
		$rows = array();
		//fetch täidab ära need muutujad, mis on bindi juures määratud $query lauses olevate väärtustega
		while (mysqli_stmt_fetch($stmt)) {
			$rows[] = array(
			    'Id'=>$id, 
				'Nimetus'=>$nimetus, 
				'Kogus'=>$kogus
			);
		}
		
		return $rows;
	}
	
	function model_add($nimetus, $kogus) {
		global $l;
		
		$stmt = mysqli_prepare($l, 
		    'INSERT INTO ejogi__kaubad (Nimetus, Kogus) VALUES (?, ?)');
			
		//si tähendab string ehk nimetus ja int ehk kogus
		mysqli_stmt_bind_param($stmt, 'si', $nimetus, $kogus);
		
		//küsimärgid asendatakse nimetuse ja koguse väärtusega
		mysqli_stmt_execute($stmt);
		
		$id = mysqli_stmt_insert_id($stmt);
		
		mysqli_stmt_close($stmt);
		
		return $id;
	}
	
	function model_delete($id) {
		global $l;
		
		$stmt = mysqli_prepare($l, 
		    'DELETE FROM ejogi__kaubad WHERE Id = ? LIMIT 1');
		
		//i tähendab küsimärgi muutuja tüüpi
		mysqli_stmt_bind_param($stmt, 'i', $id);
		
		mysqli_stmt_execute($stmt);
		
		//mitut rida mõjutati ehk kustutati
		$deleted = mysqli_stmt_affected_rows($stmt);
		
		mysqli_stmt_close($stmt);
		
		return $deleted;
	}
	
	function model_user_add($kasutajanimi, $parool) {
		global $l;
		
		$hash = password_hash($parool, PASSWORD_DEFAULT);
		
		$query = 'INSERT INTO ejogi__kasutajad (Kasutajanimi, Parool) VALUES (?,?)';
		
		$stmt = mysqli_prepare($l, $query);
		//seome query'ga need kaks muutujat ss tähendab muutujate tüüpi ehk string string
		mysqli_stmt_bind_param($stmt, 'ss', $kasutajanimi, $hash);
		
		mysqli_stmt_execute($stmt);
		
		$id = mysqli_stmt_insert_id($stmt);
		
		mysqli_stmt_close($stmt);
		
		return $id;
	}
	
	function model_user_get($kasutajanimi, $parool) {
		global $l;
		
		$query = 'SELECT Id, Parool FROM ejogi__kasutajad WHERE Kasutajanimi=? LIMIT 1';
		
		$stmt = mysqli_prepare($l, $query);
		
		//juhul kui SQL lause on vale, siis saame teate
		if ( mysqli_error($l) ) {
			echo mysqli_error($l);
			exit;
		}
		
		mysqli_stmt_bind_param($stmt, 's', $kasutajanimi);
		
		mysqli_stmt_execute($stmt);
		
		mysqli_stmt_bind_result($stmt, $id, $hash);
		
		mysqli_stmt_fetch($stmt);
		
		mysqli_stmt_close($stmt);
		
		
		if ( password_verify($parool, $hash) ) {
			return $id;
		} else {
			return false;
		}
	}

