<?php
session_start();
?>
<!doctype html>
<html lang = "pt-br">
<head>
    <meta charset = "utf-8">
    <title> Loja </title>
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .navbar{
            margin-bottom : 0;
        }
    </style>
</head>
<body>
    <?php
        include 'conexao.php';     // Conexão com o Banco
        
        
        include 'nav.php';        // Menu
        include 'cabecalho.html';  // Cabecalho
        $consulta = $conexao ->query('SELECT * FROM produtos');
    ?>
    <div class = "container-fluid">
        <div class = "row">

        <?php
            while ($exibir = $consulta->fetch(PDO::FETCH_ASSOC)) {  // Enquanto tiver produtos vai criando as divs

        ?>
            <div class = "col-sm-3" style = "margin-bottom : 25px">
                <!--Montando as imagens, Nome do Produto e Preço-->
                <img src = "upload\<?php echo $exibir['foto1']; ?>" class = "img-responsive" style = "width:100%">
                <div><h1>   <?php echo mb_strimwidth($exibir['produto'],0,13,'...'); ?></h1></div>
                <div><h4>R$ <?php echo number_format($exibir['preco'],2,',','.'); ?></h4></div>
               
                <!-- Botão Detalhes-->
                <div class = "text-center">
                    <a href="detalhes.php?id=<?php echo $exibir['id']; ?>">
                    <button class = "btn btn-lg btn-block btn-default"> 
                        <span class = "glyphicon glyphicon-info-sign" style = "Color:cadetblue;">  Detalhes</span>
                    </button>
                    </a>
                </div>
                <!-- Botão Comprar-->
                <div class = "text-center" style="margin-top:5px;">
                    <?php if ($exibir['quantidade'] > 0) { ?>
                        <a href = "carrinho.php?id=<?php echo $exibir['id']; ?>">
                        <button class = "btn btn-lg btn-block btn-info"> 
                        <span class = "glyphicon glyphicon-usd">  Comprar</span>
                        
                        </button>
                         </a>

                    <?php } else { ?>

                        <button class = "btn btn-lg btn-block btn-danger" disabled> 
                        <span class = "glyphicon glyphicon-ban-circle">  Indisponível</span>
                    </button>
                    
                    <?php }?>
                </div>
             </div> 
        <?php
            }
        ?>
        </div>
    </div>
    <?php
    include 'rodape.html'; //Rodapé
    ?>
</body>
</html>