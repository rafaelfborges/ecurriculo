<?php 
  $path = realpath(dirname(__FILE__)) . "/";
  include_once $path . "src/includes/ConexaoBD.php";
  include_once $path . "src/common/CommonSession.php";
?>
<html>
<head>
  <?php
    //CSS
    include_once $path . "src/common/CommonStyleSheet.php";
  ?>
</head>
<body class="bg-dark">
  <div class="p-3 h-75 d-flex flex-column">
    <!-- Top Section -->
    <?php 
      include_once $path . "src/common/CommonNavigate.php";
    ?>

    <!-- Header Label-->
    <div class="text-center">
      <h2>Solicitações</h2>
    </div>
    
    <!-- Content Section -->
    <div class="container bg-light border border-dark rounded">
      <?php 
        include_once $path . "src/solicitacao/content/ContentListSolicitacao.php";
        include_once $path . "src/solicitacao/content/ModalEditarSolicitacao.php";
      ?>
    </div>

    <!-- Footer Section -->
    <div class="container mt-auto">
      <div class="row">
        <div class="col-md-12">
          <p class="text-center mt-auto text-secondary">Copyright © 2018.</p>
        </div>
      </div>
    </div>
  </div>
  <?php
    //Scripts JS
    include_once $path . "src/common/CommonScripts.php";
  ?>
</body>
</html>