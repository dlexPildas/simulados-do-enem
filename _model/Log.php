<?php
class Log {
	private $idhistorico;
	private $iduser;
	private $data;
	private $idacao;
	private $descricao;

	public
	function __construct( $idhistorico, $iduser, $data, $idacao, $descricao ) {
		$this->idhistorico = $idhistorico;
		$this->iduser = $iduser;
		$this->data = $data;
		$this->descricao = $descricao;
		$this->idacao = $idacao;
	}

	public
	function getIdhistorico() {
		return $this->idhistorico;
	}

	public
	function getIdUser() {
		return $this->iduser;
	}

	public
	function getData() {
		return $this->data;
	}

	public
	function getIdacao() {
		return $this->idacao;
	}

	public
	function getDescricao() {
		return $this->descricao;
	}

}
?>