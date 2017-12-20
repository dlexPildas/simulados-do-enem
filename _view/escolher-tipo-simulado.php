
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Escolha o tipo de simulado</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript">
		function abrirProva(obj){
			window.location.href = "../_view/simulado.php?idProva="+obj;
			/*$.ajax({
				url: "../_controller/solicitarProva.php",
				type: 'post',
				data: {tipoProva: obj}
			}).done(function () {
				window.location.href = "../_view/simulado.php";
			});*/
		}
	</script>
	<link rel="stylesheet" type="text/css" href="../_css/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../_css/bootstrap/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="../_css/bootstrap/css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="../_css/bootstrap/css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../_css/estilo_simulado.css">
	<script type="text/javascript" src="../_js/chamarSelecao.js"></script>
	<script type="text/javascript" src="../_js/jquery.min.js"></script>
	<style type="text/css">
		div {
			width: 1000px;
			margin: 0 auto;
		}
		@media only screen and (max-width: 330px) {
			div {
				width: 250px;
			}
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default">
		  <div class="container-fluid">
			    <div class="navbar-header">
				      <a class="navbar-brand" href="#">SOS ENEM</a>
			    </div>
			    <ul class="nav navbar-nav navbar-right">
				<li><a style="font-size: 16px" href="#">Minha conta</a></li>
				<li><a style="font-size: 16px" href="#">Ajuda</a></li>
				<li><a style="font-size: 16px" href="#">Sair</a></li>
			</ul>

		  </div>
	</nav>

	<div class="container">
		<h2>Tipo simulado</h2>
		<h3 style="text-align: center">Selecione um modo de criação</h3>
		<div class="row">
			<div class="col-md-10">
				<a class="btn css_btn_class" href="#" role="button" onclick="abrirProva(1)">Edições anteriores</a>
				<a class="btn css_btn_class" href="#" role="button" onclick="abrirProva(2)">Áreas especificas</a>
				<a class="btn css_btn_class" href="#" role="button" onclick="abrirProva(3)">Questões oficiais</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<a class="btn css_btn_class" href="#" role="button">Questões não oficiais</a>
				<a class="btn css_btn_class" href="#" role="button">Questões mistas<br>(Oficiais e nao oficiais)</a>
			</div>
		</div>
		
	</div>
</body>
</html>