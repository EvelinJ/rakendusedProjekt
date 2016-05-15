<?php
//rakenduse põhifail, mida avame url-is

//algatame sessiooni
session_start();

//tagame, et andmed oleks saadval ja neid on võimalik salvestada
require('13model.php');

//andmete lisamise ja kustutamise funktsioonid
require('13controller.php');

//loogika, mis kontrollib, mis actioniga on tegu ja kutsub vastava tegevuse ehk vahendab kasutaja poolt tulnud käske õigesse kohta, see võiks ka eraldi failis olla
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    //tekitame muutuja, mida muudame, juhul kui tegevused saavad läbi ja result on ikka false, siis tekkis viga, kui on true, siis tegime kas toimingu add või delete
	$result = false;
    switch ($_POST['action']) {
        case 'add': 
		    $nimetus = $_POST['nimetus'];
			$kogus = intval($_POST['kogus']);
		    $result = controller_add($nimetus, $kogus);
		    break;
        case 'delete': 
		    $id = intval($_POST['id']);
		    $result = controller_delete($id);
			break;
		case 'register':
		    $kasutajanimi = $_POST['kasutajanimi'];
			$parool = $_POST['parool'];
			$result = controller_register($kasutajanimi, $parool);
			break;
		case 'login':
		    $kasutajanimi = $_POST['kasutajanimi'];
			$parool = $_POST['parool'];
			$result = controller_login($kasutajanimi, $parool);
			break;
	}
	
	//kui result muutus true'ks suuname kasutaja ümber iseenda pihta. Juhul, kui result on false ehk ei toimunud ühtegi toimingut, siis annab veateate.
	if ($result) {
		header('location: 13Rakendus.php');
		exit;
	} else {
		header('Content-type: text/plain; charset=utf-8');
		echo 'Päring ebaõnnestus!';
		exit;
	}
}

if( !empty($_GET['view']) ) {
	switch($_GET['view']) {
		case 'login':
		    require '13view_login.php';
			break;
		case 'register':
		    require '13view_register.php';
			break;
		default:
		    echo 'Tundmatu valik!';
			exit;
	}
} else {
	if( !controller_user() ) {
		header('Location: ' . $_SERVER['PHP_SELF'] . '?view=login');
		exit;
	}
    require('13view.php');
}

?>
