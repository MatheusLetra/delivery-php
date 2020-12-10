<?php

include 'conexao.php';

$id_cat = $_GET['id'];



$recebe_cat = strtoupper($_POST['nome']);




try {
	
	$alterar = $conexao->query("UPDATE categoria SET
	descricao = '$recebe_cat'
	WHERE codigo =".$id_cat);
	
	

    header('location:adm.php');
	
} catch(PDOException $e) {
	
	
	echo $e->getMessage();
	
}



?>