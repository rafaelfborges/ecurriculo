<?php
  $path = realpath(dirname(__FILE__)) . "/";
  include_once $path . "../../includes/ConexaoBD.php";

  // Váriavel
  $curriculo = $_POST["id-curriculo"];
  $estadocivil = $_POST["estado-civil"];
  $cargo = $_POST["cargopretendido"];
  $escolaridade = $_POST["escolaridade"];
  $cursos = $_POST["cursos"];
  $observacoes = $_POST["observacoes"];
  $objetivos = $_POST["objetivos"];
  $status = "1";

  // Consulta
  $cadastra = mysqli_query($conn,"UPDATE tb_cv_informacoes SET estadocivil = '$estadocivil', cargopretendido = '$cargo', escolaridade = '$escolaridade', cursos = '$cursos', observacoes = '$observacoes', objetivos = '$objetivos', status = '$status' WHERE curriculo_id = '$curriculo'");

  if ($cadastra == 1) {
		echo 0;//"Informações adicionais atualizadas!";
	} else {
		echo -1;//"Erro Mysql! Contate o administrador do sistema.";
	}
?>