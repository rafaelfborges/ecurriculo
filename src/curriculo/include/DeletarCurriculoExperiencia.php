<?php
  $path = realpath(dirname(__FILE__)) . "/";
  include_once $path . "../../includes/ConexaoBD.php";
 
  // Váriavel
  $id = $_POST["id-experiencia"];

  // Consulta
  $query = mysqli_query($conn,"DELETE FROM tb_cv_experiencias WHERE experiencia_id = '$id'");
  if($query == 1){
      echo 0; //Deletado com sucesso
  } else {
      echo -1; //Erro sql
  }
?>