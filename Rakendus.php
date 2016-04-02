<?php

//kontrollib kas on post (vormi lisamise post või kustutamise post)
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    //laeme sisse andmebaasi
    $andmebaas = file_get_contents('Rakenduse andmebaas.txt');
    $andmebaas = json_decode($andmebaas, true);
	
	//isset kontrollib on olmas delete nimeline muutuja, kui on siis kustutab unsetiga massiivist vastavalt indeksilt elemendi ära, kui ei ole siis lisab kirje
    if (isset ($_POST['delete'])) {
		//kustutamine
        $kustuta = intval($_POST['delete']);
        unset($andmebaas[$kustuta]);
	} else {
	    //kirje lisamine
        $nimetus = $_POST['nimetus'];
        $kogus = intval($_POST['kogus']);
	
        if ( $nimetus == '' || $kogus < 1) {
            header('Content-type: text/plain; charset="utf-8"');
            echo 'Vigased väärtused!';
		    exit;
        }
	    //anname andmebaasi uue elemendi mis on ka massiiv oma nimetuse ja koguse väärtusega
        $andmebaas[] = array(
            'nimetus' => $nimetus, 
            'kogus' => $kogus
        );
	}
	//tehakse stringiks ja salvestatakse faili, mis alles jäi peale eelmist if lauset
    $andmebaas = json_encode($andmebaas);
    file_put_contents('Rakenduse andmebaas.txt', $andmebaas);
    //mine tagasi html lehele
    header('location: Rakendus.php');
    exit;
}

?><!doctype html>
<!-- juhul kui meetod on POST, siis rakendub if lause (POST tuleb koodist vormi väljast)
salvestame uutese muutujatesse (['nimetus'] viitab name väljale)
intval muudab numbriks, muidu serverisse läheks string väärtus

kontrolli on ka vaja juhuks kui kliendi pool vea läbi laseb

salvestame väärtused massiivi (iga sisestuse väärtused eraldi arrays)
salvestame andmebaasi faili
-->
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Rakendus</title>
		
        <style>
            #lisa-vorm-vaade {
                display: none;
                border: 1px solid red;
                padding: 10px;
            }
            .paremale{
                float: right;
            }
        </style>
		
        
    </head>
	
    <body>
        <h1>Ladu</h1>
		
        <p><button type="button" id="kuva-lisa-vorm">Ava lisamise vorm</button></p>

        <div id="lisa-vorm-vaade">
            <div class="paremale">
                <button type="button" id="peida-lisa-vorm">Peida lisamise vorm</button>
            </div>
            <h2>Lisa kirje</h2>
			
            <form id="lisa-vorm" method="post" action="Rakendus.php"> <!-- php jaoks on vajalik method ja action -->
                <table>
                    <tr>
                        <td>Nimetus</td>
                        <td>
                            <input type="text" id="nimetus" name="nimetus"> <!-- php jaoks on vajalik name, kui seda ei ole, siis neid elemente ei saadeta serverisse -->
                        </td>
                    </tr>
                    <tr>
                        <td>Kogus</td>
                        <td>
                            <input type="number" id="kogus" name="kogus">
                        </td>
                    </tr>
                </table>
                <button type="submit" id="lisa-nupp">Lisa kirje</button>
            </form>
        </div>
		
        <table id="kirjed" border="1">
            <thead> <!-- tabeli päis -->
                <tr> <!-- üks rida, kaks veergu -->
                    <th>Nimetus</th>
                    <th>Kogus</th>
                    <th>Tegevused</th>
                </tr>
            </thead>
            <tbody>
			<!-- laeme faili sisu muutujasse ja muudab tekstilise väärtuse php massiiviks -->
            <?php
                $andmebaas = file_get_contents('Rakenduse andmebaas.txt');
                $andmebaas = json_decode($andmebaas, true);
            ?>
            <!-- salvestab massiivist väärtused tabelisse, indeksit on vaja, et teaksime millist rida kustutada  -->
            <?php foreach ( $andmebaas as $index => $rida ): ?>
                <tr>
                    <td>
                        <?= htmlspecialchars($rida['nimetus']); ?>
                    </td>
                    <td>
                        <?= $rida['kogus']; ?>
                    </td>
                    <td>
					
                        <form method="post" action="Rakendus.php">
                            <input type="hidden" name="delete" value="<?= $index; ?>">
                            <button type="submit">Kustuta rida</button>
                        </form>
                    
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <script src="RakendusPHP.js"></script>
    </body>

</html>
