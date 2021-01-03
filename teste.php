<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Mostrar Produtos</title>
</head>
<body>
	<?php
		include 'conexao.php';
		$consulta = $cn->query('select * from vw_livro') ; //query = receber consulta = selecione todos campos da view vw_livro"tabela livro".

		//criar um loop com while"enquanto" possuir dados vai carregar os blocos echo e tudo dentro das chaves{}
		while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) { //variavel $exibe vai ser variavel do tipo matriz"fetch(PDO::FETCH_ASSOC) ;" que vai receber a $consulta

		echo $exibe['nm_livro'].'<br>'; // concatenar com a tag do tipo <br> para quebra de linha. Antes assim: echo $exibe['nm_livro'];
		echo $exibe['vl_preco'].'<br>';
		echo $exibe['ds_categoria'].'<br>'; // <--- para trazer outras informações informar outros campos
		echo '<hr>';
		}

	 ?>

</body>
</html>