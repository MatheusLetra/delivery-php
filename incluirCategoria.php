<?php

include 'conexao.php';

$recebe_nome = strtoupper($_POST['nome']);


try {
	
	$inserir=$conexao->query("INSERT INTO categoria (descricao) VALUES 
    ('$recebe_nome')");
    
	
	header('location:adm.php');

}catch(PDOException $e) {
	
	
	echo $e->getMessage();
	
}


?>