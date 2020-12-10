<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src = "images/icone.png" ></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php"><span class= "glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="http://facebook.com/MlDeveloper07"><span class= "glyphicon glyphicon glyphicon-bookmark"></span> Facebook</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Produtos<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
             <?php
						    $consulta_categorias = $conexao->query("SELECT codigo,descricao from categoria");
                            while ($exibe_categorias = $consulta_categorias->fetch(PDO::FETCH_ASSOC)) { 
						?>
                        <li><a href ="busca.php?busca=<?php echo $exibe_categorias['codigo'];?>"><?php echo $exibe_categorias['descricao'];?></a></li>
                        <?php
                            }
            ?>
          </ul>
        </li>
      </ul>
      <form method="get" action="busca.php"class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" name="busca" placeholder="Digite algo para buscar...">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li>
        <a href="carrinho.php"><span class= "glyphicon glyphicon-shopping-cart"></span> Carrinho</a>
        </li>
        <li><a href="https://wa.me/5518996632906?text=Olá"><span class= "glyphicon glyphicon glyphicon-comment"></span> WhatsApp</a></li>

        <?php
          if (empty($_SESSION['id'])){
        ?>

          <li><a href="formLogon.php"><span class= "glyphicon glyphicon-log-in"></span>  Login</a></li>

        <?php
          } else {
            $consulta_user = $conexao->query("SELECT nome,adm FROM usuarios WHERE id_cliente='$_SESSION[id]'");
            $exibe_user = $consulta_user->fetch(PDO::FETCH_ASSOC);
            if ($exibe_user['adm']==0){ // se n for um Administrador
              
        ?>

          <li><a href="areaUser.php"><span class= "glyphicon glyphicon-user"></span>  <?php echo $exibe_user['nome'];?></a></li>
          <li><a href="sair.php"><span class= "glyphicon glyphicon-off"></span>  Sair</a></li>
        
        <?php
            } else {
        ?>
          <li><a href="adm.php"><button class = 'btn btn-sm btn-danger'>ADMINISTRAÇÃO</button></a></li>
          <li><a href="sair.php"><span class= "glyphicon glyphicon-off"></span>  Sair</a></li>
        <?php
            }
          }
        ?>
      </ul>
    </div>
  </div>
</nav>
