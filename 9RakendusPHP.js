/* eslint-env browser */
'use strict';

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
        
        var nimetus = document.querySelector("#nimetus").value; //salvestame lahtri väärtuse muutujasse (string väärtus)
        var kogus = Number(document.querySelector("#kogus").value); //number on ka string väärtus, et saaks aru, et number paneme Number()
		
        if (!nimetus || kogus <= 0) {
            alert("Sisesta kõik andmed!");
            event.preventDefault(); //ära navigeeri lehelt minema
            return;
        }
	}
);
