<?php

	include_once('IOperacaoMatematica.php');
	
    class Multiplicacao implements IOperacaoMatematica {
		
		public function __construct()
		{			
		}
		
		public function Calcular($valor1, $valor2) {
			return $valor1 * $valor2;
		}
    }    
?>