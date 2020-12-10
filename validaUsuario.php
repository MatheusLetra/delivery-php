<?php
    session_start();
    include 'conexao.php';

    $recebe_email = $_POST['email'];
    $recebe_senha = $_POST['senha'];


    $consulta = $conexao->query("SELECT id_cliente,email,senha,adm FROM usuarios where email ='$recebe_email' AND senha ='$recebe_senha'");

    if ($consulta -> rowCount() ==1){
        $exibeUsuario = $consulta->fetch(PDO::FETCH_ASSOC);

        if ($exibeUsuario['adm'] ==0){
        $_SESSION['id']    = $exibeUsuario['id_cliente'];
        if (!isset($_SESSION['adm'])){
            $_SESSION['adm'] = 0;
        }

        header('location:index.php');
        }
        else{
            $_SESSION['id']  = $exibeUsuario['id_cliente'];
            if (!isset($_SESSION['adm'])){
                $_SESSION['adm'] = 1;
            }
    
            header('location:index.php');

        }
    }
    else {
        header('location:erro.php');
    }
?>