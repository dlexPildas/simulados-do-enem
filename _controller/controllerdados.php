<?php

require_once( "../_util/userdao.php" );
require_once( "../_model/Usuario.php" );
//session_start();
class Controllerdados {
	public static $instance = null;
	private $user;

	private
	function __construct() {

	}

	public static
	function getInstance() {
		if ( self::$instance == NULL ) {
			self::$instance = new Controllerdados();
			echo "aqui nova instancia";
		}
		echo "ja tem instancia";
		return self::$instance;
	}

	public static
	function zeraSingleton() {
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
            $dao->inserir( $user );
    
            header("Location:../painel-do-usuario.html");
        }
    }

	public
	function realizalogin( $email, $senha ) {
		$senhaCrip = crypt( $senha, '$6$rounds=5000$ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789$' );
		echo " a senha é " . $senhaCrip;
		$userdao = new UserDao();
		$resultado = $userdao->ler( $email, $senhaCrip );

		if ( $resultado != null ) {
			echo "existe resultado";
			//$resultado = pg_query($sql);
			$linha = pg_fetch_array( $resultado );

			echo "Os dados'" . $linha[ 'idusuario' ] . " | " . $linha[ 'nome' ] . " | " . $linha[ 'email' ] . " | " . $linha[ 'senha' ] . " | " . $linha[ 'privilegio' ] . "\n ";

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

	public
	function realizalogout() {
		session_start();
		if ( ( isset( $_SESSION[ 'user' ] ) == true ) || ( $_SESSION[ 'user' ] != "" )){
			unset( $_SESSION[ 'user' ] );
			header( 'location:../index.html' );
		}

		$usuario = $_SESSION[ 'user' ];
	}

}
?>