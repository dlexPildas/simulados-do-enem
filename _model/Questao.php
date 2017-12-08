<?php
	/**
	* 
	*/
	class Questao{
		private $idusuario;
		private  $idprova;
		private $idareaconhecimento;
		private $enunciado;
		private $questaooficial;
		private $respostaa;
		private $respostab;
		private $respostac;
		private $respostad;
		private $respostae;
		private $respostacorreta;
		
		function __construct($idusuario, $idprova, $idareaconhecimento, $enunciado, $questaooficial, $respostaa, $respostab, $respostac, $respostad, $respostae, $respostacorreta) {
			$this->idusuario = $idusuario;
			$this->idprova = $idprova;
			$this->idareaconhecimento = $idareaconhecimento;
			$this->enunciado = $enunciado;
			$this->questaooficial = $questaooficial;
			$this->respostaa = $respostaa;
			$this->respostab = $respostab;
			$this->respostac = $respostac;
			$this->respostad = $respostad;
			$this->respostae = $respostae;
			$this->respostacorreta = $respostacorreta;
		}

		function getIDUsuario() {
			return $this->idusuario;
		}

		function getIDProva() {
			return $this->idprova;
		}

		function getIDAreaConhecimento(){
			return $this->idareaconhecimento;
		}

		function getEnunciado(){
			return $this->enunciado;
		}
	}
	?>