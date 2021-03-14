<?php
	session_start();
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
		<style>
			body
			{
			margin:0px;
			padding:0px;
		    }
			.container
			{
				width:300px;
				min-width:200px;
				margin: 10% auto 0px auto;
				border:1px solid #eaeaea;
				padding:20px;
				border-radius:10px;
				background-color:#ffffff;
			}
			
			.container h2
			{
				text-align:center;
				color: #666;
			}
		</style>
	</head>
	<body>
		<?php
		 if(isset($_POST['login']))
		 {
			
			$login = $_POST['login'];
			$senha = $_POST['senha'];
			
			include("conexao.php");
			
			$sql = "select nome, senha, cpf 
					from clientes 
					where email='$login' and situacao='Ativo'";
			
			$resultado = $conexao->query($sql);
			
			if($resultado->num_rows > 0)
			{
				$linha     = $resultado->fetch_object();
				
				$senhaBD = $linha->senha;
				$nome = $linha->nome;
				$cpf = $linha->cpf;
				
				if($senha == $senhaBD)
				{
					
					$_SESSION['logado'] = "sim";
					$_SESSION['nome']   = $nome;
					$_SESSION['cpf']   = $cpf;
					header("location:index.php");
				}
				else
				{
					echo '<nav class="navbar navbar-inverse" style="height:350px;">
							<div class="container-fluid">
								<div class="navbar-header">
									<a href="index.php"><img src="logo.png" style="width:150px;padding:10px;"></a>
								</div>
							</div>
							<div class="container" >
								<h2 style="color:black;">Senha ou Usuário inválido!</h2>
								<br>
								<div align="center">
									<a href="login.php" class="btn btn-primary">Voltar</a>
								</div>
							</div>
						</nav>';
				}
			}
			else
			{
					echo '<nav class="navbar navbar-inverse" style="height:350px;">
							<div class="container-fluid">
								<div class="navbar-header">
									<a href="index.php"><img src="logo.png" style="width:150px;padding:10px;"></a>
								</div>
							</div>
							<div class="container" >
								<h2 style="color:black;">Senha ou Usuário inválido!</h2>
								<br>
								<div align="center">
									<a href="login.php" class="btn btn-primary">Voltar</a>
								</div>
							</div>
						</nav>';
			}
		 }
		 else
		 {
		?>
			<nav class="navbar navbar-inverse" style="height:350px;">
				<div class="container-fluid">
					<div class="navbar-header">
						<a href="index.php"><img src="logo.png" style="width:150px;padding:10px;"></a>
					</div>
				</div>
				<div class="container" >
				  <h2 style="color:black;">Login</h2>
				  <br>
				  <form action="login.php" method="post" role="form">
					<div class="form-group">
					  <label for="login">Email:</label>
					  <input type="text" class="form-control" name="login" id="login" placeholder="Informe o seu usuário" required>
					</div>
					<div class="form-group">
					  <label for="senha">Senha:</label>
					  <input type="password" class="form-control" name="senha" id="senha" placeholder="Informe sua senha" required>
					</div>
					<div align="center">
					<button type="submit" class="btn btn-primary">Entrar</button>
					<a href="cadastro.php" class="btn btn-outline-primary">Cadastre-se aqui</a>
					</div>
				  </form>
				</div>
			</nav>
			<?php
		}
			?>
	</body>
</html>