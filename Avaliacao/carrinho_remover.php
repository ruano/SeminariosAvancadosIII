<?
	$msg = 'Nenhuma acao';
	
	// Para remover os cookies use -1
	if(setcookie("arrCookie[1]" , "" , time()-1 )){
		$msg = 'Ok produto XXX removido com sucesso!';
	}
	
	//print_r($_COOKIE);
	
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Documento sem título</title>
	</head>
	
	<body>
		<h1>Carrinho</h1>
		<p><?=$msg?></p>
		<table border="1" cellpadding="5">
			<tr>
				<td>
					<? include('menu_site.php') ?>
				</td>
			</tr>
			<tr>
				<th><a href="carrinho.php">Voltar</a></th>
			</tr>
			
			
		</table>
	</body>
</html>
