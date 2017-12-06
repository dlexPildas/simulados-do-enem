<?php

//$bd = pg_connect("host=localhost port=5432 dbname=pbl user=lucas password=lucas") or die ("Não foi possível conectar ao servidor PostGreSQL");
require_once('userdao.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['password'];

$dao = new UserDao();
$SQL = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
$dao->criar($SQL);


header("Location:home.php");

/**if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Salva duas variáveis com o que foi digitado no formulário
    // Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
    $nome = (isset($_POST['nome'])) ? $_POST['nome'] : '';
    $email = (isset($_POST['email'])) ? $_POST['email']: '';
    $senha = (isset($_POST['password'])) ? $_POST['password'] : '';

   $dao = new UserDao();

   echo 'chamou o metodo criar';
   $dao ->conectar();

   $dao->criar($nome, $email, $senha);
}
*/
?>