<?php
 	header('Content-Type: text/html; charset=utf-8');	
	include 'ArquivosDao.php';

	$diretorioImagens = 'meusArquivos/';
	
	if (isset($_POST['btnSalvar']))
	{			
		$nomeTemp = $_FILES['foto']['tmp_name'];
		$nomeOriginal = $_FILES['foto']['name'];
		
		$arrayNomeArquivo = explode('.', $nomeOriginal);			
		$extensaoArquivoOriginal = end($arrayNomeArquivo);					
		
		$extensaoValida = '.jpg';
		
		$msg = '';
		
		if (in_array($extensaoArquivoOriginal, array("jpg")) || $extensaoArquivoOriginal == '') 		
		{					
			move_uploaded_file($nomeTemp, $diretorioImagens.$nomeOriginal.$extensaoValida);	
			$arquivosDao = new ArquivosDao();
			$arquivosDao->Insert($nomeOriginal);												
			
			$msg = 'Operação realizada com sucesso!';			
		
		} else
			$msg = 'Extensão do arquivo inválida!';			  
		
		echo $msg;
	}
	
	if (isset($_REQUEST['deletar']))
	{
		$nomeArq = base64_decode($_REQUEST['deletar']);
		echo 'Excluindo arquivo('.$diretorioImagens.$nomeArq.')';
		unlink($diretorioImagens.$nomeArq);
	}	
	
	$result = array();
	
	$cdir = scandir($diretorioImagens);
	
	foreach($cdir as $key => $value)
	{
		if (!in_array($value, array(".","..",",Index.php")))
		{
			echo '<br><a href="?deletar='.base64_encode($value).'"title="Deletar">X   </a>'.$value;
		}
	}

    ?>
		<form action="?" method="post" enctype="multipart/form-data">
			<div>					
				<input type="file" name="foto" />	
				<br />
				<input type="submit" name="btnSalvar" value="Salvar" />
				<br />
				<br />
			</div>
		</form>
	<?
?>