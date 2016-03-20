window.addEventListener ('load', function() {
    var nupud = document.querySelectorAll('div.bead');
	var i;
	for(i = 0; i < nupud.length; i++) {
		var cssFloat = nupud[i];
		cssFloat.onclick = function() {
			if(this.style.cssFloat == "left") {
				this.style.cssFloat = "right";
			} else {
				this.style.cssFloat = "left";
			}
		}
	}
});