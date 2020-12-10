<?php
    session_start();
    include 'conexao.php';
    $_SESSION['forma']  = $_POST['forma'];
    // var_dump(' : '.$_SESSION['carrinho']['forma']);
    header('location:finalizarCompra.php');
?>