<?php
    interface IExecutorComandoDao   
    {
    	public function Insert($nome, $descricao, $valor);
		public function Update($codigo);
		public function Delete($codigo);
    }
?>