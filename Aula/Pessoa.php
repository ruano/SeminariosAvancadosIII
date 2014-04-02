<?php
    /**
     * 
     */
    class Pessoa {
    	
		private $nome;
		private $idade;
		private $cpf;
        
		public function __construct($nome, $idade, $cpf){
			$this->nome = $nome;
			$this->idade = $idade;
			$this->cpf = $cpf;
        }
		
		public function ObterIdade() {
			return $this->idade;
		}
		
		public function ObterNome() {
			return $this->nome;
		} 
		
		public function ObterCpf() {
			return $this->cpf;
		}  
		
		public function CalculaAnoNascimento() {
			return date('Y') - $this->idade;
		}
		
		public function FuncaoPorValor(&$param) {
			
		}
		
		public function ParametrosPreDefinidos($param = 'ValorDefault') {
			
		}
    }
    
?>