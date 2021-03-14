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
		<style>
			body
			{
			margin:0px;
			padding:0px;
		    }
			.container
			{
				max-width:700px;
				min-width:200px;
				margin: 10% auto 0px auto;
				border:1px solid #eaeaea;
				padding:20px;
				border-radius:10px;
				background-color:#ffffff;
				margin: 0 auto;
			}
			
			.container h2
			{
				text-align:center;
				color: #666;
			}
			.form-control{
				width:250px;
				display:inline;
			}
			div input{
			margin:20px;
			margin-bottom:6px;
			}
		</style>
		<script type="text/javascript">
			$("#telefone, #celular").mask("(00) 00000-0000");
			$("#cpf").mask("000.000.000-00");
		</script>
	</head>
	<body>
			<nav class="navbar navbar-inverse" style="height:350px;">
				<div class="container-fluid">
					<div class="navbar-header">
						<a href="index.php"><img src="logo.png" style="width:150px;padding:10px;"></a>
					</div>
				</div>
				<div class="container" align="center">
				  <h2 style="color:black;">Cadastro</h2>
				  <br>
				  <form action="confirma_cadastro.php" method="post" role="form">
					<div class="form-group">
						<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" maxlength="100"required>
						<input type="text" class="form-control" name="sobre" id="sobre" placeholder="Sobrenome" maxlength="100" required>
						<input type="text" class="form-control cpf" name="cpf" id="cpf" placeholder="CPF" required>
						<input type="email" class="form-control" name="email" id="email" placeholder="Email" maxlength="100" required>
						<input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" maxlength="20" required>
						<input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone" required>
					<div>
					<div align="center">
					<button type="submit" class="btn btn-primary" style="margin-top:20px;width:150px;height:60px;">Continuar</button>
					</div>
				  </form>
				</div>
			</nav>
	</body>
</html>