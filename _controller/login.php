<?php
//arquivo de login
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página inicial
$login = $_POST[ 'login' ];
$senha = $_POST[ 'senha' ];

$senha_correta = "allan123";
$email_correto = "allan@gmail.com";

if ($senha == $senha_correta and $email_correto == $email_correto){
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    header('location:nossos-planos.html');
}else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    header('location:contato.html');
}





