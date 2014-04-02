<?php

	include_once('IOperacaoMatematica.php');
	
    class Divisao implements IOperacaoMatematica {
        
		public function __construct()
		{			
		}
		
		public function Calcular($valor1, $valor2) {
			return $valor1 / $valor2;
		}
    }    
?>