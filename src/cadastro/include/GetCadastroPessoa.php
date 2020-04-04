<?php
    $path = realpath(dirname(__FILE__)) . "/";
    include_once $path . "../../includes/ConexaoBD.php";

    //Defino um Array
    $return_arr = array();

    //Crio e executo a query dos dados que irei extrair
    $result = mysqli_query($conn, "SELECT pessoa_id, nome, telefone1, cep, endereco, numero, 
                                            bairro, usuario_id, datacadastro FROM tb_pessoas"
    );

    //Laço para inserir os dados no Array
    while($row = mysqli_fetch_array($result)){
 
        //Previamente formato alguns campos
        $idPessoa = $row['pessoa_id'];
        $endereco = $row["endereco"].' '.$row["numero"];
        $datacadastro = date('d/m/Y',strtotime($row["datacadastro"]));

        $usuarioId = $row["usuario_id"];
        $usuario = mysqli_query($conn,"SELECT nomecompleto FROM tb_usuarios WHERE usuario_id = '$usuarioId'");
        $usuario = mysqli_fetch_array($usuario);
        $usuario = $usuario['0'];

        $acoes = "<a href='#editarPessoa' title='Editar Cadastro' data-toggle='modal' data-target='#editarPessoa' data-pessoa='$idPessoa'>
                        <i class='fa fa-fw fa-pencil dt-icon'></i>
                    </a>
                    <a href='#cadastrarCurriculo' title='Cadastrar Currículo' data-toggle='modal' data-target='#cadastrarCurriculo' data-pessoa='$idPessoa'>
                    <i class='fa fa-fw fa-file-text-o dt-icon'></i>
                    </a>
                    <a href='#cadastrarSolicitacao' title='Nova Solicitação' data-toggle='modal' data-target='#cadastrarSolicitacao' data-pessoa='$idPessoa'>
                        <i class='fa fa-fw fa-clipboard dt-icon'></i>
                    </a>";

        //Inserindo os dados finais no Array para Exibição
        $return_arr[] = array(
                            "pessoa_id" => $row['pessoa_id'],
                            "nome" => $row['nome'],
                            "telefone1" => $row['telefone1'], 
                            "cep" => $row['cep'], 
                            "endereco" => $endereco,
                            "bairro" => $row['bairro'],
                            "usuario" => $usuario,
                            "datacadastro" => $datacadastro,
                            "acoes" => $acoes
        );
    }

//Uso Json Encode para enviar o Array para o DataTables
echo json_encode($return_arr);
?>