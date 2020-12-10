<?php
    session_start();
    if (empty($_SESSION['id'])){
        header('location:formLogon.php');
    }
    
    include 'conexao.php';

    if(isset($_GET['ticket']) && isset($_GET['status'])){
         $ticket = $_GET['ticket'];
         $status = $_GET['status'];
         if ($status == 'A'){
             $novoStatus = 'C';
         }
         else if ($status == 'C'){
            $novoStatus = 'E';
         }
         try {
            $alterar = $conexao->query("UPDATE vendas set status = '$novoStatus' where ticket = '$ticket'");
            header('location:vendas.php');
         }  catch (Exception $e)  {
            echo 'Problemas na Query';
         }

    }
    else{
        header('location:index.php');
    }

?>