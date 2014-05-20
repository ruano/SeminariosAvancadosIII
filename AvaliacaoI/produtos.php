<?
	session_start();
	$acao        = '';
	$codigoFinal = '';
	$nomeFinal   = '';
	$valorFinal  = '';
	$descriFinal = '';
	//$msg         = 'Verificar sessão, não mostrar os produtos caso não tenha';
	$msg         = 'Favor efetuar login no sistema!';
	
	if (isset($_SESSION['session_nome']) && isset($_SESSION['session_senha']))	// Ruano Martinez Schulze - Questão 03
	{
		$msg = '';
		if(isset($_REQUEST['cod'])){
			// Veio do clique no MENU apenas mostra o produto
			$acao='Visualizar';
			$codigoRequest = $_REQUEST['cod'];
			$f = fopen("produtos.txt", "r");
			while(!feof($f)) { 
				$codigo = '';
				$nome   = '';
				$valor  = '';
				$descri = '';
				$arrLinha = explode(',',fgets($f));
				for($i=0; $i<count($arrLinha); $i++){
					$arrColuna = explode(':',$arrLinha[$i]);
					if(trim($arrColuna[0])=="codigo")    
						$codigo = $arrColuna[1];					
					else if( trim($arrColuna[0]) =="nome") 
						$nome = $arrColuna[1];
						
					else if( trim($arrColuna[0]) =="valor") 
						$valor = $arrColuna[1];
						
					else if( trim($arrColuna[0]) =="descri") 
						$descri = $arrColuna[1];																		
				}
				if($codigoRequest==$codigo){
					$codigoFinal = $codigo;
					$nomeFinal   = $nome;
					$valorFinal  = $valor;
					$descriFinal = $descri;
				}
			}//Fim do while(!feof($f)) 
			fclose($f);	
		}// Fim if(isset($_REQUEST['cod']))
		else if(isset($_REQUEST['btSalvar'])){
			// Aqui veio do form com as informações
			$acao='Novo';
			$codigoFinal = $_REQUEST['txtCodigo'];
			$nomeFinal   = $_REQUEST['txtNome'];
			$valorFinal  = $_REQUEST['txtValor'];
			$descriFinal = $_REQUEST['txtDescricao'];
			if($codigoFinal=='' || $nomeFinal=='' ||$valorFinal==''){
				$msg = 'Formulário inválido!';	
			}
			else{
				$novaLinha = "\ncodigo:".$codigoFinal.', nome:'.$nomeFinal.',valor:'.$valorFinal.',descri:'.$descriFinal.' ';
				$f = fopen('produtos.txt', 'a');
				if(fwrite($f, $novaLinha)){
					$acao='Visualizar';
					$msg = 'Registro gravado com sucesso!';
				}
				else	
					$msg = 'Erro ao gravar o Produto!';	
				fclose($f);	
			}
		}
		else if(isset($_REQUEST['btComprar'])){
			// Aqui veio do form com as informações
			$acao='Visualizar';
			$codigoFinal = trim($_REQUEST['txtCodigo']);
			$nomeFinal   = trim($_REQUEST['txtNome']);
			$valorFinal  = trim($_REQUEST['txtValor']);
			$descriFinal = trim($_REQUEST['txtDescricao']);
			
			if( setcookie("carrinhoNoCookie[".$codigoFinal."]", $codigoFinal, time()+3600 ) )
			{					
				$msg = 'Produto adicionado ao carrinho com sucesso!';
				header("location: home.php");
			}
			
			else 
			{
				$msg = 'Erro ao comprar o Produto('.$codigoFinal.'-'.$nomeFinal.')!';	
			}
		} else if (isset($_REQUEST['acao'])) {
			if (($_REQUEST['acao'] == 'Novo')) {
				$acao = 'Novo';
				$codigoFinal = '';
				$nomeFinal   = '';
				$valorFinal  = '';
				$descriFinal = '';
			}
		}							
	}
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Produtos</title>
	</head>
	
	<body>
		<h1>PRODUTOS</h1>
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
					if($acao!=""){
						?>
						<h2><?= $acao ?> Produto</h2>
						<form>
							Código:<input type="text" name="txtCodigo" value="<?=$codigoFinal?>"/><br />
							Nome:<input type="text"   name="txtNome"   value="<?=$nomeFinal?>"/>  <br />
							R$: <input type="text"    name="txtValor"  value="<?=$valorFinal?>"/> <br />
							Descrição:<br />
							<textarea name="txtDescricao"><?=$descriFinal?></textarea>
							<br>
							<? if( $acao=='Novo' ){
								?>
								<input type="submit" name="btSalvar" value="Salvar"/>
								<?
							}
							else{
								?>
								<input type="submit" name="btComprar" value="Comprar"/>
								<?
							}
							?>
						</form>
						<?
					}
					else{
						echo "Nenhuma ação encontrada.";	
					}
					?>
				</td>
			</tr>
		</table>
	</body>
</html>
