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
			#cartao:checked ~ #formcartao{
				display: block;
			}
			#formcartao
			{
				display:none;
			}
		</style>
		<script type="text/javascript">
			$("#cep").mask("00000-000");
			$("#numero").mask("0000.0000.0000.0000");
			$("#validade").mask("00/00");
			$("#cvv").mask("000");
		</script>
		 <script>
			$(document).ready(function(){
			
				$(".cep").click(function(){

					var var_cep = $(this).attr("cep");

					$.post("frete.php",
						{
							cep : var_cep	
						},
						function(resposta)
						{
							var frete = parseFloat(resposta);
							var valorCompra = parseFloat($("#valorCompra").html());
							var valorTotal  = (frete + valorCompra).toFixed(2);

							$("#totalCompra").html(valorTotal);
							$("#freteCompra").html(frete.toFixed(2));
						});

				});
				
			});

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
					echo "<form action='dados_pedido.php' method='post'>";
						$sql = "select * from endereco_cliente where cpf='$cpf'";
						$resultado = $conexao->query($sql);
						if ($resultado->num_rows > 0)
						{
								echo "<div class=\"panel panel-default\" style='width:500px;margin-top:50px;'>
											<div class=\"panel-heading\" align='center'><h3>Selecione um endereço</h3></div>";
								while($corda = $resultado->fetch_object())
								{											
									echo"   <div class='panel-body' align='left'>
												<input type='radio' class='cep' name='endereco' value='$corda->cod' cep='$corda->cep' required>
												<span>
													<b>$corda->rua_avenida $corda->numero</b>
													<p>$corda->apto $corda->cidade, $corda->uf - CEP $corda->cep</p></p></p>
												</span>
									        </div>";

								}
											echo "<div class=\"panel panel-default\" style='margin-bottom:0;padding:15px;' align='center'>
													<a href='novo_endereco.php' class='btn btn-outline-primary'>Novo endereco</a>
												</div>";
							echo "</div>";
							echo "<div class=\"panel panel-default\" style='width:500px;'>
									<div class=\"panel-heading\" align='center'><h3>Revise sua compra</h3></div>
									<div class='panel-body' style='font-size:16px;'>
										<div style='display:inline-block;margin-right:130px;' align='left'>
											<div>
												<b>Produtos ($numero)</b>
											</div>
											<div>
												<b>Frete</b>
											</div>
											<br>
											<br>
											<div>
												<b>Total</b>
											</div>
										</div>
										<div style='display:inline-block;' align='left'>
											<div>
												<b>R$</b> <b><span id='valorCompra'>".strval($total)."</span></b>
											</div>
											<div>
												<b>R$</b> <b><span id='freteCompra'><b> </b></span></b>
											</div>
											<br>
											<br>
											<div>
												<b>R$</b> <b><span id='totalCompra' name='vlr'><b> </b></span></b>
											</div>
										</div>
									</div>
								 </div>";
								 
							echo "<div class=\"panel panel-default\" style='width:500px;'>
									<div class=\"panel-heading\" align='center'><h3>Meios de Pagamento</h3></div>
									<div class='panel-body' style='font-size:16px;' align='left'>
										<div>
											<div class='panel-body'>
												<input type='radio' id='cartao' name='cobranca' value='cartao' required> Cartão <span class='glyphicon glyphicon-credit-card'></span>
												<div class='panel panel-default' id='formcartao'>
													<div class=\"panel-heading\" align='center'><h3>Dados do Cartão</h3></div>
													<div class='panel-body'>
														<table>
															<tr>
																<td><label for='dados'>Nome do Titular</label></td>
																<td><input type='text' class='form-control' name='nome' required></td>
															</tr>
															<tr>
																<td><label for='dados'>Número do Cartão</label></td>
																<td><input type='text' id='numero' class='form-control' name='numero' required></td>	
															</tr>
															<tr>
																<td><label for='dados'>Validade</label></td>
																<td><input type='text' id='validade' class='form-control' name='validade' required></td>
															</tr>
															<tr>
																<td><label for='dados'>CVV</label></td>
																<td><input type='text' id='cvv' class='form-control' name='cvv' required></td>
															</tr>
														</table>
													</div>
												</div>
											</div>
											<div class='panel-body'>
												<input type='radio' name='cobranca' value='boleto' required> Boleto <span class='glyphicon glyphicon-barcode'></span>
											</div>
										</div>
										<div align='center'><input type='submit' value='Finalizar Pedido' class='btn btn-primary'></input></div>	
									</div>
								 </div>
						</form>";
						}
						else
						{
							echo "<form action='cadastra_endereco.php' method='post'>
								<div class=\"panel panel-default\" style='width:620px; margin-top:50px;'>
									<div class=\"panel-heading\" align='center'><h3>Cadastre um endereco para entrega</h3></div>
									<div class='panel-body' style='font-size:16px;' align='center'>
										<table>
											<tr>
												<td>
													<label for='endereco'>CEP</label>
												</td>
												<td>
													<input type='text' class='form-control' id='cep' name='cep' required>
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
												<td colspan='4' align='center'><input type='submit' class='btn btn-primary' value='cadastrar'></td>
											</tr>
										</table>
									</div>
								 </div>
								 </form>";
						}
				echo "</div>
						<br>
						<br>";
		   }
		?>
		<?php
			include("footer.php");
		?>
		   
	</body>
</html>