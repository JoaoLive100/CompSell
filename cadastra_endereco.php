<?php
	session_start();
	$cpf = $_SESSION['cpf'];
	include("conexao.php");
	
	if(isset($_POST["cep"]))
	{
		$cep=$_POST['cep'];
		$uf=$_POST['uf'];
		$cidade=$_POST['cidade'];
		$bairro=$_POST['bairro'];
		$rua_avenida=$_POST['rua_avenida'];
		$numero=$_POST['numero'];
		$apto=$_POST['apto'];
		$complemento=$_POST['complemento'];
		
		$sql= "insert into endereco_cliente (cpf, cep, uf, cidade, bairro, rua_avenida, numero, complemento_endereco_cliente, apto)
			   values ('$cpf','$cep','$uf','$cidade','$bairro','$rua_avenida','$numero','$complemento','$apto')";
		$resultado = $conexao->query($sql);
		header("location:confirma_venda.php");
	}
	else
	{
		echo 'ola';
	}
?>