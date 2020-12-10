<?php
    session_start();
    include 'conexao.php';
    if(empty($_SESSION['id'])){
        header('location:formLogon.php');
    }
    else {
        $consulta_user = $conexao->query("SELECT nome,adm FROM usuarios WHERE id_cliente='$_SESSION[id]'");
        $exibe_user = $consulta_user->fetch(PDO::FETCH_ASSOC);  
        if($exibe_user['adm']!= 1){
            header('location:index.php');    
        }
    }
?>
<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Loja - Meus Clientes</title>
	
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
	include 'nav.php';
	include 'cabecalho.html';
	
    $id_user = $_SESSION['id'];
    
    $consulta_cliente = $conexao->query("SELECT * from usuarios where adm <> 1");
	?>
	
<div class="container-fluid">
    <div class="row" style="margin-top: 15px;">
		
    <h1 class="text-center">Meus Clientes</h1>
				
	</div>
	
	<div class="row" style="margin-top: 15px;">
		
		<div class="col-lg-1 col-lg-offset-1" style = "width:20%;"> <h4>Cliente</h4></div>
        <div class="col-lg-2"> <h4>Cidade</h4> </div>
        <div class="col-lg-4"> <h4>E-mail</h4> </div>
	</div>		

    <?php 
    
    $qtdeclientes = 0;
    
    while($exibe_cliente = $consulta_cliente->fetch(PDO::FETCH_ASSOC)){
    
    $qtdeclientes++;
    
    ?>
	<div class="row" style="margin-top: 15px;">
		
		<div class="col-lg-1 col-sm-offset-1" style = "width:20%;"><?php echo $exibe_cliente['nome']." ".$exibe_cliente['sobrenome'];?></div>
        <div class="col-lg-2"> <?php echo $exibe_cliente['cidade'];?></div>
        <div class="col-lg-4"><?php echo $exibe_cliente['email'];?></div>
	</div>
    <?php
    }
    ?>
    
    <div class="row" style="margin-top: 15px; border-top: 1px solid black;">
    
    <div class="col-lg-1 col-sm-offset-1" style = "width:20%; margin-top: 5px; color:red;"><?php echo 'Total de Clientes: '.$qtdeclientes;?></div>
	</div>
</div>
	
	<?php
	
	include 'rodape.html';
	
	?>
	
</body>
</html>