
<div class="row m-2">
  <table class="table table-striped table-bordered table-hover table-sm bg-white text-dark" id="pesquisaSolicitacao" width="100%">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Tipo</th>
        <th>Status</th>
        <th>Entrada</th>
        <th>Usuário</th>
        <th>Ações</th>
      </tr>
    </thead>
  </table>
</div>
<div class="form-check text-right m-1 mr-3">
  <input class="form-check-input" type="checkbox" id="userSearch" name="userSearch" value="<?php echo $nomeUsuario['0']; ?>">
  <label class="form-check-label" for="userSearch">Filtrar pelos meus cadastros</label>
</div>