<?php
    session_start();
    if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		
		header('location:index.php');
		
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Área Administrativa</title>
	
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
	
	?>
	
	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4 text-center">
				
				<h2>Área administrativa</h2>
				
				
               <!--     <div class="btn-group" style="width: 500px; margin-bottom:5px;">
                        <a href="#" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                         Gerenciar Produtos / Categorias <span class="caret"></span>
                        </a>
                    <ul class="dropdown-menu">
                        <li><a href="formProduto.php"> Incluir Produto </a></li>
                        <li><a href="lista.php"> Alterar / Excluir Produto </a></li>
                        <li><a href="formCategoria.php"> Incluir Categoria </a></li>
                        <li><a href="listaCategorias.php"> Alterar / Excluir Categoria </a></li>
                    </ul>
                    </div>   
				    <div class="btn-group" style="width: 500px; margin-bottom:5px;">
                        <a href="#" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                         Gerenciar Vendas / Clientes <span class="caret"></span>
                        </a>
                    <ul class="dropdown-menu">
                        <li><a href="vendas.php"> Vendas</a></li>
                        <li><a href="clientes.php"> Clientes </a></li>
                    </ul>
                     </div>  -->
				
				 <a href="formProduto.php">			
				<button type="submit" class="btn btn-block btn-lg btn-primary" style="margin-bottom:5px"> 
					
					Incluir Produto
					
				</button>
					
				</a>
				
				<a href="lista.php">
				<button type="submit" class="btn btn-block btn-lg btn-primary"  style="margin-bottom:5px">
					
					Alterar / Excluir Produto
					
				</button>
				<a href="formCategoria.php">			
				<button type="submit" class="btn btn-block btn-lg btn-primary" style="margin-bottom:5px"> 
					
					Incluir Categoria
					
				</button>
					
				</a>
				<a href="listaCategorias.php">
				<button type="submit" class="btn btn-block btn-lg btn-primary"  style="margin-bottom:5px">
					
					Alterar / Excluir Categoria
					
				</button>
				</a> 
				<a href="vendas.php">
				<button type="submit" class="btn btn-block btn-lg btn-success"  style="margin-bottom:5px">
					
					Vendas
					
				</button>
				</a>
				<a href="clientes.php">
				<button type="submit" class="btn btn-block btn-lg btn-success"  style="margin-bottom:5px">
					
					Clientes
					
				</button>
				</a>
				<a href="listaCidades.php">
				<button type="submit" class="btn btn-block btn-lg btn-success"  style="margin-bottom:5px">
					
					Cidades Atendidas
					
				</button>
				</a>
			
				<a href = "AlteraUsuario.php">
				<button type="submit" class="btn btn-block btn-lg btn-danger"  style="margin-bottom:5px">
					
				    Alterar Meus Dados
					
				</button>
                </a>
				<a href = "sair.php">
				<button type="submit" class="btn btn-block btn-lg btn-danger"  style="margin-bottom:5px">
					
					Sair da àrea administrativa
					
				</button>
                </a>
				
				
				
				
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>
	
	
	
	
</body>
</html>