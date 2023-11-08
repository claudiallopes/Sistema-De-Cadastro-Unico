
<?php	


	include_once("config.php");
	include_once("protect.php");

	$CPF=$_GET['CPF'];
	$DATA=date('d/m/Y');
	$NOME=$_GET['NOME'];
	$BENEFICIO=$_GET['BENEFICIO'];
	$QUANTIDADE=$_GET['QUANTIDADE'];
	$RECEBEDOR=$_GET['RECEBEDOR'];
	$CRAS=$_GET['CRAS'];
	$CPF_Receb = $_GET['CPF_Recebedor'];

	$html = '<!DOCTYPE html>
			<html>
			<head>
			<style>
				/* Define o estilo do recibo */
				.receipt {
				width: 400px;
				border: 1px solid #ccc;
				border-radius: 5px;
				padding: 50px;
				margin: 50px;
				}
			
				/* Define o estilo dos títulos */
				.receipt h1, .receipt h2, .receipt h3{
				text-align: left;
				margin: 0;
				padding: 0;
				}
			
				/* Define o estilo das informações do recibo */
				.receipt .info {
				text-align: left;
				display: flex;
				justify-content: space-between;
				align-items: center;
				margin-bottom: 20px;
				}
			
				/* Define o estilo da tabela de itens */
				.receipt table {
				width: 100%;
				border-collapse: collapse;
				}
			
				.receipt th, .receipt td {
				border: 1px solid #ccc;
				padding: 5px;
				}
			
				.receipt th {
				text-align: left;
				}
			
				/* Define o estilo do rodapé */
				.receipt .footer {
				text-align: left;
				margin-top: 20px;
				}
			</style>
			</head>
			<body >
			<!-- Cria o conteúdo do recibo -->
			<div class="receipt">
			<h1 style="text-align:center;">Recibo</h1><br>
			
				<!-- Informações do recibo -->
				<div class="info">
					<div>
						<table>
							<tr>
								<th><h2>Data:</h2></th>
								<th><p>'.$DATA.'</p></th>
							</tr>
						</table>
					</div>
					<div>
						<table
							<tr>
								<th><h2>Nome:</h2></th>
								<th><p>'.$NOME.'</p></th>
							</tr>
						</table>
					</div>
					<div>
						<table>
							<tr>
								<th><h2>CPF:</h2></th>
								<th><p>'.$CPF.'</p></th>
							</tr>	
						</table>
					</div>
				</div>
				<!-- Tabela de itens -->
				<table>
				<tr>
					<th>Benefício</th>
					<th>Quantidade</th>
					<th>Quem Recebeu</th>
					<th>CPF de quem recebeu</th>
				</tr>
				<tr>
					<td>'.$BENEFICIO.'</td>
					<td>'.$QUANTIDADE.'</td>
					<td>'.$RECEBEDOR.'</td>
					<td>'.$CPF_Receb.'</td>
				</tr>

				</table>
			
				<!-- Rodapé do recibo -->
				<div class="footer">
				<table>
					<tr>
						<th><h2>CRAS:</h2></th>
						<th><p>'.$CRAS.'</p></th>
					</tr>
				</table><br><br>
					<h3 style="text-align:center;">Assinatura Do Recebedor:</h3>
					<p style="text-align:center;">___________________________</p>		
				</div>
			</div>
			</body>
			</html>';
			
	//carregar o composer
	require './vendor/autoload.php';
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;


	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html('
			'.$html.'
		');

	$dompdf->setPaper('A4', 'portrait');
	//Renderizar o html
	$dompdf->render();
	
	//Exibibir a página
	$dompdf->stream(
		"Recibo.pdf", 
		array(
			"Attachment" => true,//Para realizar o download somente alterar para true
			
			
		),
		
	);
	
