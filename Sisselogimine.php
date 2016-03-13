<!DOCTYPE html>

<html>

    <head>
	    <meta charset="utf-8" />
	    <title>Sisselogimise vorm</title>
	    <link rel="stylesheet" type="text/css" href="vorm.css">
    </head>
	
    <body>
	    
		<h1>Broneerimine</h1>
		
        <?php include("menyy.php"); ?>
		
		<form method="post" action="vorm.php">
		
		    <table class="tabel">
		        <caption>Sisselogimise vorm</caption>
			    
			    <tr>
			        <th>
				        <label for="username-id">Kasutajanimi:</label>
				    </th>
				    <td>
				        <input type="text" name="username" id="username-id" placeholder="Sisesta siia kasutajanimi">
				    </td>
			    </tr>
			    
			    <tr>
			        <th>
				        <label for="password-id">Parool:</label>
				    </th>
				    <td>
				        <input type="password" name="password" id="password-id" placeholder="Sisesta siia parool">
				    </td>
			    </tr>
			    
			    <tr>
			        <td colspan="2">
				    <label>
				        <input type="checkbox" name="remember_me" value="test"> Pea mind meeles
				    </label>
				    </td>
			    </tr>
			    
			    <tr>
			        <td colspan="2">
				        <button type="submit">Logi sisse</button>
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
