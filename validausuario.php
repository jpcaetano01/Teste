<?php
	include 'conexao.php';

	session_start(); //iniciando uma sessão



	$Vemail = $_POST['txtemail']; //orlindo@gmail.com
	$Vsenha = $_POST['txtsenha']; //omiya2

	//echo $Vemail.'<br>';
	//echo $Vsenha.'<br>';

	$consulta = $cn->query("select cd_usuario, nm_usuario,ds_email,ds_senha,ds_status from tbl_usuario where ds_email = '$Vemail' and ds_senha = '$Vsenha'");

	if($consulta->rowCount() == 1){ //rowCount verifica se o usuario existe ou não
		//echo 'usuario está cadastrado';
		$exibeUsuario = $consulta->fetch(PDO::FETCH_ASSOC);


		if($exibeUsuario['ds_status'] == 0) {
			$_SESSION['ID'] = $exibeUsuario['cd_usuario'];
			$_SESSION['Status']=0;
			header('location:index.php');
		}
		else{
			$_SESSION['ID'] = $exibeUsuario['cd_usuario'];
			$_SESSION['Status']=1;
			header('location:index.php');
		}

		}
		else{
			//echo 'usuario NÃO cadastrado';
			header('location:erro.php');
		}


?>

<!-- Operador and só retorna como verdadeiro se as duas condições forem verdadeiras Ex.: '$Vemail' and ds_senha = '$Vsenha'. Se um dos lados for falso ele retorna falso

Quando envia o usuario logado no site cria uma seção no index.php Aula 30
