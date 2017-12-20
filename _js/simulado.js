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
	document.getElementById("enunciado").innerText = questoesProva[index].enunciado;

	$('#respa').children('.alternativa').text(questoesProva[index].respostaA);
	$('#respb').parent().append('<span class="alternativa">'+questoesProva[index].respostaB+'</span>');
	$('#respc').parent().append('<span class="alternativa">'+questoesProva[index].respostaC+'</span>');
	$('#respd').parent().append('<span class="alternativa">'+questoesProva[index].respostaD+'</span>');
	$('#respe').parent().append('<span class="alternativa">'+questoesProva[index].respostaE+'</span>');
}


function proximaQuestao(){
	apresentarQuestao(indexAtual+1);
}

function anteriorQuestao(){
	apresentarQuestao(indexAtual-1);
}