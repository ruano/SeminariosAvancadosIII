<?php
    header('Content-Type: text/html; charset=utf-8');
	
	$server = 'localhost';
	$username = 'root';
	$password = 'root';
	$database = 'seminarios';
	
    mysql_connect($server, $username, $password);
	
	$query = "CREATE DATABASE IF NOT EXISTS ".$database.";";
	mysql_query($query);
	
	$connection = mysql_select_db($database);
	
	if (!$connection)
		echo "<br>Erro ao abrir a conexão com o banco!";
	else {
		$query = "CREATE TABLE IF NOT EXISTS USUARIO (
					CODIGO INT(11) NOT NULL AUTO_INCREMENT,
					NOME VARCHAR(50) NOT NULL,
					SENHA VARCHAR(50) NOT NULL,
          			PRIMARY KEY (CODIGO));";
					
		if (!mysql_query($query))
			echo 'Erro ao criar a tabela USUARIO: '.mysql_error();
		
		$query = "insert into USUARIO (NOME, SENHA) values ('usuario', '12345');";
		
		if (!mysql_query($query))
			echo 'Erro ao Inserir registro na tabela USUARIO: '.mysql_error();
		
		$query = "CREATE TABLE IF NOT EXISTS ARQUIVOS (
					CODIGO INT(11) NOT NULL AUTO_INCREMENT,
					NOME VARCHAR(50) NOT NULL,
          			PRIMARY KEY (CODIGO));";
					
		if (!mysql_query($query))
			echo 'Erro ao criar a tabela ARQUIVOS: '.mysql_error();		
		
	}
?>