<?php
require_once( "../_model/Questao.php" );
require_once( "../_model/Prova.php" );
require_once( "../_controller/controllerdados.php" );

$tipo_prova = $_GET['tipoProva'];
$ano_or_area = $_GET['anoOrArea'];

$controller = Controllerdados::getInstance();
$prova = $controller->gerarProva($tipo_prova, $ano_or_area,3);
echo json_encode($prova);
?>
