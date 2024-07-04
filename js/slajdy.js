var indexSlajdu = 0;
pokazSlajd();

var czasAutomatycznegoPrzeskoku = 5000;

setInterval(function () {
	indexSlajdu++;
	if (indexSlajdu >= document.getElementsByClassName("slajd").length) {
		indexSlajdu = 0;
	}
	pokazSlajd();
}, czasAutomatycznegoPrzeskoku);

function pokazSlajd() {
	var i;
	var slajdy = document.getElementsByClassName("slajd");
	var kropki = document.getElementsByClassName("kropka");
	for (i = 0; i < slajdy.length; i++) {
		slajdy[i].style.display = "none";
	}
	for (i = 0; i < kropki.length; i++) {
		kropki[i].className = kropki[i].className.replace(" active", "");
	}
	if (indexSlajdu >= slajdy.length) {
		indexSlajdu = 0;
	}
	slajdy[indexSlajdu].style.display = "block";
	kropki[indexSlajdu].className += " active";
}

function wybierzSlajd(n) {
	indexSlajdu = n - 1;
	pokazSlajd();
}
