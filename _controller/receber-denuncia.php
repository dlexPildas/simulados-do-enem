<?php
/**
 * Created by PhpStorm.
 * User: allan
 * Date: 13/01/2018
 * Time: 12:22
 */
$idquestao = $_POST['idquestao'];
$idusuario = $_POST['idusuario'];
$data = new DataHora();

$controller = $controller->inserirDenuncia($idquestao,$idusuario,$data);

