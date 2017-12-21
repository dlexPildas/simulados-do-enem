<?php
	include_once( "../_model/segurancaA.php" );
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
	<meta charset="UTF-8">
    <title>Tela de Logs</title>
    <link rel="stylesheet" type="text/css" href="../_css/bootstrap3.css">
</head>
<body>
	<?php 
	include('navbar-adm.php');
    ?>	
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12">

            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="col-md-3 col-lg-3 col-sm-12">

                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="btn-group-vertical" role="group" aria-label="...">               
                        <button type="button" class="btn btn-default">Gerar log de banimentos</button>
                        <button type="button" class="btn btn-default">Gerar log de acessos</button>
                        <button type="button" class="btn btn-default">Gerar log de evasão</button>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12">

                </div>
           
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">

            </div>
           
        </div>
    </div>
</body>
</html>