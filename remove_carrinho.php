<?php
   session_start();
   $cod = $_GET['cod'];
   //Verifica se a sessao existe.
   if(isset($_SESSION['Carrinho']))
   {
      $Indice = $_SESSION['Indice'];
	  $Carrinho = $_SESSION['Carrinho'];
   
		for($i=0;$i < $Indice; $i++)
		{
			if($Carrinho[$i] == $cod)
			{
				array_splice($Carrinho,$i,1);
				$Indice--;
				break;
			}
		}
		//Adiciona as variaveis na sessao
		$_SESSION['Indice'] = $Indice;
		$_SESSION['Carrinho'] = $Carrinho;
   }
   header("Location:carrinho.php");
?>