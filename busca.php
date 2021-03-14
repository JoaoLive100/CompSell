<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<?php
			session_start();
			include("header.php");
			include("conexao.php");

			if(isset($_GET['busca']))
			{
				$busca = $_GET['busca'];
				$sql = "select * from produtos where (nome like '%$busca%' or descricao_produto like '%$busca%') and situacao='Ativo'";
				$resultado = $conexao->query($sql);
		?>
		<div id="resultado" style="	width: 100%;margin: 0 auto;margin-left:25px;margin-bottom:50px;">
		<?php
			echo "<h1 class='display-4' align='center' style='color:black;'>Resultados para: <span style='color:red'>$busca</span></h1>";
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
			}
			else
			{
				include("index.php");
			}
		?>
		</div>
		<?php
			include('footer.php');
		?>
	</body>
</html>