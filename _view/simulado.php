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
	<link rel="stylesheet" type="text/css" href="../_css/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../_css/bootstrap/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="../_css/bootstrap/css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="../_css/bootstrap/css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../_css/estilo_simulado.css">
	<link rel="stylesheet" type="text/css" href="../_css/canal-enem.css">
	<link rel="stylesheet" type="text/css" href="../_css/ig-canais.css">
	<link rel="stylesheet" href="../_css/font-awesome.min.css">

	<script type="text/javascript" src="../_js/jquery.min.js"></script>
	<script src="../_css/bootstrap/js/bootstrap.js"></script>
	<link href="../_css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="../_js/cronometro.js"></script>
	<script type="text/javascript" src="../_js/simulado.js"></script>
	<!-- <script>
		window.onload = inicio;
	</script> -->

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
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="../index.html">SOS ENEM</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a style="font-size: 16px" href="../painel-do-usuario.php">Minha conta</a></li>
				<li><a style="font-size: 16px" href="#">Ajuda</a></li>
				<li><a style="font-size: 16px" href="../_controller/logout.php">Sair</a></li>
			</ul>

		</div>
	</nav>

	<div role="main" class="col-md-9" style="margin-left: 35px">


		<div class="panel panel-info"  style="font-size: 16px">
			<div class="panel-body tituloQuestao"> <div id="enunciado"></div></div>

			<div style="height: 100px">

			</div>

			<!-- Selecionar respostas-->
			<div class="radio">
				<label><input type="radio" name="optradio" id="respa"><span class="alternativa"></span></label>
			</div>
			<div class="radio">
				<label><input type="radio" name="optradio" id="respb"><span class="alternativa"></span></label>
			</div>
			<div class="radio">
				<label><input type="radio" name="optradio" id="respc"><span class="alternativa"></span></label>
			</div>
			<div class="radio">
				<label><input type="radio" name="optradio" id="respd"><span class="alternativa"></span></label>
			</div>
			<div class="radio">
				<label><input type="radio" name="optradio" id="respe"><span class="alternativa"></span></label>
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
					<script type="text/javascript">
						var lista = document.getElementById("pagina_questao");
						for(var i=0;i<90;i++){
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
						
					</script>
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
				<div class="estrelas ">
					<input type="radio" id="cm_star-empty" name="fb" value="" checked/>
					<label for="cm_star-1"><i class="fa"></i></label>
					<input type="radio" id="cm_star-1" name="fb" value="1"/>
					<label for="cm_star-2"><i class="fa"></i></label>
					<input type="radio" id="cm_star-2" name="fb" value="2"/>
					<label for="cm_star-3"><i class="fa"></i></label>
					<input type="radio" id="cm_star-3" name="fb" value="3"/>
					<label for="cm_star-4"><i class="fa"></i></label>
					<input type="radio" id="cm_star-4" name="fb" value="4"/>
					<label for="cm_star-5"><i class="fa"></i></label>
					<input type="radio" id="cm_star-5" name="fb" value="5"/>
				</div>
			</div>
		</div>
		<a href="#" role="button" style="margin-bottom: 15px" class="btn btn-success botaoFinaliza">Finalizar prova</a>


	</aside>
	<footer>

	</footer>

</body>
</html>
