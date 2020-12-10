<?php
session_start();
if (empty($_SESSION['id'])){
		
		header('location:formLogon.php');
		
	}

?>
<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Loja</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<style>
	
	.navbar{
		margin-bottom: 0;
	}
	
	
	</style>
	
	
	
</head>

<body>	
	
	<?php
	
	
	
	
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';
	
	
	if (!empty($_GET['id'])) {
	
	$id_prod=$_GET['id'];
	    $subtrair = false;
        
        if (!empty($_GET['subtrair'])) {
	        $subtrair = $_GET['subtrair'];
        }
	
	if (!isset($_SESSION['carrinho'])) {
		  $_SESSION['carrinho'] = array();
	}


	

	if (!isset($_SESSION['carrinho'][$id_prod])) {

		$_SESSION['carrinho'][$id_prod]=1;
	}
	else if (isset($_SESSION['carrinho'][$id_prod]) && $subtrair) {
		  $_SESSION['carrinho'][$id_prod]-=1;

	}
	
	else {
		  $_SESSION['carrinho'][$id_prod]+=1;

	}
		
		include 'mostraCarrinho.php';
		
	} else {
		
		
		
		include 'mostraCarrinho.php';
		
		
	}	
	
	?>
	
	
	<div class="row text-center" style="margin-top: 15px;">
		<h1>Total: R$ <?php echo number_format($total,2,',','.'); ?> </h1>
	</div>
	
	
	<div class="row text-center" style="margin-top: 15px;">
		<a href="index.php"><button class="btn btn-lg btn-primary">Continuar Comprando</button></a>
        <?php if(count($_SESSION['carrinho'])>0){ ?>
		<a href="finalizarCompra.php"><button class="btn btn-lg btn-success">Finalizar Compra</button></a>
        <?php } ?>
	</div>

	
</div>
	
	
	<?php
	
	include 'rodape.html';
	
	?>
	
</body>
</html>