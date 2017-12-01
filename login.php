<?php
//arquivo de login
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST[ 'login' ];
$senha = $_POST[ 'senha' ];

$senha_correta = "allan123";
$email_correto = "allan@gmail.com";

if ($senha == $senha_correta and $email_correto == $email_correto){
    header('Location:nossos-planos.html');
}else{
    header('Location:contato.html');
}





