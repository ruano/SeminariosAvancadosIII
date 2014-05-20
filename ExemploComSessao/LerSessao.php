<?php
    @session_start();
	
	if (isset($_SESSION['meuIndice'])) 
	{
		echo 'Existe uma valor na session no indice [meuIndice]';
		echo '<br>O valor e = *'.$_SESSION['meuIndice'].'*';	
	} else {
		echo 'Nao existe a session com indice [meuIndice]';
	}
?>