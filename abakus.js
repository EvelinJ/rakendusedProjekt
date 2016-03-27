window.addEventListener ('load', function() {
    var nupud = document.querySelectorAll('div.bead');
	var i;
	for(i = 0; i < nupud.length; i++) {
		var nupp = nupud[i];
		nupp.onclick = function() {
			if(this.style.cssFloat == "left") {
				this.style.cssFloat = "right";
			} else {
				this.style.cssFloat = "left";
			}
		}
	}
});