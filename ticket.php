<?php
    session_start();
    if (empty($_SESSION['id'])) {
		
		header('location:formLogon.php');
		
	}
?>
<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Loja - Detalhes da Venda</title>
	
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
	
	
	$ticket_compra=$_GET['ticket'];
	
	$consultaVenda = $conexao->query("SELECT * FROM vendas WHERE ticket='$ticket_compra'");
	?>
	
<div class="container-fluid">
	
	
	<div class="row" style="margin-top: 15px;">
		
		<h1 class="text-center">Pedido: <?php echo $ticket_compra ?></h1>
		
	</div>
	
	
	<div class="row" style="margin-top: 15px;">
		
		<div class="col-sm-1 col-sm-offset-1"><h4>Data</h4> </div>
		<div class="col-sm-5"><h4>Produto </h4></div>
		<div class="col-sm-1"><h4>Quantidade </h4></div>
		<div class="col-sm-2"><h4>Preço </h4></div>
		
				
	</div>

	
	
	
	<?php
	
	$total=0;
			
	while ($exibeVenda=$consultaVenda->fetch(PDO::FETCH_ASSOC)) {
		// Verificando Status do Pedido
		$status_pedido =  $exibeVenda['status'];
		if ($status_pedido == 'C'){
			$status_pedido = 'Confirmado';
			$status = 'C';
		}
		elseif ($status_pedido == 'A'){
			$status_pedido = 'Aguardando Confirmação';
			$status = 'A';
		}
		elseif($status_pedido == 'E'){
			$status_pedido = 'Entregue';
			$status = 'E';
		}
		// Fim da verificação do Status

		// Verificando Status do Pedido
		$forma_pagto =  $exibeVenda['forma'];
		if ($forma_pagto == 'C'){
			$forma_pagto = 'Cartão';
		}
		elseif ($forma_pagto == 'D'){
			$forma_pagto = 'Dinheiro';
		}
		// Fim da verificação do Status
	
		$total += $exibeVenda['valor'] * $exibeVenda['quantidade'];
	
	?>
	
	<div class="row" style="margin-top: 15px;">
		
		<div class="col-sm-1 col-sm-offset-1"><?php echo date('d/m/Y',strtotime($exibeVenda['data'])); ?> </div>
		
		<?php $consultaProd = $conexao->query("SELECT produto FROM produtos WHERE id='$exibeVenda[id_produto]'");
		$exibeProd=$consultaProd->fetch(PDO::FETCH_ASSOC);
		?>
		
		<div class="col-sm-5"> 
		<?php if ($exibeProd['produto'] != '') { echo $exibeProd['produto'];}
		      else { echo 'Produto Excluído';}  
		?> </div>
		<div class="col-sm-1 text-center"> <?php echo $exibeVenda['quantidade']; ?> </div>
		<div class="col-sm-2"> R$ <?php echo number_format($exibeVenda['valor'],2,',','.');?></div>
				
	</div>
	

	
	<?php } ?>

	<div class="row" style="margin-top: 15px;">
		
		<h2 class="text-center">Forma de Pagamento: <?php echo $forma_pagto ?></h2>
		
	</div>
	
	<div class="row" style="margin-top: 15px;">
		<h2 class="text-center">Total deste Pedido: R$ <?php echo number_format($total,2,',','.');?></h2>
	</div>

	<!-- Botões para Alterar Status dos pedidos-->
	<div class="row" style="margin-top: 15px; float:  right; margin-right: 40px;">
	<?php
		if ($exibe_user['adm']==1){ // Se for Administrador
			if($status_pedido == 'Confirmado'){
	?>
	<a href='statusPedido.php?ticket=<?php echo $ticket_compra;?>&status=<?php echo $status;?>'><span class= "glyphicon glyphicon-road"></span>  Pedido Entregue</a>
	<?php
			}
			else if($status_pedido == 'Aguardando Confirmação'){
	?>
	<a href='statusPedido.php?ticket=<?php echo $ticket_compra;?>&status=<?php echo $status;?>'><span class= "glyphicon glyphicon-ok"></span>  Confirmar Pedido</a>
	<?php
		}
	}
	?>
	</div>
	<!-- Fim dos Botões para Alterar Status dos pedidos-->
	
</div>
	
	<?php
	
	include 'rodape.html';
	
	?>
	
</body>
</html>