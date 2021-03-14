<html>
	<head>
		<link rel="stylesheet" type="text/css" src="carrossel.css">
		<style>
			.produtinho{
			width:100%;
			height:100%;
			}
			.a{
			margin-top:0px;
			display:inline-block;
			}
			.b{
			position:absolute;
			margin-left:35px;
			}
		</style>
	</head>
	<body>
		<?php
		session_start();
		include("conexao.php");
		include("header.php");
		$cod = $_GET['cod'];
			echo 		
			"
			<div align='center' style=''>
				<div id='myCarousel".$cod."' class='carousel slide a' data-ride='carousel' style='width:400px;background-color:#D3D3D3;'>
								<div class='carousel-inner'  style='height:400px;' align='center'>
									<div class='item active' align='center'>
										<img class='produtinho' src='produtos/produto".$cod."_imagema.jpg'>
									</div>";
												$sql="select * from fotos_produto where produto='$cod'";
												$resultado = $conexao->query($sql);
												while($linha = $resultado->fetch_object())
												{
							  echo "<div class='item' align='center'>
										<img class='produtinho' src='".$linha->enderecofoto.".jpg'>
									</div>";
												}
							  echo "<a class='left carousel-control' href='#myCarousel".$cod."' data-slide='prev'>
										<span class='glyphicon glyphicon-chevron-left'></span>
										<span class='sr-only'>Previous</span>
									</a>
									<a class='right carousel-control' href='#myCarousel".$cod."' data-slide='next'>
									  <span class='glyphicon glyphicon-chevron-right'></span>
									  <span class='sr-only'>Next</span>
									</a>
								</div>
							</div>";
											$info = "select * from produtos where cod='$cod'";
											$result = $conexao->query($info);
											$valor = $result->fetch_object();
											$dividido = ($valor->valor/12);
											$number = number_format($dividido, 2, '.', '');
			echo "<div class='a' style='width:491px;height:400px;background-color:#778899
;position:relative;'>
			<div class='b'>
				<br>
				<h3 align='center'>$valor->nome</h3>
				<br>
				<br>
				<h2 align='left'>R$ $valor->valor</h2></h2>
				<h4 align='left'>em 12x R$ $number sem juros</h4>
				<br>
				<br>
				<br>
				<a href='add_carrinho.php?cod=$cod' class='btn btn-primary'>Adicionar ao Carrinho</a>
				</div>
			</div>";
			echo "<div style='background-color:#778899
;width:66%;margin-top:0px;'>
				<br>
				<h1 class='display-1'>Detalhes</h1>
				<br>
				<p class='text-justify' style='font-size:18px;width:90%;'>$valor->descricao_produto</p>
				<br>
				<br>
			</div>
			</div>";
			echo "<br>
					<br>";
			include("footer.php")
		?>
	</body>
</html>

