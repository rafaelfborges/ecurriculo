<?php
  $path = realpath(dirname(__FILE__)) . "/";
  include_once $path . "../../includes/ConexaoBD.php";
 
  //Declarações gerais
  $return_arr = array();

  // Váriavel
  $id = $_GET["curriculo-id"];

  // Consulta
  $sql = "SELECT experiencia_id, empresa, cargo, periodo FROM tb_cv_experiencias WHERE curriculo_id ='$id'";
  $result = $conn->query($sql);
    while ($row = $result->fetch_array()) {
      $experiencia = $row['experiencia_id'];

      $acoes = "<a href='#deletarExperiencia' title='Deletar Experiencia' data-toggle='modal' data-target='#deletarExperiencia' data-experiencia='$experiencia'>
                  <i class='fa fa-fw fa-trash-o dt-icon'></i>
                </a>";

      //Joga tudo num Array
      $return_arr[] = array("experiencia_id" => $row['experiencia_id'],
                      "empresa" => $row['empresa'],
                      "cargo" => $row['cargo'], 
                      "periodo" => $row['periodo'],
                      "acoes" => $acoes);
    }
  
  echo json_encode($return_arr);
?>