<?php
  //Declarações gerais
  $path = realpath(dirname(__FILE__)) . "/";
  include_once $path . "../../includes/ConexaoBD.php";

  $solicitacao_id = $_GET["solicitacaoId"];

  //Query SQL
  $sql = "SELECT pessoa_id, tiposolicitacao, solicitacao, andamento, status FROM tb_solicitacoes WHERE solicitacao_id ='$solicitacao_id'";
  $result = $conn->query($sql);
    while ($row = $result->fetch_array()) {
      
      $pessoa = $row["pessoa_id"];
      $query = mysqli_query($conn,"SELECT nome FROM tb_pessoas WHERE pessoa_id = '$pessoa'");
      $nomePessoaId = mysqli_fetch_row($query);
      $nomePessoa = $nomePessoaId['0'];

      //Joga tudo num Array
      $return_arr[] = array("pessoa" => $nomePessoa,
                      "tiposolicitacao" => $row['tiposolicitacao'], 
                      "solicitacao" => $row['solicitacao'], 
                      "andamento" => $row['andamento'], 
                      "status" => $row['status']);
    }
  echo json_encode($return_arr);
?>