<?php
	session_start();
	include("header.php");
?>
<html>
	<head>
	</head>
	<body>
		<div class="container">  
		  <div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			  <li data-target="#myCarousel" data-slide-to="1"></li>
			  <li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			  <div class="item active">
				<img src="imagens/index/carrossel/imagem_a.jpg" style="width:100%;margin:0;">
			  </div>

			  <div class="item">
				<img src="imagens/index/carrossel/imagem_b.jpg" style="width:100%;">
			  </div>
			
			  <div class="item">
				<img src="imagens/index/carrossel/imagem_c.jpg" style="width:100%;">
			  </div>
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			  <span class="glyphicon glyphicon-chevron-left"></span>
			  <span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
			  <span class="glyphicon glyphicon-chevron-right"></span>
			  <span class="sr-only">Next</span>
			</a>
		  </div>
		</div>
		<br>
		<br>
		<div id="categorias" style="border-radius:10px;width: 70%;margin: 0 auto;border:1px solid black;background-color:white;" align="center">
		<h1 class="display-4" align="center" style="margin-bottom:0px;color:black;">Categorias</h1>
					<?php
						$sql="select cod_categoria, nome, endereco_foto from categorias_produto where situacao='Ativo' order by nome";
						$resultado = $conexao->query($sql);
						while($linha = $resultado->fetch_object())
						{
							echo "<a href=\"categorias.php?id=$linha->cod_categoria\" style=\"display:inline-block;width:100px;margin:20px;height:100px;\" align=\"center\">
									<span class=\"categoria\">
										<div class=\"imagem_categoria\">
											<img style=\"width:70px;height:70px;\" src=\"$linha->endereco_foto.png\">
										</div>
										<div class=\"nome_categoria\">
											<p>$linha->nome</p>
										</div>
									</span>
								</a>";
						}
					?>
		</div>
		<br>
		<br>

		<br>
		<div id="produtos">
			<?php
				$sql="select * from produtos where situacao='Ativo' and destaque='S' order by data_cadastro";
				$resultado = $conexao->query($sql);
				while($linha = $resultado->fetch_object())
				{
					echo "<a href=\"detalhes.php?cod=$linha->cod\">
							<span class=\"produto\" style=\"background-color:white;\">
								<div class=\"imagem_produto\">
									<img style=\"width:180px;height:180px;\" src=\"$linha->foto_principal.jpg\">
								</div>
								<div class=\"preco_produto\">
									<h4>R$ $linha->valor</h4>
								</div>
								<div class=\"nome_produto\">
									<p class=\"text-justify\">$linha->nome</p>
								</div>
							</span>
						</a>";
				}
			?>
		</div>
		<?php
			include("footer.php");
		?>
	</body>
</html>