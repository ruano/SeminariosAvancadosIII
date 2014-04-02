<?php
    include 'Pessoa.php';
	
	$arrPessoas = array(new Pessoa('Ruano', 24, 0616123243),
						new Pessoa('Aline', 21, 0616123243),
						new Pessoa('Josiane', 30, 0616123243));
		
		
	echo'<table border="1">'; 
		echo'<tr>';
			echo'<td>Nome</td>';
			echo'<td>Idade</td>';
			echo'<td>CPF</td>';
			echo'<td>Ano de nascimento</td>';
		echo'</tr>';	
	
	for ($i=0; $i < count($arrPessoas); $i++) {
		echo'<tr>';
			echo'<td>'.$arrPessoas[$i]->ObterNome().'</td>';
			echo'<td>'.$arrPessoas[$i]->ObterIdade().'</td>';
			echo'<td>'.$arrPessoas[$i]->ObterCpf().'</td>';
			echo'<td>'.$arrPessoas[$i]->CalculaAnoNascimento().'</td>';
		echo'</tr>';
	}
	echo'</table>';
	
?>