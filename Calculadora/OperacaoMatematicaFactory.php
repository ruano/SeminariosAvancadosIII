<?php	

	include 'Adicao.php';
	include 'Divisao.php';
	include 'Multiplicacao.php';
	include 'Subtracao.php';
    
    class OperacaoMatematicaFactory 
    {
    	private $sinalOperacao;
		        
        public function __construct($sinalOperacao) {
            $this->sinalOperacao = $sinalOperacao;
        }
		
		public function Fabricar() {
			switch ($this->sinalOperacao) {
				case "+":
					return new Adicao();
					break;
				case "-":
					return new Subtracao();
					break;
				case "/":
					return new Divisao();
					break;
				case "*":
					return new Multiplicacao();
					break;
				default:
					echo "Operação inválida!";
			}
		}
    }
    
?>