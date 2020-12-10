<?php
    session_start();
    $id_prod = $_GET['id'];
    unset($_SESSION['carrinho'][$id_prod]);
    header('location:carrinho.php');

?>