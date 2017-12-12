<?php

function gerarProva($tipo_prova) {
	$controller = Controllerdados::getInstance();
	controller->gerarProva($tipo_prova);
	header( 'location:../_view/simulado.php' );	
}
?>