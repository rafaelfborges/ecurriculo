<?php 
	require("banco.php");

	//Recebe os valores via POST
	$id = $_POST['id-pessoa'];
	$estadocivil = $_POST['estado-civil'];
	$cargopretentido = $_POST['cargo'];
	$escolaridade = $_POST['escolaridade'];
	$cursos = $_POST['cursos'];
	$observacoes = $_POST['observacoes'];
	$objetivos = $_POST['objetivos'];
	$usuario = $_POST['usuario_id'];

	$cadastra = mysqli_query($conn,"INSERT INTO tb_cv_informacoes(pessoa_id, estadocivil, cargopretentido, escolaridade, cursos, 
																							observacoes, objetivos, usuario_id, datacadastro) VALUES (NULL, '$id', '$estadocivil', 
																							'$cargopretentido', '$escolaridade', '$cursos', '$observacoes', '$objetivos', '$usuario', CURRENT_TIMESTAMP)");
	if ($cadastra == 1) {
	  echo "Usuário cadastrado com sucesso!";
	} else {
	  echo "Mysql Error. Contate o programador.";
	}
?>