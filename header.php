<?php
	include('conexao.php');
	if(isset($_SESSION["nome"]))
	{
		$nome = $_SESSION["nome"];
		$primeiro = strstr($nome, ' ', true);
	}
	else
	{
		$nome = "Cliente";
	}
	if(isset($_SESSION['Carrinho']))
	{
		$total = $_SESSION['Indice'];
	}
	else
	{
		$total = 0;
	}
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/footer.css">
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="index.php"><img src="logo.png" style="width:150px;padding:10px;"></a>
				</div>
				<ul class="nav navbar-nav" style="padding:10px;">
					<li><a href="index.php">Home</a></li>
					<li><a href="#categorias">Destaques</a></li>
					<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias
					<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<?php
								$sql="select * from categorias_produto where situacao='Ativo' order by nome";
								$resultado = $conexao->query($sql);
								while($linha = $resultado->fetch_object())
								{
									echo "<li><a href=\"categorias.php?id=$linha->cod_categoria\"><span>$linha->nome</span></a></li>";
								}
							?>
						</ul>
					</li>
					<li><a href="contato.php">Contato</a></li>
				</ul>
				<form class="navbar-form navbar-left" action="busca.php" method="get" style="padding:10px;">
					<div class="input-group">
						<input type="text" class="form-control" name="busca" style="width:300px;" placeholder="Buscar produtos, marcas e muito mais..." required>
						<div class="input-group-btn">
							<button class="btn btn-default" type="submit" style="height:34px;outline:0;">
								<i class="glyphicon glyphicon-search"></i>
							</button>
						</div>
					</div>
				</form>
				<ul id="alteravel" class="nav navbar-nav navbar-right" style="margin-right:40px;padding:10px;">
				<?php
					if(isset($_SESSION["nome"]))
					{
						echo "<li class=\"dropdown\">
								<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\"><span class=\"glyphicon glyphicon-user\"></span>  $primeiro<span class=\"caret\"></span></a>
								<ul class=\"dropdown-menu\">
									<li><a href=\"sair.php\"><span>Sair</span></a></li>
								</ul>
							  </li>";
						echo "<li><a href=\"\">Compras</a></li>";
					}
					else
					{
						echo '<li><a href="cadastro.php">Crie a sua conta</a></li>';
						echo '<li><a href="login.php"></span>Login</a></li>';
					}
					echo "<li><a href='carrinho.php'><i class='glyphicon glyphicon-shopping-cart'></i>($total)</a></li>";
				?>
				</ul>
			</div>
		</nav>
	</body>
</html>