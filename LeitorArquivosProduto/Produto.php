<?
	if (isset($_REQUEST['btnSalvar']))
	{
		$codigo = $_REQUEST['txtCodigo'];
		$nome = $_REQUEST['txtNome'];
		$valor = $_REQUEST['txtValor'];
		$descricao = $_REQUEST['txtDescricao'];
		
		$conteudo = "\n"."codigo=".$codigo.","."nome=".$nome.","."descricao=".$descricao.","."valor=".$valor;
		$file = fopen('produtos.txt', 'a');
		fwrite($file, $conteudo);
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Produtos</title>
    </head>
    <body>
        <h1>Produtos</h1>
        
        <table border="1">
        	<tr>
        		<td>
        			<?include 'Menu.php'?>			
        		</td> 
        		       		
        		<td>
        			<?
        				if (isset($_REQUEST['codigo']))
						{
							$codigoRequest = $_REQUEST['codigo'];
							
							$f = fopen("produtos.txt", "r");
							while (!feof($f)) 
							{ 
								$arrLinha = explode(',',fgets($f));	
								
								$codigo = '';
								$nome = '';
								$descricao = '';
								$valor = '';
								
								for ($i = 0; $i < count($arrLinha); $i++)
								{
									$arrColuna = explode('=', $arrLinha[$i]);
									
									switch ($arrColuna[0]) {
										case 'codigo':
											$codigo = $arrColuna[1];
											break;
										case 'nome':
											$nome = $arrColuna[1];
											break;
										case 'descricao':
											$descricao = $arrColuna[1];
											break;
										case 'valor':
											$valor = $arrColuna[1];
											break;										
										default:											
											break;
									}
								}
								
								if ($codigoRequest == $codigo)
								{
									?>
										<form>
											<label>Código</label><br />
											<input type="text" name="txtCodigo" value="<?=$codigo?>" /><br />
											<label>Nome</label><br />
											<input type="text" name="txtNome" value="<?=$nome?>" /><br />
											<label>Valor</label><br />
											<input type="text" name="txtValor" value="<?=$valor?>" /><br />
											<label>Descrição</label><br />
											<textarea rows="4" cols="30" name="txtDescricao"><?=$descricao?></textarea>							
										</form>
									<?	
								}			
							}
							fclose($f);								
						} else {
							if (isset($_REQUEST['acao']))
							{
								if ($_REQUEST['acao'] == 'novo') {
									?>
										<form>
											<label>Código</label><br />
											<input type="text" name="txtCodigo" value="" /><br />
											<label>Nome</label><br />
											<input type="text" name="txtNome" value="" /><br />
											<label>Valor</label><br />
											<input type="text" name="txtValor" value="" /><br />
											<label>Descrição</label><br />
											<textarea rows="4" cols="30" name="txtDescricao"></textarea><br />
											<input type="submit" name="btnSalvar" value="Salvar" />							
										</form>
									<?
								}
							}
						}
        			?>
        		</td>
        	</tr>
        </table>        
    </body>
</html>