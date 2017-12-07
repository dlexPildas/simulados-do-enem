<?php

//$bd = pg_connect("host=localhost port=5432 dbname=pbl user=lucas password=lucas") or die ("Não foi possível conectar ao servidor PostGreSQL");
require_once('userdao.php');

if ((isset($_POST['nome']) == false) and (isset($_POST['email']) == false) and (isset($_POST['password'])) == false) {
    header("Location:index.php");
}else{

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['password'];




$dao = new UserDao();
$SQL = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
$dao->criar($SQL);

header("Location:home.php");
}

?>