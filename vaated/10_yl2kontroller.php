<?php

//algatame sessiooni
session_start();

require_once("10_yl2head.html");

$pildid = array(
		1=>array('src'=>"pildid/nameless1.jpg", 'alt'=>"nimetu 1"),
		2=>array('src'=>"pildid/nameless2.jpg", 'alt'=>"nimetu 2"),
		3=>array('src'=>"pildid/nameless3.jpg", 'alt'=>"nimetu 3"),
		4=>array('src'=>"pildid/nameless4.jpg", 'alt'=>"nimetu 4"),
		5=>array('src'=>"pildid/nameless5.jpg", 'alt'=>"nimetu 5"),
		6=>array('src'=>"pildid/nameless6.jpg", 'alt'=>"nimetu 6"),
	);
$page="pealeht";
if (isset($_GET['page']) && $_GET['page']!=""){
	$page=htmlspecialchars($_GET['page']);
}


switch($page){
	case "10_yl2galerii":
		include("10_yl2galerii.html");
	break;
	case "10_yl2vote":
		include("10_yl2vote.html");
	break;
	case "10_yl2tulemus":
		$id=false;
		if (isset($_POST['pilt']) && isset($pildid[$_POST['pilt']]))
			$id=htmlspecialchars($_POST['pilt']);
		include("10_yl2tulemus.html");
	break;
	default:
	    include('pealeht.html');
}


require_once("foot.html");
?>
