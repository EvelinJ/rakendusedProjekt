
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
		
        if (!nimetus || !kogus) {
            alert("Sisesta kõik andmed!");
            return;
        }
        
        lisaKirje(nimetus, kogus);
        
        document.querySelector("#nimetus").value = "";
        document.querySelector("#kogus").value = "";
	}
);

function lisaKirje(nimetus, kogus) {
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
            rida.parentNode.removeChild(rida);
		}
    });
}
