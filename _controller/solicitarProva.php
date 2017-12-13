<?php
require_once( "../_model/Questao.php" );
require_once( "../_controller/controllerdados.php" );
$tipo_prova = $_POST['tipo_prova'];

//echo "$tipo_prova";

$controller = Controllerdados::getInstance();
$questao = $controller->gerarProva(1);

//header('location:../_view/simulado.php' );
?>
