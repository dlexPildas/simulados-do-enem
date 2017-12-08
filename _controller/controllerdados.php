<?php

class Controllerdados {
	public static $instance;
	
	private function __construct() {
        
    }
	
	public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Controllerdados();
        }

        return self::$instance;
    }
	
	public static function zeraSingleton(){
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

}
?>