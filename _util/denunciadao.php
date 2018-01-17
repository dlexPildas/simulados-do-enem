<?php
/**
 * Created by PhpStorm.
 * User: allan
 * Date: 17/01/2018
 * Time: 10:36
 */
if(!isset($_SESSION)){
    session_start();
}
//include_once( "seguranca.php" );
require_once( "bd.php" );

class denunciadao
{
    private $banc;
    public function __construct() {


    }
    //CREATE
    function inserir( $denuncia ) {

        //$iduser = $feed->getIduser();
        //$titulo= $feed->getTitulo();
        //$descricao= $feed->getDescricao();

        $idusuario = 0;
        $idquestao = 0;
        $data = 0;

        $SQL = "INSERT INTO feedback (idusuario, idquestao, data) VALUES ('$iduser', '$titulo', '$descricao')";

        //echo 'aqui';
        $banc = Bd::getInstance();
        $obanco = $banc->abrirconexao();

        $result = pg_query( $obanco, $SQL);
        if ($result != false  ) {
            echo "Cadastrado com sucesso!";
            $banc->fecharconexao();
            return true;
        } else {
            $banc->fecharconexao();
            return false;
            echo "<script type='javascript'>alert('Cadastrado com Erro!');";
        }


    }
}