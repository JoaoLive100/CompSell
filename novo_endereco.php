<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/footer.css">
		<style>
			body
			{
			margin:0px;
			padding:0px;
		    }
			.container h2
			{
				text-align:center;
				color: #666;
			}
			.form-control{
				width:150px;
				display:inline;
			}
			div input, select, option{
			margin:20px;
			margin-bottom:6px;
			}
		</style>
		<script type="text/javascript">
			$("#cep").mask("00000-000");
		</script>
	</head>
	<body>
		<?php
		    include("conexao.php");
		    session_start();

			$cpf = $_SESSION['cpf'];
			$numero = $_SESSION['Indice'];
			$total = $_SESSION['totalfor'];
		   if(isset($_POST["cep"]))
		   {
		   }
		   else
		   {
			   echo "<nav class='navbar navbar-inverse'>
						<div class='container-fluid'>
							<div class='navbar-header'>
								<a href='index.php'><img src='logo.png' style='width:150px;padding:10px;'></a>
							</div>
						</div>
					</nav>";
			   echo "<div class=\"panel panel-default\" align='center'>
						<div class=\"panel-heading\"><h2><b>Dados para compra</b></h2></div>";
							echo "<form action='cadastra_endereco.php' method='post'>
								<div class=\"panel panel-default\" style='width:620px; margin-top:50px;'>
									<div class=\"panel-heading\" align='center'><h3>Cadastre um novo endereço</h3></div>
									<div class='panel-body' style='font-size:16px;' align='center'>
										<table>
											<tr>
												<td>
													<label for='endereco'>CEP</label>
												</td>
												<td>
													<input type='text' id='cep' class='form-control' name='cep' required>
												</td>
												<td>
													<label for='venda'>Estado</label>
												</td>
												<td>
													<select name='uf' class='form-control' style='width:70px;'>";
													$sql = "select sigla from estados order by nome";
													$resultado = $conexao->query($sql);
													while($corda = $resultado->fetch_object())
													{
														echo "<option value='$corda->sigla'>$corda->sigla</option>";
													}
											  echo "</select>";
										  echo "</td>
										    </tr>
											<tr>
												<td>
													<label for='endereco'>Cidade</label>
												</td>
												<td>
													<input type='text' class='form-control' name='cidade' required>
												</td>
												<td>
													<label for='endereco'>Bairro</label>
												</td>
												<td>
													<input type='text' class='form-control' name='bairro' required>
												</td>
											</tr>
											<tr>
												<td><label for='endereco'>Rua/Avenida</label></td>
												<td><input type='text' class='form-control' name='rua_avenida' required></td>
												<td><label for='endereco'>Número</label></td>
												<td><input type='text' class='form-control' name='numero' required></td>
											</tr>
											<tr>
												<td>
													<label for='endereco'>Apto(opcional)</label>
												</td>
												<td colspan=''>
													<input type='text' class='form-control' name='apto'>
												</td>
												<td>
													<label for='endereco'>Complemento</label>
												</td>
												<td align='center'>
													<input type='text' class='form-control' name='complemento'>
												</td>
											</tr>
											<tr>
												<td colspan='2' align='right'><input type='submit' class='btn btn-primary' value='cadastrar'>
												</td>
												<td colspan='2' align='left'><a href='confirma_venda.php' class='btn btn-primary' style='margin-top:20px;'>Voltar</a></td>
											</tr>
										</table>
									</div>
								 </div>
								 </form>";
				echo "</div>
						<br>
						<br>";
		   }
		   include("footer.php")
		   ?>
	</body>
</html>