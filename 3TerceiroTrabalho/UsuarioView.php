<?php
    header('Content-Type: text/html; charset=utf-8');
	
	session_start();	
	
	if (isset($_SESSION['usuario']) && isset($_SESSION['senha']))
	{
		include 'Dao/AutenticacaoDao.php';
		
		$imagem = 'Imagens/semfoto.jpg';
				
		$codigo = '';
		$usuario = '';
		$senha = '';
		
		$acao = $_REQUEST['acao'] == 'novo' ? 'novo' : 'editar';
		
		if (isset($_POST['btnSalvar']))
		{
			$autenticacaoDao = new AutenticacaoDao();			
			
			$nomeTemp = $_FILES['foto']['tmp_name'];
			$nomeOriginal = $_FILES['foto']['name'];
			
			$arrayNomeArquivo = explode('.', $nomeOriginal);			
			$extensaoArquivoOriginal = end($arrayNomeArquivo);			
			
			$msg = '';
			
			if (in_array($extensaoArquivoOriginal, array("jpg")) || $extensaoArquivoOriginal == '') 		
			{
				if ($acao == 'novo')
				{
					$retorno = $autenticacaoDao->Insert($_POST['txtUsuario'], $_POST['txtSenha']);
					$pk = mysql_insert_id();
					if (file_exists('Imagens/'.$pk.'.jpg'))
						unlink('Imagens/'.$pk.'.jpg');
					
					move_uploaded_file($nomeTemp, 'Imagens/'.$pk.'.jpg');
				}					
				else
				{
					$retorno = $autenticacaoDao->Update($_POST['txtCodigo'], $_POST['txtSenha']);
					if (file_exists('Imagens/'.$_POST['txtCodigo'].'.jpg'))
						if (isset($_POST['foto']))
							unlink('Imagens/'.$_POST['txtCodigo'].'.jpg');
						
					move_uploaded_file($nomeTemp, 'Imagens/'.$_POST['txtCodigo'].'.jpg');
				}													
				
				$msg = $retorno ? 'Operação realizada com sucesso!' : 'Ocorreu um erro ao realizar a operação!'.mysql_error();			
			
			} else
				$msg = 'Extensão do arquivo inválida!';			  
			
			echo $msg;
		}		
		else if ($acao == 'editar')
		{
			$codigo = $_REQUEST['codigo'];
			$usuario = $_REQUEST['usuario'];
			$senha = $_REQUEST['senha'];
			
			$imagem = file_exists('Imagens/'.$codigo.'.jpg') ? 'Imagens/'.$codigo.'.jpg' : 'Imagens/semfoto.jpg';			
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
					
					<input type="hidden" name="acao" value="<?=$acao?>" />
					<br />
					<input type="file" name="foto" />
					<br />
					<img src="<?=$imagem?>" />
					<br />
					<br />	
					
					<input type="submit" name="btnSalvar" value="Salvar" />
					<br />
					<br />
					
					<a href="ListadorUsuario.php">Voltar</a>
				</div>
			</form>
		<?
	}	
?>