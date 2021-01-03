<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">

	<title>Minha Loja</title>
	<meta name="viewport" content="widht=device-widht,initial-scale=1"><!--largura do site é igual a largura navegador-->

	<!-- CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery livraria -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- JavaScript compilado-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    .navbar{margin-bottom: 0;}
  </style><!--retirada a margem do cabeçalho-->

</head>
<body><!-- não vamos usar dessa forma, será como abaixo
  <?php //include 'nav.php' ?>
  <?php //include 'cabecalho.html' ?>
  <?php //include 'conexao.php' ?> mudou abaixo-->

    <?php

    session_start();
    include 'conexao.php'; // carregar conexao antes de carregar nav.php
    include 'nav.php';
    include 'cabecalho.html';
    
    // Variavel consulta que vai receber variavel $cn que receberá o resultado de uma query
    $consulta = $cn->query('select cd_livro,nm_livro,vl_preco,ds_capa,qt_estoque from vw_livro'); //variavel $cn responsavel pela conexao com banco dados
    ?>
      <!-- inserido qt_estoque acima para puxar produtos do estoque aula 23-->



        <!-- Como as inormações virão do banco de dados não vamos precisar de tantas divs abaixo, apenas uma.
          Vamos fazer o loop e ele vai ta carregando as informações do banco de dados através de uma div-->
    <div class="container-fluid">
      <div class="row">
        <?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) { ?> <!--enquanto houver registros na consulta "{" quero que carregue a div-->
        <div class="col-sm-3"> <!--cria 3 linhas de 4 colunas-->
          <img src="imagens/<?php echo $exibe['ds_capa']; ?>" class="img-responsive" style="width:100%">
          <div><h4><b><?php echo mb_strimwidth($exibe['nm_livro'],0,25,'...'); ?></b></h4></div> <!--h1 trocado pelo h4 . Acrescentado echo mb_strimwidth informando de 0 a 25 caracteres e depois 3 pontinhos-->
          <div><h5>R$ <?php echo number_format($exibe['vl_preco'],2,',','.') ; ?></h5></div> <!--h4 trocado pelo h5-->
          <!--aula 22 abaixo- btn-lg igual botão grande btn-block ocupar todo espaço da div--> 
          <div class="text-center">
            <a href="detalhes.php?cd=<?php echo $exibe['cd_livro'];?>">
            <button class="btn btn-lg btn-block btn-default"><!--https://www.w3schools.com/bootstrap/bootstrap_buttons.asp-->
              <span class="glyphicon glyphicon-info-sign" style="color:cadetblue"> Detalhes</span> <!--https://getbootstrap.com/docs/3.3/components/-->
            </button>
          </a><!--editado aula 38 esta linha apenas-->
           </div>
          <div class="text-center" style="margin-top:5px; margin-bottom:5px;">
            <?php if($exibe['qt_estoque'] > 0) { ?>
            <button class="btn btn-lg btn-block btn-info"><!--https://www.w3schools.com/bootstrap/bootstrap_buttons.asp-->
              <span class="glyphicon glyphicon-usd"> Comprar</span> <!--https://getbootstrap.com/docs/3.3/components/--> <!--termino da aula 22-->
            </button>

            <?php } else { ?>

              <button class="btn btn-lg btn-block btn-danger" disabled>
              <span class="glyphicon glyphicon-remove-circle"> Indisponível</span>
            </button>
            <?php } ?>
           </div>

          </div>
        <?php } ?>

        <!--<div class="col-sm-3"> !--cria 3 linhas de 4 colunas--
          <img src="https://placehold.it/450x320" class="img-responsive" style="width:100%">
          <div><h1>Nome do produto</h1></div>
          <div><h4>R$500,00</h4></div>
        </div>
        <div class="col-sm-3"> !--cria 3 linhas de 4 colunas--
          <img src="https://placehold.it/450x320" class="img-responsive" style="width:100%">
          <div><h1>Nome do produto</h1></div>
          <div><h4>R$500,00</h4></div>
        </div>
        <div class="col-sm-3"> !--cria 3 linhas de 4 colunas--
          <img src="https://placehold.it/450x320" class="img-responsive" style="width:100%">
          <div><h1>Nome do produto</h1></div>
          <div><h4>R$500,00</h4></div>
        </div>
        <div class="col-sm-3"> !--cria 3 linhas de 4 colunas--
          <img src="https://placehold.it/450x320" class="img-responsive" style="width:100%">
          <div><h1>Nome do produto</h1></div>
          <div><h4>R$500,00</h4></div>        
        </div> -->
      </div><!--fechamento da class row-->
    </div><!--fechamento do container fluid-->
  <?php
      include 'rodape.html';
      ?>
</body>
</html>






<!--
  Aula 04 foi criado o arquivo nav.php e colocado o comando include na index
  Aula 05 foi criado o arquivo cabecalho.html e comando include na index.Poderia ter sido um arquivo .php também.
  Foi tirado o botao do cabeçalho, alihado o texto no centro.
  Retirada a margem entre o menu e o cabeçalho.
  Aula 06 layout para exibir produtos da loja.
  Boodstrap divide a tela em 12 colunas. Vamos indicar que iremos criar em uma linha 4 colunas.

  Aqui voltamos para aula 18 sem alterar nada.
  Aula19 
  Usando a função number_format
  ,2,',','.' =
  ,2, casas decimais apos a virgula

  ',' informar o simbolo que vai utiizar após a casa decimal que é a virgula

  , '.' novamente uma virgula por fora e informar que eu quero utilizar o ponto para separar milhares quando houver produtos acima de mil reais.

  Aula 21 Alteração na linha 32 desse código : 
  $consulta = $cn->query('select * from vw_livro') ;
  para esse código:
  $consulta = $cn->query('select nm_livro,vl_preco,ds_capa from vw_livro') ;

  Aula 23 
  style="color:cadetblue" deixa o texto do botão cinza, retirando fica preto


  Edição de linha aula 47 removendo extensão .jpg na linha 47

          <div class="col-sm-3"> <!--cria 3 linhas de 4 colunas--
          <img src="imagens/<?php //echo $exibe['ds_capa']; ?>.jpg" class="img-responsive" style="width:100%">
          Ao fazer essa alteração no bano de dados

e update no banco de dados com o comando
      -- edição aula 47 acrescentando no banco extensão .jpg em cada imagem no ds_capa
    update tbl_livro
    set ds_capa = 'javascriptcangaceiro.jpg'
    where cd_livro = 1;
em todos os ítens pela sequência do codigo do livro cd_livro

vai gerar erros de não exibbir as imagens nas outras abas do navegador, necessário remorer a extensão .jpg de todas. ex: lanc.php linha 44, categoria.php linha 46, detalhes.php linha 67, busca.php linha 62.
Fim da edição aula 47 relação a imagens.
  
