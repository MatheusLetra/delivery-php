<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
	
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
	
	?>
	
	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4">
				
				<h2>Digite o email cadastrado na loja</h2>
				
				<form method="post" action="enviarEmail.php" name="logon">
				
					<div class="form-group">
				
						<input name="email" type="email" class="form-control" required id="email">
					</div>
				
				
							
				<button type="submit" class="btn btn-lg btn-default">
					
					<span class="glyphicon glyphicon-envelope"> Enviar</span>
					
				</button>
				
				</form>
				
				<a href="formUsuario.php">
				<button type="submit" class="btn btn-lg btn-link">
					
					Cadastre-se
					
				</button>
				</a>
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>
	
	
	
	
</body>
</html>