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
		   if(isset($_POST["cpf"]))
		   {
			   $nome=$_POST['nome'];
			   $sobre=$_POST['sobre'];
			   $completo = "$nome $sobre";
			   $telefone=$_POST['telefone'];
			   $cpf = $_POST['cpf'];
			   $email = $_POST['email'];
			   $senha = $_POST['senha'];
			   $data = date('Y-m-d');
			   $situacao = "Ativo";
			   
			   $sql = "insert into clientes (cpf, nome, email, senha, telefone, data_cadastro, situacao)
					   values('$cpf','$completo','$email','$senha','$telefone','$data','$situacao')";
				
				
				include("conexao.php");
				$resultado = $conexao->query($sql);
				
				echo "<nav class='navbar navbar-inverse' style='height:350px;'>
						<div class='container-fluid'>
							<div class='navbar-header'>
								<a href='index.php'><img src='logo.png' style='width:150px;padding:10px;'></a>
							</div>
						</div>
						<div class='container' align='center'>
						  <h2 style='color:black;'>".$nome." foi cadastrado(a) com sucesso!</h2>
						  <br>
							<a href='login.php' class='btn btn-primary'>Continuar</a>
						</div>
					</nav>";
		   }
		   else
		   {
			   echo "<h1 align='center'>Preencha corretamente os campos</h1>";
			   echo "<br>";
			   echo "<div align='center'><a href='cadastro.php'>Voltar</a></div>";
		   }
			
		?>
	</body>
</html>
