<?php
require_once("../_model/Questao.php");
require_once("../_model/Prova.php");
require_once("../_model/Simulado.php");

class SimuladoDAO{

    public function __construct(){
        # code...
    }

    public function inserir($simulado){
        $idusuario = $simulado->idusuario;
        $data_simulado = $simulado->data_simulado;
        $tempo = $simulado->tempo;
        $pontuacao = $simulado->pontuacao;


        $SQL = "INSERT INTO simulado(idusuario, data_simulado, tempo, pontuacao) VALUES ($idusuario, $data_simulado, $tempo, $pontuacao)";

        $banc = Bd::getInstance();
        $obanco = $banc->abrirconexao();

        $result = pg_query($obanco, $SQL);
        $banc->fecharconexao();
        return $simulado;
    }

    public function ler($id_simulado)
    {
        $sql = "select * from simulado where idsimulado = '$id_simulado' limit 1";

        $banc = Bd::getInstance();
        $banc->abrirconexao();

        $resultado = pg_query($sql);
        $linha = pg_fetch_array($resultado);
        $simulado = new Simulado(linha['idsimulado'], linha['idusuario'], linha['data_simulado'], linha['tempo'], linha['pontuacao']);
        $banc->fecharconexao();

        return $simulado;
    }
}

?>