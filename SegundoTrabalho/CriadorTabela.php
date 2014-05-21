<?php
    header('Content-Type: text/html; charset=utf-8');
	
	$query = "CREATE TABLE IF NOT EXISTS PRODUTO (
				CODIGO INT(11) NOT NULL AUTO_INCREMENT,
				NOME VARCHAR(100) NOT NULL,
				DESCRICAO VARCHAR(150) NOT NULL,
				VALOR DECIMAL(10,2) NOT NULL,
				PRIMARY KEY (CODIGO)
			);";
	
	if (!mysql_query($query))
		echo 'Erro ao criar a tabela USUARIO: '.mysql_error();
	else 
		echo '** Criado tabela PRODUTO **'.'</br>';	
	
?>