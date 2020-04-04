<?php
  session_start();
  if(!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])){
      header ("Location: ../../index.php?msg=2");
  }
    
  $user = $_SESSION["usuario"];
  $query = mysqli_query($conn,"SELECT nomecompleto FROM tb_usuarios WHERE usuario = '$user'");
  $nomeUsuario = mysqli_fetch_row($query); 

  $query = mysqli_query($conn,"SELECT usuario_id FROM tb_usuarios WHERE usuario = '$user'");
  $idUsuario = mysqli_fetch_row($query); 
?>