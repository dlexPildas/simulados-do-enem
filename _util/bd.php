<?php

class Bd {
	private $host = "localhost";
	private $db = "mi";
	private $user = "administrador";
	private $pass = "sosenemadmin";
	public $banco;
	public $verificador;
	public static $instance;
	
	 private function __construct() {
        $banco = pg_connect( "host=$host port=5432 dbname=$db user=$user password=$pass" )  or die ("Erro na conexão");
		 $verificador = false;
    }
	
	public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Bd();
        }

        return self::$instance;
    }
	
	public static function zeraSingleton(){
		$this->fechaconexao();
		
		self::$instance = new Bd();
        
	}
	
	function abrirconexao() {
		if($verificador == false){
			if($banco){
			 echo "++Conexão com o PostgreSQL realizada com sucesso!!<br /><br />";
		 }else{
			echo "++Erro ao abrir conexão!<br /><br />";
			}
		}
    }
	
	function fechaconexao(){
		if($verificador == true){
			pg_close( $banco );
		}else{
			return false;
		}
	}
	
	
}


?>