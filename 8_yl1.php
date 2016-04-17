<?php 
    //prindib sisestatud teksti
	if (!empty($_POST["tekst"])) {
		echo htmlspecialchars($_POST["tekst"]);
	}
	
    $taustavarvus="#fff"; // vaikimisi valge
    if (isset($_POST['taustavarvus']) && $_POST['taustavarvus']!="") {
        $taustavarvus=htmlspecialchars($_POST['taustavarvus']);
    }
	
	$tekstivarvus="#fff"; // vaikimisi valge
    if (isset($_POST['tekstivarvus']) && $_POST['tekstivarvus']!="") {
        $tekstivarvus=htmlspecialchars($_POST['tekstivarvus']);
    }
	
    if (isset($_POST['laius']) && $_POST['laius']!="") {
        $laius=$_POST['laius'];
    }
	
	if (isset($_POST['piirjoonevarvus']) && $_POST['piirjoonevarvus']!="") {
        $piirjoonevarvus=htmlspecialchars($_POST['piirjoonevarvus']);
    }
	
?><!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>8_yl1</title>
		
        <style>
            #kuva-tekst {
				background: <?php echo $taustavarvus; ?>;
				color: <?php echo $tekstivarvus; ?>;
				border: <?php echo $laius; ?> solid <?php echo $piirjoonevarvus; ?>;
			}
			
        </style>
		
        <script>
	        window.onload = function() {
		        var tekst = document.getElementById('kuva-tekst'); // lehe laadimine lõpetatud. Siia funktsiooni sisse kirjutatakse elementide mõjutamise käsud
			    function tekst(a) {
                    if (a.tekst == true) {
                        a.kuva-tekst.value = a.tekst.value;
                    }
                }
		    }
	    </script>
    </head>
	
    <body>
	    <form id="teksti-vormindus" method="post" action="8_yl1.php">
	        <table>
		        <tr>
			        <td>
                        <textarea type="text" id="kuva-tekst" name="kuva-tekst" size="50"></textarea>
			        </td>
			    </tr>
		        <tr>
			        <td>
                        <textarea name="tekst" size="50" placeholder="Sisesta tekst"></textarea>
			        </td>
			    </tr>
			    <tr>
			        <td>
		                <input type="color" id="taustavarvus" name="taustavarvus" value="#fff">Taustavärvus
			        </td>
			    </tr>
			    <tr>
			        <td>
		                <input type="color" name="tekstivarvus" value="#0000FF">Tekstivärvus
			        </td>
			    </tr>
		    </table>
		    <fieldset>
		        <legend>Piirjoon</legend>
			        <table>
			            <tr>
			                <td>
		                        <input type="number" name="laius" min="0" max="20">Piirjoone laius (0-20px)
			                </td>
			            </tr>
			            <tr>
			                <td>
		                        <input type="color" name="piirjoonevarvus" value="#00FF00">Piirjoone värvus
			                </td>
			            </tr>
					    <tr>
			                <td>
		                        <input type="number" name="piirjoone-nurga-raadius" min="0" max="100">Piirjoone nurga raadius (0-100px)
			                </td>
			            </tr>
			        </table>
		    </fieldset>
		    <table>
			    <tr>
			        <td>
		                <button type="submit" id="esita-nupp">Esita</button>
			        </td>
			    </tr>
		    </table>
		</form>
    </body>
</html>
