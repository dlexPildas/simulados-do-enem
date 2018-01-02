<?php
require_once("../_model/Questao.php");
require_once("../_model/Prova.php");
require_once("../_model/Simulado.php");

class RespostaSimuladoDAO {

    public function __construct(){
    }

    public function inserir($id_simulado, $vector_resp){
         $banc = Bd::getInstance();
         $obanco = $banc->abrirconexao();

         foreach ($vector_resp as $v){
             if(!empty($v[0]) && !empty($v[1])) {
                 $vv = explode(':', $v);
                     $id_q = $vv[0][0];
                     $respp = $vv[1][0];
                     $SQL = "INSERT INTO respostasimulado(idsimulado, idquestao, resposta) VALUES ('$id_simulado', '$id_q', '$respp')";
                     pg_query($obanco, $SQL);
             }
         }

         $banc->fecharconexao();
    }
}
?>