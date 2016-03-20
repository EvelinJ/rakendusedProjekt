window.addEventListener('load', function() {
    var h1 = document.getElementById('pealkiri');
    alert(h1.innerHTML);
});

var numberMuutuja = 123;

var tekstiMuutuja = "esimene rida \n teine rida";

var booleanMuutuja = false;
var booleanMuutuja = true;

var undefinedMuutuja = undefined;
var nullMuutuja = null;

var massiiviMuutuja = [1, "tekst", [3], function() {}, false];
massiiviMuutuja[0] == 1;
massiiviMuutuja[1] == "tekst";

var meetod = function(a) {
	return this.omadus + a;
};

var objektMuutuja = {
    omadus: 123,
	meetod: meetod
};

var objekt2 = {
    omadus: 6,
	meetod: meetod
};

alert(objektMuutuja.meetod(5));
alert(objekt2.meetod(5));

"tekst" . toUpperCase();
12 . toString(2);
12 . toString(2) . substr(0, 2);

if (tingimus) {
	//tingimus kehtib
} else {
	//tingimus ei kehti
}

võrdne ==
mittevõrdne !=
suurem >
suurem kui >=
väiksem <
väiksem kui <=
vastandväärtus !

if (123==123) {
	
}

and && (true && false)
or || (true || false)

falshy: false, null, undefined, 0, ''
truthy: '0', 456, ... (kõik muud väärtused, mis ei ole falshy)

&&
tagastatakse kas vasakpoolne falshy või parempoolne väärtus, olenemata sellest kas see on falshy või truthy
||
tagastatakse kas vasakpoolne truthy või parempoolne väärtus, olenemata sellest, kas see ib falshy või truthy

123 && 456 || "abc"
tagastatakse 456
456 || "abc"
tagastatakse 456
