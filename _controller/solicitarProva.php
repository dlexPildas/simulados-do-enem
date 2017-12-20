<?php
require_once( "../_model/Questao.php" );
require_once( "../_model/Prova.php" );
require_once( "../_controller/controllerdados.php" );
$tipo_prova = $_GET['idProva'];

//echo "$tipo_prova";

$controller = Controllerdados::getInstance();
$prova = $controller->gerarProva(1);
echo json_encode($prova);
//$prova->proximaQuestao();

//header('location:../_view/simulado.php' );
?>
