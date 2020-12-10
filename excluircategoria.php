<?php

include 'conexao.php';

$id_cat=$_GET['id'];



$consulta = $conexao->query("SELECT * FROM categoria WHERE codigo='$id_cat'");
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);


$excluir = $conexao->query("DELETE FROM categoria WHERE codigo='$id_cat'");



header('location:adm.php')



?>