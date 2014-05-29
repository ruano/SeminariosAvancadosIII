<?php
    header('Content-Type: text/html; charset=utf-8');	
	include 'Dao/AutenticacaoDao.php';
	
	session_start();
	
	$mensagem = '';
	$autenticado = FALSE;
	
	if (isset($_REQUEST['btnEntrar']))
	{
		if (!$autenticado) 
		{		
			$usuarioDao = new UsuarioDao();
			
			$usuario = $_REQUEST['txtUsuario'];
			$senha = $_REQUEST['txtSenha'];
			
			$retorno = mysql_num_rows($usuarioDao->Select($usuario, $senha));
			
			if ($retorno > 0)
			{								
				$_SESSION['usuario'] = $usuario;
				$_SESSION['senha'] 	 = $senha;
				$autenticado = TRUE;
				header("location: MostradorProdutos.php");
			} else 
			{
				$mensagem = 'Usuário ou senha inválidos!';
			}			
		}					
	}			
	
	if (!$autenticado)
	{
		?>
		<html>
		    <head>
		        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		        <title>Login</title>
		    </head>
		    <body>
		        <h1>Autenticação</h1>
		        <form>		        	
		        	<label>Usuário</label> 
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
		<?
	}
?>