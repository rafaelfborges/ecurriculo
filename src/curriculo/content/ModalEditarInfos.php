<div class="modal fade" id="editarInfos" tabindex="-1" role="dialog" aria-labelledby="editarInfosLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarInfosLabel">Editar Experiência</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="" method="POST" id="formEditarInfos">         
            <div class="form-group">
                <label for="estado-civil">Estado Civil:</label>
                <select class="form-control" name="estado-civil" id="estado-civil">
                    <option value="selecione">Selecione uma opção</option>
                    <option value="solteiro">Solteiro(a)</option>
                    <option value="casado">Casado(a)</option>
                    <option value="divorciado">Divorciado(a)</option>
                    <option value="viuvo">Viúvo(a)</option>
                    <option value="separado">Separado(a)</option>
                    <option value="companheiro">Companheiro(a)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cargo">Cargo pretendido:</label>
                <textarea class="form-control" id="cargopretendido" name="cargopretendido" rows="2" placeholder="Ex: Auxiliar de produção."></textarea>
            </div>
            <div class="form-group">
                <label for="escolaridade">Grau de escolaridade:</label>
                <select class="form-control" name="escolaridade" id="escolaridade">
                    <option value="0">Selecione uma opção</option>
                    <option value="1">Fundamental Incompleto</option>
                    <option value="2">Fundamental Completo</option>
                    <option value="3">Médio Incompleto</option>
                    <option value="4">Médio Completo</option>
                    <option value="5">Superior Incompleto</option>
                    <option value="6">Superior Completo</option>
                 </select>
            </div>
            <div class="form-group">
                <label for="cursos">Cursos realizados:</label>
                <textarea class="form-control" id="cursos" name="cursos" rows="2" placeholder="Ex: Informática básica."></textarea>
            </div>
            <div class="form-group">
                <label for="observacoes">Observações do candidato:</label>
                <textarea class="form-control" id="observacoes" name="observacoes" rows="2" placeholder="Ex: Trabalho em equipe."></textarea>
            </div>
            <div class="form-group">
                <label for="objetivos">Objetivos do candidato:</label>
                <textarea class="form-control" id="objetivos" name="objetivos" rows="2" placeholder="Obetivos do candidato."></textarea>
            </div>
          <input type="hidden" class="form-control" id="id-curriculo" name="id-curriculo" value=""> 
          <div class="d-flex align-items-center justify-content-center w-100">
            <button type="submit" class="btn btn-lg btn-primary align-self-center m-1" id="botaoEditarInfos">
              <b>Salvar Edição</b>
            </button>
          </div>
          <div class="d-flex align-items-center justify-content-center w-100 m-1 alert alert-dismissible fade show" role="alert" id="statusEditarInfos">&nbsp;</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnFecharEditarInfos">Fechar</button>
      </div>
    </div>
  </div>
</div>