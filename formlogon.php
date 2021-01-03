<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Logon de Usuário</title>

		<meta name="viewport" content="widht=device-widht,initial-scale=1">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script scr="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<style>
			.navbar{
					margin-bottom: 0;
			}
		</style>

	</head>
<body>
	<?php

			include 'conexao.php';
			include 'nav.php';
			include 'cabecalho.html';

			?>

	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4">
				
				<h2>Logon de Usuário</h2>
				<form name="frmusuario" method="post" action="validausuario.php">
				
					<div class="form-group">
				
						<label for="email">Email</label>
						<input name="txtemail" type="email" class="form-control" required id="email">
					</div>
				
				<div class="form-group">
				
						<label for="senha">Senha</label>
						<input name="txtsenha" type="password" class="form-control" required id="senha">
				</div>
				
							
				<button type="submit" class="btn btn-lg btn-default">
					
					<span class="glyphicon glyphicon-ok"> Entrar</span>
					
				</button>

				<a href="formusuario.php">

				<button type="button" class="btn btn-lg btn-link">
					
					Ainda não sou cadastrado
					
				</button>
				</a>
			</form>
							
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>

</body>
</html>






<!-- codigo meu que deu erro em não poder inserir email e senha.

			<div class="container-fluid">

				<div class="row">

					<div class="col-sm-4 col-sm-offset-4">

						<h2>Logon de Usuário</h2>
						<form name="frmusuario" method="post" action="validausuario.php">

							<div class="form-group">

								<label for="email">Email</label>
								<imput name="txtemail" type="email" class="form-control" required id="email">
							</div>

							<div class="form-group">

								<label for="senha">Senha</label>
								<imput name="txtsenha" type="password" class="form-control" required id="senha">
							</div>

							<button type="submit" class="btn btn-lg btn-detault">

								<span class="glyphicon glyphicon-ok"> Entrar</span>
							</button>

							<button type="submit" class="btn btn-lg btn-link">
								
									Ainda não sou cadastrado

							</button>
						</form>
					</div>
				</div>
			</div>

			<?php //include 'rodape.html' ?>

</body>
</html>