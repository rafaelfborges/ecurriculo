<?php 
	$path = realpath(dirname(__FILE__)) . "/";
	include_once $path . "../../includes/ConexaoBD.php";

	//Recebe os valores via POST
	$curriculo = $_POST['id-curriculo'];
	$empresa = $_POST['empresa'];
	$cargo = $_POST['cargo'];
	$inicial = $_POST['periodo-inicial'];
	$final = $_POST['periodo-final'];

	if($inicial == $final || $final < $inicial){
		echo 1;
	} else {
		//Cadastra nova solicitação
		$periodo = $inicial . ' à ' . $final;
		$cadastra = mysqli_query($conn,"INSERT INTO tb_cv_experiencias(experiencia_id, curriculo_id, 
										empresa, cargo, periodo) VALUES (NULL, '$curriculo', '$empresa', '$cargo', '$periodo')");
		if ($cadastra == 1) {
		echo 0; //"Cadastrado experiência profissional com sucesso!";
		} else {
		echo -1; //"Erro Mysql! Contate o administrador do sistema.";
		}
	}
	
	
?>