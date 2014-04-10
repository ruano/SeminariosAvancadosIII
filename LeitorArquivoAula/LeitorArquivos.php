<h2>Ler conteúdo arquivo</h2>
<table border="1">
	<tr>
    	<td>Nome</td>
        <td>Email</td>
        <td>Senha</td>
        <td>Data de Nascimento</td>
    </tr>
	<?php
	$f = fopen("arquivo.txt", "r");
	while (!feof($f)) { 
		$arrLinha = explode(',',fgets($f));
		echo '<tr>';
		for ($i = 0; $i < count($arrLinha); $i++)
		{
			$arrColuna = explode(':',$arrLinha[$i]);
			if ($arrColuna[0] == "nome")
				echo'<td>'.$arrColuna[1].'</td>';	
			else if ($arrColuna[0] == "email")
				echo'<td>'.$arrColuna[1].'</td>';
			else if ($arrColuna[0] == "senha")
				echo'<td>'.$arrColuna[1].'</td>';
			else if ($arrColuna[0] == "dataNascimento")
				echo'<td>'.$arrColuna[1].'</td>';
		}// FIM  for($i=0; $i<count($arrLinha)
		echo '</tr>';
	}// FIM  while(!feof($f))
	fclose($f);
?>
</table>