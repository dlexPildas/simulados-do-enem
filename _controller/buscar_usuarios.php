<?php
/**
 * Created by PhpStorm.
 * User: allan
 * Date: 16/12/2017
 * Time: 11:28
 */
    require_once ("Controllerdados.php");
    $nome = $_POST['nome'];

    $controller = Controllerdados::getInstance();
    $result = $controller->buscarUsuarios($nome);
    $tamanho = count($result);
    echo $tamanho;
    if($result==false){
        echo "Erro, usuários com o nome especificado não foram encontrados.";
        return false;
    }else{
        //Deu certo
    }
?>
        <tbody>

?>    </table>
