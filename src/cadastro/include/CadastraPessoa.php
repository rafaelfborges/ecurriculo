<?php 
	$path = realpath(dirname(__FILE__)) . "/";
	include_once $path . "../../includes/ConexaoBD.php";

	//Recebe os valores via POST
	$rg = $_POST['rg-pessoa'];
	$nome = $_POST['nome-pessoa'];
	$datanasc = $_POST['datanasc-pessoa'];
	$tel1 = $_POST['tel1-pessoa'];
	$tel2 = $_POST['tel2-pessoa'];
	$email = $_POST['email-pessoa'];
	$cep = $_POST['cep-pessoa'];
	$endereco = $_POST['endereco-pessoa'];	
	$numero = $_POST['numero-pessoa'];	
	$bairro = $_POST['bairro-pessoa'];	
	$cidade = $_POST['cidade-pessoa'];
	$complemento = $_POST['complemento-pessoa'];
	$usuario = $_POST['usuario_id'];

	//Converte a data dd/mm/yyyy para o formato mysql yyyy/mm/dd
	$datanasc = implode("-",array_reverse(explode("/",$datanasc)));

	//Valida o cadastro e compara o RG para saber se esse Pessoa já está cadastrado
	$query = mysqli_query($conn,"SELECT * FROM tb_pessoas WHERE rg = '$rg'");
	$row = mysqli_num_rows($query);
	if ($row == 0) {
		$cadastra = mysqli_query($conn,"INSERT INTO tb_pessoas(pessoa_id, nome, datanasc, 
													rg, telefone1, telefone2, email, cep, endereco, 
													numero, bairro, cidade, complemento, usuario_id, datacadastro) 
													VALUES (NULL, '$nome', '$datanasc', '$rg', '$tel1', '$tel2', '$email', '$cep', 
													'$endereco', '$numero', '$bairro', '$cidade', '$complemento', '$usuario', CURRENT_TIMESTAMP)");
		if ($cadastra == 1) {
			echo 0; //"Pessoa cadastrado com sucesso!";
		} else {
			echo -1; //"Mysql Error. Contate o programador.";
		}
	} else {
		echo 1; //"Pessoa já cadastrado! Verifique em Pesquisar Cadastro.";
	}	
?>