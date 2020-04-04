<?php 
	$path = realpath(dirname(__FILE__)) . "/";
    include_once $path . "../../includes/ConexaoBD.php";

	//Recebe os valores via POST
	$nome = $_POST['nome-pessoa'];
	$datanasc = $_POST['datanasc-pessoa'];
	$rg = $_POST['rg-pessoa'];
	$tel1 = $_POST['tel1-pessoa'];
	$tel2 = $_POST['tel2-pessoa'];
	$email = $_POST['email-pessoa'];
	$cep = $_POST['cep-pessoa'];
	$endereco = $_POST['endereco-pessoa'];	
	$bairro = $_POST['bairro-pessoa'];	
	$cidade = $_POST['cidade-pessoa'];
	$complemento = $_POST['complemento-pessoa'];
	$pessoa = $_POST['id-pessoa'];
	
	//Converte a data dd/mm/yyyy para o formato mysql yyyy/mm/dd
	$datanasc = implode("-",array_reverse(explode("/",$datanasc)));

	//Valida o cadastro e compara o RG para saber se esse Pessoa já está cadastrado
	$cadastra = mysqli_query($conn,"UPDATE tb_pessoas SET nome = '$nome', datanasc = '$datanasc', rg = '$rg', 
											telefone1 = '$tel1', telefone2 = '$tel2', email = '$email', cep = '$cep', endereco = '$endereco', 
											bairro = '$bairro', cidade = '$cidade', complemento = '$complemento' WHERE pessoa_id = '$pessoa'"
	);

	if ($cadastra == 1) {
		echo 0;//"Cadastrado com sucesso!";
	} else {
		echo -1;//"Erro! Contate o administrador do sistema.";
	}
?>