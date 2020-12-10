<?php

session_start();

if (empty($_SESSION['id'])){
    header('location:formLogon.php');
}

include 'conexao.php';

    if ($_SESSION['forma']== ''){
        header('location:formFormaPagto.php');
    }
    else {


        $data = date('Y-m-d');
        $ticket = uniqid();
        $id_user = $_SESSION['id'];
        $formapagto = $_SESSION['forma'] ;

        foreach ($_SESSION['carrinho'] as $id => $qnt)  {
        $consulta = $conexao->query("SELECT * FROM produtos WHERE id='$id'");
            $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
            $preco = $exibe['preco'];
    
	
	        $inserir = $conexao->query("INSERT INTO vendas (ticket, id_comprador, id_produto, quantidade, data, valor,status,forma) VALUES
            ('$ticket','$id_user','$id','$qnt','$data','$preco','A','$formapagto')");
            unset($_SESSION['carrinho']);
        }
    
               
    }
	include 'fim.php';

?>

<?php




?>