<div class="modal fade" id="cadastrarSolicitacao" tabindex="-1" role="dialog" aria-labelledby="cadastrarSolicitacaoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cadastrarSolicitacaoLabel">Editar Cadastro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="" method="POST" id="formCadastrarSolicitacao">
            <div class="form-group">
                <label for="tipo-solicitacao" class="col-form-label">Tipo solicitacao:</label>
                <input type="text" class="form-control" id="tipo-solicitacao" name="tipo-solicitacao">
            </div>
            <div class="form-group">
                <label for="descricao-solicitacao" class="col-form-label">Descrição solicitação:</label>
                <textarea class="form-control" id="descricao-solicitacao" rows="3" name="descricao-solicitacao"></textarea>
            </div>
            <input type="hidden" class="form-control" id="id-pessoa" name="id-pessoa" value="">
            <input type="hidden" class="form-control" id="id-usuario" name="id-usuario" value="<?php echo $idUsuario[0]; ?>">
            
            <div class="d-flex align-items-center justify-content-center w-100">
            <button type="submit" class="btn btn-lg btn-primary align-self-center m-1" id="botaoCadastrarSolicitacao">
              <b>Cadastrar Solicitação</b>
            </button>
          </div>
          <div class="d-flex align-items-center justify-content-center w-100 m-1 alert alert-dismissible fade show" role="alert" id="statusCadastrarSolicitacao">&nbsp;</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnFecharCadastrarSolicitacao">Fechar</button>
      </div>
    </div>
  </div>
</div>