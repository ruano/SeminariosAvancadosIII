<?php
    include 'OperacaoMatematicaFactory.php';	
	
	if (isset($_REQUEST['btnCalcular']))
	{
		echo '<html>';
		echo '<head>';
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		echo '</head>';
		echo '<body>';
		echo '</br>';
		echo '<a href="FormCalculadora.html">Voltar</a>';
		
		$valor1 = $_REQUEST['valor1'];
		$valor2 = $_REQUEST['valor2'];
		
		if ($valor1 <= 0 || $valor2 <= 0) 
		{			
			echo '<p>Valores não preenchidos</p>';
			return;
		}
		
		$factory = new OperacaoMatematicaFactory($_REQUEST['operacao']);
		$operacao = $factory->Fabricar();
		
		$resultado = $operacao->Calcular($valor1, $valor2);		
		
		echo '<h1>Resultado da operação</h1>';
		echo $resultado;
		echo '</br>';			
		echo '<body>';
		echo '</html>';
	}	
?>