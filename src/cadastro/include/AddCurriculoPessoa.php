<?php
	$path = realpath(dirname(__FILE__)) . "/";
  include_once $path . "../../includes/ConexaoBD.php";

  // Váriavel
  $pessoa = $_POST["id-pessoa"];
  $usuario = $_POST['id-usuario'];
  $objetivos = "Candidato-me à referente vaga, propondo-me a desempenhar a função com dedicação, responsabilidade. Certo de que contribuirei no crescimento da empresa e do próprio crescimento profissional e pessoal.";

  //Query SQL
  $query = mysqli_query($conn,"SELECT * FROM tb_cv_informacoes WHERE pessoa_id = '$pessoa'");
  $row = mysqli_num_rows($query);
  if ($row == 1) {
    echo 1; //"Já há um currículo cadastrado, localize no menu 'Currículos', no campo 'Pesquisar'.";
  } else {
    $cadastra = mysqli_query($conn,"INSERT INTO tb_cv_informacoes (curriculo_id, pessoa_id, estadocivil, cargopretendido, 
                                                escolaridade, cursos, observacoes, objetivos, status, usuario_id, datacurriculo) VALUES (NULL, 
                                                '$pessoa', '', '', '0', '', '', '$objetivos', '0', '$usuario', CURRENT_TIMESTAMP)");
    if ($cadastra == 1) {
      echo 0; //"Currículo cadastrado! Localize-o no menu 'Currículos' e complete as informações.";
    } else {
      echo -1;  //"Mysql Error. Contate o programador.";
    }
  }
?>