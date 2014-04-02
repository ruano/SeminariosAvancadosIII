<?php
    $$arrayTeste = array(0 => 'Zero',
						 1 => 'Um',
						 2 => 'Dois',
						 3 => 'Três',
						 4 => 'Quatro',
						 5 => 'Cinco',
						 6 => 'Seis',
						 7 => 'Sete',
						 8 => 'Oito',
						 9 => 'Nove');
						 
	print_r($arrayTeste);
	
	echo "<hr>";
	
	var_dump($arrayTeste);
	
	echo "<hr>";
	
	for ($i=0; $i < count($arrayTeste); $i++) { 
		echo '<br>'.$i.' = ' .$arrayTeste[$i];
	}
	
	foreach ($arrayTeste as $indice => $valor) {
		echo '<br>'.$indice.' = '.$valor;
	}
?>