<?php

$kassid= array( 
    array('nimi'=>'Sofia', 'vanus'=>2, 'varvus'=>'hall', 'meeldib'=>'mängida'), 
    array('nimi'=>'Tom', 'vanus'=>1, 'varvus'=>'hall', 'meeldib'=>'hiiri püüda'),
	array('nimi'=>'Miisu', 'vanus'=>5, 'varvus'=>'kollane', 'meeldib'=>'süüa'), 
    array('nimi'=>'Nurr', 'vanus'=>4, 'varvus'=>'kirju', 'meeldib'=>'magada')
);

foreach ($kassid as $kass) {
    include "kassid.html";
}
?>
