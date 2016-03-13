<!DOCTYPE html>

<html>

    <head>
	    <meta charset="utf-8" />
	    <title>Registreerimise vorm</title>
	    <link rel="stylesheet" type="text/css" href="vorm.css">
    </head>
	
    <body>
	    
        <h1>Broneerimine</h1>
		
        <?php include("menyy.php"); ?>
	    
		<form method="post" action="vorm.php">
		
		    <input type="hidden" name="aeg" value="2016-02-24">
		
		    <table class="tabel">
		        <caption>Registreerimise vorm</caption>
			
			    <tr>
			        <th>
				        Soovitud kasutajanimi:
				    </th>
				    <td>
				        <input type="text" name="username" placeholder="Sisesta kasutajanimi">
				    </td>
			    </tr>
			    
			    <tr>
			        <th>
				        Parool:
				    </th>
				    <td>
				        <input type="password" name="password" placeholder="Sisesta parool">
				    </td>
			    </tr>
			    
			    <tr>
			        <th>
				        Korda parooli:
				    </th>
				    <td>
				        <input type="password" name="password2" placeholder="Korda oma parooli">
				    </td>
			    </tr>
			    
			    <tr>
			        <td colspan="2">
				        <button type="submit">Registreeri</button>
				    </td>
			    </tr>
			    
		    </table>
		
		</form>
		
		<div class="autor">
		    &copy; 2016 Evelin Jõgi
		</div>
		
		<p>
		    <a href="http://validator.w3.org/check?uri=referer" target="_blank">HTMLi kontroll</a>
		</p>
		
	    <p>
	    <a href="http://validator.w3.org/check?uri=referer" target="_blank">
	    <img src="http://www.w3.org/Icons/valid-xhtml10" 
        alt="Valid XHTML 1.0 Strict" height="31" width="88">
        </a>
        </p>
    </body>
	
</html>
