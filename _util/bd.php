<?php

$host = "localhost";
$db = "mi";
$user = "administrador";
$pass = "sosenemadmin";
$banco = pg_connect( "host=$host port=5432 dbname=$db user=$user password=$pass" )  or die ("Erro na conexão");

?>