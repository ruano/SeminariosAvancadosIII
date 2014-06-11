<?php
    header('Content-Type: text/html; charset=utf-8');
	
	session_start();	
	
	if (isset($_SESSION['usuario']) && isset($_SESSION['senha']))
	{	
		include 'Dao/ProdutoDao.php';
		
		$codigo = '';
		$nome = '';
		$descricao = '';
		$valor = '';
		$produtoDao = new ProdutoDao();
		
		$acao = $_REQUEST['acao'] == 'novo' ? 'novo' : 'editar';
		
		if (isset($_REQUEST['btnSalvar']))	// Se veio desta página (Botão salvar)
		{		
			if ($acao == 'novo')
				$retorno = $produtoDao->Insert($_REQUEST['txtNome'], $_REQUEST['txtDescricao'], $_REQUEST['txtValor']);
			else
				$retorno = $produtoDao->Update($_REQUEST['txtCodigo'], $_REQUEST['txtNome'], $_REQUEST['txtDescricao'], $_REQUEST['txtValor']);
			
			$msg = $retorno ? 'Operação realizada com sucesso!' : 'Ocorreu um erro ao realizar a operação!'.mysql_error();		
			echo $msg;
		} else // Veio da página ListadorProdutos.php
		{
			if ($acao == 'editar')
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
				<input type="text" name="txtCodigo" value="<?=$codigo?>" readonly/>
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
				
				<input type="hidden" name="acao" value="<?=$acao?>" />
				
				<input type="submit" name="btnSalvar" value="Salvar" />		
				<br />
				<br />
				
				<a href="ListadorProdutos.php">Voltar</a>				
			</form>
		<?
	} else 
	{
		echo 'Favor efetuar login!';
	}
?>