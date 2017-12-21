function mostraOculta(ID, ID2) {
	if (document.getElementById(ID).style.display == "block") {
		mostra(ID);		
		esconde(ID2);
	}
	else {
		esconde(ID);
	}

}
function mostra(TD) {
	document.getElementById(TD).style.display = "none";
}
function esconde(TD) {
	document.getElementById(TD).style.display = "block";
}
