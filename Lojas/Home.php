<?php	
	session_start();	
	
	$mensagem = '';
	
	if (isset($_REQUEST['btnEntrar'])) 
	{			
		$usuarioTela 	= $_REQUEST['txtUsuario'];
		$senhaTela 		= $_REQUEST['txtSenha'];
		$usuarioArquivo = null;
		$senhaArquivo 	= null;
		
		$arquivoCredenciais = fopen("credenciais.txt", "r");		
		$arrLinha = explode(',',fgets($arquivoCredenciais));
				
		$usuarioArquivo = explode('=', $arrLinha[0]);
		$senhaArquivo 	= explode('=', $arrLinha[1]);
				
		$usuarioArquivo = $usuarioArquivo[1];
		$senhaArquivo = $senhaArquivo[1];
		
		if ($usuarioTela != $usuarioArquivo || $senhaTela != $senhaArquivo) 
		{
			$mensagem = 'Usuario ou senha invalidos!';
		} else {	
			$_SESSION['usuario'] = $usuarioArquivo;
			$_SESSION['senha'] 	 = $senhaArquivo;
			
			if (isset($_REQUEST['chkPermanecerLogado']))
			{
				setcookie("meuCookie", $usuarioArquivo, time()+3600);
			}			
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
        	
        	<input type="checkbox" name="chkPermanecerLogado"/> <label>Permanecer logado</label>

        	</br>
        	<input type="submit" name="btnEntrar" value="Entrar" />
        	</br>
        	<p><?=$mensagem?></p>        	
        </form>
    </body>
</html>