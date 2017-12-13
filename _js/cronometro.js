var centesimas = 0;
var segundos = 0;
var minutos = 0;
var horas = 0;
function inicio() {
    control = setInterval(cronometro, 1000);
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