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
<title>Edição de Cidade</title>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
<script src="jquery.mask.js"></script>

<script>
	
	
	
$(document).ready(function(){
	
$('#preco').mask('000.000.000.000.000,00', {reverse: true});	
	
});
	
</script>
	
<style>

.navbar{
	margin-bottom: 0;
}
	
	
</style>
	
	
	
	
</head>

<body>
	
<?php
	$id_cidade = $_GET['id'];
	
	
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';
	
	
	$consulta = $conexao->query("SELECT c.nome,e.sigla FROM cidade c left outer join estado e on e.id_estado = c.id_estado WHERE c.id_cidade='$id_cidade'");
	$exibe = $consulta->fetch(PDO::FETCH_ASSOC)
	
	?>
	
	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4">
				
				<h2>Alteração de Cidade</h2>
				
				<form method="post" action="alterarCidade.php?id=<?php echo $id_cidade; ?>" name="alteraCidade" enctype="multipart/form-data">
				
					<div class="form-group">
				
						<label for="nome">Nome</label>
						<input type="text" name="nome" value="<?php echo $exibe['nome']; ?>"  class="form-control" required id="nome" style="text-transform: uppercase;">
					</div>
				
					
					
					
                  	<div class="form-group">
				
					<label for="UF">Estado</label>
					
				         <select class="form-control" name="UF" id="UF" required>
                        <?php
						    $consulta_cidades = $conexao->query("SELECT id_estado,nome,sigla from estado");
                            while ($exibe_cidades = $consulta_cidades->fetch(PDO::FETCH_ASSOC)) { 
						?>
                        <option value="<?php echo $exibe_cidades['sigla'];?>"  <?=($exibe['sigla'] == $exibe_cidades['sigla'])?'selected':''?>><?php echo $exibe_cidades['nome'];?></option>
                        <?php
                            }
                        ?>
                        </select>
					</div>
					
					
							
				<button type="submit" class="btn btn-lg btn-default">
					
					<span class="glyphicon glyphicon-pencil"> Alterar </span>
					
				</button>
				
				</form>
				
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>
	
</body>
</html>