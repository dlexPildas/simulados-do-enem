<?php
/**
 * Created by PhpStorm.
 * User: allan
 * Date: 16/12/2017
 * Time: 11:28
 */
    require_once ("controllerdados.php");
    $nome = $_POST['nome'];
    $controller = Controllerdados::getInstance();
    if($controller->buscarUsuarios($nome)==false){
        echo "Erro, usuários com o nome especificado não foram encontrados.";
    }else{
        return $controller->buscarUsuarios($nome);
    }
?>