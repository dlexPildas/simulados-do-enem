<?php

 class Simulado {
    private $idsimulado;
    private $idusuario;
    private $data_simulado;
    private $tempo;
    private $pontuacao;
    private $tipo;

    public function __construct($idsimulado, $idusuario, $data_simulado, $tempo, $pontuacao, $tipo){
        $this->idsimulado = $idsimulado;
        $this->idusuario = $idusuario;
        $this->data_simulado = $data_simulado;
        $this->tempo = $tempo;
        $this->pontuacao = $pontuacao;
        $this->tipo = $tipo;
    }

    public function getIdSimulado(){
        return $this->idsimulado;
    }
    public function getIdUsuario(){
        return $this->idusuario;
    }
    public function getDataSimulado(){
        return $this->data_simulado;
    }
    public function getTempo(){
        return $this->tempo;
    }
    public function getPontuacao(){
        return $this->pontuacao;
    }
    public function getTipo(){
        return $this->tipo;
    }
}

?>