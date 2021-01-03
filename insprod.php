<?php 
include 'conexao.php'; //include co arquivo de conexão

//variáveis vão receber os dados do formulário que está na página formProduto
$isbn = $_POST['txtisbn']; // variavel super global post
$cd_cat = $_POST['sltcat']; //recebendo o valor do campo select, valor numerico 
$nome_livro = $_POST['txtlivro'];
$cd_autor = $_POST['sltautor']; //recebendo o valor do campo select, valor numerico 
$nopag = $_POST['txtpag']; //recebendo o valor do campo select, 
$preco = $_POST['txtpreco'];
$qtde = $_POST['txtqtde'];
$resumo = $_POST['txtresumo'];
$lanc = $_POST['sltlanc'];

$remover1='.'; //criando variável e atribuindo o valor de ponto para ela
$preco = str_replace($remover1, '', $preco); //removendo ponto de casa decimal, substituindo por vazio
$remover2=',';//criando variável e atribuindo o valor de vírgula para ela
$preco = str_replace($remover2, '.', $preco); //removendo ponto de casa decimal, substituindo por ponto

$recebe_foto1 = $_FILES['txtfoto1'];

$destino = "imagens/"; //iformando para qual diretório será enviado  imagem

//gernando nome aleatório par imagem
//preg_match vai pegar imagens nas extensões jpg|jpeg|png|gif
//do nome que esta na variavel  $recebe_foto1 do parametro name e a $extensao vai receber o formato
preg_match ("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto1['name'],$extensao1);

// a funçao md5 vai gerar um valor randomico com base no horario "time"
//incrementar o ponto e a extensão
// função md5 é criado para gerar criptografia
$img_nome1 = md5(uniqid(time())).".".$extensao1[1];

try { //try para tentar inserir

	$inserir=$cn->query("INSERT INTO tbl_livro(no_isbn, cd_categoria, nm_livro, cd_autor, no_pag, vl_preco, qt_estoque, ds_resumo_obra, ds_capa, sg_lancamento) VALUES ('$isbn', '$cd_cat', '$nome_livro', '$cd_autor', '$nopag', '$preco', '$qtde', '$resumo', '$img_nome1', '$lanc')");

}catch(PDOException $e) { // se houver algum erro explodir na tela a mensagem erro

	echo $e->getMessage();

}

?>



