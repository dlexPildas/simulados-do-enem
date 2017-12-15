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
                        <li>
                            <a href="#widgets"> Widgets</a>
                        </li>
                        <li>
                            <a href="#forms"> Forms</a>
                        </li>
                        <li>
                            <a href="#alerts"> Alerts</a>
                        </li>
                        <li>
                            <a href="#buttons">Buttons</a>
                        </li>
                        <li>
                            <a href="#tables"> Tables</a>
                        </li>
                        <li>
                            <a href="#grid"> Grid</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-5 col-md-5 col-lg-5">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Escolha uma prova para submeter</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </form>
                <input type="number" name="points" min="1995" max="2017" step="1" value="2017">
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <button type="submit">Cancelar</button>
                <button type="submit">Submeter</button>
                
            </div>

        </div>
    </div>

</body>

</html>