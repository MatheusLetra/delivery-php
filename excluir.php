<?php

include 'conexao.php';

$id_prod=$_GET['id'];


$pasta = "upload/";

$consulta = $conexao->query("SELECT * FROM produtos WHERE id='$id_prod'");
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);


$excluir = $conexao->query("DELETE FROM produtos WHERE id='$id_prod'");

$foto1=$exibe['foto1'];
$foto2=$exibe['foto2'];
$foto3=$exibe['foto3'];


if ($foto1!="") {
	
	unlink($pasta.$foto1);
	
}


if ($foto2!="") {
	
	unlink($pasta.$foto2);
	
}

if ($foto3!="") {
	
	unlink($pasta.$foto3);
	
}

header('location:lista.php')



?>