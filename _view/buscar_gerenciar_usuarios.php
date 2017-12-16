<?php
header("Content-type: text/html; charset=utf-8");
/**
 * Created by PhpStorm.
 * User: allan
 * Date: 16/12/2017
 * Time: 11:05
 */
//require_once ("../_controller/gerenciar_usuarios.php");
//require_once ("../_controller/buscar_usuarios.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Gerenciar contas</title>
</head>
<body>
    <form class="form-inline" id = "nome" method="POST" action="../_controller/buscar_usuarios.php">
        <div class="form-group">
            <label for="exampleInputName2">Nome</label>
            <input type="text" class="form-control" id="nome" placeholder="Nome do usuário">
            <button type="submit" class="btn btn-default">Pesquisar </button>
        </div>

    </form>
</body>
</html>
