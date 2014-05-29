<?php
	header('Content-Type: text/html; charset=utf-8');
	
	$server = 'localhost';
	$username = 'root';
	$password = 'root';
	$database = 'seminarios';	
	
    mysql_connect($server, $username, $password);
	echo '** Conectado ao servidor MySQL **'.'</br>';
	
	$queryCreateDatabase = "DROP DATABASE IF EXISTS ".$database.";";
	mysql_query($queryCreateDatabase);
	echo '** Removido base **'.'</br>';
	
	$queryCreateDatabase = "CREATE DATABASE IF NOT EXISTS ".$database.";";
	mysql_query($queryCreateDatabase);
	echo '** Criado base novamente **'.'</br>';
	
	$connection = mysql_select_db($database);
	
	if (!$connection)
		echo "<br>Erro ao abrir a conexão com o banco!";
?>