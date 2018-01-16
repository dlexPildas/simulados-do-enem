//var tipoProva = window.location.href[window.location.href.length-1]

var tipoProva = window.location.href;
indexInicio = tipoProva.indexOf('?');
substring = tipoProva.substr(indexInicio);

var url = "http://localhost/simulados-do-enem/_controller/solicitarProva.php"+substring;

var idProva;
var questoesProva;

var indexAtual;
var respostas = new Map();

/*window.onload = initPage;
function initPage(){
    buscarProva();
}*/

buscarProva();
function buscarProva() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        	var resposta = JSON.parse(this.response);
            if (resposta == null) {
                mensagemErro();
                irParaPagina("http://localhost/simulados-do-enem/_view/escolher-tipo-simulado.php");
            }
        	setIdProva(resposta.idProva);
        	setQuestoesProva(resposta.questoes);
            setTempo(resposta.dataprova, null);
        	setIndexAtual(0);
        	criarIndices(questoesProva.length); //Cria os indices das questoes de acordo com a quantidade.
            apresentarQuestao(0);
       }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}

function setIdProva(idProvaRecebida){
	idProva = idProvaRecebida;
}
function setQuestoesProva(questoes){
	questoesProva = questoes;
}

function setIndexAtual(indexatual) {
	indexAtual = indexatual;
}

function apresentarQuestao(index){
	indexAtual = index;
	//selectIndex();
	document.getElementById("enunciado").innerText = questoesProva[index].enunciado;
	$('#respa').parent().children('.alternativa').text(questoesProva[index].respostaA);
	$('#respb').parent().children('.alternativa').text(questoesProva[index].respostaB);
	$('#respc').parent().children('.alternativa').text(questoesProva[index].respostaC);
	$('#respd').parent().children('.alternativa').text(questoesProva[index].respostaD);
	$('#respe').parent().children('.alternativa').text(questoesProva[index].respostaE);

	carregarMarcacao(); //Carrega a letra marcada na questão
}

function criarIndices(quant) {
    var lista = document.getElementById("pagina_questao");
    if(lista != null) {
        for (var i = 0; i < quant; i++) {
            var li = document.createElement('li');
            if (i == 0) {
                li.setAttribute('class', 'item active');
                //li.classList += "item active";
            } else {
                li.setAttribute('class', 'item');
                //li.classList += "item";
            }

            li.setAttribute('id', 'index' + (i + 1));
            li.setAttribute('onclick', 'selectIndex(this.id); apresentarQuestao(' + i + ');');
            li.innerText = i + 1;
            lista.appendChild(li);
        }
    }

}

function marcarIndice(index){
	prox = 'index'+(indexAtual+1);
    for(var i=1; i<questoesProva.length+1; i++){
        var elemento = document.getElementById('index'+i);
    	if (elemento.className == 'item active'){
            elemento.setAttribute('class', 'item');
            document.getElementById(prox).setAttribute('class', 'item active');
            return;
		}
	}

}

function proximaQuestao(){
    if(indexAtual < questoesProva.length-1) {
    	indexAtual++;
        marcarIndice(indexAtual);
        apresentarQuestao(indexAtual);
    }
}

function anteriorQuestao(){
	if(indexAtual > 0) {
		indexAtual--;
        marcarIndice(indexAtual);
        apresentarQuestao(indexAtual);
    }
}

function selecionarResposta(letra_resp) {
	console.log(questoesProva[indexAtual].idQuestao + ":" + letra_resp);
	respostas.set(questoesProva[indexAtual].idQuestao, letra_resp);
}

//Carrega marcação anteriores das questoes.
function carregarMarcacao() {
    var letra = respostas.get(questoesProva[indexAtual].idQuestao);
    switch (letra) {
		case 'A':
			document.getElementById('respa').checked = true;
			break;
        case 'B':
            document.getElementById('respb').checked = true;
            break;
        case 'C':
            document.getElementById('respc').checked = true;
            break;
        case 'D':
            document.getElementById('respd').checked = true;
            break;
        case 'E':
            document.getElementById('respe').checked = true;
            break;
        default :
            document.getElementById('respa').checked = false;
            document.getElementById('respb').checked = false;
            document.getElementById('respc').checked = false;
            document.getElementById('respd').checked = false;
            document.getElementById('respe').checked = false;
	}
}

function enviarSimulado(){
    respostasString = mapForString();
    tempo = getTempoTotal();
    $.ajax({
        url: "../_controller/finalizaSimulado.php",
		type: 'post',
		data: {idSimulado:idProva,respostas:respostasString,tempo:tempo}
    }).done(function () {
        alert("Seu simulado foi finalizado com sucesso.");
        //irParaPagina("../paineldeusuario.php");
    });
}

function denuncia(){
  var idQuest = questoesProva[indexAtual].idQuestao;
  $.ajax({
      url: "../_controller/xxxxxx.php",
  type: 'post',
  data: {idQuestao:idQuest}
  }).done(function () {
      alert("Sua denúncia foi realizada com sucesso.");
      //irParaPagina("../paineldeusuario.php");
  });
}

function mapForString(){
    respString = "";
    for(var i=0; i < questoesProva.length; i++){
        valor = questoesProva[i].idQuestao + ":" +respostas.get(questoesProva[i].idQuestao);
        if(valor != null){
            respString += valor+",";
        }
    }
    return respString;
}

function mensagemErro(){
    alert("Nao foi possivel criar um simulado com as configurações pedidas. Selecione outra opção.");
}

function irParaPagina(url){
    window.location.href = url;
}
