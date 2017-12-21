
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Escolha o tipo de simulado</title>
		

	
	
	
	<!-- Milligram CSS minified -->
	<link rel="stylesheet" href="../_css/milligram.min.css">
	
	<!-- Main Styles -->
    <link rel="stylesheet" href="../_css/tela-inicial-adm.css">		
	<link rel="stylesheet" type="text/css" href="../_css/bootstrap3.css">
	
	
</head>
<body>
		
	<?php
		include('../navbar-usuario.php');
	?>
	
	<div class="container-fluid">		
		<div class="row">
			<div class="col-md-5 col-lg-5">

			</div>
			<div class="col-md-4 col-lg-4">
				<ul style="list-style: none">
					<br><br><br>
					<li>
						<button type="button" onclick="abrirProva(1)">Edições anteriores</button>				
					</li>	

					<li>
						<button type="button" onclick="abrirProva(2)">Áreas especificas</button>
					</li>
					<li>
						<button type="button" onclick="abrirProva(3)">Questões oficiais</button>
					</li>
									
					<li>					
						<button type="button" onclick="abrirProva(3)">Questões não oficiais</button>
					</li>
					
					<li>
						<button type="button" onclick="abrirProva(3)">Questões mistas <br>(Oficiais e não oficiais)</button>
					</li>
				</ul>																
								
			</div>
		
			<div class="col-md-3 col-lg-3">
								
			</div>
		</div>
		
	</div>
	<script type="text/javascript" src="../_js/chamarSelecao.js"></script>
	<script type="text/javascript" src="../_js/jquery.min.js"></script>
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
</body>
</html>