<?php

//$bd = pg_connect("host=localhost port=5432 dbname=pbl user=lucas password=lucas") or die ("Não foi possível conectar ao servidor PostGreSQL");
require_once( '../_util/feedbackDao.php' );
require_once( '../_model/Feedback.php' );
require_once( '../_controller/controllerdados.php' );
include_once( "_model/seguranca.php" );

if ( ( isset( $_POST[ 'descricao' ] ) == false )and( isset( $_POST[ 'titulo' ] ) == false )) {
	echo 'deu ruim';
} else {

	$descricao = $_POST[ 'descricao' ];
	$titulo = $_POST[ 'titulo' ];

	$controller = Controllerdados::getInstance();

	$controller->cadastraFeedback($idlogado, $descricao, $titulo);
}

?>