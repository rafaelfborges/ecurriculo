<div class="modal fade" id="modalExperiencia" tabindex="-1" role="dialog" aria-labelledby="modalExperienciaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalExperienciaLabel">Experiências do Currículo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
        <table class="table table-striped table-bordered table-hover table-sm bg-white text-dark" id="pesquisaExperiencia" width="100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>Empresa</th>
              <th>Cargo</th>
              <th>Periodo</th>
              <th>Ações</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnFecharModalExperiencia">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deletarExperiencia" tabindex="-1" role="dialog" aria-labelledby="deletarExperienciaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deletarExperienciaLabel">Deletar Experiência</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Você tem certeza que deseja deletar?</p>
        <form role="form" action="" method="POST" id="formDeletarExperiencia">
          <input type="hidden" class="form-control" id="id-experiencia" name="id-experiencia" value=""> 
          <div class="d-flex align-items-center justify-content-center w-100">
            <button type="submit" class="btn btn-lg btn-primary align-self-center m-1" id="botaoDeletaExperiencia">
              <b>Sim</b>
            </button>
          </div>
          <div class="d-flex align-items-center justify-content-center w-100 m-1 alert alert-dismissible fade show" role="alert" id="statusDeletaExperiencia">&nbsp;</div>
        </form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnFecharDeletarExperiencia">Fechar</button>
      </div>
    </div>
  </div>
</div>