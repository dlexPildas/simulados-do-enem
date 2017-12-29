<?php

 class Simulado {
    private $idsimulado;
    private $idusuario;
    private $data_simulado;
    private $tempo;
    private $pontuacao;

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
}

?>