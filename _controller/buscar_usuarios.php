<?php
/**
 * Created by PhpStorm.
 * User: allan
 * Date: 16/12/2017
 * Time: 11:28
 */

    require_once ("Controllerdados.php");
    $nome = $_POST['nome'];
    $id = $_SESSION['privilegio'];
    $controller = Controllerdados::getInstance();
    $result = $controller->buscarUsuarios($nome);
    $tamanho = count($result);
    //echo $tamanho;
    if($result==false){
        echo "Erro, usuários com o nome especificado não foram encontrados.";
    }else{
        //echo " ".$id;
    }
?>
<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <title> Usuários encontrados </title>
    <link type= "text/css" rel=stylesheet href="../_css/bootstrap3.css">
    <link type= "text/css" rel=stylesheet href="../_css/milligram.min.css">
    <?php include ('../_view/navbar-adm.php')?>

</head>
<body>
<div class="container-fluid">
    <div class="row">
<div class="col-md-2 col-lg-2"></div>
<div class="col-md-8 col-lg-8 col-sm-12">
    <div class="table-responsive">
        <table class="table">
            <tbody>
            <?php
            $i = 0;
            while ($i<$tamanho) { ?>
                <tr>
                    <td><?php echo "Nome: ".$result[$i]->getNome(); ?> &nbsp;</td>
                    <td><?php echo "Email: ".$result[$i]->getEmail(); ?> &nbsp;</td>
                    <td><?php echo "Privilegio: ".$result[$i]->getPrivilegio(); ?> &nbsp;</td>
                    <td>
                        <div class="dropdown">
                            <button style="background-color: #35cebe" class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Opções
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#">Administrador</a></li>
                                <li><a href="#">Moderador</a></li>
                                <li><a href="#">Usuário Normal</a></li>
                                <li><a href="#">Banir</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <?php $i++;
            }
            ?>
            <tbody>
        </table>
    </div>
</div>
<div class="col-md-2 col-lg-2"></div>
    </div>
</div>

</body>
</html>
