<?php
require_once( "../_model/Questao.php" );
	/**
	* 
	*/
	class QuestaoDAO {
		
		public function __construct(){
			# code...
		}

		public function inserir($questao){
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

		public function ler($area_conhec, $quant_quest) {
			$sql = "select * from (questao join areadeconhecimento on questao.idareaconhecimento = areadeconhecimento.idarea) where questao.idareaconhecimento = $area_conhec limit $quant_quest";

			$banc = Bd::getInstance();
			$banc->abrirconexao();

			$questoes = [];
			$resultado = pg_query($sql);
			while($linha = pg_fetch_array($resultado)) {
				$questoes[] = new Questao($linha["idquestao"], $linha["idusuario"], $linha["idprova"], $linha["idareaconhecimento"], $linha["enunciado"], $linha["questaooficial"], $linha["respostaa"], $linha["respostab"], $linha["respostac"], $linha["respostad"], $linha["respostae"], $linha["respostacorreta"]);
			}

			$banc->fecharconexao();

			/*$questoes = [];
			$questoes[] = new Questao("50","1", "1", "1", "Sentimos que toda satisfação de nossos desejos advinda do mundo assemelha-se à esmola que mantém hoje o mendigo vivo, porém prolonga amanhã a sua fome. A resignação, ao contrário, assemelha-se à fortuna herdada: livra o herdeiro para sempre de todas as preocupações.SCHOPENHAUER, A. Aforismo para a sabedoria da vida. São Paulo: Martins Fontes, 2005.O  trecho  destaca  uma  ideia  remanescente  de  umaWUDGLomR ORVyFD RFLGHQWDO  VHJXQGR D TXDO D IHOLFLGDGH  se mostra indissociavelmente ligada", "S", "A consagração de relacionamentos afetivos.", "B administração da independência interior. ", "C fugacidade do conhecimento emperico.", "D liberdade de expressão religiosa.", "E busca de prazeres efomeros.", "B");
			$questoes[] = new Questao("51","1", "1", "1", "Desejos advinda do mundo assemelha-se à esmola que mantém hoje o mendigo vivo, porém prolonga se mostra indissociavelmente ligada", "S", "A essa aqui é a certa.", "B administração da independência interior. ", "C fugacidade do conhecimento emperico.", "D liberdade de expressão religiosa.", "E busca de prazeres efomeros.", "B");
			*/
			return $questoes;
		}


	}
	?>
