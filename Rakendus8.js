
document.querySelector("#kuva-lisa-vorm").addEventListener( //otsime üles selle id-ga nupu ja seame listeneri, mis toimub juhul kui käivitub klikk ja siis käivitab sellise funktsiooni
    "click",
    function(event){
        document.querySelector("#lisa-vorm-vaade").style.display='block'; //otsitakse üles element vorm ja kuvatakse see (vaikimisi on none, mis on html lehel css-is määratud)
	}
); //querySelector tagastab esimese elemendi, kui oleks All, siis kõik elemendid ehk massiivi

document.querySelector("#peida-lisa-vorm").addEventListener(
    "click",
    function(event){
        document.querySelector("#lisa-vorm-vaade").style.display='none';
	}
);

document.querySelector("#lisa-vorm").addEventListener(
    "submit", //submit suunab lehelt minema, aga et seda ei juhtuks teeme eventi
    function(event){
        event.preventDefault(); //ära navigeeri lehelt minema
        
        var nimetus = document.querySelector("#nimetus").value; //salvestame lahtri väärtuse muutujasse (string väärtus)
        var kogus = Number(document.querySelector("#kogus").value); //number on ka string väärtus, et saaks aru, et number paneme Number()
		
        if (!nimetus || kogus <= 0) {
            alert("Sisesta kõik andmed!");
            return;
        }
		
        //POST päring
        fetch('Rakendus8PHPhaldus.php', {
            method: 'post',
            body: new FormData(document.getElementById('lisa-vorm'))
        }).then(function(res){
            if (res.ok){
                return res.json();
			} else {
                throw new Error('Vigane vastuskood!');
			}
		}).then(function(data){
            //tühjendame vormi sisestusväljad
            document.querySelector("#nimetus").value = "";
            document.querySelector("#kogus").value = "";
            document.querySelector("#kirjed tbody").innerHTML = '';
			//lisatakse andmebaasist read ükshaaval
            for(var i = 0; i < data.length; i++) {
                lisaKirje(data[i].nimetus, data[i].kogus, i);
            }
			
		}).catch(function(err){
            alert('Ilmnes viga: ' + err.message);
		});
	}
);

function lisaKirje(nimetus, kogus, index) {
    var rida = document.createElement('tr');
	
    var nimetusLahter = document.createElement('td'); //teeme kaks tühja lahtrit
    var kogusLahter = document.createElement('td');
    var tegevusLahter = document.createElement('td');
	
    var kustutaNupp = document.createElement('input');
    kustutaNupp.setAttribute('type', 'button');
    kustutaNupp.value = "Kustuta rida";
    
    nimetusLahter.textContent = nimetus; //lisame lahtritele sisu
    kogusLahter.textContent = kogus;
    tegevusLahter.appendChild(kustutaNupp);
	
    rida.appendChild(nimetusLahter); //lisame parentile ehk reale child'id ehk lahtrid
    rida.appendChild(kogusLahter);
    rida.appendChild(tegevusLahter);
	
    document.querySelector("#kirjed tbody").appendChild(rida);
	
    kustutaNupp.addEventListener('click', function(event) {
        if (confirm('Kas oled kindel, et soovid rea kustutada?')) {
            fetch('Rakendus8PHPhaldus.php', {
                method: 'post',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'kustuta='+index
            }).then(function(res){
                if (res.ok){
                    return res.json();
			    } else {
                    throw new Error('Vigane vastuskood!');
			    }
		    }).then(function(data){
                //tühjendame vormi sisestusväljad
                document.querySelector("#nimetus").value = "";
                document.querySelector("#kogus").value = "";
                document.querySelector("#kirjed tbody").innerHTML = '';
			    //lisatakse andmebaasist read ükshaaval
                for(var i = 0; i < data.length; i++) {
                    lisaKirje(data[i].nimetus, data[i].kogus, i);
                }
			
		    }).catch(function(err){
                alert('Ilmnes viga: ' + err.message);
		    });
		}
    });
}

//see on GET päring, et laeks lehele minnes kohe tabeli andmetega, mis hetkel andmebaasis olemas
fetch('Rakendus8PHPhaldus.php').then(function(res){
    if (res.ok){
        return res.json();
	} else {
        throw new Error('Vigane vastuskood!');
	}
}).then(function(data){	
    for(var i = 0; i < data.length; i++) {
        lisaKirje(data[i].nimetus, data[i].kogus, i);
    }
}).catch(function(err){
    alert('Ilmnes viga: ' + err.message);
});
