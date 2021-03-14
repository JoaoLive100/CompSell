<html>
	<head>
	</head>
	<body>
		<?php
			session_start();
			include("header.php");
			include("conexao.php");
			if(isset($_SESSION['logado']) && $_SESSION['logado'] == "sim")
			{
			   //Verifica se a sessao existe.
			   if(isset($_SESSION['Carrinho']) && $_SESSION['Indice'] > 0)
				{
					$Indice = $_SESSION['Indice'];
					$Carrinho = $_SESSION['Carrinho'];
					
					echo "<div class=\"panel panel-default\">
							<div class=\"panel-heading\" align='center'><h2><b>Carrinho de Compras</b></h2></div>
							<div class=\"panel-body\" style='width:70%;margin:0 auto;'>
							<table class=\"table table-hover\" width='96%' align='center'>
								<thead><tr>
										<td></td>
									  <td><b>Nome do Produto</b></td>
									  <td><b>Valor do Produto</b></td>
									  <td></td>
								</tr></thead>";
					$total = 0;
					for($i=0; $i < $Indice; $i++)
					{
						$cod = $Carrinho[$i];
						$sql = "select * from produtos 
							   where cod ='$cod'";	   
						$resultado = $conexao->query($sql);
						$linha = $resultado->fetch_object();
						  echo "<tr>
								  <td><img src='$linha->foto_principal.jpg' class='foto_carrinho' width='150px' height='155px'></td>
								  <td>$linha->nome</td>
								  <td>R$ $linha->valor</td>
								  <td><a href='remove_carrinho.php?cod=$linha->cod'>Excluir</td>
								</tr>";
						$total += $linha->valor;
					}
					$totalfor = sprintf("%0.2f",$total);
					$_SESSION['totalfor'] = $totalfor;
						echo "<tr>
								  <td colspan='2'><b>Total:</b></td>
								  <td colspan='3'><b>R$ ".$totalfor."
								  <input type='hidden' name='valor_total' value='$total'>
								  </b></td>
							  </tr>
						</table>
						</div>";
						echo "<div align='center'>
								<a href='confirma_venda.php' class='btn btn-primary' style='margin-right:20px;'>Prosseguir</a>
								<a href='index.php' class='btn btn-primary'>Voltar</a>
							</div>
							<br>
							<br>
						</div>";
				}
				else
				{
				   echo "<div class=\"panel panel-default\">
							<div class=\"panel-heading\" align='center'><h2><b>Carrinho de Compras</b></h2></div>
							<br>
							<br>
							<br>
								<div style='color:black;' align='center'><h3>O carrinho se encontra vazio!</h3></div>
							<br>
							<br>
							<br>
								<div align='center'><a href='index.php' class='btn btn-primary' style='width'>Voltar as compras!</a></div>
							<br>
							<br>
							<br>
						</div>
						<br>
						<br>
						<br>
						";
				}
				include("footer.php");
			}
			else
			{
				header("location:login.php");
			}
		?>
	</body>
</html>