<?php
	
	$usuario = $_REQUEST['usuario'];
	$senha = $_REQUEST['senha'];
	$email = $_REQUEST['email'];
	
	if ($usuario != 'admin' || $senha != 'admin') {
		echo 'Usuario ou senha invalidos!';
	} else {
		echo 'Login efetuado com sucesso!';
		echo '</br>';
		echo $usuario;
		echo '</br>';
		echo $email;
	}
	
?>