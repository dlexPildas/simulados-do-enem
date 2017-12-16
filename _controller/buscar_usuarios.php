<?php
/**
 * Created by PhpStorm.
 * User: allan
 * Date: 16/12/2017
 * Time: 11:28
 */
    require_once ("controllerdados.php");
    echo "Chegou aqui";
    $nome = $_POST['nome'];
    $controller = Controllerdados::getInstance();
    $result = $controller->buscarUsuarios($nome);
    if($result==false){
        echo "Erro, usuários com o nome especificado não foram encontrados.";
    }else{
        return $result;
    }
?>