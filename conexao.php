<?php

//criando conexao com banco de dados MySql usando classe especiica do PHP usando a calsse PDO

	$servidor = "Localhost"; //quando for hospedar o site colocar o nome do servidor ou endereço ip da máquina onde está o servidor.
	$usuario = "ead"; //usuario ead definido ao banco junto a senha 123456
	$senha = "123456";
	$banco = "db_ead";

	$cn  = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha); //variavel que vai receber a conexao. Para criar a conexao usar a classe PDO conectando ao banco mysql, passando o ome do banco dbname da variavel $banco. A variavel $cn é que esta fazendo a conexao com banco de dados.


?>