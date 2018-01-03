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


        //OBS.: tipo_prova: 1 - Edição anteriores, 2 - Áreas especificas, 3 - Questões oficiais, 4 - Questões não oficiais, 5 - Questões mistas
		public function ler($tipo_prova, $ano_or_area, $quant_quest){
			if($tipo_prova == 1) {
                $sql = "select * from (questao join prova on questao.idprova = prova.idprova) where prova.ano = $ano_or_area limit $quant_quest";
            }
            if($tipo_prova == 2){
                $sql = "select * from questao where idareaconhecimento = $ano_or_area limit $quant_quest";
			}

            $banc = Bd::getInstance();
            $banc->abrirconexao();

            $questoes = [];
            $resultado = pg_query($sql);
            while ($linha = pg_fetch_array($resultado)) {
                $questoes[] = new Questao($linha["idquestao"], $linha["idusuario"], $linha["idprova"], $linha["idareaconhecimento"], $linha["enunciado"], $linha["questaooficial"], $linha["respostaa"], $linha["respostab"], $linha["respostac"], $linha["respostad"], $linha["respostae"], $linha["respostacorreta"]);
            }

            $banc->fecharconexao();
            return $questoes;
        }

        public function lerPorIndex($vetor_id_questoes){
            $banc = Bd::getInstance();
            $banc->abrirconexao();

            $questoes = [];
			foreach ($vetor_id_questoes as $id){
                $resultado = pg_query("select * from questao where idquestao = $id");
                $linha = pg_fetch_array($resultado);
                $questoes[] = new Questao($linha["idquestao"], $linha["idusuario"], $linha["idprova"], $linha["idareaconhecimento"], $linha["enunciado"], $linha["questaooficial"], $linha["respostaa"], $linha["respostab"], $linha["respostac"], $linha["respostad"], $linha["respostae"], $linha["respostacorreta"]);
			}
            $banc->fecharconexao();
            return $questoes;
		}

	}
	?>
