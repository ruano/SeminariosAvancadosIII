<?php
    header('Content-Type: text/html; charset=utf-8');
	
	session_start();	
	
	if (isset($_SESSION['usuario']) && isset($_SESSION['senha']))
	{
		include 'Banco/ConexaoBanco.php';
		include 'Dao/AutenticacaoDao.php';
		
		$autenticacaoDao = new AutenticacaoDao();		
		$resposta = $autenticacaoDao->BuscarTodosUsuarios();
		
		echo '</br>';
		
		?>			
			<a href="UsuarioView.php?acao=novo">Novo Usuário +</a>
			<br />
			<br />
					
			<table border="1" cellspacing="5" cellpadding="5">
				<tr>
					<td>Código</td>
					<td>Usuário</td>
					<td>Senha</td>
					<td>Editar</td>
				</tr>		
		<?
		while ($linha = mysql_fetch_object($resposta))
		{
			?>
				<tr>
					<td><?=$linha->CODIGO?></td>
					<td><?=$linha->USUARIO?></td>
					<td>*******</td>
					<td><a href="UsuarioView.php?codigo=<?=$linha->CODIGO?>&usuario=<?=$linha->USUARIO?>&senha=<?= base64_encode($linha->SENHA)?>&acao=editar">Editar</a></td>	
				</tr>
			<?
		}
		?>
			</table>
			<br/>
			<a href="ListadorProdutos.php">Voltar</a>
		<?		
	}	
?>