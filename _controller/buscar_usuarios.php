<?php
/**
 * Created by PhpStorm.
 * User: allan
 * Date: 16/12/2017
 * Time: 11:28
 */
    require_once ("Controllerdados.php");
    echo "<br> Chegou aqui <br>";
    $nome = $_POST['nome'];
    $controller = Controllerdados::getInstance();
    $result = $controller->buscarUsuarios($nome);
    if($result==false){
        echo "Erro, usuários com o nome especificado não foram encontrados.";
        return false;
    }else{
        echo "<br>$result[1]<br>";
    }
    function getUsuario($result){
        $usuario = new Usuario( $result[1], '', '', '', $result[3] );
        $usuario->setId($result[0]);
        return $usuario;
    }
