<?php


require_once( "../_util/userdao.php" );
require_once( "../_util/feedbackDao.php" );
require_once( "../_util/logdao.php" );
require_once( "../_model/Usuario.php" );
require_once( "../_model/Feedback.php" );
require_once( "../_model/Questao.php" );
require_once( "../_model/Prova.php" );
require_once( "../_model/Simulado.php" );
require_once( "../_util/questaodao.php" );


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
				header( 'location:../paineldeusuario.php' );
			} else if ( $linha[ 'privilegio' ] == 'M' ) {
				echo "usuario moderador";
				//header( 'location:nossos-planos.html' );
			} else if ( $linha[ 'privilegio' ] == 'A' ) {
				echo "usuario adm";
				header( 'location:../_view/tela-inicial-adm.php' );
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
	public function gerarProva($tipo_prova, $ano_or_area) {
		$dao = new QuestaoDAO();
		$questoes = [];
		switch ($tipo_prova){
            case 3: //Questões oficiais
                break;
            case 4: //Questões não oficiais
                break;
            case 5: //Questões mistas
                break;
            default : //Edições anteriores ou Area do conhecimento
                $questoes = $dao->ler($tipo_prova, $ano_or_area,90);
                break;
        }
        //GERAR SIMULADO DAO PARA SALVAR NO BANCO
		$prova = new Prova( 1, 2017, "Aquele Tipo", sizeof( $questoes, 0 ), $questoes );
		return $prova;
		//}

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
	    $linha = pg_fetch_array($result);
        echo "Os dados'" . $linha[ 'idusuario' ] . " | " . $linha[ 'nome' ] . " | " . $linha[ 'email' ] . " | " . $linha[ 'privilegio' ] . "\n ";
	    return $linha;
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

    public function addProva() {
        //Não sei o que fazer aqui por enquanto zZzZz... (Allan)
    }
	/**
	1 - cadastro de usuário
	2 - promoção de usuário
	3 - exclusão de usuário
	4 - banimento de usuário
	5 - submissão de questão
	6 - realização de simulado
	7 - 
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


}
?>