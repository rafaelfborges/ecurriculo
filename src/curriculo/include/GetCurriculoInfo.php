<?php
  $path = realpath(dirname(__FILE__)) . "/";
  include_once $path . "../../includes/ConexaoBD.php";
  
  //Declarações gerais
  $return_arr = array();

  // Váriavel
  $id = $_GET["curriculoId"];

  // Consulta
  $sql = "SELECT estadocivil, cargopretendido, escolaridade, cursos, observacoes, objetivos FROM tb_cv_informacoes WHERE curriculo_id ='$id'";
  $result = $conn->query($sql);
    while ($row = $result->fetch_array()) {
      
      //Joga tudo num Array
      $return_arr[] = array("estadocivil" => $row['estadocivil'],
                      "cargopretendido" => $row['cargopretendido'], 
                      "escolaridade" => $row['escolaridade'], 
                      "cursos" => $row['cursos'], 
                      "observacoes" => $row['observacoes'], 
                      "objetivos" => $row['objetivos']);
    }
  
  echo json_encode($return_arr);
?>