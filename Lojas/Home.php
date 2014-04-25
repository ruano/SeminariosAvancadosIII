<?php
		
	$mensagem = '';
	
	if (isset($_REQUEST['btnEntrar'])) {			
		$usuarioTela = $_REQUEST['txtUsuario'];
		$senhaTela = $_REQUEST['txtSenha'];
		$usuarioArquivo = null;
		$senhaArquivo = null;
		
		$arquivoCredenciais = fopen("credenciais.txt", "r");		
		while (!feof($arquivoCredenciais)) 
		{
			$arrLinha = explode(',',fgets($arquivoCredenciais));
			for ($i = 0; $i < count($arrLinha); $i++) 
			{
				$arrDados = explode('=', $arrLinha[$i]);
				if ($arrDados[0] == 'usuario')
					$usuarioArquivo = $arrDados[1];
				else if ($arrDados[0] == 'senha')
					$senhaArquivo = $arrDados[1];
			}
		}
		
		if ($usuarioTela != $usuarioArquivo || $senhaTela != $senhaArquivo) {
			$mensagem = 'Usuario ou senha invalidos!';
		} else {
			@session_start();	
			$_SESSION['sessao'] = $usuarioArquivo.$senhaArquivo;
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