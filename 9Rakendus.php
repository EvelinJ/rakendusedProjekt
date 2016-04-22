<?php
//rakenduse põhifail, mida avame url-is

//algatame sessiooni
session_start();

$username = 'testkasutaja';
$password = 'testparool';

if (
    !isset ($_SERVER['PHP_AUTH_USER']) ||
	$_SERVER['PHP_AUTH_USER'] != $username ||
	$_SERVER['PHP_AUTH_PW'] != $password
) {
    header('HTTP/1.0 401 Unauthorized');
	header('WWW-Authenticate: basic realm="9Rakendus"');
	
	header('Content-type: text/plain; charset=utf-8');
	echo 'Autentimine ebaõnnestus';
	exit;
}

//tagame, et andmed oleks saadval ja neid on võimalik salvestada
require('9model.php');

//andmete lisamise ja kustutamise funktsioonid
require('9controller.php');

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
		    $result = controller_delete($_POST['kustuta']);
			break;
	}
	
	//kui result muutus true'ks suuname kasutaja ümber iseenda pihta. Juhul, kui result on false ehk ei toimunud ühtegi toimingut, siis annab veateate.
	if ($result) {
		header('location: 9Rakendus.php');
		exit;
	} else {
		header('Content-type: text/plain; charset=utf-8');
		echo 'Päring ebaõnnestus!';
		exit;
	}
}

require('9view.php');

if (empty($_SESSION['test'])) {
    $_SESSION['test'] = time();
    echo $_SESSION['test'];
} else {
    echo $_SESSION['test'];
}

?>
