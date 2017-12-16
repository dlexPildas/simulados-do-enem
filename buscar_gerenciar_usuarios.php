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
    <form class="form-inline" form method="POST" action="_controller/buscar_usuarios.php" id="formulario-busca">
        <div class="form-group">
            <label for="exampleInputName2">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="Nome do usuário">
            <button type="submit" class="btn btn-info">Pesquisar </button>
        </div>
    </form>
</body>
</html>
