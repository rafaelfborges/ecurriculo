<?php 
  //Dompdf namespace
  use Dompdf\Dompdf;

  $path = realpath(dirname(__FILE__)) . "/";
  include_once $path . "../../includes/ConexaoBD.php";
  include_once $path . "../../../vendor/autoload.php";
 
  $curriculo = $_GET["id-curriculo"];

  //Pega informações do curriculo
  $sql = mysqli_query($conn, "SELECT pessoa_id, estadocivil, cargopretendido, escolaridade, cursos, observacoes, objetivos FROM tb_cv_informacoes WHERE curriculo_id ='$curriculo'");
  while($row = mysqli_fetch_assoc($sql)){
    $pessoa = $row['pessoa_id'];
    if($row['estadocivil'] == "solteiro") {
      $estadocivil = "Solteiro(a)";
    }else if($row['estadocivil'] == "casado") {
      $estadocivil = "Casado(a)";
    }else if($row['estadocivil'] == "divorciado") {
      $estadocivil = "Divorciado(a)";
    }else if($row['estadocivil'] == "viuvo") {
      $estadocivil = "Viuvo(a)";
    }else if($row['estadocivil'] == "separado") {
      $estadocivil = "Separado(a)";
    }else if($row['estadocivil'] == "companheiro") {
      $estadocivil = "Companheiro(a)";
    }else {
      $estadocivil = "";
    }
    $cargopretendido = $row['cargopretendido'];
    
    $escolaridade = $row['escolaridade'];
    if($row['escolaridade'] == 1) {
      $escolaridade = "Fundamental Incompleto";
    }else if($row['escolaridade'] == 2) {
      $escolaridade = "Fundamental Completo";
    }else if($row['escolaridade'] == 3) {
      $escolaridade = "Médio Incompleto";
    }else if($row['escolaridade'] == 4) {
      $escolaridade = "Médio Completo";
    }else if($row['escolaridade'] == 5) {
      $escolaridade = "Superior Incompleto";
    }else if($row['escolaridade'] == 6) {
      $escolaridade = "Superior Completo";
    } else {
      $escolaridade = "";
    }
    $cursos = $row['cursos'];
    $observacoes = $row['observacoes'];
    $objetivos = $row['objetivos'];
  }

  //Pega inforamações básicas do pessoa para o curriculo
  $sql = mysqli_query($conn, "SELECT nome, datanasc, endereco, numero, bairro, telefone1, telefone2, email FROM tb_pessoas WHERE pessoa_id = '$pessoa'");
  while($row = mysqli_fetch_assoc($sql)){
    $nome = $row['nome'];
    $datanasc = date('d/m/Y',strtotime($row["datanasc"]));
    $endereco = $row['endereco'] . ', ' . $row['numero'];
    $bairro = $row['bairro'];
    $telefone1 = $row['telefone1'];
    $telefone2 = $row['telefone2'];
    $email = $row['email'];
  }

  //Envia html para váriavel
  $html = '<html>';
  $html .= '<head>';
  $html .= '<link href="../../../assets/css/gerar_curriculo.css" rel="stylesheet" type="text/css">';
  $html .= '</head>';
  $html .= '<body>';
  $html .= '<h1>'.$nome.'<h1>';
  $html .= '<p class="p-data">Estado Civil: </p>'.$estadocivil.'<br>';
  $html .= '<p class="p-data">Data Nascimento: </p>'.$datanasc.'<br>';
  $html .= '<p class="p-data">Endereço: </p>'.$endereco.'<br>';
  $html .= '<p class="p-data">Bairro: </p>'.$bairro.'<br>';
  if(empty($telefone1) == false && empty($telefone2) == false) {
    $html .= '<p class="p-data">Telefone: </p>'.$telefone1.' / '.$telefone2.'<br>';
  } else {
    $html .= '<p class="p-data">Telefone: </p>'.$telefone1.'<br>';
  }
  if(empty($email) == false) {
    $html .= '<p class="p-data">E-mail: </p>'.$email;
  }
  $html .= '<hr noshade>';
  $html .= '<p class="p-data">CARGO PRETENDIDO: </p>'.$cargopretendido.'<br>';
  $html .= '<hr noshade>';
  $html .= '<p class="p-data">ESCOLARIDADE: </p>'.$escolaridade.'<br>';
  $html .= '<hr noshade>';
  if(empty($cursos) == false) {
    $html .= '<p class="p-data">CURSOS: </p>'.$cursos.'<br>';
    $html .= '<hr noshade>';
  }
  $html .= '<p style="font-weight: bold; margin-bottom: 2px;">EXPERIÊNCIA PROFISSIONAL:</p>';
  
  $sql = mysqli_query($conn, "SELECT * FROM tb_cv_experiencias WHERE curriculo_id = '$curriculo'");
  while($row = mysqli_fetch_assoc($sql)){
    $html .= '<p class="p-data">Empresa: </p>'.$row['empresa'].'<br>';
    $html .= '<p class="p-data">Cargo: </p>'.$row['cargo'].'<br>';
    $html .= '<p class="p-data">Período: </p>'.$row['periodo'].'<br>';
    $html .= '<br>';
  }
  $html .= '<hr noshade>';
  $html .= '<p class="p-data">OBSERVAÇÕES: </p>'.$observacoes.'<br>';
  $html .= '<hr noshade>';
  $html .= '<p class="p-data">OBJETIVOS: </p>'.$objetivos.'<br>';
  $html .= '</body>';
  $html .= '</html>';

  //Instanciando Dompdf e configurações de página e fonte
  $dompdf = new Dompdf();
  $dompdf->set_option('defaultFont', 'Helvetica');
  $dompdf->setPaper('A4', 'portrait');

  //Passando variavel $html para impressão no PDF
  $dompdf->load_html('
    '.$html.'
  ');

  //Render
  $dompdf->render();

  //Exibir
  $dompdf->stream(
    $nome . " - Curriculum Vitae.pdf", 
    array(
      "Attachment" => false //Para realizar o download somente alterar para true
    )
  );

?>