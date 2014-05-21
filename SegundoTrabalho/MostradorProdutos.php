<?php
    header('Content-Type: text/html; charset=utf-8');
	
	$query = "SELECT * FROM PRODUTO;";
	$resposta = mysql_query($query);
	echo '</br>';
	
	?>
		<table border="1" cellspacing="5" cellpadding="5">
			<tr>
				<td>Código</td>
				<td>Nome</td>
				<td>Descrição</td>
				<td>Valor</td>
			</tr>		
	<?
	while ($linha = mysql_fetch_object($resposta))
	{
		?>
			<tr>
				<td><?=$linha->CODIGO?></td>
				<td><?=$linha->NOME?></td>
				<td><?=$linha->DESCRICAO?></td>
				<td><?=$linha->VALOR?></td>
			</tr>
		<?
	}
	?>
		</table>
	<?
?>