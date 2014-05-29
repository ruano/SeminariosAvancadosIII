<?php
    header('Content-Type: text/html; charset=utf-8');
	include 'Banco/ConexaoBanco.php';
	
	class UsuarioDao
	{
		public function __construct()
		{
		}
		
		/*
		create table AUTENTICACAO (
			CODIGO int(11) not null auto_increment,
			USUARIO varchar(50) not null,
			SENHA varchar(50) not null,
			primary key (CODIGO),
			unique (USUARIO, SENHA));
		 * 
		 * insert into autenticacao values (1, 'root', 'root');
		 */
		
		public function Select($usuario, $senha)
		{
			$query = "SELECT * FROM AUTENTICACAO WHERE USUARIO = '".$usuario."' AND SENHA = "."'".$senha."'".";";
			return mysql_query(utf8_decode($query));
		}
	}
?>