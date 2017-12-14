<?php

require_once( "../_util/userdao.php" );
require_once( "../_util/logdao.php" );
require_once( "../_model/Usuario.php" );
require_once( "../_model/Questao.php" );
require_once( "../_model/Prova.php" );
require_once( "../_util/questaodao.php" );
//include_once( "_model/seguranca.php" );
//session_start();
class Controllerdados {
	public static $instance = null;
	private $user;

	private function __construct() {

	}

	public static function getInstance() {
		if ( self::$instance == NULL ) {
			self::$instance = new Controllerdados();
		}
		return self::$instance;
	}

	public static function zeraSingleton() {
		self::$instance = new Controllerdados();
    }
    
    public function cadastraUsuario($nome, $email, $senha, $confirmSenha){

        if ( $senha != $confirmSenha ) {
            echo "Saia daqui";
        } else {
    
            //echo crypt($senha, '$6$rounds=5000$ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789$');
    
            $senhaCrip = crypt( $senha, '$6$rounds=5000$ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789$' );
    
            $user = new Usuario( $nome, '', '', $email, '', 'N', $senhaCrip );
    
            $dao = new UserDao();
            $verifica = $dao->inserir( $user );
			if($verifica == true){
				echo "deu certo";
			}else{
				echo "deu errado";
			}
			$this->realizalogin( $email, $senha , 1 );
    		
        }
    }

	/**
	Protocolo de aplicação
	1 - primeiro login
	null ou 0 - login comum
	*/
	public function realizalogin( $email, $senha , $protocolo) {
		$senhaCrip = crypt( $senha, '$6$rounds=5000$ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789$' );
		echo " a senha é " . $senhaCrip;
		$userdao = new UserDao();
		$resultado = $userdao->ler( $email, $senhaCrip );

		if ( $resultado != null ) {
			echo "existe resultado";
			//$resultado = pg_query($sql);
			$linha = pg_fetch_array( $resultado );

			echo "Os dados'" . $linha[ 'idusuario' ] . " | " . $linha[ 'nome' ] . " | " . $linha[ 'email' ] . " | " . $linha[ 'senha' ] . " | " . $linha[ 'privilegio' ] . "\n ";
			
			if($protocolo == 1){
				$this->insereLog(1 ,$linha[ 'idusuario' ], 'Novo cadastro realizado com sucesso.');
			}

			$usuario = new Usuario( $linha[ 'nome' ], '', '', $linha[ 'email' ], '', $linha[ 'privilegio' ], $linha[ 'senha' ] );
			$usuario->setId( $linha[ 'idusuario' ] );

			$_SESSION[ 'user' ] = serialize( $usuario );
			$this->user = unserialize($_SESSION['user']);
			if ( $linha[ 'privilegio' ] == 'N' ) {
				echo "usuario comum";
				header( 'location:../painel-do-usuario.php' );
			} else if ( $linha[ 'privilegio' ] == 'M' ) {
				echo "usuario moderador";
				//header( 'location:nossos-planos.html' );
			} else if ( $linha[ 'privilegio' ] == 'A' ) {
				echo "usuario adm";
				//header( 'location:nossos-planos.html' );
			}
		} else {
			echo "erro de senha ou email";
		}
		//echo "erro";
		//header( 'location:errologin.html' );
	}

	public function realizalogout() {
		session_start();
		if ( ( isset( $_SESSION[ 'user' ] ) == true ) || ( $_SESSION[ 'user' ] != "" )){
			unset( $_SESSION[ 'user' ] );
			header( 'location:../index.html' );
		}

		$usuario = $_SESSION[ 'user' ];
	}

	public 
	function gerarProva($tipo_prova){
		$dao = new QuestaoDAO();
		echo "ta no gerar prova";
		//if($tipo_prova === '1'){
			$questoes = $dao->ler("select * from questao");
			echo "Retornou a questão";
			$prova =  new Prova(1, 2017, "Aquele Tipo", sizeof($questoes, 0), $questoes);			
			return $prova;
		//}
		
	}


    public function promoverModerador($id){
        $userdao = new UserDao();
        $result = $userdao->atualizar('privilegio', 'M', $id);
        return $result;
	}
	public function removerModerador($id){
        $userdao = new UserDao();
        $result = $userdao->atualizar('privilegio', 'N', $id);
        return $result;
	}

	//Qual o motivo para quebrar linha aqui?
    public function addProva(){
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
	public function insereLog($tipo, $idusuario, $descricao){
		echo "---nova inserção de log os dados são: " . $tipo . " | " . $idusuario ." | " . $descricao;
		if($tipo > 0 && $tipo < 8 || $descricao != "" || $descricao != NULL){
			$dao = new LogDao();
        	$dao->inserir( $idusuario, $tipo, $descricao );
			echo "\n log inserido \n";
			return true;
		}
		echo "chegou até aqui em inserir log";
		return false;
		
	}


}
?>
