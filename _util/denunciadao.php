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

        $idusuario = $denuncia->getIdUsuario();
        $idquestao = $denuncia->getIdQuestao;

        $SQL = "INSERT INTO denunciaquestao (idusuario, idquestao, datadenuncia) VALUES ('$idusuario', '$idquestao')";

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
    function buscar(){
        $SQL = "SELECT * FROM denunciaquestao";
        $banco = Bd::getInstance();
        $abrir = $banco->abrirconexao();
        $resultado = pg_query($abrir,$SQL);
        if(pg_num_rows($resultado)==0){
            $banco->fecharconexao();
            return false;
        }else{
            $banco->fecharconexao();
            return $resultado;
        }
    }
}