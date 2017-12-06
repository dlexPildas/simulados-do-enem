function mostraOculta(ID) {
	if (document.getElementById(ID).style.display == "block") {
		mostra(ID);		
	}
	else {
		esconde(ID);
	}

}
function mostra(ID) {
	document.getElementById(ID).style.display = "none";
}
function esconde(ID) {
	document.getElementById(ID).style.display = "block";
}
