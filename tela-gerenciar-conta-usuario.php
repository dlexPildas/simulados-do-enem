<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerenciar conta usuario</title>
    <link rel="stylesheet" type="text/css" href="_css/gerencia-conta.css">
    <link rel="stylesheet" type="text/css" href="_css/bootstrap3.css">
    <link rel="stylesheet" type="javascript/js" href="_js/bootstrap.js">
    <link rel="stylesheet" href="_css/font-awesome.min.css">
	
	<!-- CSS Reset -->
	<link rel="stylesheet" href="_css/normalize.css">
	
	<!-- Milligram CSS minified -->
	<link rel="stylesheet" href="_css/milligram.min.css">

</head>

<body>

    <div class="navbar">
        <?php

            include('navbar-adm.html');
        ?>
    </div>
    <div class="container-fluid">

        <div class="row grid-responsive">
            <div class="col-sm-3 col-md-3 col-lg-3 ">

                <div id="sidebar" class="column">
                    <h5>Gerencia de contas</h5>
                    <ul>
                        <li><a href="#"><em class="fa fa-home"></em>Início</a></li>
                        <li><a href="#charts"><em class="fa fa-bar-chart"></em> Gráficos</a></li>
                        <li><a href="#widgets"><em class="fa fa fa-clone"></em> Widgets</a></li>
                        <li><a href="#forms"><em class="fa fa-pencil-square-o"></em> Forms</a></li>
                        <li><a href="#alerts"><em class="fa fa-warning"></em> Alerts</a></li>
                        <li><a href="#buttons"><em class="fa fa-hand-o-up"></em> Buttons</a></li>
                        <li><a href="#tables"><em class="fa fa-table"></em> Tables</a></li>
                        <li><a href="#grid"><em class="fa fa-columns"></em> Grid</a></li>
                    </ul>
                 </div>

            </div>
            <div class="col-sm-9 col-md-9 col-lg-9">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Escolha uma foto</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </form>
            </div>

        </div>
    </div>

</body>

</html>