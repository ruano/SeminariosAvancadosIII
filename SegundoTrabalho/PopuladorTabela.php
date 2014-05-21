<?php
    header('Content-Type: text/html; charset=utf-8');
	
	$mostrarMsg = TRUE;
	
	$f = fopen("produtos.txt", "r");
	while (!feof($f)) 
	{ 
		$arrLinha = explode(',',fgets($f));
		$codigo = null;
		$nome = null;
		$descricao = null;
		$valor = null;	
		
		for ($i = 0; $i < count($arrLinha); $i++)
		{
			$arrColuna = explode('=', $arrLinha[$i]);			
			
			switch ($arrColuna[0]) {
				case 'codigo':
					$codigo = trim($arrColuna[1]);
					continue;
				case 'nome':
					$nome = trim($arrColuna[1]);
					continue;
				case 'descricao':
					$descricao = trim($arrColuna[1]);
					continue;
				case 'valor':
					$valor = trim($arrColuna[1]);
					continue;										
				default:											
					break;
			}
			
			if ($codigo != null && $nome != null && $descricao != null && $valor != null)
			{
				$query = "INSERT INTO PRODUTO (CODIGO, NOME, DESCRICAO, VALOR) VALUES
			    (".$codigo.",'".$nome."','".$descricao."',".$valor.");";
				
				if (!mysql_query(utf8_decode($query)))
					echo "<br>Erro ao inserir registros na tabela USUARIO!<br>";		
				else
				{
					if ($mostrarMsg)
					{
						echo '** Registros inseridos com sucesso na tabela PRODUTO **'.'</br>';
						$mostrarMsg = FALSE;
					}							
				}
							
			}						
		}
	}
?>