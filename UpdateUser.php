<?php

include 'conexao.php';

$id_cli = $_GET['id'];
$consulta = $conexao->query("SELECT adm FROM usuarios WHERE id_cliente=$id_cli");
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);


$recebe_nome      = $_POST['nome'];
$recebe_sobrenome = $_POST['sobrenome'];
$recebe_endereco  = $_POST['endereco'];
$recebe_email     = $_POST['email'];
$recebe_senha     = $_POST['senha'];
$recebe_cep       = $_POST['cep'];
$recebe_cidade    = $_POST['cidade'];
$remover=array('-',' ');
$recebe_cep = str_replace($remover, '', $recebe_cep);

try {
	
	$alterar = $conexao->query("UPDATE usuarios SET
	
	nome = '$recebe_nome',
	sobrenome = '$recebe_sobrenome',
	endereco = '$recebe_endereco',
	email = '$recebe_email',
    senha = '$recebe_senha',
    cidade = '$recebe_cidade',
    CEP = '$recebe_cep'
	WHERE id_cliente=$id_cli");
	
	if ($exibe['adm'] == 0){
	    header('location:areaUser.php');
	}
	else {
	    header('location:adm.php');    
	}
	
} catch(PDOException $e) {
	
	
	echo $e->getMessage();
	
}



?>