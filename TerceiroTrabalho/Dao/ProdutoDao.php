<?php
    header('Content-Type: text/html; charset=utf-8');	
	include 'IExecutorComandoDao.php';
	include 'Banco/ConexaoBanco.php';
	
	class ProdutoDao implements IExecutorComandoDao
	{
		public function __construct()
		{
		}
		
		public function Insert($nome, $descricao, $valor)
		{
			$query = "INSERT INTO PRODUTO (NOME, DESCRICAO, VALOR) VALUES ('".$nome."','".$descricao."',".$valor.");";
			
			return mysql_query(utf8_decode($query));
		}
		
		public function Update($codigo)
		{
			$query = "UPDATE PRODUTO SET NOME = "."'".$nome."'".", DESCRICAO = "."'".$descricao."'".", VALOR = ".$valor." WHERE CODIGO = ".$codigo.";";

			return mysql_query(utf8_decode($query));				
		}
		
		public function Delete($codigo)
		{
			$query = "DELETE FROM PRODUTO WHERE CODIGO = ".$codigo.";";
			
			return mysql_query(utf8_decode($query));
		}		
	}
?>