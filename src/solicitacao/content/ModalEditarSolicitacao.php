<div class="modal fade" id="editarSolicitacao" tabindex="-1" role="dialog" aria-labelledby="editarSolicitacaoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarSolicitacaoLabel">Editar Cadastro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="" method="POST" id="formEditaSolicitacao">         
          <div class="form-group">
            <label for="pessoa">Nome pessoa:</label>
            <input type="text" class="form-control" id="pessoa" name="pessoa" value="" readonly/>
          </div>
          <div class="form-group">
            <label for="tipo-solicitacao">Tipo solicitação:</label>
            <input type="text" class="form-control" id="tipo-solicitacao" name="tipo-solicitacao" placeholder="Digite o tipo da solicitação" value="">
          </div>
          <div class="form-group">
            <label for="solicitacao">Descrição da solicitação:</label>
            <textarea class="form-control" id="solicitacao" name="solicitacao" rows="3" colums="100" placeholder="Descreva a solicitação..."></textarea>
          </div>
          <div class="form-group">
            <label for="andamento">Andamento solicitação:</label>
            <textarea class="form-control" id="andamento" name="andamento" rows="3" colums="100" placeholder="Descreva o andamento..."></textarea>
          </div>
          <div class="form-group">
            <label for="status">Status solicitação:</label>
            <select class="form-control" name="status" id="status">
              <option value="0">Aberto</option>
              <option value="1">Finalizado</option>
            </select>
          </div>
          <input type="hidden" class="form-control" id="id-usuario" name="id-usuario" value="<?php echo $idUsuario[0]; ?>">
          <input type="hidden" class="form-control" id="id-solicitacao" name="id-solicitacao" value=""> 
          <div class="d-flex align-items-center justify-content-center w-100">
            <button type="submit" class="btn btn-lg btn-primary align-self-center m-1" id="botaoEditaSolicitacao">
              <b>Salvar Edição</b>
            </button>
          </div>
          <div class="d-flex align-items-center justify-content-center w-100 m-1 alert alert-dismissible fade show" role="alert" id="statusEditaSolicitacao">&nbsp;</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnFecharEditarSolicitacao">Fechar</button>
      </div>
    </div>
  </div>
</div>