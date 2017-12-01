<?php

class UserDao {

    var $banco; 

    function conectar() {
        $host = "localhost"; 
        $db = "nomedb"; 
        $user = "admindb"; 
        $pass = "senhadb"; 
        $banco = pg_connect("host=$host port=5432 dbname=$db user=$user password=$pass")or die ("Erro na conexão"); 
        return $banco; 
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