<?php
  //Declarações gerais
  $path = realpath(dirname(__FILE__)) . "/";
  include_once $path . "../../includes/ConexaoBD.php";

  $return_arr = array();
    
  $pessoa_id = $_GET["pessoaId"];

  $result = mysqli_query($conn, "SELECT nome, datanasc, rg, telefone1, telefone2, email, 
                                          cep, endereco, numero, complemento, bairro, 
                                          cidade FROM tb_pessoas WHERE pessoa_id ='$pessoa_id'"
  );

  //Query SQL
  while($row = mysqli_fetch_array($result)){  
      
      //Converte datanasc para PT-BR
      $datanasc = date('d/m/Y',strtotime($row["datanasc"]));

      //Joga tudo num Array
      $return_arr[] = array("nome" => $row['nome'],
                      "datanasc" => $datanasc, 
                      "rg" => $row['rg'], 
                      "telefone1" => $row['telefone1'], 
                      "telefone2" => $row['telefone2'],
                      "email" => $row['email'], 
                      "cep" => $row['cep'], 
                      "endereco" => $row['endereco'],
                      "numero" => $row['numero'],
                      "complemento" => $row['complemento'],
                      "bairro" => $row['bairro'],
                      "cidade" => $row['cidade']
      );
    }
  
  echo json_encode($return_arr);
?>