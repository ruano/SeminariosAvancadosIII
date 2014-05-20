<a href="home.php"> Home </a>
&nbsp;&nbsp;|&nbsp;&nbsp;
<?
	// INICIO - Ruano Martinez Schulze - Questão 05
	if (isset($_SESSION['session_nome']) && isset($_SESSION['session_senha']))
	{
		?>
			<a href="produtos.php"> Produto </a>
			&nbsp;&nbsp;|&nbsp;&nbsp;		
		<?		
	}
	
	if (isset($_COOKIE['carrinhoNoCookie']))
	{
		?>
			<a href="carrinho.php"> Carrinho </a>		
		<?
	}
	// FIM - Ruano Martinez Schulze - Questão 05
?>