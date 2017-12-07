<?php

//$bd = pg_connect("host=localhost port=5432 dbname=pbl user=lucas password=lucas") or die ("Não foi possível conectar ao servidor PostGreSQL");
require_once( 'userdao.php' );
require_once( '../_model/Usuario.php' );

if ( ( isset( $_POST[ 'nome' ] ) == false )and( isset( $_POST[ 'email' ] ) == false )and( isset( $_POST[ 'senha' ] ) == false )and( isset( $_POST[ 'password' ] ) == false ) ) {

	//header("Location:index.php");
	echo 'deu ruim';
} else {

	$nome = $_POST[ 'nome' ];
	$email = $_POST[ 'email' ];
	$senha = $_POST[ 'senha' ];
	$confirmSenha = $_POST[ 'confirmSenha' ];

	if ( $senha != $confirmSenha ) {
		echo "Saia daqui";
	} else {

		//echo crypt($senha, '$6$rounds=5000$ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789$');

		$senhaCrip = crypt( $senha, '$6$rounds=5000$ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789$' );

		$user = new Usuario( $nome, '', '', $email, '', 'N', $senhaCrip );

		$dao = new UserDao();
		$dao->inserir( $user );

		//header("Location:home.php");
	}
}

?>