<div class="modal fade" id="cadastrarExperiencia" tabindex="-1" role="dialog" aria-labelledby="cadastrarExperienciaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cadastrarExperienciaLabel">Editar Experiência</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="" method="POST" id="formCadastrarExperiencia">         
            <div class="form-group">
                <label class="control-label" for="empresa">Empresa:</label>
                <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Nome da empresa." required>
            </div>
            <div class="form-group">
                <label class="control-label" for="cargo">Cargo:</label>
                <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Cargo ocupado nesta empresa." required>
            </div>
            <div class="form-group">
                <label class="control-label" for="periodo-inicial">Período Inicial:</label>
                <input type="text" class="form-control" id="periodo-inicial" name="periodo-inicial" placeholder="Digite uma data inicial." required>
            </div>
            <div class="form-group">
                <label class="control-label" for="periodo-final">Período Final:</label>
                <input type="text" class="form-control" id="periodo-final" name="periodo-final" placeholder="Digite uma data final." required>
            </div>
          <input type="hidden" class="form-control" id="id-curriculo" name="id-curriculo" value=""> 
          <div class="d-flex align-items-center justify-content-center w-100">
            <button type="submit" class="btn btn-lg btn-primary align-self-center m-1" id="botaoCadastrarExperiencia">
              <b>Salvar Experiência</b>
            </button>
          </div>
          <div class="d-flex align-items-center justify-content-center w-100 m-1 alert alert-dismissible fade show" role="alert" id="statusCadastrarExperiencia">&nbsp;</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnFecharCadastrarExperiencia">Fechar</button>
      </div>
    </div>
  </div>
</div>