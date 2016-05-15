<!doctype html>
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
			
            <form id="lisa-vorm" method="post" action="<?= $_SERVER['PHP_SELF'];?>"> <!-- php jaoks on vajalik method ja action viitab sellele failile, mille URLis avame 9Rakendus.php-->
                
				<input type="hidden" name="action" value="add">
				
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
			
            <!-- salvestab massiivist väärtused tabelisse, indeksit on vaja, et teaksime millist rida kustutada  -->
            <?php 
			// koolon tsükli lõpus tähendab, et tsükkel koosneb HTML osast
                foreach ( model_load() as $rida ): ?>
                    <tr>
                        <td>
                            <!-- vältimaks pahatahtlikku XSS sisu, kus kasutaja sisestab õige info asemel <script> tag'i, peame tekstiväljundis asendama kõik HTML erisümbolid  --> 
                            <?= htmlspecialchars($rida['Nimetus']); ?>
                        </td>
                        <td>
                            <?= $rida['Kogus']; ?>
                        </td>
                        <td>
					
                            <form method="post" action="<?= $_SERVER['PHP_SELF'];?>">
							    <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= $rida['Id']; ?>">
                                <button type="submit">Kustuta rida</button>
                            </form>
                    
                        </td>
                    </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <script src="13RakendusPHP.js"></script>
    </body>

</html>
