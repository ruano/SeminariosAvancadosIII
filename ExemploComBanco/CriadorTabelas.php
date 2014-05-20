<?php
    header('Content-Type: text/html; charset=utf-8');
	
	include 'ConexaoBanco.php';
	
	$query = "CREATE TABLE IF NOT EXISTS usuario (
		codigo int (11) NOT NULL,
		nome varchar(100) NOT NULL,
		PRIMARY KEY (codigo)
	);";
	
	// Comandos DDL retorna booleano
	if (!mysql_query($query))
		echo 'Erro ao criar a tabela USUARIO: '.mysql_error();
	
	$query = "DELETE FROM usuario;";
	if (!mysql_query($query)) 
		echo 'Erro ao remover os registros da tabela USUARIO: '.mysql_error();
	
	$query = "INSERT INTO usuario (codigo, nome) VALUES
			    (1, 'usuarioA'),
			    (2, 'usuarioB'),
			    (3, 'usuarioC'),
			    (4, 'usuarioD');";
				
	//echo "<br>Número de registros inseridos na tabela usuário: ".mysql_affected_rows();
	if (!mysql_query(utf8_decode($query)))
		echo "<br>Erro ao inserir registros na tabela USUARIO!<br>";	
	
	
	// Com mysql_fetch_array
	$query = "SELECT * FROM usuario;";
	$resposta = mysql_query($query);
	echo '</br>';
	?>
		<table border="1" cellspacing="5" cellpadding="5">
			<tr>
				<td>Código</td>
				<td>Nome</td>
			</tr>		
	<?
	while ($linha = mysql_fetch_array($resposta))
	{
		?>
			<tr>
				<td><?=$linha['codigo']?></td>
				<td><?=$linha['nome']?></td>
			</tr>
		<?
	}
	?>
		</table>
	<?	
	
	// Com mysql_fetch_object
	$resposta = mysql_query($query);
	echo '</br>';
	?>
		<table border="1" cellspacing="5" cellpadding="5">
			<tr>
				<td>Código</td>
				<td>Nome</td>
			</tr>		
	<?
	while ($linha = mysql_fetch_object($resposta))
	{
		?>
			<tr>
				<td><?=$linha->codigo?></td>
				<td><?=$linha->nome?></td>
			</tr>
		<?
	}
	?>
		</table>
	<?
	
	
	/* 
	 * 1. Elaborar um script php para criar a tabela:
	 * 		produto
	 * 			- codigo: int autoincrement
	 * 			- nome: varchar(100)
	 * 			- valpro: decimal (10,2)
	 * 			- descricao: varchar(150)
	 * 2. Elaborar um alogoritmo para ler o arquivo txt de produtos para cada linha lida realizar um insert na tabela de produtos.
	 * 3. Desenvolver um arquivo para mostrar todos os produtos da tabela produto em uma tabela	 
	 */
?>