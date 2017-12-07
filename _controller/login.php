<?php
//arquivo de login
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página inicial
$login = $_POST[ 'login' ];
$senha = $_POST[ 'senha' ];


if ($senha == $senha_correta and $email_correto == $email_correto){
    //$_SESSION['login'] = $login;
    //$_SESSION['senha'] = $senha;
	$usuario = new Usuario();
	$_SESSION['user'] = serialize($usuario);
	if($usuario->privilegio == 'N'){
		header('location:nossos-planos.html');
	}else if($usuario->privilegio == 'M'){
		header('location:nossos-planos.html');
	}else if($usuario->privilegio == 'A'){
		header('location:nossos-planos.html');
	}
    header('location:errologin.html');
}else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    header('location:contato.html');
}
