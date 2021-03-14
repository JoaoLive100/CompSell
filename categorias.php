<html>
	<head>
	</head>
	<body>
		<?php
			session_start();
			include('header.php');
			include('conexao.php');
			$categoria = $_GET['id'];
			$sql = "select nome from categorias_produto where cod_categoria='$categoria'";
			$resultado = $conexao->query($sql);
			$nomeCategoria = $resultado->fetch_object()->nome;
			echo "<span><h2 align='center' style='color:black;'>Você está na categoria $nomeCategoria</h2></span>"
		?>
		<div id="categorias" style="border-radius:10px;width: 70%;margin: 0 auto;" align="center">
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
		<div id="resultado_categoria" style="width: 100%;margin: 0 auto;margin-left:25px;margin-bottom:50px;">
		
			<?php
				$sql_produto = "select * from produtos where categoria='$categoria' and situacao='Ativo'";
				$resultado_categoria = $conexao->query($sql_produto);
				while($linha = $resultado_categoria->fetch_object())
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
				include('footer.php');
			?>
	</body>
</html>
