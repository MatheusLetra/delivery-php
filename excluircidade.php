<?php

include 'conexao.php';

$id_cidade=$_GET['id'];



$consulta = $conexao->query("SELECT * FROM cidade WHERE id_cidade='$id_cidade'");
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);


$excluir = $conexao->query("DELETE FROM cidade WHERE id_cidade='$id_cidade'");



header('location:adm.php')



?>