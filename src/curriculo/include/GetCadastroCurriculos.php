<?php
    $path = realpath(dirname(__FILE__)) . "/";
    include_once $path . "../../includes/ConexaoBD.php";

    //Defino um Array
    $return_arr = array();

    //Crio e executo a query dos dados que irei extrair
    $result = mysqli_query($conn, "SELECT curriculo_id, pessoa_id, cargopretendido, status, datacurriculo, usuario_id FROM tb_cv_informacoes");

    //Laço para inserir os dados no Array
    while($row = mysqli_fetch_array($result)){
        
        //Tratamento dos dados
        $pessoaId = $row["pessoa_id"];
        $pessoa = mysqli_query($conn,"SELECT nome FROM tb_pessoas WHERE pessoa_id = '$pessoaId'");
        $pessoa = mysqli_fetch_array($pessoa);
        $pessoa = $pessoa['0'];
        
        $idCurriculo = $row["curriculo_id"];
        $exp = mysqli_query($conn,"SELECT COUNT(*) FROM tb_cv_experiencias WHERE curriculo_id = '$idCurriculo'");
        $exp = mysqli_fetch_array($exp);
        
        if($exp['0'] == 0){
            $exp = "Vazio! Cadastre uma experiência.";
        }else {
        $value = $exp['0'];
            $exp = "<a href='#modalExperiencia' data-toggle='modal' data-curriculo='$idCurriculo' data-target='#modalExperiencia'>$value Experiência(s) Cadastrada(s)</a>";
        }

        $cargopretendido = $row["cargopretendido"];

        $datacurriculo = date('d/m/Y',strtotime($row["datacurriculo"]));

        $usuarioId = $row["usuario_id"];
        $usuario = mysqli_query($conn,"SELECT nomecompleto FROM tb_usuarios WHERE usuario_id = '$usuarioId'");
        $usuario = mysqli_fetch_array($usuario);
        $usuario = $usuario['0'];

        $acoes = "<a href='#editarInfos' data-toggle='modal' title='Editar Informações' data-curriculo='$idCurriculo' data-target='#editarInfos'>
                        <i class='fa fa-fw fa-file-text-o dt-icon'></i>
                    </a>
                    <a href='#cadastrarExperiencia' data-toggle='modal' title='Adicionar Experiências' data-curriculo='$idCurriculo' data-target='#cadastrarExperiencia'>
                        <i class='fa fa-fw fa-book dt-icon'></i>
                    </a>
                    <a href='src/curriculo/include/GerarCurriculoPDF.php?id-curriculo=$idCurriculo' target='_blank' title='Gerar Currículo em PDF'>
                        <i class='fa fa-fw fa-file-pdf-o dt-icon'></i>
                    </a>";

        //Inserindo os dados finais no Array para Exibição
        $return_arr[] = array(
                            "curriculo_id" => $row["curriculo_id"],
                            "pessoa_id" => $pessoa,
                            "exp" => $exp,
                            "cargopretendido" => $cargopretendido,
                            "datacurriculo" => $datacurriculo,
                            "usuario" => $usuario,
                            "acoes" => $acoes
        );
    }

//Uso Json Encode para enviar o Array para o DataTables
echo json_encode($return_arr);
?>