var centesimas = 0;
var segundos = 0;
var minutos = 0;
var horas = 0;
function inicio() {

	if (document.cookie =! null) {
		var x = document.cookie;
		var quebra1 = x.split(";");
		var quebra2 = quebra1[1].split("=");
		var quebra3 = quebra2[1].split(":");
		horas = parseInt(quebra3[0]);
		minutos = parseInt(quebra3[1]);
		segundos = parseInt(quebra3[2]);
		control = setInterval(cronometro, 1000);
	}else{
	control = setInterval(cronometro, 1000);
}
}


function cronometro() {
    segundos++;
    document.getElementById("segundos").innerHTML = ":" + segundos;
    document.getElementById("minutos").innerHTML = ":" + minutos;
    document.getElementById("horas").innerHTML = horas;

    
    
    if(segundos === 59){
        segundos = 0;
        minutos++;
    }
    if(minutos === 59){
        minutos = 0;
        horas++;
	}

	var cont = horas+":"+minutos+":"+segundos;

	document.cookie = "conta="+cont;
    
} 

function ajustarInput(str) {
    var resul;
    resul += "";
    console.log(str)
    while (str.length <= 1) {
        resul.append("0");
    }
    resul+=str;
    return resul;
}