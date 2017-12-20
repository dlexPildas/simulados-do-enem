var tipoProva = window.location.href[window.location.href.length-1]
var url = "http://localhost/simulados-do-enem/_controller/solicitarProva.php?idProva="+tipoProva;

var idProva;
var questoesProva;

var indexAtual;

buscarProva();
function buscarProva() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        	var resposta = JSON.parse(this.response);
        	setIdProva(resposta.idProva);
        	setQuestoesProva(resposta.questoes);
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

function apresentarQuestao(index){
	indexAtual = index;
	//selectIndex();
	document.getElementById("enunciado").innerText = questoesProva[index].enunciado;
	$('#respa').parent().children('.alternativa').text(questoesProva[index].respostaA);
	$('#respb').parent().children('.alternativa').text(questoesProva[index].respostaB);
	$('#respc').parent().children('.alternativa').text(questoesProva[index].respostaC);
	$('#respd').parent().children('.alternativa').text(questoesProva[index].respostaD);
	$('#respe').parent().children('.alternativa').text(questoesProva[index].respostaE);
}


function proximaQuestao(){
	apresentarQuestao(indexAtual+1);
}

function anteriorQuestao(){
	apresentarQuestao(indexAtual-1);
}
