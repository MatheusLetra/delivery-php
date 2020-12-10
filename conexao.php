<?php
    $host = "den1.mysql1.gear.host";
    $username = "teste33";
    $password = "Ip28e~?z0ucw";
    $dbname = "teste33";
    try {
        $conexao = new PDO('mysql:host=den1.mysql1.gear.host;dbname=teste33',$username,$password);
        $conexao -> setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Erro na Conexão: '.$e->getMessage().'<br>';
        echo 'Código do Erro: '.$e->getCode();
    }
?>