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
  var adicionar = 6 - str.length;
  for (var i = 0; i < adicionar; i++) str = '0' + str;
  return str.slice(0, 5) + '-' + str.slice(-1);
}