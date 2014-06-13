<?php
    header('Content-Type: text/html; charset=utf-8');
	include 'Banco/ConexaoBanco.php';
	
	class AutenticacaoDao
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
		
		public function BuscarTodosUsuarios()
		{
			$query = "SELECT * FROM AUTENTICACAO";
								
			return mysql_query(utf8_decode($query));
		}
		
		public function Update($codigo, $usuario, $senha)
		{
			$query = "UPDATE AUTENTICACAO SET USUARIO = '".$usuario."' , SENHA = '".$senha."' WHERE CODIGO = ".$codigo.";";
								
			return mysql_query(utf8_decode($query));
		}
		
		public function Insert($usuario, $senha)
		{
			$query = "INSERT INTO AUTENTICACAO (USUARIO, SENHA) VALUES ('".$usuario."', '".$senha."');";
								
			return mysql_query(utf8_decode($query));
		}
	}
?>