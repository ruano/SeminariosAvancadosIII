<?php
	header('Content-Type: text/html; charset=utf-8');
	
	$diretorio = 'Arquivos/';
	
	if (isset($_REQUEST['deletar']))
	{
		$nomeArq = base64_decode($_REQUEST['deletar']);
		echo 'Excluindo arquivo('.$diretorio.$nomeArq.')';
		unlink($diretorio.$nomeArq);
	}	
	
	$result = array();
	
	$cdir = scandir($diretorio);
	
	foreach($cdir as $key => $value)
	{
		if (!in_array($value, array(".","..",",Index.php")))
		{
			echo '<br><a href="?deletar='.base64_encode($value).'"title="Deletar">X   </a>'.$value;
		}
	}
?>