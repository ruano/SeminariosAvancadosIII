<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Menu</title>
    </head>
<body>
<?	
	@session_start();
	
	if (isset($_SESSION['usuario']) && isset($_SESSION['senha']) || isset($_COOKIE["meuCookie"])) 
	{
		$usuarioLogado = '';
		if (isset($_SESSION['usuario']))
		{
			$usuarioLogado = $_SESSION['usuario'];
		}
		
		?>
			<h2>Menu</h2>
			<a href="Produto.php?acao=novo">Adicionar +</a><br/>
		<?
		
		$f = fopen("produtos.txt", "r");
		$i = 1;
		while (!feof($f)) 
		{ 
			$arrLinha = explode(',',fgets($f));			
			$codigo = '';
			
			for ($j = 0; $j < count($arrLinha); $j++)
			{
				$arrColuna = explode('=', $arrLinha[$j]);
				
				if ($arrColuna[0] == "codigo") 
				{
					$codigo = $arrColuna[1];
				}
			}
			
			?>
			<a href="Produto.php?codigo=<?=$codigo?>">Produto<?=$i?></a></br>
			<?
			
			$i = $i + 1;
		}
		fclose($f);
		
		if (isset($_COOKIE["meuCookie"]) && !isset($_SESSION['usuario'])) 
		{
			?>
				<h3>Bem vindo novamente!</h3>
			<?	
		} else if (isset($_SESSION['usuario'])) 
		{
			?>
				<h3>Usuário logado: <?=$usuarioLogado?></h3>
			<?
		}
	}
	else {
		echo 'Favor efetar login no sistema';
	}		
?>	
</body>
</html>