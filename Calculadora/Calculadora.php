<?php
    include 'OperacaoMatematicaFactory.php';	
	
	$factory = new OperacaoMatematicaFactory($_POST['operacao']);
	$operacao = $factory->Fabricar();
	
	$resultado = $operacao->Calcular($_POST['valor1'], $_POST['valor2']);
	
	echo '<html>';
		echo '<head>';
			echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		echo '</head>';
		echo '<body>';
			echo '<h1>Resultado da operação</h1>';
			echo '</br>';
			echo $resultado;
			echo '</br>';
			echo '</br>';
			echo '<a href="FormCalculadora.html">Voltar</a>';
		echo '<body>';
	echo '</html>';
?>