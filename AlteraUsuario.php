<?php
    session_start();
    if(empty($_SESSION['id'])){
        header('location:formLogon.php');
    }
    $id_cliente = $_SESSION['id'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Meus Dados</title>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="jquery.mask.js"></script>
	
	
<style>

.navbar{
	margin-bottom: 0;
}
	
	
	
</style>
	
<script>
	
$(document).ready(function(){
    $("#cep").mask("00 000-000");
});
	
	
</script>
	
</head>
	
	
	


<body>
	
<?php
	include 'conexao.php';
	include 'nav.php';
	include 'cabecalho.html';
	
    $consulta_user = $conexao->query("SELECT id_cliente,nome,sobrenome,email,senha,endereco,cidade,CEP FROM usuarios WHERE id_cliente='$id_cliente'");
    $exibe_user = $consulta_user->fetch(PDO::FETCH_ASSOC);
	?>
	
	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4">
				
				<h2>Alteração de dados de Usuário</h2>
				
				<form method="post" action="UpdateUser.php?id='<?php echo $id_cliente ?>'" name="AlterarDados">
				
					<div class="form-group">
				
						<label for="nome">Nome</label>
						<input name="nome" type="text" value="<?php echo $exibe_user['nome']; ?>" class="form-control" required id="nome">
					</div>
				
				<div class="form-group">
				
						<label for="sobrenome">Sobrenome</label>
						<input name="sobrenome" type="text" value="<?php echo $exibe_user['sobrenome']; ?>" class="form-control" required id="sobrenome">
				</div>
					
					
				<div class="form-group">
				
						<label for="email">E-mail</label>
						<input name="email" type="email" value="<?php echo $exibe_user['email']; ?>" class="form-control" required id="email">
				</div>
					
				
				<div class="form-group">
				
						<label for="senha">Senha</label>
						<input name="senha" type="password" value="<?php echo $exibe_user['senha']; ?>" class="form-control" required id="senha">
				</div>
					
				<div class="form-group">
				
						<label for="endereco">Endereço</label>
						<textarea name="endereco" rows="5" class="form-control" required id="endereco"><?php echo $exibe_user['endereco']; ?></textarea>
				</div>
					
					
				<div class="form-group">
				
						<label for="cidade">Cidade</label>
						<!-- <input name="cidade" type="text" class="form-control" required id="cidade"> -->
						<select class="form-control" name="cidade" id="cidade" required>
                        <?php
						    $consulta_cidades = $conexao->query("SELECT id_cidade,nome from cidade");
                            while ($exibe_cidades = $consulta_cidades->fetch(PDO::FETCH_ASSOC)) { 
						?>
                        <option value="<?php echo $exibe_cidades['nome'];?>" <?=($exibe_user['cidade'] == $exibe_cidades['nome'])?'selected':''?>><?php echo $exibe_cidades['nome'];?></option>
                        <?php
                            }
                        ?>
                        </select>
				</div>
					
					
				<div class="form-group">
				
						<label for="cep">CEP</label>
						<input name="cep" type="text" value="<?php echo $exibe_user['CEP']; ?>" class="form-control" required id="cep">
				</div>
				
							
				<button type="submit" class="btn btn-lg btn-default">
					
					<span class="glyphicon glyphicon-pencil"> Alterar</span>
					
				</button>
				
				</form>
							
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>
	
	
	
	
</body>
</html>