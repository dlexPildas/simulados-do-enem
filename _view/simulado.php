<?php header("Content-type: text/html; charset=utf-8");
require_once( "../_model/Questao.php" );
require_once( "../_model/Prova.php" );
//require_once( "../_controller/solicitarProva.php" );
//include_once( "../_model/seguranca.php" );
//include_once( "../_controller/controllerdados.php" );
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Simulado</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../_css/canal-enem.css">
	<link rel="stylesheet" type="text/css" href="../_css/ig-canais.css">
	<link rel="stylesheet" href="../_css/font-awesome.min.css">
    <link rel="stylesheet" href="../_css/simulado.css">

	<script type="text/javascript" src="../_js/jquery.min.js"></script>
	<script src="../_css/bootstrap/js/bootstrap.js"></script>
	<link href="../_css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="../_js/cronometro.js"></script>
	<script type="text/javascript" src="../_js/simulado.js"></script>
	<script>
		window.onload = inicio;
	</script>

	<script type="text/javascript">
		function selectIndex(str) {
			document.getElementById(str).className += " active";
			for (var i = 1; i <= 90; i++) {
				strin = str.substring(0, 5) + i;
				if (strin !== str) {
					if (document.getElementById(strin).className === "item active") {
						document.getElementById(strin).className = "item";
						return;
					}
				}
			}
		}
	</script>

</head>
<body>
    <?php include('../navbar-usuario.php'); ?>

	<div role="main" class="col-md-9" style="margin-left: 35px">


		<div class="painel-elevado"  style="font-size: 16px">
			<div class="panel-body tituloQuestao"> <div id="enunciado"></div></div>

			<div style="height: 100px">

			</div>

			<!-- Selecionar respostas-->
			<div class="radio">
				<label><input type="radio" name="optradio" id="respa" onclick="selecionarResposta('A')"><span class="alternativa"></span></label>
			</div>
			<div class="radio">
				<label><input type="radio" name="optradio" id="respb" onclick="selecionarResposta('B')"><span class="alternativa"></span></label>
			</div>
			<div class="radio">
				<label><input type="radio" name="optradio" id="respc" onclick="selecionarResposta('C')"><span class="alternativa"></span></label>
			</div>
			<div class="radio">
				<label><input type="radio" name="optradio" id="respd" onclick="selecionarResposta('D')"><span class="alternativa"></span></label>
			</div>
			<div class="radio">
				<label><input type="radio" name="optradio" id="respe" onclick="selecionarResposta('E')"><span class="alternativa"></span></label>
			</div> 

		</div>

		<!-- Botões proximo e anterior 
		<div class="pull-right">
			<a role="button" class="btn btn-info"><- Anterior</a>
			<a role="button" class="btn btn-info">Pr�xima -></a>
		</div> -->

		<nav aria-label="..." class="previous">
			<ul class="pager">
				<li><a href="#" style="font-size: 14px" onclick="anteriorQuestao()">Anterior</a></li>
				<li><a href="#" style="font-size: 14px" onclick="proximaQuestao()">Próximo</a></li>
			</ul>
		</nav>

		<footer class="simulado-indicators" style="margin-top: 70px">
			<nav>
				<ol class="indice" id="pagina_questao">
                    <!-- Os componentes dessa lista são criados em tempo de execuçao pelo javascript, isso ocorre pelo
                     fato de serem itens que variam de acordo com a quantidade de questões da prova. -->
				</ol>
			</nav>
		</footer>
	</div>

	<aside role="complementary" class="col-md-2">
		<div class="panel panel-primary">
			<div class="panel-heading" style="font-size: 16px">Cronômetro</div>
			<div class="panel-body">
				<div id="contenedor">
					<div class="reloj" id="horas" >00</div>
					<div class="reloj" id="minutos">:00</div>
					<div class="reloj" id="segundos">:00</div>
				</div>
			</div>
		</div>
		<div class="panel panel-warning">
			<div class="panel-heading" style="font-size: 16px">Achou algo errado?</div>
			<div class="panel-body">
				<a href="#" style="margin-bottom: 15px" class="btn btn-danger botao" role="button">Denunciar</a>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading" style="font-size: 16px">Avalie essa questão</div>
			<div class="panel-body">

			</div>
		</div>
		<a href="#" role="button" style="margin-bottom: 15px" class="btn btn-success botaoFinaliza" onclick="enviarSimulado()">Finalizar prova</a>


	</aside>
	<footer>

	</footer>

</body>
</html>
