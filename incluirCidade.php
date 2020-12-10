<?php

include 'conexao.php';

$recebe_nome = strtoupper($_POST['nome']);
$recebe_UF   = $_POST['UF'];


$consulta = $conexao->query("SELECT id_estado FROM estado where sigla ='".$recebe_UF."'");

$exibe = $consulta->fetch(PDO::FETCH_ASSOC);

try {
	
	$inserir=$conexao->query("INSERT INTO cidade (nome,id_estado) VALUES 
    ('$recebe_nome',$exibe[id_estado])");
    
	
	header('location:adm.php');

}catch(PDOException $e) {
	
	
	echo $e->getMessage();
	
}


?>