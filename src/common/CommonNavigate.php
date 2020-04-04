<div class="container mb-auto">
  <div class="row">
    <div class="mx-auto col-md-9">
      <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="assets/images/logo.png" height="20" class="d-inline-block align-top" alt=""> </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent"
                    aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
            <ul class="navbar-nav">
            <!-- Cadastro -->
              <li class="nav-item">
                <a class="nav-link" href="cadastro.php">
                  <i class="fa fa-fw fa-file-o"></i>
                  Cadastro
                </a>
              </li>
              <!-- Pesquisa -->
              <li class="nav-item">
                <a class="nav-link" href="pesquisa.php">
                <i class="fa fa-fw fa-search"></i>
                  Pesquisa
                </a>
              </li>
              <!-- Currículos -->
              <li class="nav-item">
                <a class="nav-link" href="curriculo.php#">
                  <i class="fa fa-fw fa-file-text-o"></i>
                  Currículos
                </a>
              </li>
              <!-- Solicitações -->
              <li class="nav-item">
                <a class="nav-link" href="solicitacao.php#">
                  <i class="fa fa-fw fa-folder-open-o"></i>
                  Solicitações
                </a>
              </li>
            </ul>
            <!-- Sair -->
            <a class="btn btn-default navbar-btn m-1 text-white" href="src/includes/LogoffUsuario.php">
              <i class="fa fa-fw fa-power-off"></i>Sair <br><?php echo $nomeUsuario['0']; ?>
            </a>
          </div>
        </div>
      </nav>
    </div>
  </div>
</div>