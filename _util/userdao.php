<?php

session_start();
//include_once( "seguranca.php" );
include_once( "bd.php" );

class UserDao {
	
	private $banc;
	public function __construct(){
		$banc = Bd::getInstance();
	}

    //CREATE
    function criar($SQL) {
        $banco = $this -> conectar(); 
        $Resultado = pg_query($this -> conectar(), $SQL); 
        pg_close($this -> conectar()); 
        return $Resultado; 
    }

    //UPDATE
    function atualizar($SQL){
        $banco = $this -> conectar();
        $Resultado = pg_query($this->conectar(), $SQL);
        pg_close($this->conectar());
        return $Resultado;
    }

    //READ
    function ler($SQL){
        $banco = $this -> conectar();
        $Resultado = pg_query($this->conectar(), $SQL);
        $row = pg_fetch_assoc($Resultado);
        $teste = implode(",",$row);
        $num_row = pg_num_rows($Resultado);
        pg_close($this->conectar());
        echo $teste;
    }

    //DELETE
    function apagar($SQL){
        $banco = $this -> conectar();
        $Resultado = pg_query($this->conectar(), $SQL);
        pg_close($this->conectar());
        return $Resultado;
    }
}?>