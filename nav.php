 <nav class="navbar navbar-default"><!--menu do site-->
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Books on Line</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>!--class active deixa com botao cinza-->
        <li><a href="index.php">Home<span class="sr-only">(current)</span></a></li>

        <li><a href="lanc.php">Lançamentos</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorias <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="categoria.php?cat=Design">Design</a></li>
            <li><a href="categoria.php?cat=Infraestrutura">Infra-Estrutura</a></li>
            <li><a href="categoria.php?cat=Dados">Dados</a></li>
            <!--<li role="separator" class="divider"></li> Linha que divide o menu class divider-->
            <li><a href="categoria.php?cat=Front-end">Front End</a></li>
            <!--<li role="separator" class="divider"></li>-->
            <li><a href="categoria.php?cat=Mobile">Mobile</a></li>
          </ul>
        </li>
      </ul>

      <form class="navbar-form navbar-left" role="search" name="frmpesquisa" method="get" action="busca.php"><!--busca usa metodo get-->
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Buscar" name="txtBuscar"><!--edit aula 42  name="txtBuscar"-->
        </div>
        <button type="submit" class="btn btn-default">Pesquisar</button>
      </form>
      <ul class="nav navbar-nav navbar-right"> <!--joga texto lado direito-->
        <li><a href="#">Contato</a></li><!-- Dropdown abaixo foi apagado-->

       <?php if(empty($_SESSION['ID'])) { ?> <!--verificando se a sessão ID for vazia mostre o logon-->
        <li><a href="formlogon.php"><span class="glyphicon glyphicon-log-in"> Logon</a></li>
          <?php } else { // se não estiver vazio a sessão id verificar...
            if($_SESSION['Status']  == 0) { // se sessão status or 0 mostrar nome usuario
              $consulta_usuario = $cn->query("select nm_usuario from tbl_usuario where cd_usuario = '$_SESSION[ID]'");
              $exibe_usuario = $consulta_usuario->fetch(PDO::FETCH_ASSOC);
              ?>
                <li><a href="#"> <span class="glyphicon glyphicon-user"> <?php echo $exibe_usuario['nm_usuario'];?> </a></li>
                <li><a href="sair.php"> <span class="glyphicon glyphicon-log-out"> Sair</a></li>
              <?php } else { ?>
                <li><a href="adm.php"><button class="btn btn-sm btn-danger">Administrador</button></a></li>
                <li><a href="sair.php"> <span class="glyphicon glyphicon-log-out"> Sair</a></li>

            <?php } } ?>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>









