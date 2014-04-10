<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Home</title>
    </head>
<body>
<h2>Menu</h2>
	<?
		$f = fopen("produtos.txt", "r");
		$i = 1;
		while (!feof($f)) { 
			$arrLinha = explode(',',fgets($f));	

			// echo $arrLinha[0];
			// echo '</br>';
			// echo $arrLinha[1];
			// echo '</br>';
			// echo $arrLinha[2];
			// echo '</br>';
			
			$codigo = '';
			$descricao = '';
			$valor = '';
			
			for ($j = 0; j < count($arrLinha); $j++)
			{
				$arrColuna = explode('=', $arrLinha[$j]);
				switch ($arrColuna[0]) {
					case "codigo":
						$codigo = $arrColuna[1];
						break;
					case "descricao":
						$descricao = $arrColuna[1];
						break;
					case "valor":
						$valor = $arrColuna[1];
						break;
					default:
						echo 'Erro na leitura do arquivo.';
						break;				
				}
			} 			
			
			?><a href="Produtos.php?codigo=<?=$codigo?>&descricao=<?=$descricao?>$valor=<?=$valor?>">Produto<?=$i?></a></br><?
			
			$i = $i + 1;		
		}// FIM  while(!feof($f))
		fclose($f);
	?>
</body>
</html>