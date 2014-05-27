<?php
    header('Content-Type: text/html; charset=utf-8');
	include 'Banco/ConexaoBanco.php';
	
	class UsuarioDao
	{
		public function __construct()
		{
		}
		
		public function Select($usuario, $senha)
		{
			$query = "SELECT * FROM USUARIO WHERE USUARIO = '".$usuario."' AND SENHA = "."'".$senha."'".";";
			return mysql_query(utf8_decode($query));
		}
	}
?>