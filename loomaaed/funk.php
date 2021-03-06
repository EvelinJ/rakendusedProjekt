<?php


function connect_db(){
    global $connection;
    $host="localhost";
    $user="test";
    $pass="t3st3r123";
    $db="test";
    $connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
    mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function logi(){
	// siia on vaja funktsionaalsust (13. nädalal)
    global $connection;
	
	if( !empty($_SESSION['notices']) ) {
		header('Location: views/puurid.html');
	}
	
	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
		
		$errors=array();
		
		if ( empty($_POST['nimi']) ) {
			$errors[] = "Nimi on kohustuslik";
		}
		
		if ( empty($_POST['puur']) ) {
			$errors[] = "Puur on kohustuslik";
		}
		
		if ( empty($_POST['liik']) ) {
			$errors[] = "Pilt on kohustuslik";
		}
		
		if ( empty($errors) ) {
			$kasutaja = mysqli_real_escape_string($connection, $_POST['username']);
			$parool = mysqli_real_escape_string($connection, $_POST['passw']);
			
			$query = "SELECT * FROM ejogi__kylastajad";
			$result = mysqli_query($connection, $query);
		}
	}
	
	
	include_once('views/login.html');
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function kuva_puurid(){
	// siia on vaja funktsionaalsust
	/*if ( empty($_SESSION['notices']) ) {
		header('Location: views/login.html');
	}*/
	
	global $connection;
	$query = 'SELECT DISTINCT Puur FROM ejogi__loomaaed ORDER BY Puur ASC';
	$result = mysqli_query($connection, $query);
	
	$puurid = array();
	
	while ($puuri_nr=mysqli_fetch_assoc($result)) {
		$query_2 ='SELECT * FROM ejogi__loomaaed WHERE Puur ='.mysqli_real_escape_string($connection, $puuri_nr['Puur']);
		$result_2 = mysqli_query($connection, $query_2);

		while($loomarida=mysqli_fetch_assoc($result_2)) {
			$puurid[$puuri_nr['Puur']][]=$loomarida;
		}
		
	}
	
	echo '<pre>';
	    print_r($puurid);
	echo '</pre>';

	include_once('views/puurid.html');
	
}
var_dump(kuva_puurid());

function lisa(){
	// siia on vaja funktsionaalsust (13. nädalal)
	global $connection;
	
	if( empty($_SESSION['notices']) ) {
			header('Location: views/login.html');
	}
	
	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
		
		$errors=array();
		
		if ( empty($_POST['nimi']) ) {
			$errors[] = "Nimi on kohustuslik";
		}
		
		if ( empty($_POST['puur']) ) {
			$errors[] = "Puur on kohustuslik";
		}
		
		if ( empty($_POST['liik']) ) {
			$errors[] = "Pilt on kohustuslik";
		}
		
		if ( empty($errors) ) {
			$nimi = mysqli_real_escape_string($connection, $_POST['nimi']);
			$liik = mysqli_real_escape_string($connection, $_POST['liik']);
			$puur = mysqli_real_escape_string($connection, $_POST['puur']);
			
			$query = "INSERT INTO ejogi__loomaaed (Nimi, Liik, Puur) VALUES ('$nimi', '$liik', '$puur')";
			$result = mysqli_query($connection, $query);
			
			if ( mysqli_insert_id() > 0 ) {
		        header('Location: views/puurid.html');
	        }
		}
		
		
	}
	
	
	
	
	include_once('views/loomavorm.html');
	
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$extension = end(explode(".", $_FILES[$name]["name"]));

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>