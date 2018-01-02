<?php
require_once( "../_model/Questao.php" );
require_once( "../_model/Prova.php" );
require_once( "../_controller/controllerdados.php" );

$respostas = $_POST['respostas'];

$controller = Controllerdados::getInstance();
$controller->finalizarSimulado($respostas);

?>