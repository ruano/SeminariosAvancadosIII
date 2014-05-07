

<div style="background-color:#CCC; width:120px; margin-top:-20px;">
	<a href="produtos.php?acao=Novo">Novo Produto + </a>
	<hr>
	<?php
	$f = fopen("produtos.txt", "r");
	while(!feof($f)) { // Divide o arquivo em LINHAS
		$arrLinha = explode(',',fgets($f));
		$codigo = '';
		$nome = '';
		for($i=0; $i<count($arrLinha); $i++){
			// Separa as chaves dos valores [codigo],[1]
			$arrColuna = explode(':',$arrLinha[$i]);
			if(trim($arrColuna[0])=="codigo")
				$codigo = $arrColuna[1];
			else if( trim($arrColuna[0]) =="nome")
				$nome = $arrColuna[1];
		}
		?>
		<a href="produtos.php?cod=<?php echo $codigo;?>"><?=$nome?></a>
		<br>
		<?php
	}//Fim do while(!feof($f)) 
	fclose($f);
?>
</div>
	
	
