<?php
    header('Content-Type: text/html; charset=utf-8');
	include 'Dao/ProdutoDao.php';
	
	$codigo = '';
	$nome = '';
	$descricao = '';
	$valor = '';
	$produtoDao = new ProdutoDao();
	
	if (isset($_REQUEST['btnSalvar']))
	{		
		$retorno = $produtoDao->Insert($_REQUEST['txtNome'], $_REQUEST['txtDescricao'], $_REQUEST['txtValor']);
		
		if ($retorno)
		{
			echo 'Produto inserido com sucesso!';	
		} else 
		{
			echo 'Ocorreu um erro ao inserir o produto!'.mysql_error();
		}
		
	} else if (isset($_REQUEST['acao'])) 
	{		
		if ($_REQUEST['acao'] == 'editar')
		{	$codigo = $_REQUEST['codigo'];
			$nome = $_REQUEST['nome'];
			$descricao = $_REQUEST['descricao'];		
			$valor = $_REQUEST['valor'];
		}
	}
	
	?>
		<form>
			<label>Código</label>
			<br />
			<input type="text" name="txtCodigo" value="<?=$codigo?>"/>
			<br />
			
			<label>Nome</label>
			<br />
			<input type="text" name="txtNome" value="<?=$nome?>"/>
			<br />
			
			<label>Descrição</label>
			<br />
			<input type="text" name="txtDescricao" value="<?=$descricao?>"/>
			<br />
			
			<label>Valor</label>
			<br />
			<input type="text" name="txtValor" value="<?=$valor?>"/>
			<br />
			<br />
			
			<input type="submit" name="btnSalvar" value="Salvar" />		
			<br />
			<br />
			
			<a href="MostradorProdutos.php">Voltar</a>				
		</form>
	<?
?>