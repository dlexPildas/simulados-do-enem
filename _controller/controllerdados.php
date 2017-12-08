<?php

class Controllerdados {
	public static $instance = null;
	
	private function __construct() {
        
    }
	
	public static function getInstance() {
        if (self::$instance == NULL) {
			self::$instance = new Controllerdados();
			echo "aqui nova instancia";
        }
		echo "ja tem instancia";
        return self::$instance;
    }
	
	public static function zeraSingleton(){
		self::$instance = new Controllerdados();
	}
	
	public
	function realizalogin( $email, $senha ) {
		$senhaCrip = crypt( $senha, '$6$rounds=5000$ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789$' );

		$userdao = new UserDao();
		$resultado = $userdao->ler($email, $senha);

		if ( $resultado != null ) {
			echo "existe resultado";
			//$resultado = pg_query($sql);
			$linha = pg_fetch_array( $resultado );
			
			echo "Os dados'" . $linha[ 'idusuario' ] . " | " . $linha[ 'nome' ] . " | " . $linha['email'] . " | " . $linha[ 'senha' ]  . " | " . $linha['privilegio'] . "\n ";
			
			$usuario = new Usuario( $linha[ 'nome' ], '', '', $linha['email'], '', $linha['privilegio'] , $linha[ 'senha' ] );
			$usuario->setId($linha[ 'idusuario' ]);
			
			$_SESSION[ 'user' ] = serialize( $usuario );
			if ( $linha['privilegio'] == 'N' ) {
				echo "usuario comum";
				//header( 'location:nossos-planos.html' );
			} else if ( $linha['privilegio'] == 'M' ) {
				echo "usuario moderador";
				//header( 'location:nossos-planos.html' );
			} else if ( $linha['privilegio'] == 'A' ) {
				echo "usuario adm";
				//header( 'location:nossos-planos.html' );
			}
		}else{
			echo "erro de senha ou email";
		}
		echo "erro";

		//header( 'location:errologin.html' );
	}

}
?>