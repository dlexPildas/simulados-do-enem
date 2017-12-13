<?php
require_once( "../_model/Questao.php" );
	/**
	* 
	*/
	class QuestaoDAO {
		
		function __construct(){
			# code...
		}

		function inserir($questao){
			echo get_class($questao);
			$idusuario = $this->idusuario;
			$idprova = $this->idprova;
			$idareaconhecimento = $this->idareaconhecimento;
			$enunciado = $this->enunciado;
			$questaooficial = $this->questaooficial;
			$respostaa = $this->respostaa;
			$respostab = $this->respostab;
			$respostac = $this->respostac;
			$respostad = $this->respostad;
			$respostae = $this->respostae;
			$respostacorreta = $this->respostacorreta;
			
			$SQL = "INSERT INTO questao (idusuario,idprova,idareaconhecimento,enunciado,questaooficial,respostaa,respostab,respostac,respostad,respostae,respostacorreta) VALUES ('$idusuario', '$idprova', '$idareaconhecimento', '$enunciado', '$questaooficial', '$respostaa', '$respostab', '$respostac', '$respostad', '$respostae', '$respostacorreta')";
			
			$banc = Bd::getInstance();
			$obanco = $banc->abrirconexao();

			$result = pg_query( $obanco, $SQL );
			if ($result != false  ) {
				echo "<script type='javascript'>alert('Cadastrado com sucesso!');";
				$banc->fecharconexao();
				return true;
			} else {
				$banc->fecharconexao();
				return false;
				echo "<script type='javascript'>alert('Cadastrado com Erro!');";
			}
		}

		function ler($sql) {
			/*$banc = Bd::getInstance();
			$banc->abrirconexao();

			$questoes = new ArrayObject();
			$resultado = pg_query($sql);
			while($linha = pg_fetch_array($resultado)) {
				$obj = new Questao($linha['idusuario'], $linha['idprova'], $linha['idareaconhecimento'], $linha['enunciado'], $linha['questaooficial'], $linha['respostaa'], $linha['respostab'], $linha['respostac'], $linha['respostad'], $linha['respostae'], $linha['respostacorreta']);
				$questoes->append($obj);
				$banc->fecharconexao(); //<- REMOVER DEPOIS, APENAS TESTE
				return $obj; //<- REMOVER DEPOIS, APENAS TESTE
			}
			$banc->fecharconexao();*/
			return new Questao("1", "1", "1", "Bla bla bla bla bla", "S", "A resposta é A", "A resposta é B", "A resposta é C", "A resposta é D", "A resposta é E", "E");;
		}


	}
	?>
