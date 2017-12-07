<?php
/**
 * User: Alyson
 * Date: 07/12/2017
 * Time: 14:57
 */

class Usuario{
	private $id;
    private $nome;
    private $sobrenome;
    private $foto;
	private $email;
    private $dataplano;
	private $privilegio;
    private $senha;

    /**
     * Usuario constructor.
     * @param $nome
     * @param $sobrenome
     * @param $sexo
     * @param $dataNascimento
     * @param $cpf
     */
    public function __construct($nome, $sobrenome, $id, $foto, $email, $dataplano, $privilegio, $senha)
    {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->id = $id;
		$this->foto = $foto;
		$this->email = $email;
		$this->dataplano = $dataplano;
		$this->privilegio = $privilegio;
		$this->senha = $senha;
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
    public function getid()
    {
        return $this->id;
    }

    public function getfoto(){
		return $this->foto;
	}
	
	public function setfoto($foto){
		$this->foto = $foto;
	}
	
	public function getemail(){
		return $this->email;
	}
	
	public function setemail($email){
		$this->email = $email;
	}
	
	public function getdataplano(){
		return $this->dataplano;
	}
	
	public function setdataplano($dataplano){
		$this->dataplano = $dataplano;
	}
	
	public function getprivilegio(){
		return $this->privilegio;
	}
	
	public function setprivilegio($privilegio){
		$this->privilegio = $privilegio;
	}
	
	public function getsenha(){
		return $this->senha;
	}
	
	public function setsenha($senha){
		$this->senha = $senha;
	}


}