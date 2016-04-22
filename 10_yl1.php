<?php 
	
    $teksti_taustavarvus="#fff"; // vaikimisi valge
    if (isset($_POST['taustavarvus'])) {
        $teksti_taustavarvus=htmlspecialchars($_POST['taustavarvus']);
    }
	
	$teksti_varvus="#fff"; // vaikimisi valge
    if (isset($_POST['varvus'])) {
        $teksti_varvus=htmlspecialchars($_POST['varvus']);
    }
	
	$joone_laius=2;
    if (isset($_POST['laius'])) {
        $joone_laius=$_POST['laius'];
    }
	
	$joone_style ="solid";
    if (isset($_POST['stiil']) ) {
        $joone_style = htmlspecialchars($_POST['stiil']);
	}
	
	$piirjoonevarvus="Black";
	if (isset($_POST['joonevarvus'])) {
        $piirjoonevarvus=htmlspecialchars($_POST['joonevarvus']);
    }
	$piirjoon=$piirjoonevarvus." ".$joone_style." ".$joone_laius;
	
	$joone_raadius = 10;
	if (isset($_POST['raadius'])) {
        $joone_raadius=$_POST['raadius'];
    }
	
?><!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>10_yl1</title>
		
        <style type="text/css">
            #kuva-tekst {
				background: <?php echo $teksti_taustavarvus; ?>;
				color: <?php echo $teksti_varvus; ?>;
				border: <?php echo $piirjoon; ?>px;
				border-radius: <?php echo $joone_raadius; ?>px;
				padding: 10px;
				min-height: 100px;
				max-width: 400px;
			}
			
        </style>
    </head>
	
    <body>
	    <?php
		    $stiilid = array("solid", "dashed", "dotted", "none", "double");
		?>
		
		<!-- prindib sisestatud teksti -->
		<div id="kuva-tekst"> 
		    <?php 
			    if (isset($_POST['tekst'])) {
					$text = htmlspecialchars($_POST['tekst']);
				    echo $text;
                    //setcookie("tekst", $text);
				}
			?>
		</div>
		
	    <form id="teksti-vormindus" method="post" action="10_yl1.php">
	        <table>
		        <tr>
			        <td>
                        <textarea name="tekst" size="50" placeholder="Sisesta tekst"><?php if (isset($text)) echo $text; ?></textarea>
			        </td>
			    </tr>
			    <tr>
			        <td>
		                <input type="color" id="taustavarvus" name="taustavarvus" value="<?php echo $teksti_taustavarvus; ?>">
						<label for="taustavarvus">Taustavärvus</label>
			        </td>
			    </tr>
			    <tr>
			        <td>
		                <input type="color" name="varvus" value="<?php echo $teksti_varvus; ?>">
						<label for="varvus">Tekstivärvus</label>
			        </td>
			    </tr>
		    </table>
		    <fieldset>
		        <legend>Piirjoon</legend>
			        <table>
			            <tr>
			                <td>
		                        <input type="number" name="laius" min="0" max="20" step="1" value="<?php echo $joone_laius; ?>">
								<label>Piirjoone laius (0-20px)</label>
			                </td>
			            </tr>
						<tr>
			                <td>
		                        <select name="stiil">
								    <?php foreach($stiilid as $stiil) : ?>
									    <option><?php echo $stiil; ?></option>
									<?php endforeach; ?>
								</select>
			                </td>
			            </tr>
			            <tr>
			                <td>
		                        <input type="color" name="joonevarvus" value="<?php echo $piirjoonevarvus; ?>">
								<label for="joonevarvus">Piirjoone värvus</label>
			                </td>
			            </tr>
					    <tr>
			                <td>
		                        <input type="number" name="raadius" min="0" max="100" step="1" value="<?php echo $joone_raadius; ?>">
								<label>Piirjoone nurga raadius (0-100px)</label>
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
