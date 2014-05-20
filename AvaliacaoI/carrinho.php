<?
	session_start();
	$msg = 'Favor efetuar login no sistema!';
	
	// INICIO - Ruano Martinez Schulze - Questão 03
	$logado = FALSE;
	if (isset($_SESSION['session_nome']) && isset($_SESSION['session_senha']))
	{
		$logado = TRUE;
		$msg = '';
	}
	// FIM - Ruano Martinez Schulze - Questão 03			
	
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Carrinho</title>
	</head>
	
	<body>
		<h1>Carrinho</h1>
		<p><?=$msg?></p>
		<table border="1" cellpadding="5">
			<tr>
				<td colspan="4">
					<? include('menu_site.php') ?>
				</td>
			</tr>
			
			<tr>
				<th>Código</th>
				<th>Produto</th>
				<th>Remover</th>
			</tr>
			
			<?
				// INICIO - Ruano Martinez Schulze - Questão 04
				if ($logado)
				{
					if (isset($_COOKIE['carrinhoNoCookie'])) {
						foreach ($_COOKIE['carrinhoNoCookie'] as $codigo => $nome) {						
							?>
								<tr>
									<td><?=$codigo?></td>
									<td><?=$nome?></td>
									<td><a href="carrinho_remover.php?codigo=<?=$codigo?>">X</a></br></td>
								</tr>
							<?
						}
					}
				}
				// FIM - Ruano Martinez Schulze - Questão 04
			?>			
		</table>
	</body>
</html>
