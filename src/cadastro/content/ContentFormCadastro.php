<form role="form" action="" method="POST" id="formCadastraPessoa">
  <div class="row">
    <div class="col-md-6">
        <div class="form-group">
          <label>RG:</label>
          <input type="text" maxlength="20" class="form-control" id="rg-pessoa" name="rg-pessoa" placeholder="Digite o RG sem traços, barras ou pontos." pattern="[0-9]+$" required/>
        </div>
        <div class="form-group">
          <label>Nome e Sobrenome:</label>
          <input type="text" maxlength="255" class="form-control" id="nome-pessoa" name="nome-pessoa" placeholder="Digite o nome e sobrenome apenas." required/>
        </div>
        <div class="form-group">
          <label>Data Nascimento:</label>
          <input type="text" maxlength="8" class="form-control" id="datanasc-pessoa" name="datanasc-pessoa" placeholder="Digite uma data de nascimento." required>
        </div>
        <div class="form-group">
          <label>Telefone 1:</label>
          <input type="text" maxlength="11" class="form-control" id="tel1-pessoa" name="tel1-pessoa" placeholder="Digite um telefone" required>
        </div>
        <div class="form-group">
          <label>Telefone 2:</label>
          <input type="text" maxlength="11" class="form-control" id="tel2-pessoa" name="tel2-pessoa" placeholder="Digite um telefone.">
        </div>
        <div class="form-group">
          <label>Email:</label>
          <input type="text" maxlength="255" class="form-control" id="email-pessoa" name="email-pessoa" placeholder="Digite uma e-mail.">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>CEP:</label>
          <input type="text" maxlength="8" class="form-control" id="cep-pessoa" name="cep-pessoa" placeholder="Digite um cep.">
        </div>
        <div class="form-group">
          <label>Endereço:</label>
          <input type="text" maxlength="255"  class="form-control" id="endereco-pessoa" name="endereco-pessoa" placeholder="Digite um endereço.">
        </div>
        <div class="form-group">
          <label>Número:</label>
          <input type="text" maxlength="255"  class="form-control" id="numero-pessoa" name="numero-pessoa" placeholder="Digite uma número de residência." pattern="[0-9]+$">
        </div>
        <div class="form-group">
          <label>Bairro:</label>
          <input type="text" maxlength="255"  class="form-control" id="bairro-pessoa" name="bairro-pessoa" placeholder="Digite um bairro">
        </div>
        <div class="form-group">
          <label>Cidade:</label>
          <input type="text" maxlength="255" class="form-control" id="cidade-pessoa" name="cidade-pessoa" placeholder="Digite uma cidade.">
        </div>
        <div class="form-group">
          <label>Complemento:</label>
          <input type="text" maxlength="255"  class="form-control" id="complemento-pessoa" name="complemento-pessoa" placeholder="Digite um complemento.">
        </div>
        <input type="hidden" class="form-control" id="usuario_id" name="usuario_id" value="<?php echo $idUsuario[0]; ?>" readonly required/>
    </div>
  </div>
  <div class="d-flex align-items-center justify-content-center w-100">
    <button type="submit" class="btn btn-lg btn-primary align-self-center m-1" id="cadastrarPessoa">
      <b>Cadastrar</b>
    </button>
  </div>
  <div class="d-flex align-items-center justify-content-center w-100 m-1 alert alert-dismissible fade show" role="alert" id="statusCadastraPessoa">&nbsp;</div>
</form>