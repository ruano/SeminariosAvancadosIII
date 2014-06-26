<?php
    header('Content-Type: text/html; charset=utf-8');
	
	class ArquivosDao
	{
		public function __construct()
		{
		}
		
		public function Insert($nome)
		{
			mysql_connect('localhost', 'root', 'root');
			mysql_select_db('seminarios');
			$query = "INSERT INTO ARQUIVOS (NOME) VALUES ('".$nome."');";
			echo $query;
			return mysql_query(utf8_decode($query));
		}
	}
?>