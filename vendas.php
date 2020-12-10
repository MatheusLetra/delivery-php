<?php
    session_start();
    if(empty($_SESSION['id'])){
        header('location:formLogon.php');
    }
?>
<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Loja - Minhas Vendas</title>
	
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
	
    $id_user = $_SESSION['id'];
    
    $consulta_venda = $conexao->query("SELECT * from vendas GROUP BY ticket ORDER BY status,data desc");
	?>
	
<div class="container-fluid">
    <div class="row" style="margin-top: 15px;">
		
    <h1 class="text-center">Minhas Vendas</h1>
				
	</div>
	
	<div class="row" style="margin-top: 15px;">
		
		<div class="col-sm-1 col-sm-offset-1"> <h4>Data </h4></div>
        <div class="col-sm-2"> <h4>Ticket do Pedido</h4> </div>
        <!-- <div class="col-sm-3"> <h4>Cliente</h4> </div> -->
        <div class="col-sm-3"> <h4>Endereço</h4> </div>
		<div class="col-sm-4"> <h4>Status</h4> </div>	
		<!-- <div class="col-sm-5"> <h4>Forma de Pagamento</h4> </div>			 -->
	</div>		

    <?php while($exibe_venda = $consulta_venda->fetch(PDO::FETCH_ASSOC)){
        $consulta_cli = $conexao->query("SELECT NOME,SOBRENOME,ENDERECO,CIDADE from usuarios where id_cliente= '$exibe_venda[id_comprador]'");
		$exibe_cli = $consulta_cli->fetch(PDO::FETCH_ASSOC);
		// Verificando Status do Pedido
		$status_pedido = $exibe_venda['status'];
		if ($status_pedido == 'C'){
			$status_pedido = 'Confirmado';
		}
		elseif ($status_pedido == 'A'){
			$status_pedido = 'Aguardando Confirmação';
		}
		elseif($status_pedido == 'E'){
			$status_pedido = 'Entregue';
		}
		// Fim da verificação do Status
		// Verificando Forma de Pagamento
		$formapagto_pedido = $exibe_venda['forma'];
		if ($formapagto_pedido == 'C'){
			$formapagto_pedido = 'Cartão';
		}
		elseif ($formapagto_pedido == 'D'){
			$formapagto_pedido = 'Dinheiro';
		}
		// Fim Verificacao Forma de Pagamento
    ?>
	<div class="row" style="margin-top: 15px;">
		
		<div class="col-sm-1 col-sm-offset-1"><?php echo date('d/m/Y',strtoTime($exibe_venda['data']));?></div>
        <div class="col-sm-2"><a href="ticket.php?ticket=<?php echo $exibe_venda['ticket'];?>"> <?php echo $exibe_venda['ticket'];?></a> </div>
        <!-- <div class="col-sm-3"><?php// echo $exibe_cli['NOME'];?> </div> -->
        <div class="col-sm-3"><?php echo $exibe_cli['ENDERECO'];?></div>
		<div class="col-sm-4"><?php echo $status_pedido;?></div>
		<!-- <div class="col-sm-5"><?php //echo $formapagto_pedido;?></div>				 -->
	</div>
    <?php
    }
    ?>
	
</div>
	
	<?php
	
	include 'rodape.html';
	
	?>
	
</body>
</html>