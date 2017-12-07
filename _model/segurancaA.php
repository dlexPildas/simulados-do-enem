<?php  
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php.*/
ob_start();
if(($_SESSION['user'] == "") and (isset( $_SESSION[ 'user' ] ) != true )) {
	unset($_SESSION['user']);
	header('location:acesso.html');
	}else {
		$usuario = unserialize($_SESSION['user']);
		if($usuario->privilegio == 'A'){
			$logado = $usuario->nome;
			$idlogado = $usuario->id;
		}else{
			unset($_SESSION['user']);
			header('location:errodeprivilegio.html');
		}
		
	}
?>