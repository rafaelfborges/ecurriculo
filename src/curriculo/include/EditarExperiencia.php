<?php
  $path = realpath(dirname(__FILE__)) . "/";
  include_once $path . "../../includes/ConexaoBD.php";

  // Váriavel
  $id = $_POST["id-experiencia"];
  //$empresa = $_POST["empresa"];
  //$cargo = $_POST["cargo"];
  //$periodo = $_POST["periodo"];
  
  echo $id;
  //$atualiza = mysqli_query($conn,"UPDATE tb_cv_experiencias SET empresa = '$empresa', cargo = '$cargo', periodo = '$periodo' WHERE experiencia_id = '$id'");
  //if ($atualiza == 1) {
  //  echo 0; //"Informações adicionais atualizadas!";
  //} else {
  //  echo -1; //"Erro Mysql! Contate o administrador do sistema.";
  //}
?>