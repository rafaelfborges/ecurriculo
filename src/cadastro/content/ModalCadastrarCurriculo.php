<div class="modal fade" id="cadastrarCurriculo" tabindex="-1" role="dialog" aria-labelledby="cadastrarCurriculoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cadastrarCurriculoLabel">Editar Cadastro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="" method="POST" id="formCadastrarCurriculo">
          <div class="row m-2">
            <div class="form-group">
                <p class="text-justify">
                  Clique no botão abaixo para verificar e ou adicionar um currículo, pois caso não haja nenhum, o sistema irá repassar as informações básicas do pessoa para criação do curriculum vitae. Informações como nome, endereço e outros já estão inclusas! Complete as informações restantes e as experiências profissionais do candidato no menu de "Currículos", na coluna "Ações" atráves de seus respectivos ícones.
                </p>
            </div>
            <input type="hidden" class="form-control" id="id-pessoa" name="id-pessoa" value="">
            <input type="hidden" class="form-control" id="id-usuario" name="id-usuario" value="<?php echo $idUsuario[0]; ?>">
          </div>
          <div class="d-flex align-items-center justify-content-center w-100">
            <button type="submit" class="btn btn-lg btn-primary align-self-center m-1" id="botaoCadastrarCurriculo">
              <b>Verificar/Adicionar</b>
            </button>
          </div>
          <div class="d-flex align-items-center justify-content-center w-100 m-1 alert alert-dismissible fade show" role="alert" id="statusCadastrarCurriculo">&nbsp;</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnFecharCadastrarCurriculo">Fechar</button>
      </div>
    </div>
  </div>
</div>