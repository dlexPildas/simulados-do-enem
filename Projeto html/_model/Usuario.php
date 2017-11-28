<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 27/11/2017
 * Time: 23:23
 */

class Usuario{
    private $nome;
    private $sobrenome;
    private $sexo;
    private $dataNascimento;
    private $cpf;

    /**
     * Usuario constructor.
     * @param $nome
     * @param $sobrenome
     * @param $sexo
     * @param $dataNascimento
     * @param $cpf
     */
    public function __construct($nome, $sobrenome, $sexo, $dataNascimento, $cpf)
    {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->sexo = $sexo;
        $this->dataNascimento = $dataNascimento;
        $this->cpf = $cpf;
    }


    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getSobrenome()
    {
        return $this->Sobrenome;
    }

    /**
     * @param mixed $Sobrenome
     */
    public function setSobrenome($Sobrenome)
    {
        $this->Sobrenome = $Sobrenome;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    /**
     * @return mixed
     */
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * @param mixed $dataNascimento
     */
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }




}