<?php
    header('Content-Type: text/html; charset=utf-8');
	
	class UsuarioDao
	{
		public function __construct()
		{
		}
		
		public function Select($nome, $senha)
		{
			mysql_connect('localhost', 'root', 'root');
			mysql_select_db('seminarios');
			$query = "SELECT * FROM USUARIO WHERE NOME = '".$nome."' AND SENHA = "."'".$senha."'".";";
			return mysql_query(utf8_decode($query));
		}
	}
?>