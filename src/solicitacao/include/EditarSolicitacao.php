<?php 
    $path = realpath(dirname(__FILE__)) . "/";
    include_once $path . "../../includes/ConexaoBD.php";

	//Recebe os valores via POST
	$id = $_POST['id-solicitacao'];
	$tipo = $_POST['tipo-solicitacao'];
	$solicitacao = $_POST['solicitacao'];
	$andamento = $_POST['andamento'];
	$status = $_POST['status'];

	//Valida o cadastro e compara o RG para saber se esse Pessoa já está cadastrado
	$cadastra = mysqli_query($conn,"UPDATE tb_solicitacoes SET tiposolicitacao = '$tipo',
							solicitacao = '$solicitacao', andamento = '$andamento', status = '$status' WHERE solicitacao_id = '$id'");

	if ($cadastra == 1) {
		echo 0;//"Cadastrado com sucesso!";
	} else {
		echo -1;//"Erro! Contate o administrador do sistema.";
	}
?>