<?php
//arquivo de login
// session_start inicia a sessão
session_start();
require_once( "Controllerdados.php" );
// as variáveis login e senha recebem os dados digitados na página inicial
$login = $_POST[ 'login' ];
$senha = $_POST[ 'senha' ];



if ($senha != "" || $senha != null || $login != null || $login != ""){
	
	$controller = Bd::Controllerdados();
	$controller->realizalogin($login, $senha);
	
    //$_SESSION['login'] = $login;
    //$_SESSION['senha'] = $senha;
	
}else{
	echo "erro de login";
    //header('location:../index.html');
}
