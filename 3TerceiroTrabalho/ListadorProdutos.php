<?php
    header('Content-Type: text/html; charset=utf-8');
	
	session_start();
	
	if (isset($_SESSION['usuario']) && isset($_SESSION['senha']))
	{	
		include 'Banco/ConexaoBanco.php';
		include 'Dao/ProdutoDao.php';
		
		$produtoDao = new ProdutoDao();
		
		if (isset($_REQUEST['acao']))
		{
			if ($_REQUEST['acao'] == 'deletar')
			{				
				$codigo = $_REQUEST['codigo'];	
				$retorno = $produtoDao->Delete($codigo);
				
				if ($retorno)			
					echo 'Produto removido com sucesso!';	
				 else 			
					echo 'Ocorreu um erro ao rmeover o produto!'.mysql_error();			
			}
		}
		
		$resposta = $produtoDao->Select();
		echo '</br>';
		
		?>
			<table border="1" cellspacing="5" cellpadding="5">
				<tr>
					<td><a href="ProdutoView.php?acao=novo">Novo Produto +</a></td>
					<td><a href="ListadorUsuario.php">Visualizar Usuários</a></td>							
				</tr>
			</table>
			
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
					<td align="center"><a href="ListadorProdutos.php?codigo=<?=$linha->CODIGO?>&acao=deletar">X</a></td>	
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