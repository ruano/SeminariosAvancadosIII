<?
	session_start();
	$msg = '';
	
	// INICIO - Ruano Martinez Schulze - Questão 02
	$loginAutorizado = FALSE;
	if (isset($_REQUEST['btEntrar'])) 
	{
		$usuarioTela = $_REQUEST['nome'];
		$senhaTela = $_REQUEST['senha']; 
		
		$usuarioArquivo = null;
		$senhaArquivo = null;	
		
		$encontrouUsuario = FALSE;					
		
		$f = fopen("usuarios.txt", "r");
		while(!feof($f)) 
		{
			$arrLinha = explode(',',fgets($f));
			for($i = 0; $i < count($arrLinha); $i++)
			{
				$arrColuna = explode(':',$arrLinha[$i]);
				
				if(trim($arrColuna[0])=="nome")
					$usuarioArquivo = trim($arrColuna[1]);
				
				if( trim($arrColuna[0]) =="senha")
					$senhaArquivo = trim($arrColuna[1]);
				
				if (!$encontrouUsuario)
				{
					if ($usuarioArquivo == $usuarioTela)
					{
						$encontrouUsuario = TRUE;
						continue;
					}
				} else {
				
					if ($senhaArquivo == $senhaTela)
					{
						$loginAutorizado = TRUE;
						break;
					}
				}
			}
		}	
	}	
	
	if($loginAutorizado)
	{
		$_SESSION['session_nome']  = $_REQUEST['nome'];
		$_SESSION['session_senha'] = $_REQUEST['senha'];
		$msg = 'Usuário('.$_SESSION['session_nome'].') logado com sucesso';
	} else {
		if (isset($_REQUEST['btEntrar']))
			$msg = 'Usuário inválido!';
	}
	// FIM - Ruano Martinez Schulze - Questão 02		
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Home</title>
	</head>
	
	<body>
		<h1>HOME</h1>
		<p><?=$msg?></p>
		<table border="1" cellpadding="5">
			<tr>
				<td colspan="2">
					<? include('menu_site.php') ?>
				</td>
			</tr>
			<tr>
				<td width="120" valign="top">
					<? include('menu_produtos.php') ?>
				</td>
				<td valign="top" style="padding:5px 20px 20px 7px;">
					<?
					// INICIO - Ruano MArtinez Schulze - Questão 02
						if (!$loginAutorizado) {							

							if (!isset($_SESSION['session_nome']) && !isset($_SESSION['session_senha']))	// Ruano Martinez Schulze - Questão 03
							{
								?>								
									<h2>Login</h2>
									<form>
										Nome:<input  type="text" name="nome"  value=""/><br>
										Senha:<input type="text" name="senha" value=""/><br>
										<br>
										<input type="submit" name="btEntrar"/>
									</form>
								<?
							} else {
								?>
									<p>Usuário logado!</p>
								<?
							}
						}
						// FIM - Ruano MArtinez Schulze - Questão 02
					?>					
				</td>
			</tr>
		</table>	
	</body>
</html>