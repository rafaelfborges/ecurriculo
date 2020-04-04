<?php 
	require("banco.php");

	$usuario = $_POST['user'];
	$senha1 = $_POST['pwd1'];
	$senha2 = $_POST['pwd2'];

	if($senha1 == $senha2) {
		$senha = md5($senha2);
		$query = mysqli_query($conn,"UPDATE tb_usuarios SET senha = '$senha', primeiro_login = '0' WHERE usuario = '$usuario'");
		header('Location: index.php?msg=5');
	} else {
		header('Location: index.php?msg=4');
	}
?>