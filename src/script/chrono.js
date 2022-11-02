//Temps initial : 30s
var temps = 30;
const timerElement = document.getElementById("chrono");

//Décrémente temps
function diminuerTemps() {
	if (temps < 10) {
		temps = "0" + temps;
	}
	timerElement.innerText = temps;
	if (temps <= 0) {
		temps = 0;
		timerElement.innerText = "Time's up !";
	} else {
		temps--;
	}
}

//Démarre le timer.
function start_timer() {
	setInterval(diminuerTemps, 1000); //appelle diminuerTemps toutes les secondes.
}

//Timer line
/*
function startTimerLine (){
	counterLine = setInterval (timer, 29);
	var time = 0;
	function timer (){
		time += 1;
		startTimerLine.style.width = time + "px";
		if (time > 549) clearInterval (counterLine);
	}
}*/

start_timer();
//startTimerLine();
