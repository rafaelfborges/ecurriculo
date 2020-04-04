<?php 
	
	$path = realpath(dirname(__FILE__)) . "/";
	include_once $path . "ConexaoBD.php";

	$usuario = $_POST['inputUser'];
	$senha = md5($_POST['inputPassword']);

	
	$query = mysqli_query($conn,"SELECT datacadastro FROM tb_usuarios WHERE usuario = '$usuario' AND primeiro_login = '1'");
	echo $row = mysqli_num_rows($query);

	if ($row == 0) {
		$query = mysqli_query($conn,"SELECT * FROM tb_usuarios WHERE usuario = '$usuario' AND senha = '$senha'");
		$row = mysqli_num_rows($query);
		echo $row;
		if ($row > 0){
			session_start();
			$_SESSION['usuario'] = $_POST['inputUser'];
			$_SESSION['senha'] = $_POST['inputPassword'];
			header('Location:  ../../cadastro.php');
		}else{
			header('Location: ../../index.php?msg=1');
		}
	} else {
		header('Location: ../../index.php?msg=4');
	}
?>