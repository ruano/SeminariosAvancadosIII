<?
	session_start();
	$msg = 'Favor efetuar login no sistema!';
	
	$logado = FALSE;
	if (isset($_SESSION['session_nome']) && isset($_SESSION['session_senha']))
	{
		$logado = TRUE;
		$msg = '';
	}
	
	setcookie("arrCookie[1]" , "11111"     , time()+3600*4 );
	setcookie("arrCookie[2]" , "2222222"   , time()+3600*4 );
	setcookie("arrCookie[3]" , "3333333333", time()+3600*4 );
	
	foreach ($_COOKIE['arrCookie'] as $nome => $valor) {
		//echo $nome .' :'.$valor.'<br />';
	}
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
				<th>Valor</th>
				<th>Remover</th>
			</tr>
			
			<?
				?>
					<tr>
						<td colspan="4">
				<?
				if ($logado)
				{
					$f = fopen("carrinho.txt", "r");
					while(!feof($f)) { // Divide o arquivo em LINHAS
						$arrLinha = explode(',',fgets($f));
						$codigo = '';
						$nome = '';
						$valor = '';
						for($i=0; $i<count($arrLinha); $i++){							
							// Separa as chaves dos valores [codigo],[1]
							$arrColuna = explode(':',$arrLinha[$i]);
							if(trim($arrColuna[0])=="codigo")
								$codigo = $arrColuna[1];
							else if( trim($arrColuna[0]) =="nome")
								$nome = $arrColuna[1];
							elseif (trim($arrColuna[0] == "valor")) {
								$valor = $arrColuna[1];
							}
						}
						?>
							<tr>							
								<td><?=$codigo?></td>
								<td><?=$nome?></td>
								<td><?=$valor?></td>
								<td><a href="carrinho_remover.php?codigo=<?=$codigo?>">X</a></br></td>
							</tr>
						<?
					}
				}
				?>
						</td>
					</tr>
				<?
			?>			
		</table>
	</body>
</html>
