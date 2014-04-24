	<h2>Menu</h2>
	<a href="Produto.php?acao=novo">Adicionar +</a><br/>
	<?
		$f = fopen("produtos.txt", "r");
		$i = 1;
		while (!feof($f)) { 
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
	?>
</body>
</html>