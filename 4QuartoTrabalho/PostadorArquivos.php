<?php
	header('Content-Type: text/html; charset=utf-8');
	
	if (isset($_POST['btnUpload']))
	{	
		$diretorio = 'Arquivos/';	
		$nomeTemp = $_FILES['arquivo']['tmp_name'];
		$nomeOriginal = $_FILES['arquivo']['name'];
		
		$arrayNome = explode('.', $nomeOriginal);
		$extensaoArquiboOriginal = end($arrayNome);
		
		if (in_array($extensaoArquiboOriginal, array("jpg","txt",",doc"))) 		
		{
			if (move_uploaded_file($nomeTemp, $diretorio.$nomeOriginal))
				echo 'Arquivo salvo com sucesso!';
			else 
				echo 'Erro ao fazer upload!';
		} else
			echo 'Extensão do arquivo inválida!';		
	}
	
	?>
		<form action="?" method="post" enctype="multipart/form-data">
		<input type="file" name="arquivo" />
		<br />
		<input type="submit" value="Upload" name="btnUpload">
		</form>
	<?		
?>