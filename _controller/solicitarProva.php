<?php

$tipo_prova = $_POST['tipo_prova'];

echo "$tipo_prova";

$controller = Controllerdados::getInstance();
controller->gerarProva($tipo_prova);	

header('location:../_view/simulado.php' );
?>