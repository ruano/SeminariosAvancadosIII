<?php
		
	$mensagem = '';
	
	if (isset($_REQUEST['btnEntrar'])) {	
		$usuario = $_REQUEST['txtUsuario'];
		$senha = $_REQUEST['txtSenha'];
		
		if ($usuario != 'admin' || $senha != 'admin') {
			$mensagem = 'Usuario ou senha invalidos!';
		} else {
			@session_start();	
			$_SESSION['sessao'] = '0';
			header("location: Menu.php");
		}	
	}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Login</title>
    </head>
    <body>
        <h1>Autenticação</h1>
        <form>		        	
        	<label>Nome</label> 
        	</br>
        	<input type="text" name="txtUsuario" />
        	</br>
        	
        	<label>Senha</label> 
        	</br>
        	<input type="password" name="txtSenha" />

        	</br>
        	<input type="submit" name="btnEntrar" value="Entrar" />
        	</br>
        	<p><?=$mensagem?></p>        	
        </form>
    </body>
</html>