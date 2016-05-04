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

