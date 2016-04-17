<?php
//rakenduse põhifail

//algatame sessiooni
session_start();

require('9model.php');

//andmete lisamise ja kustutamise funktsioonid
require('9controller.php');

//loogika, mis kontrollib, mis actiniga on tegu ja kutsub vastava tegevuse
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    
	$result = false;
    switch ($_POST['action']) {
        case 'add': 
		    $result = controller_add($_POST['nimetus'], $_POST['kogus']);
		    break;
        case 'delete': 
		    $result = controller_delete($_POST['kustuta']);
			break;
	}
	
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
