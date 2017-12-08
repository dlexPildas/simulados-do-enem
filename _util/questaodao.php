<?php

	/**
	* 
	*/
	class QuestoesDAO {
		
		function __construct(argument){
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
			
			$SQL = "INSERT INTO questao (idusuario,idprova,idareaconhecimento,enunciado,questaooficial,respostaa,respostab,respostac,respostad,respostae,respostacorreta) VALUES ('$idusuario', '$idprova', '$idareaconhecimento', '$enunciado', '$questaooficial', '$respostaa', '$respostab', '$respostac', '$respostad', '$respostae', '$respostacorreta')"
			
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
			$banc = Bd::getInstance();
			$banc->abrirconexao();

		//$sql = pg_query( $obanco, "SELECT * FROM usuarios WHERE email = '{$email}' AND senha = '{$senha}' LIMIT 1 ;" );

			$sql = "SELECT * FROM questao WHERE email = '{$email}' AND senha = '{$senha}' LIMIT 1 ;";
			$resultado = pg_query($sql);
			$login_check = pg_num_rows( $resultado );
			if($login_check == 0 ){
				$banc->fecharconexao();
				return null;
			}else{
			//$resultado = pg_query($sql2);
				$banc->fecharconexao();
				return $resultado;
			}
			$banc->fecharconexao();
			return null;
		}


	}
	?>