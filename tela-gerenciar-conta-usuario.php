<?php
	include_once( "_model/segurancaA.php" );
?>
<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerenciar conta usuario</title>
    <link rel="stylesheet" type="text/css" href="_css/gerencia-conta.css">
    
			
	<!-- Milligram CSS minified -->
	<link rel="stylesheet" href="_css/milligram.min.css">
	
	<!-- Main Styles -->
    <link rel="stylesheet" href="_css/tela-inicial-adm.css">		
	<link rel="stylesheet" type="text/css" href="_css/bootstrap3.css">	

</head>

<body>

    <div class="navbar">
        <?php
            include('navbar-adm.php');
        ?>
    </div>
    <div class="container-fluid">
        <div class="row grid-responsive">
            <div class="col-sm-3 col-md-3 col-lg-3 ">
                <div id="sidebar" class="column">
                    <h5>Gerencia de contas</h5>
                    <ul>
                        <li>
                            <a href="#">Início</a>
                        </li>
                        <li>
                            <a href="#charts"> Gráficos</a>
                        </li>
                     
                    </ul>
                </div>
            </div>

            <div class="col-sm-5 col-md-5 col-lg-5">
                <form method="POST" action="_controller/buscar_usuarios.php">
                    <div class="form-group">
                        
                        
                        <div class="col-sm-9 col-md-9 col-lg-9">                
                        <input type="text"required placeholder="Digite o nome do usuário desejado"</label>
                        </div>
                       
                        <div class="col-sm-3 col-md-3 col-lg-3">                
                
                            <div class="col-sm-6 col-md-6 col-lg-6">                
                                <button type="submit">Procurar Usuário</button>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">                
                                
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">                
                
            </div>

        </div>
    </div>

</body>

</html>