﻿<?php


require_once( "../_util/userdao.php" );
require_once( "../_util/feedbackDao.php" );
require_once( "../_util/logdao.php" );
require_once( "../_model/Usuario.php" );
require_once( "../_model/Feedback.php" );
require_once( "../_model/Questao.php" );
require_once( "../_model/Prova.php" );
require_once( "../_model/Simulado.php" );
require_once( "../_model/DataHora.php" );
require_once( "../_util/questaodao.php" );
require_once( "../_util/simuladodao.php" );
require_once( "../_util/respostasimuladodao.php" );
require_once ("../_util/denunciadao.php");
require_once ("../_model/Denuncia.php");

class Controllerdados {
	public static $instance = null;
	private $user;

	private	function __construct() {

	}

	public static
	function getInstance() {
		if ( self::$instance == NULL ) {
			self::$instance = new Controllerdados();
		}
		return self::$instance;
	}

	public static function zeraSingleton() {
		self::$instance = new Controllerdados();
	}

	public function cadastraUsuario( $nome, $email, $senha, $confirmSenha ) {

		if ( $senha != $confirmSenha ) {
			echo "Saia daqui";
		} else {

			//echo crypt($senha, '$6$rounds=5000$ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789$');

			$senhaCrip = crypt( $senha, '$6$rounds=5000$ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789$' );

			$user = new Usuario( $nome, '', '', $email, '', 'N', $senhaCrip );

			$dao = new UserDao();
			$verifica = $dao->inserir( $user );
			if ( $verifica == true ) {
				echo "deu certo";
			} else {
				echo "deu errado";
			}
			$this->realizalogin( $email, $senha, 1 );

		}
	}

	public function cadastraFeedback($iduser, $descricao, $titulo){
		if ( $descricao == null || $titulo == null || $descricao == "" ) {
			echo "Saia daqui do cadastra feedback";
		} else {
			$feed = new Feedback( $iduser, $titulo, $descricao );

			$dao = new FeedbackDao();
			$verifica = $dao->inserir( $feed );
			if ( $verifica == true ) {
				echo "deu certo";
			} else {
				echo "deu errado na inserção";
			}

		}
	}

	//Método usado para cadastrar uma questão não oficial
	public function cadastrarQuestaoNaoOficial($idusuario, $idprova, $idareaconhecimento, $enunciado, $questaooficial, $respostaa, $respostab, $respostac, $respostad, $respostae, $respostacorreta ){
        if($idusuario==null || $idprova==null || $idareaconhecimento==null || $enunciado==null || $questaooficial==null ||
            $respostaa==null || $respostab==null || $respostac==null || $respostad==null || $respostae==null || $respostacorreta==null){

            echo "Cai fora";
        }else{
            $questao = new Questao($idusuario,$idprova, $idareaconhecimento, $enunciado, $questaooficial, $respostaa, $respostab,
                $respostac, $respostad, $respostae, $respostacorreta);

            $dao = new QuestaoDAO();
            $verifica = $dao->inserir($questao);
            if($verifica == true){
                echo "deu certo";
            }else{
                echo "deu errado";
            }
        }


    }

	/**
	Protocolo de aplicação
	1 - primeiro login
	null ou 0 - login comum
	*/
	public function realizalogin( $email, $senha, $protocolo ) {
		$senhaCrip = crypt( $senha, '$6$rounds=5000$ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789$' );
		echo " a senha é " . $senhaCrip;
		$userdao = new UserDao();
		$resultado = $userdao->ler( $email, $senhaCrip );

		if ( $resultado != null ) {
			echo "existe resultado";
			//$resultado = pg_query($sql);
			$linha = pg_fetch_array( $resultado );

			echo "Os dados'" . $linha[ 'idusuario' ] . " | " . $linha[ 'nome' ] . " | " . $linha[ 'email' ] . " | " . $linha[ 'senha' ] . " | " . $linha[ 'privilegio' ] . "\n ";

			if ( $protocolo == 1 ) {
				$this->insereLog( 1, $linha[ 'idusuario' ], 'Novo cadastro realizado com sucesso.' );
			}

			$usuario = new Usuario( $linha[ 'nome' ], '', '', $linha[ 'email' ], '', $linha[ 'privilegio' ], $linha[ 'senha' ] );
			$usuario->setId( $linha[ 'idusuario' ] );

			//$_SESSION[ 'user' ] = serialize( $usuario );
			$_SESSION[ 'id' ] = $linha[ 'idusuario' ];
			$_SESSION[ 'nome' ] = $linha[ 'nome' ];
			$_SESSION[ 'privilegio' ] = $linha[ 'privilegio' ];

			$this->user = $usuario;
			if ( $linha[ 'privilegio' ] == 'N' ) {
				echo "usuario comum";
				header( 'location:../_view/paineldeusuario.php' );
			} else if ( $linha[ 'privilegio' ] == 'M' ) {
				echo "usuario moderador";
				//header( 'location:nossos-planos.html' );
			} else if ( $linha[ 'privilegio' ] == 'A' ) {
				echo "usuario adm";
				header( 'location:../_view/tela-inicial-adm.php' );
			}else if ( $linha[ 'privilegio' ] == 'B' ){
				echo "usuario banido";
				unset( $_SESSION[ 'id' ] );
				unset( $_SESSION[ 'nome' ] );
				unset( $_SESSION[ 'privilegio' ] );
				header( 'location:../_view/erros/userbanido.html' );
			}
		} else {
			echo "erro de senha ou email";
		}
		//echo "erro";
		//header( 'location:errologin.html' );
	}

	public function realizalogout() {
		if ( !isset( $_SESSION ) ) {
			session_start();
		}
		if ( ( isset( $_SESSION[ 'id' ] ) == true )and( $_SESSION[ 'id' ] != "" ) || ( isset( $_SESSION[ 'nome' ] ) == true )and( $_SESSION[ 'nome' ] != "" ) || ( isset( $_SESSION[ 'privilegio' ] ) == true )and( $_SESSION[ 'privilegio' ] != "" ) ) {
			unset( $_SESSION[ 'id' ] );
			unset( $_SESSION[ 'nome' ] );
			unset( $_SESSION[ 'privilegio' ] );
			session_destroy();
			header( 'location:../index.html' );
		} else {
			session_destroy();
		}
	}

	//OBS.: tipo_prova: 1 - Edição anteriores, 2 - Áreas especificas, 3 - Questões oficiais, 4 - Questões não oficiais, 5 - Questões mistas
	public function gerarProva($tipo_prova, $ano_or_area, $quant_quest) {
		$questaodao = new QuestaoDAO();
		$simuladodao = new SimuladoDAO();
		$respostasimuladodao = new RespostaSimuladoDAO();

		$prova = $this->verificarSimuladoAndamento($_SESSION['id']); // Verifica se existe um simulado em andamento. Caso haja o usuario é redirecionado para terminar o simulado.
		if($prova == null) {
            $questoes = [];
            $questoes = $questaodao->ler($tipo_prova, $ano_or_area, $quant_quest);

            if (sizeof($questoes) > 0) {
                $NTP = new DataHora();
                $time = $NTP->getDataHora();
                $simulado = new Simulado(-1, $_SESSION['id'], $time, 0, 0, "N");
                $simulado = $simuladodao->inserir($simulado);
                $prova = new Prova($simulado->getIdSimulado(), 2018, $simulado->getTipo(), sizeof($questoes, 0), $questoes);
                $prova->setDatahora($simulado->getDataSimulado());
                $respostasimuladodao->inserirVectorObjeto($simulado->getIdSimulado(), $questoes);
                return $prova;
            }
        } else {
		    return $prova;
        }
	}

	public function finalizarSimulado($id_simulado,$resposta_questoes, $tempo){
        $vectorResp = explode(',',$resposta_questoes);
        $resp_simdao = new RespostaSimuladoDAO();
        $resp_simdao->atualizarVetor($id_simulado, $vectorResp);
        $simuladodao = new SimuladoDAO();
        $simulado = $simuladodao->ler($id_simulado);
        $simulado->setTempo($tempo);
        $simulado->setPontuacao($this->gerarPontuacao($vectorResp));
        $simuladodao->atualizar($simulado);
    }

    public function verificarSimuladoAndamento($id_usuario){
        //return null;
	    $simuladodao = new SimuladoDAO();
        $resp_simdao = new RespostaSimuladoDAO();
        $questaodao  = new QuestaoDAO();

        $simulados = $simuladodao->lerIdUsuario($id_usuario); //Procura todos os simulados do usuario logado.
        foreach ($simulados as $s){
            if ($s->getTempo() == "0" || $s->getTempo() == "0:0:0"){ //Verifica se o simulado foi concluído.
                //echo "<script>alert(\"Existe um simulado em andamento. Ele será aberto.<br>OBS: As questões respondidas ainda não ficam salvas, logo, você deve responder tudo novamente.\")</script>";
                $id_questoes = $resp_simdao->obterIdQuestoesSimulado($s->getIdSimulado());
                $questoes = $questaodao->lerPorVetorIndex($id_questoes);
                $prova_realizar = new Prova($s->getidSimulado(), $s->getDataSimulado(), $s->getTipo(), sizeof($questoes, 0), $questoes);
                $prova_realizar->setDatahora($s->getDataSimulado());
                return $prova_realizar;
            }
        }
        return null;
    }

    public function atualizaResposta($idQuetao, $resposta, $idSimulado){
        $resp_simdao = new RespostaSimuladoDAO();
        $resp_simdao->atualizar($idQuetao,$resposta,$idSimulado);
    }

    public function obterRespostasQuestoes($idSimulado){
        $resp_simdao = new RespostaSimuladoDAO();
        return $resp_simdao->obterRepostaQuestoes($idSimulado);
    }

    private function gerarPontuacao($resp){
        $questaodao = new QuestaoDAO();
        $valorPontuacao = 1;
        $pontuacaoTotal = 0;

	    foreach ($resp as $v){
            if(!empty($v[0]) && !empty($v[1])) {
                $vv = explode(':', $v);
                $id_q = $vv[0][0];
                $respp = $vv[1][0];
                $questao = $questaodao->lerPorIndex($id_q);
                if($questao->getRespostaCorreta() == $respp){
                    $pontuacaoTotal += $valorPontuacao;
                }
            }
        }
        return $pontuacaoTotal;
    }


	public function promoverModerador( $id ) {
		$userdao = new UserDao();
		$result = $userdao->atualizar( 'privilegio', 'M', $id );
        if($result==false){
            return false;
        }
        $linha = pg_fetch_array($result);
        // não retornar privilegio
        return $linha['privilegio'];
	}

	public function promoverAdministridador( $id ) {
		$userdao = new UserDao();
		$result = $userdao->atualizar( 'privilegio', 'A', $id );
        if($result==false){
            return false;
        }
        $linha = pg_fetch_array($result);
        return $linha['privilegio'];
	}

	public function removerPrivilegio( $id ) {
		$userdao = new UserDao();
		$result = $userdao->atualizar( 'privilegio', 'N', $id );
		if($result==false){
		    return false;
        }
        $linha = pg_fetch_array($result);
		return $linha['privilegio'];
	}

	public function buscarUsuarios($nome){
	    $userdao = new UserDao();
	    $result = $userdao->buscar($nome, 0);
	    if($result==false){
	        return false;
        }
        $matriz = array();
	    $i = 0;
        while($escrever=pg_fetch_array($result)){
            $usuario = $this->getUsuario($escrever);
            $matriz[$i] = $usuario;
            $i++;
        }
	    return $matriz;
    }

    private function getUsuario($escrever){
        $usuario = new Usuario( $escrever[1], null, null, $escrever[2],null, $escrever[3], null );
        $usuario->setId($escrever[0]);
        return $usuario;
    }

    public function verificarPrivilegio($id){
	    $userdao = new UserDao();
	    $result = $userdao->buscar(null,$id);
	    if($result==false){
	        return false;
        }
	    $linha = pg_fetch_array($result);
	    return $linha['privilegio'];
    }

    public function banirUsuario($id){
        $userdao = new UserDao();
        $result = $userdao->atualizar('privilegio', 'B', $id);
        if($result === false){
            return false;
        }
        $linha = pg_fetch_array($result);
        return $linha['privilegio'];
    }

	/**
	1 - cadastro de usuário
	2 - promoção de usuário
	3 - exclusão de usuário
	4 - banimento de usuário
	5 - submissão de questão
	6 - realização de simulado
	7 - inserção de prova oficial
	*/
	public function insereLog( $tipo, $idusuario, $descricao ) {
		echo "---nova inserção de log os dados são: " . $tipo . " | " . $idusuario . " | " . $descricao;
		if ( $tipo > 0 && $tipo < 8 || $descricao != "" || $descricao != NULL ) {
			$dao = new LogDao();
			$dao->inserir( $idusuario, $tipo, $descricao );
			echo "\n log inserido \n";
			return true;
		}
		return false;

	}

    /**
     * @param $idquestao
     * @param $idusuario
     * @param $data
     */
    public function inserirDenuncia($idquestao,$idusuario,$data){
	    $denuncia = new Denuncia($idquestao,$data,$idusuario);
    	$denunciadao = new denunciadao();
	    $result = $denunciadao->inserir($denuncia);
	    if ($result==true){
	        return true;
        }else{
	        return false;
        }
    }
    public function buscarDenuncia(){
        $denunciadao = new denunciadao();
        $result = $denunciadao->buscar();
        if($result==false){
            return false;
        }
        $matriz = array();
        $i = 0;
        while($escrever=pg_fetch_array($result)){
            $denuncia = $this->getDenuncia($escrever);
            $matriz[$i] = $denuncia;
            $i++;
        }
        return $matriz;

    }

    public function getDenuncia($escrever){
        $denuncia = new Denuncia($escrever[2],$escrever[4],$escrever[1]);
        $denuncia->setId($escrever[0]);
        return $denuncia;
    }
	
	public function cadastraProvaOficial($qtdQuestoes, $idUser, $ano){
		
			$dao = new ProvaDao();
			$dao->inserir( $qtdQuestoes, $ano );
			echo "\n inserir log aqui \n";
			$this->insereLog( 7, $idUser, "Inserção de prova oficial" );
	}

    public function buscarLog(){

	}
}
?>
