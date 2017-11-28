function  mostrar(ID){
	if (document.getElementById(ID).style.display == "block") {
	document.getElementById(ID).style.display = "none";
	}
	else{
		document.getElementById(ID).style.display = "block";
	}

}
function  ocultar(ID){
	document.getElementById(ID).style.display = "none";
	$("#areatexto").hide("slow");
}