<?
	$msg = 'Nenhuma acao';
	
	$codigo = $_REQUEST['codigo'];
	
	// Para remover os cookies use -1
	if(setcookie("arrCookie[1]" , "" , time()-1 )){
		$msg = 'Ok produto '.$codigo.' foi removido com sucesso!';
	}
	
	$posicaoADeletar = null;
	$arquivo = "carrinho.txt";
	$fileArr = file($arquivo);
	for ($i = 0; $i < count($fileArr); $i++)
	{		
		$arrLinha = explode(',', $fileArr[$i]);		
		for ($j = 0; $j < count($arrLinha); $j++)
		{
			$arrColuna = explode(':', $arrLinha[$j]);
			for ($a = 0; $a < count($arrColuna); $a++)
			{
				if ($arrColuna[0] == 'codigo' && $arrColuna[1] == $codigo)
				{
					$posicaoADeletar = $i;
					break;
				}
			}				
		}		
	}
	unset($fileArr[$posicaoADeletar != null ? -1 : $posicaoADeletar]);
	$fileArr = array_values($fileArr);
	file_put_contents($arquivo, implode($fileArr));
	
	//print_r($_COOKIE);
	
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Remoção do carrinho</title>
	</head>
	
	<body>
		<h1>Carrinho</h1>
		<p><?=$msg?></p>
		<table border="1" cellpadding="5">
			<tr>
				<td>
					<? include('menu_site.php') ?>
				</td>
			</tr>
			<tr>
				<th><a href="carrinho.php">Voltar</a></th>
			</tr>		
			
		</table>
	</body>
</html>
