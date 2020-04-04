<?php
    $path = realpath(dirname(__FILE__)) . "/";
    include_once $path . "../../includes/ConexaoBD.php";

    //Defino um Array
    $return_arr = array();

    //Crio e executo a query dos dados que irei extrair
    $result = mysqli_query($conn, "SELECT solicitacao_id, pessoa_id, tiposolicitacao, status, usuario_id, datasolicitacao FROM tb_solicitacoes");

    //Laço para inserir os dados no Array
    while($row = mysqli_fetch_array($result)){
        
        $idSolicitacao = $row["solicitacao_id"];
        
        //Tratamento dos dados
        $pessoaId = $row["pessoa_id"];
        $pessoa = mysqli_query($conn,"SELECT nome FROM tb_pessoas WHERE pessoa_id = '$pessoaId'");
        $pessoa = mysqli_fetch_array($pessoa);
        $pessoa = $pessoa['0'];

        $usuarioId = $row["usuario_id"];
        $usuario = mysqli_query($conn,"SELECT nomecompleto FROM tb_usuarios WHERE usuario_id = '$usuarioId'");
        $usuario = mysqli_fetch_array($usuario);
        $usuario = $usuario['0'];

        if($row["status"] == 0){
            $status = "Aberto";
         } else {
            $status = "Finalizado";
        }                      
        
        $datasolicitacao = date('d/m/Y',strtotime($row["datasolicitacao"]));

        $acoes = "<a href='#editarSolicitacao' title='Editar Solicitação' data-toggle='modal' data-target='#editarSolicitacao' data-solicitacao='$idSolicitacao'>
                        <i class='fa fa-fw fa-pencil'></i>
                    </a>";

        //Inserindo os dados finais no Array para Exibição
        $return_arr[] = array(
                            "solicitacao_id" => $row["solicitacao_id"],
                            "pessoa_id" => $pessoa,
                            "tiposolicitacao" => $row["tiposolicitacao"],
                            "status" => $status,
                            "datasolicitacao" => $datasolicitacao,
                            "usuario" => $usuario,
                            "acoes" => $acoes
        );
    }

//Uso Json Encode para enviar o Array para o DataTables
echo json_encode($return_arr);
?>