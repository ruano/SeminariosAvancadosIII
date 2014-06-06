<?php
    header('Content-Type: text/html; charset=utf-8');
	
	session_start();	
	
	if (isset($_SESSION['usuario']) && isset($_SESSION['senha']))
	{
		include 'Dao/AutenticacaoDao.php';		
				
		$codigo = '';
		$usuario = '';
		$senha = '';
		
		$acao = $_REQUEST['acao'] == 'novo' ? 'novo' : 'editar';
		
		if (isset($_POST['btnSalvar']))
		{
			$autenticacaoDao = new AutenticacaoDao();
			
			if ($acao == 'novo')
				$retorno = $autenticacaoDao->Insert($_POST['txtUsuario'], $_POST['txtSenha']);
			else						
				$retorno = $autenticacaoDao->Update($_POST['txtCodigo'], $_POST['txtSenha']);			
			
			$msg = $retorno ? 'Operação realizada com sucesso!' : 'Ocorreu um erro ao realizar a operação!'.mysql_error();  
			
			echo $msg;
		}		
		else if ($acao == 'editar')
		{
			$codigo = $_REQUEST['codigo'];
			$usuario = $_REQUEST['usuario'];
			$senha = $_REQUEST['senha'];
		}
		
		?>
			<form action="?" method="post" enctype="multipart/form-data">
				<div>
					<label>Código</label>
					<br />
					<input type="text" name="txtCodigo" value="<?=$codigo?>" readonly/>
					<br />
					
					<label>Usuário</label>
					<br />
					<input type="text" name="txtUsuario" value="<?=$usuario?>"/>
					<br />
					
					<label>Senha</label>
					<br />
					<input type="password" name="txtSenha" value="<?=$senha?>"/>
					<br />
					<br />
					
					<input type="hidden" name="acao" value="<?=$acao?>" />
					
					<input type="submit" name="btnSalvar" value="Salvar" />
					<br />
					<br />
					
					<a href="ListadorUsuario.php">Voltar</a>
				</div>
			</form>
		<?
	}	
?>