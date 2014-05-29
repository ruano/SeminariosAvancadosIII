<?php
	header('Content-Type: text/html; charset=utf-8');
	
	$server = 'localhost';
	$username = 'root';
	$password = 'root';
	$database = 'seminarios';
	
    mysql_connect($server, $username, $password);
	
	$queryCreateDatabase = "CREATE DATABASE IF NOT EXISTS ".$database.";";
	mysql_query($queryCreateDatabase);
	
	$connection = mysql_select_db($database);
	
	if (!$connection)
		echo "<br>Erro ao abrir a conexão com o banco!";
?>