<?php
	include("conexao.php");
	session_start();
	$cpf = $_SESSION['cpf'];
	$endereco=$_POST['endereco'];
	$cobranca=$_POST['cobranca'];
	$data_pedido=date('Y-m-d');
	$valor=1000;
	$frete=25;

	if ($cobranca == "cartao")
	{          
		$nome=$_POST['nome'];    
		$numero=$_POST['numero'];
		$validade=$_POST['validade'];
		$cvv=$_POST['cvv'];
		$situacao="Aberto";
		$sql = "insert into pedidos (data_pedido, cpf_cliente, valor_pedido, endereco_pedido, valor_frete, forma_pagamento, situacao)
				values('$data_pedido','$cpf','$valor','$endereco','$frete','$cobranca','$situacao')";
		$resultado = $conexao->query($sql);
		
		$sql = "insert into dados_cartao (cpf_cliente, nome_cartao, numero_cartao, cvv)
				values('$cpf','$nome','$numero','$cvv')";
		$resultado = $conexao->query($sql);

		$sql = "select (max(cod_pedido)+1) as cod from pedidos";
		$resultado = $conexao->query($sql);
		$linha = $resultado->fetch_object();
		
		$bao=$linha->cod;
		
		$Indice = $_SESSION['Indice'];
		$Carrinho = $_SESSION['Carrinho'];
					for($i=0; $i < $Indice; $i++)
					{
						$cod = $Carrinho[$i];
						$sql = "select * from produtos 
							   where cod ='$cod'";	   
						$resultado = $conexao->query($sql);
						$linha = $resultado->fetch_object();
						  $cood= $linha->cod;
						$sql="insert into produtos_pedido (cod_pedido, cod_produto)
							values('$bao','$cood')";
						$resultado = $conexao->query($sql);
					}
				header("location:index.php");
	}
	else
	{
		echo 'Incorrect';
	}
?>