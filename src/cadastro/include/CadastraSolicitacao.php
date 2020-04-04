<?php 
	$path = realpath(dirname(__FILE__)) . "/";
	include_once $path . "../../includes/ConexaoBD.php";

	//Recebe os valores via POST
	$pessoa = $_POST['id-pessoa'];
	$usuario = $_POST['id-usuario'];
	$tipoSolicitacao = $_POST['tipo-solicitacao'];
	$descricaoSolicitacao = $_POST['descricao-solicitacao'];

	//Cadastra nova solicitação
	$cadastra = mysqli_query($conn,"INSERT INTO tb_solicitacoes(solicitacao_id, pessoa_id, tiposolicitacao, solicitacao, status, usuario_id, 
									datasolicitacao) VALUES (NULL, '$pessoa', '$tipoSolicitacao', '$descricaoSolicitacao', '0', '$usuario', CURRENT_TIMESTAMP)");
	if ($cadastra == 1) {
		echo 0; //"Cadastrado com sucesso!";
	} else {
		echo -1; //"Erro! Contate o administrador do sistema.";
	}
?>