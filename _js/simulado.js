var tipoProva = window.location.href[window.location.href.length-1]
var url = "http://localhost/simulados-do-enem/_controller/solicitarProva.php?idProva="+tipoProva;

var idProva;
var questoesProva;

var indexAtual;
var respostas = new Map();

buscarProva();
function buscarProva() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        	var resposta = JSON.parse(this.response);
        	setIdProva(resposta.idProva);
        	setQuestoesProva(resposta.questoes);
        	apresentarQuestao(0);
        	setIndexAtual(0);
        	criarIndices(questoesProva.length); //Cria os indices das questoes de acordo com a quantidade.
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
    for(var i=0;i<quant;i++){
        var li = document.createElement('li');
        if(i==0){
            li.setAttribute('class', 'item active');
            //li.classList += "item active";
        }else{
            li.setAttribute('class', 'item');
            //li.classList += "item";
        }

        li.setAttribute('id','index'+(i+1));
        li.setAttribute('onclick','selectIndex(this.id); apresentarQuestao('+i+');');
        li.innerText = i+1;
        lista.appendChild(li);
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
    console.log(letra);
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
