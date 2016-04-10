<?php $taustavarvus="#fff"; // vaikimisi valge
if (isset($_POST['taustavarvus']) && $_POST['taustavarvus']!="") {
    $taustavarvus=htmlspecialchars($_POST['taustavarvus']);
} 
?><!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>8_yl1</title>
		
        <style>
            #taustavarvus {
				background: <?php echo $taustavarvus; ?>; 
			}
        </style>
		
        <script>
	        window.onload = function() {
		        //var tekst = document.getElementById('kuva-tekst'); // lehe laadimine lõpetatud. Siia funktsiooni sisse kirjutatakse elementide mõjutamise käsud
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
                        <input type="text" id="kuva-tekst" name="kuva-tekst" size="50">
			        </td>
			    </tr>
		        <tr>
			        <td>
                        <input type="text" name="tekst" size="50" placeholder="Sisesta tekst">
			        </td>
			    </tr>
			    <tr>
			        <td>
		                <input type="color" id="taustavarvus" name="taustavarvus">Taustavärvus
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
		                        <input type="number" name="piirjoone-laius" min="0" max="20">Piirjoone laius (0-20px)
			                </td>
			            </tr>
			            <tr>
			                <td>
		                        <input type="color" name="piirjoone-varvus" value="#00FF00">Piirjoone värvus
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
