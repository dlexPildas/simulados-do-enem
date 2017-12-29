<?php
	/**
	* 
	*/
	class Questao implements JsonSerializable{
		private $idusuario;
		private  $idprova;
		private $idareaconhecimento;
		private $idquestao;
		private $enunciado;
		private $questaooficial;
		private $respostaa;
		private $respostab;
		private $respostac;
		private $respostad;
		private $respostae;
		private $respostacorreta;
		
		function __construct($idquestao,$idusuario, $idprova, $idareaconhecimento, $enunciado, $questaooficial, $respostaa, $respostab, $respostac, $respostad, $respostae, $respostacorreta) {
			$this->idquestao = $idquestao;
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

		function getIdQuestao(){
			return $this->idquestao;
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
		
		function getRespostaA(){
			return $this->respostaa;
		}

		function getRespostaB(){
			return $this->respostab;
		}

		function getRespostaC(){
			return $this->respostac;
		}
		function getRespostaD(){
			return $this->respostad;
		}

		function getRespostaE(){
			return $this->respostae;
		}
		public function jsonSerialize() {
        return [
        	'idQuestao' => $this->getIdQuestao(),
            'enunciado' => $this->getEnunciado(),
            'respostaA' => $this->getRespostaA(),
            'respostaB' => $this->getRespostaB(),
            'respostaC' => $this->getRespostaC(),
            'respostaD' => $this->getRespostaD(),
            'respostaE' => $this->getRespostaE(),
        ];
    }
	}
?>
