﻿<?
	session_start();
	$msg = 'Bem vindo';
	$logado = FALSE;
	if(isset($_REQUEST['btEntrar'])){
		if($_REQUEST['nome']=="Marcelo" && $_REQUEST['senha']=="123"){
			$_SESSION['session_nome']  = $_REQUEST['nome'];
			$_SESSION['session_senha'] = $_REQUEST['senha'];
			$msg = 'Usuário('.$_SESSION['session_nome'].') logado com sucesso';
			$logado = TRUE;
		}
		else
			$msg = 'Usuário inválido!';
	}
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Home</title>
	</head>
	
	<body>
		<h1>HOME</h1>
		<p><?=$msg?></p>
		<table border="1" cellpadding="5">
			<tr>
				<td colspan="2">
					<? include('menu_site.php') ?>
				</td>
			</tr>
			<tr>
				<td width="120" valign="top">
					<? include('menu_produtos.php') ?>
				</td>
				<td valign="top" style="padding:5px 20px 20px 7px;">
					<?
						if ($logado) {
							
							?>
								<p>Usuário logado!</p>							
							<?
						} else {
							if (!isset($_SESSION['session_nome']) && !isset($_SESSION['session_senha']))
							{
								?>								
									<h2>Login</h2>
									<form>
										Nome:<input  type="text" name="nome"  value="Marcelo"/><br>
										Senha:<input type="text" name="senha" value="123"/><br>
										<br>
										<input type="submit" name="btEntrar"/>
									</form>
								<?
							} else {
								?>
									<p>Usuário logado!</p>
								<?
							}
						}
					?>					
				</td>
			</tr>
		</table>	
	</body>
</html>