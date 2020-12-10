<?php
    session_start();
    if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		
		header('location:index.php');
		
	}
?>
<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Cidades Cadastradas</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
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
	
	
	$consulta = $conexao->query("SELECT c.id_cidade,c.nome, e.sigla FROM cidade c left outer join estado e on e.id_estado = c.id_estado");
	
	
	?>
	
<div class="container-fluid">
	
	
	<?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {
	
	?>
	
	
	<div class="row" style="margin-top: 15px;">
		
		<div class="col-lg-1 col-lg-offset-1" style="width:20%;"><?php echo $exibe['nome']; ?></div>
		<div class="col-lg-2"><label style=""><?php echo $exibe['sigla']; ?></label></div>
		<div class="col-lg-3" style="">
		
			
		<a href="formAlterarCidade.php?id=<?php echo $exibe['id_cidade']; ?>">	
		<button class="btn btn-lg btn-block btn-default">
		<span class="glyphicon glyphicon-pencil"> Alterar</span>
		</button>
		</a>
		</div>
		
		<div class="col-sm-2 col-xs-offset-right-1" style="">
		<a href="excluircidade.php?id=<?php echo $exibe['id_cidade']; ?>">	
		<button class="btn btn-lg btn-block btn-danger">
		<span class="glyphicon glyphicon-remove"> Excluir</span>		
		</button>
		</a>
		
		
		</div> 
				
	</div>		
	
	
	<?php } ?>
	
    <div class="row" style="margin-top: 15px; float:  right; margin-right: 40px;">
	<a href='formCidade.php'><span class= "glyphicon glyphicon-pencil"></span> Nova Cidade </a>
	</div>
	
</div>
	
	<?php
	
	include 'rodape.html';
	
	?>
	
</body>
</html>