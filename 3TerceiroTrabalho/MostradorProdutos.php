<?php
    header('Content-Type: text/html; charset=utf-8');
	
	session_start();
	
	if (isset($_SESSION['usuario']) && isset($_SESSION['senha']))
	{	
		include 'Banco/ConexaoBanco.php';
		include 'Dao/ProdutoDao.php';
		
		if (isset($_REQUEST['acao']))
		{
			if ($_REQUEST['acao'] == 'deletar')
			{
				$produtoDao = new ProdutoDao();
				$codigo = $_REQUEST['codigo'];	
				$retorno = $produtoDao->Delete($codigo);
				
				if ($retorno)			
					echo 'Produto removido com sucesso!';	
				 else 			
					echo 'Ocorreu um erro ao rmeover o produto!'.mysql_error();			
			}
		}
		
		$query = "SELECT * FROM PRODUTO;";
		$resposta = mysql_query($query);
		echo '</br>';
		
		?>
			<a href="ProdutoView.php?acao=novo">Novo +</a>
			<br />
			<br />
			
			<table border="1" cellspacing="5" cellpadding="5">
				<tr>
					<td>Código</td>
					<td>Nome</td>
					<td>Descrição</td>
					<td>Valor</td>
					<td>Editar</td>
					<td>Remover</td>
				</tr>		
		<?
		while ($linha = mysql_fetch_object($resposta))
		{
			?>
				<tr>
					<td><?=$linha->CODIGO?></td>
					<td><?=$linha->NOME?></td>
					<td><?=$linha->DESCRICAO?></td>
					<td><?=$linha->VALOR?></td>
					<td><a href="ProdutoView.php?codigo=<?=$linha->CODIGO?>&nome=<?=$linha->NOME?>&descricao=<?=$linha->DESCRICAO?>&valor=<?=$linha->VALOR?>&acao=editar">Editar</a></td>
					<td align="center"><a href="MostradorProdutos.php?codigo=<?=$linha->CODIGO?>&acao=deletar">X</a></td>	
				</tr>
			<?
		}
		?>
			</table>
		<?
	} else	
	{
		echo 'Favor efetuar login!';
	}
?>