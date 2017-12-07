<?php

session_start();
//include_once( "seguranca.php" );
include_once( "bd.php" );

class UserDao {


    function abrirconexao() {
         if($banco){
			 echo "++Conexão com o PostgreSQL realizada com sucesso!!<br /><br />";
		 }else{
			echo "++Erro ao abrir conexão!<br /><br />";
		 }
    }
	
	function fechaconexao(){
		pg_close( $banco );
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