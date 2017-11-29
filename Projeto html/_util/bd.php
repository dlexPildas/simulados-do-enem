<?php

$host = "localhost";
$db = "nossarede";
$user = "postgres";
$pass = "12345";
$banco = pg_connect( "host=$host port=5432 dbname=$db user=$user password=$pass" )  or die ("Erro na conexão");

?>