<?
	$msg = 'Nenhum item encontrado';
	
	setcookie("arrCookie[1]" , "11111"     , time()+3600*4 );
	setcookie("arrCookie[2]" , "2222222"   , time()+3600*4 );
	setcookie("arrCookie[3]" , "3333333333", time()+3600*4 );
	
	foreach ($_COOKIE['arrCookie'] as $nome => $valor) {
		//echo $nome .' :'.$valor.'<br />';
	}
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
				<td colspan="4">
					<? include('menu_site.php') ?>
				</td>
			</tr>
			<tr>
				<th>Contatos</th>
				<th>Produto</th>
				<th>Valor</th>
				<th>Remover</th>
			</tr>
			<tr>
				<td>1</td>
				<td>Produto A </td>
				<td>1,00</td>
				<td><a href="carrinho_remover.php???">X</a></td>
			</tr>
			<tr>
				<td>2</td>
				<td>Produto B </td>
				<td>14,00</td>
				<td><a href="?">X</a></td>
			</tr>
			<tr>
				<td>3</td>
				<td>Produto C </td>
				<td>2,00</td>
				<td><a href="?">X</a></td>
			</tr>
			
		</table>
	</body>
</html>
