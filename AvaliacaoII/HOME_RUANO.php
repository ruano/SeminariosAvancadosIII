<?php
    header('Content-Type: text/html; charset=utf-8');	
	include 'UsuarioDao.php';
	
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
			
			// LOGIN NÃO FUNCIONOU, OCORRE ERRO E NÃO CONSEGUI VERIFICAR O MOTIVO, SEM ACESSO A INTERNET PARA PESQUISAR
			$retorno = mysql_num_rows($usuarioDao->Select($usuario, $senha));
			
			if ($retorno > 0)
			{								
				$_SESSION['usuario'] = $usuario;
				$_SESSION['senha'] 	 = $senha;
				
				if (isset($_REQUEST['chkPermanecerLogado']))
					setcookie("meuCookie", $usuario, time()+3600);
				
				// NÃO SALVOU NO ARQUIVO, NÃO SEI O MOTIVO, O CÓDIGO ABAIXO ESTÁ COMO NOS EXEMPLOS PASSADOS
				$conteudo = "dataAtual"." Usuario ".$usuario." Entrou";
				$file = fopen('log.txt', 'a');
				fwrite($file, $conteudo);
			
				$autenticado = TRUE;
				?>
					<p><a href="HOME_RUANO.php?acao=sair">Sair</a></p>
				<?
			} else 
				$mensagem = 'Usuário ou senha inválidos!';
		}					
	}	
	
	if (isset($_REQUEST['acao']))
	{
		$_SESSION['usuario'] = null;
		$_SESSION['senha'] 	 = null;
		setcookie(null, null, 0);
	}
	
	if ((!$autenticado) || !isset($_COOKIE["meuCookie"])) 
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
	} else
		echo 'Usuário logado com sucesso!';
?>