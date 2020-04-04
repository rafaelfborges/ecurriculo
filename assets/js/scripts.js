// Main scripts
$(document).ready(function () {
  listarCadastros();
  cadastrarPessoa();
  editarCadastro();
  adicionarCurriculo();
  cadastrarSolicitacao();
  listarCurriculos();
  editarCurriculo();
  cadastrarExperiencia();
  editarExperiencia();
  listarSolicitacoes();
  editarSolicitacao();
  preencherCep();
  reloadPage();
  mascarasInputForm();
  validaCampoNome();
});

// Cadastro - Listar Cadastros (Datatables)
function listarCadastros() {
  var pesquisaCadastro = $('#pesquisaCadastro').DataTable({
    "ajax": {
      "url": "src/cadastro/include/GetCadastroPessoa.php",
      "dataSrc": ""
    },
    "columns": [
      { "data": "pessoa_id" },
      { "data": "nome" },
      { "data": "telefone1" },
      { "data": "cep" },
      { "data": "endereco" },
      { "data": "bairro" },
      { "data": "usuario" },
      { "data": "datacadastro" },
      { "data": "acoes" }
    ],
    "responsive": true,
    "order": [[0, "desc"]],
    "language": {
      "url": "assets/locales/Portuguese-Brasil.json",
    }
  });

  $('#userSearch').on('click', function () {
    if ($(this).is(':checked')) {
      pesquisaCadastro
        .columns(6)
        .search(this.value)
        .draw();
    } else {
      pesquisaCadastro
        .columns(6)
        .search("")
        .draw();
    }
  });
}

// Cadastro - Cadastrar Pessoa (Formulário)
function cadastrarPessoa() {
  jQuery('#formCadastraPessoa').submit(function () {
    var dados = jQuery(this).serialize();
    $.ajax({
      url: 'src/cadastro/include/CadastraPessoa.php',
      cache: false,
      data: dados,
      type: "POST",
      success: function (msg) {
        var warn = $("#statusCadastraPessoa").hasClass("alert-warning");
        var succ = $("#statusCadastraPessoa").hasClass("alert-success");
        var dang = $("#statusCadastraPessoa").hasClass("alert-danger");
        if (warn == true || succ == true || dang == true) {
          $("#statusCadastraPessoa").removeClass("alert-danger alert-warning alert-success");
          $("#statusCadastraPessoa").empty().append("&nbsp;");
        }
        if (msg == -1) {
          var mensagem = "Erro Banco de Dados! Entre em contato com o Administrador."
          $("#statusCadastraPessoa").addClass("alert-danger");
          $("#statusCadastraPessoa").append(mensagem);
        } else if (msg == 0) {
          var mensagem = "Cadastrado com sucesso! Disponível em Cadastro Geral."
          $("#statusCadastraPessoa").addClass("alert-success");
          $("#statusCadastraPessoa").append(mensagem);
        } else {
          var mensagem = "Pessoa já existe! Verifique em Cadastro Geral."
          $("#statusCadastraPessoa").addClass("alert-warning");
          $("#statusCadastraPessoa").append(mensagem);
        }
      }
    })
    event.preventDefault();
    $('#formCadastraPessoa').each(function () {
      this.reset();
    });
    function disableAlert() {
      var warn = $("#statusCadastraPessoa").hasClass("alert-warning");
      var succ = $("#statusCadastraPessoa").hasClass("alert-success");
      var dang = $("#statusCadastraPessoa").hasClass("alert-danger");

      if (warn == true || succ == true || dang == true) {
        $("#statusCadastraPessoa").removeClass("alert-danger alert-warning alert-success");
        $("#statusCadastraPessoa").empty().append("&nbsp;");
      }
    }
    window.setTimeout(disableAlert, 10000);
  });
}

// Cadastro - Editar Pessoa (Formulário)
function editarCadastro() {
  $('#editarPessoa').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('pessoa')
    $.ajax({
      url: 'src/cadastro/include/GetCadastroUsuario.php',
      type: 'get',
      data: 'pessoaId=' + id,
      dataType: 'JSON',
      success: function (response) {
        var len = response.length;
        for (var i = 0; i < len; i++) {
          var nome = response[i].nome;
          var datanasc = response[i].datanasc;
          var rg = response[i].rg;
          var telefone1 = response[i].telefone1;
          var telefone2 = response[i].telefone2;
          var email = response[i].email;
          var cep = response[i].cep;
          var endereco = response[i].endereco;
          var numero = response[i].numero;
          var complemento = response[i].complemento;
          var bairro = response[i].bairro;
          var cidade = response[i].cidade;
          $("#formEditaPessoa").find('#id-pessoa').attr("value", id);
          $("#formEditaPessoa").find('#nome-pessoa').attr("value", nome);
          $("#formEditaPessoa").find('#datanasc-pessoa').attr("value", datanasc);
          $("#formEditaPessoa").find('#rg-pessoa').attr("value", rg);
          $("#formEditaPessoa").find('#tel1-pessoa').attr("value", telefone1);
          $("#formEditaPessoa").find('#tel2-pessoa').attr("value", telefone2);
          $("#formEditaPessoa").find('#email-pessoa').attr("value", email);
          $("#formEditaPessoa").find('#cep-pessoa').attr("value", cep);
          $("#formEditaPessoa").find('#endereco-pessoa').attr("value", endereco);
          $("#formEditaPessoa").find('#numero-pessoa').attr("value", numero);
          $("#formEditaPessoa").find('#complemento-pessoa').attr("value", complemento);
          $("#formEditaPessoa").find('#bairro-pessoa').attr("value", bairro);
          $("#formEditaPessoa").find('#cidade-pessoa').attr("value", cidade);
        }
      }
    });
  })
  //Salva os dados
  jQuery('#formEditaPessoa').submit(function () {
    var dados = jQuery(this).serialize();
    $.ajax({
      url: 'src/cadastro/include/EditarPessoa.php',
      cache: false,
      data: dados,
      type: "POST",
      success: function (msg) {
        var warn = $("#statusEditaPessoa").hasClass("alert-warning");
        var succ = $("#statusEditaPessoa").hasClass("alert-success");
        var dang = $("#statusEditaPessoa").hasClass("alert-danger");
        if (warn == true || succ == true || dang == true) {
          $("#statusEditaPessoa").removeClass("alert-danger alert-warning alert-success");
          $("#statusEditaPessoa").empty().append("&nbsp;");
        }
        if (msg == -1) {
          var mensagem = "Erro Banco de Dados! Entre em contato com o Administrador."
          $("#statusEditaPessoa").addClass("alert-danger");
          $("#statusEditaPessoa").append(mensagem);
        } else {
          var mensagem = "Atualizado com sucesso!"
          $("#statusEditaPessoa").addClass("alert-success");
          $("#statusEditaPessoa").append(mensagem);
        }
      }
    })
    event.preventDefault();
    $("#botaoEditaPessoa").prop('disabled', true);
    function disableButton() {
      $("#botaoEditaPessoa").prop('disabled', false);
    }
    window.setTimeout(disableButton, 5000);

    function disableAlert() {
      var warn = $("#statusEditaPessoa").hasClass("alert-warning");
      var succ = $("#statusEditaPessoa").hasClass("alert-success");
      var dang = $("#statusEditaPessoa").hasClass("alert-danger");

      if (warn == true || succ == true || dang == true) {
        $("#statusEditaPessoa").removeClass("alert-danger alert-warning alert-success");
        $("#statusEditaPessoa").empty().append("&nbsp;");
      }
    }
    window.setTimeout(disableAlert, 5000);
  });
}

// Pesquisa Cadastro - Modal cadastra curriculo
function adicionarCurriculo() {
  $('#cadastrarCurriculo').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('pessoa')
    $("#formCadastrarCurriculo").find('#id-pessoa').attr("value", id);
  })
  //Adiciona Curriculo se não tiver
  jQuery('#formCadastrarCurriculo').submit(function () {
    var dados = jQuery(this).serialize();
    $.ajax({
      url: 'src/cadastro/include/AddCurriculoPessoa.php',
      cache: false,
      data: dados,
      type: "POST",
      success: function (msg) {
        var warn = $("#statusCadastrarCurriculo").hasClass("alert-warning");
        var succ = $("#statusCadastrarCurriculo").hasClass("alert-success");
        var dang = $("#statusCadastrarCurriculo").hasClass("alert-danger");
        if (warn == true || succ == true || dang == true) {
          $("#statusCadastrarCurriculo").removeClass("alert-danger alert-warning alert-success");
          $("#statusCadastrarCurriculo").empty().append("&nbsp;");
        }
        if (msg == -1) {
          var mensagem = "Erro Banco de Dados! Entre em contato com o Administrador."
          $("#statusCadastrarCurriculo").addClass("alert-danger");
          $("#statusCadastrarCurriculo").append(mensagem);
        } else if (msg == 0) {
          var mensagem = "Cadastrado currículo com sucesso! Procure em Currículos."
          $("#statusCadastrarCurriculo").addClass("alert-success");
          $("#statusCadastrarCurriculo").append(mensagem);
        } else {
          var mensagem = "Existe currículo para este pessoa! Procure em Currículos."
          $("#statusCadastrarCurriculo").addClass("alert-warning");
          $("#statusCadastrarCurriculo").append(mensagem);
        }
      }
    })
    event.preventDefault();
    $("#botaoCadastrarCurriculo").prop('disabled', true);
    function disableButton() {
      $("#botaoCadastrarCurriculo").prop('disabled', false);
    }
    window.setTimeout(disableButton, 5000);

    function disableAlert() {
      var warn = $("#statusCadastrarCurriculo").hasClass("alert-warning");
      var succ = $("#statusCadastrarCurriculo").hasClass("alert-success");
      var dang = $("#statusCadastrarCurriculo").hasClass("alert-danger");

      if (warn == true || succ == true || dang == true) {
        $("#statusCadastrarCurriculo").removeClass("alert-danger alert-warning alert-success");
        $("#statusCadastrarCurriculo").empty().append("&nbsp;");
      }
    }
    window.setTimeout(disableAlert, 5000);
  });
}

// Pesquisa Cadastro - Modal cadastra solicitação
function cadastrarSolicitacao() {
  $('#cadastrarSolicitacao').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('pessoa')
    $("#formCadastrarSolicitacao").find('#id-pessoa').attr("value", id);
  })
  //Cadastra Solicitacao do Pessoa
  jQuery('#formCadastrarSolicitacao').submit(function () {
    var dados = jQuery(this).serialize();
    $.ajax({
      url: 'src/cadastro/include/CadastraSolicitacao.php',
      cache: false,
      data: dados,
      type: "POST",
      success: function (msg) {
        var warn = $("#statusCadastrarSolicitacao").hasClass("alert-warning");
        var succ = $("#statusCadastrarSolicitacao").hasClass("alert-success");
        var dang = $("#statusCadastrarSolicitacao").hasClass("alert-danger");
        if (warn == true || succ == true || dang == true) {
          $("#statusCadastrarSolicitacao").removeClass("alert-danger alert-warning alert-success");
          $("#statusCadastrarSolicitacao").empty().append("&nbsp;");
        }
        if (msg == -1) {
          var mensagem = "Erro Banco de Dados! Entre em contato com o Administrador."
          $("#statusCadastrarSolicitacao").addClass("alert-danger");
          $("#statusCadastrarSolicitacao").append(mensagem);
        } else {
          var mensagem = "Cadastrado solicitação com sucesso! Procure em Solicitações."
          $("#statusCadastrarSolicitacao").addClass("alert-success");
          $("#statusCadastrarSolicitacao").append(mensagem);
        }
      }
    })
    event.preventDefault();
    $("#botaoCadastrarSolicitacao").prop('disabled', true);
    function disableButton() {
      $("#botaoCadastrarSolicitacao").prop('disabled', false);
    }
    window.setTimeout(disableButton, 5000);

    function disableAlert() {
      var warn = $("#statusCadastrarSolicitacao").hasClass("alert-warning");
      var succ = $("#statusCadastrarSolicitacao").hasClass("alert-success");
      var dang = $("#statusCadastrarSolicitacao").hasClass("alert-danger");

      if (warn == true || succ == true || dang == true) {
        $("#statusCadastrarSolicitacao").removeClass("alert-danger alert-warning alert-success");
        $("#statusCadastrarSolicitacao").empty().append("&nbsp;");
      }
    }
    window.setTimeout(disableAlert, 5000);
  });
}

// Curriculo - Listar Curriculos (Datatables)
function listarCurriculos() {
  var pesquisaCurriculo = $('#curriculoPesquisa').DataTable({
    "ajax": {
      "url": "src/curriculo/include/GetCadastroCurriculos.php",
      "dataSrc": ""
    },
    "columns": [
      { "data": "curriculo_id" },
      { "data": "pessoa_id" },
      { "data": "exp" },
      { "data": "cargopretendido" },
      { "data": "datacurriculo" },
      { "data": "usuario" },
      { "data": "acoes" }
    ],
    "responsive": true,
    "order": [[0, "desc"]],
    "language": {
      "url": "assets/locales/Portuguese-Brasil.json",
    }
  });

  $('#userSearch').on('click', function () {
    if ($(this).is(':checked')) {
      pesquisaCurriculo
        .columns(4)
        .search(this.value)
        .draw();
    } else {
      pesquisaCurriculo
        .columns(4)
        .search("")
        .draw();
    }
  });
}

// Curriculo - Modal edita info
function editarCurriculo() {
  //Retorna os dados pro modal
  $('#editarInfos').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('curriculo')
    $.ajax({
      url: 'src/curriculo/include/GetCurriculoInfo.php',
      type: 'get',
      data: 'curriculoId=' + id,
      dataType: 'JSON',
      success: function (response) {
        var len = response.length;
        for (var i = 0; i < len; i++) {
          var estadocivil = response[i].estadocivil;
          var cargopretendido = response[i].cargopretendido;
          var escolaridade = response[i].escolaridade;
          var cursos = response[i].cursos;
          var observacoes = response[i].observacoes;
          var objetivos = response[i].objetivos;
          $("#formEditarInfos").find('#id-curriculo').attr("value", id);
          if (estadocivil == "solteiro") {
            $("#formEditarInfos").find('option[value="solteiro"]').prop('selected', true);
          } else if (estadocivil == "casado") {
            $("#formEditarInfos").find('option[value="casado"]').prop('selected', true);
          } else if (estadocivil == "divorciado") {
            $("#formEditarInfos").find('option[value="divorciado"]').prop('selected', true);
          } else if (estadocivil == "viuvo") {
            $("#formEditarInfos").find('option[value="viuvo"]').prop('selected', true);
          } else if (estadocivil == "separado") {
            $("#formEditarInfos").find('option[value="separado"]').prop('selected', true);
          } else if (estadocivil == "companheiro") {
            $("#formEditarInfos").find('option[value="companheiro"]').prop('selected', true);
          } else {
            $("#formEditarInfos").find('option[value="selecione"]').prop('selected', true);
          }
          $("#formEditarInfos").find('#cargopretendido').text(cargopretendido);
          if (escolaridade == 1) {
            $("#formEditarInfos").find('option[value="1"]').prop('selected', true);
          } else if (escolaridade == 2) {
            $("#formEditarInfos").find('option[value="2"]').prop('selected', true);
          } else if (escolaridade == 3) {
            $("#formEditarInfos").find('option[value="3"]').prop('selected', true);
          } else if (escolaridade == 4) {
            $("#formEditarInfos").find('option[value="4"]').prop('selected', true);
          } else if (escolaridade == 5) {
            $("#formEditarInfos").find('option[value="5"]').prop('selected', true);
          } else if (escolaridade == 6) {
            $("#formEditarInfos").find('option[value="6"]').prop('selected', true);
          } else {
            $("#formEditarInfos").find('option[value="0"]').prop('selected', true);
          }
          $("#formEditarInfos").find('#cursos').text(cursos);
          $("#formEditarInfos").find('#observacoes').text(observacoes);
          $("#formEditarInfos").find('#objetivos').text(objetivos);
        }
      }
    });
  })
  //Salva os dados
  jQuery('#formEditarInfos').submit(function () {
    var dados = jQuery(this).serialize();
    $.ajax({
      url: 'src/curriculo/include/EditaCurriculoInfo.php',
      cache: false,
      data: dados,
      type: "POST",
      success: function (msg) {
        var warn = $("#statusEditarInfos").hasClass("alert-warning");
        var succ = $("#statusEditarInfos").hasClass("alert-success");
        var dang = $("#statusEditarInfos").hasClass("alert-danger");
        if (warn == true || succ == true || dang == true) {
          $("#statusEditarInfos").removeClass("alert-danger alert-warning alert-success");
          $("#statusEditarInfos").empty().append("&nbsp;");
        }
        if (msg == -1) {
          var mensagem = "Erro Banco de Dados! Entre em contato com o Administrador."
          $("#statusEditarInfos").addClass("alert-danger");
          $("#statusEditarInfos").append(mensagem);
        } else {
          var mensagem = "Informações do currículo atualizadas com sucesso."
          $("#statusEditarInfos").addClass("alert-success");
          $("#statusEditarInfos").append(mensagem);
        }
      }
    })
    event.preventDefault();
    $("#botaoEditarInfos").prop('disabled', true);
    function disableButton() {
      $("#botaoEditarInfos").prop('disabled', false);
    }
    window.setTimeout(disableButton, 5000);

    function disableAlert() {
      var warn = $("#statusEditarInfos").hasClass("alert-warning");
      var succ = $("#statusEditarInfos").hasClass("alert-success");
      var dang = $("#statusEditarInfos").hasClass("alert-danger");

      if (warn == true || succ == true || dang == true) {
        $("#statusEditarInfos").removeClass("alert-danger alert-warning alert-success");
        $("#statusEditarInfos").empty().append("&nbsp;");
      }
    }
    window.setTimeout(disableAlert, 5000);
  });
}

// Curriculo - Modal cadastra experiencia
function cadastrarExperiencia() {
  //Retorna o ID pro input
  $('#cadastrarExperiencia').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('curriculo')
    $("#formCadastrarExperiencia").find('#id-curriculo').attr("value", id);
  })
  //Cadastra Solicitacao do Pessoa
  jQuery('#formCadastrarExperiencia').submit(function () {
    var dados = jQuery(this).serialize();
    $.ajax({
      url: 'src/curriculo/include/CadastraExperiencia.php',
      cache: false,
      data: dados,
      type: "POST",
      success: function (msg) {
        var warn = $("#statusCadastrarExperiencia").hasClass("alert-warning");
        var succ = $("#statusCadastrarExperiencia").hasClass("alert-success");
        var dang = $("#statusCadastrarExperiencia").hasClass("alert-danger");
        if (warn == true || succ == true || dang == true) {
          $("#statusCadastrarExperiencia").removeClass("alert-danger alert-warning alert-success");
          $("#statusCadastrarExperiencia").empty().append("&nbsp;");
        }
        if (msg == -1) {
          var mensagem = "Erro Banco de Dados! Entre em contato com o Administrador."
          $("#statusCadastrarExperiencia").addClass("alert-danger");
          $("#statusCadastrarExperiencia").append(mensagem);
        } else if (msg == 1) {
          var mensagem = "Período Inicial não pode ser igual ao Final ou Periodo Final menor que o Inicial."
          $("#statusCadastrarExperiencia").addClass("alert-warning");
          $("#statusCadastrarExperiencia").append(mensagem);
        } else {
          var mensagem = "Experiência cadastrado com sucesso!"
          $("#statusCadastrarExperiencia").addClass("alert-success");
          $("#statusCadastrarExperiencia").append(mensagem);
        }
      }
    })
    event.preventDefault();
    $("#botaoCadastrarExperiencia").prop('disabled', true);
    function disableButton() {
      $("#botaoCadastrarExperiencia").prop('disabled', false);
    }
    window.setTimeout(disableButton, 5000);

    function disableAlert() {
      var warn = $("#statusCadastrarExperiencia").hasClass("alert-warning");
      var succ = $("#statusCadastrarExperiencia").hasClass("alert-success");
      var dang = $("#statusCadastrarExperiencia").hasClass("alert-danger");

      if (warn == true || succ == true || dang == true) {
        $("#statusCadastrarExperiencia").removeClass("alert-danger alert-warning alert-success");
        $("#statusCadastrarExperiencia").empty().append("&nbsp;");
      }
    }
    window.setTimeout(disableAlert, 5000);
  });
}

// Curriculo - Modal edita experiencia
function editarExperiencia() {
  //Retorna dados pro modal
  $('#modalExperiencia').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('curriculo')
    //Lista as experiências com Datatables
    $('#pesquisaExperiencia').DataTable({
      "ajax": {
        "url": "src/curriculo/include/GetCurriculoExperiencia.php?curriculo-id=" + id,
        "dataSrc": ""
      },
      "columns": [
        { "data": "experiencia_id" },
        { "data": "empresa" },
        { "data": "cargo" },
        { "data": "periodo" },
        { "data": "acoes" }
      ],
      "responsive": true,
      "order": [[0, "desc"]],
      "language": {
        "url": "assets/locales/Portuguese-Brasil.json",
      }
    });
  })
  // Retorna dados pro modal
  $('#deletarExperiencia').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('experiencia')
    $("#formDeletarExperiencia").find('#id-experiencia').attr("value", id);
  })
  // Envia edição
  jQuery('#formDeletarExperiencia').submit(function () {
    var dados = jQuery(this).serialize();
    $.ajax({
      url: 'src/curriculo/include/DeletarCurriculoExperiencia.php',
      cache: false,
      data: dados,
      type: "POST",
      success: function (msg) {
        var warn = $("#statusDeletaExperiencia").hasClass("alert-warning");
        var succ = $("#statusDeletaExperiencia").hasClass("alert-success");
        var dang = $("#statusDeletaExperiencia").hasClass("alert-danger");
        if (warn == true || succ == true || dang == true) {
          $("#statusDeletaExperiencia").removeClass("alert-danger alert-warning alert-success");
          $("#statusDeletaExperiencia").empty().append("&nbsp;");
        }
        if (msg == -1) {
          var mensagem = "Erro Banco de Dados! Entre em contato com o Administrador."
          $("#statusDeletaExperiencia").addClass("alert-danger");
          $("#statusDeletaExperiencia").append(mensagem);
        } else {
          var mensagem = "Experiência deletada com sucesso!"
          $("#statusDeletaExperiencia").addClass("alert-success");
          $("#statusDeletaExperiencia").append(mensagem);
        }
      }
    })
    event.preventDefault();
    $("#botaoDeletaExperiencia").prop('disabled', true);
    function disableButton() {
      $("#botaoDeletaExperiencia").prop('disabled', false);
    }
    window.setTimeout(disableButton, 5000);

    function disableAlert() {
      var warn = $("#statusDeletaExperiencia").hasClass("alert-warning");
      var succ = $("#statusDeletaExperiencia").hasClass("alert-success");
      var dang = $("#statusDeletaExperiencia").hasClass("alert-danger");

      if (warn == true || succ == true || dang == true) {
        $("#statusDeletaExperiencia").removeClass("alert-danger alert-warning alert-success");
        $("#statusDeletaExperiencia").empty().append("&nbsp;");
      }
    }
    window.setTimeout(disableAlert, 5000);
    $('#pesquisaExperiencia').DataTable().ajax.reload();
  });
}

// Solicitacao - Listar Solicitações (DataTables)
function listarSolicitacoes() {
  var pesquisaSolicitacao = $('#pesquisaSolicitacao').DataTable({
    "ajax": {
      "url": "src/solicitacao/include/GetCadastroSolicitacoes.php",
      "dataSrc": ""
    },
    "columns": [
      { "data": "solicitacao_id" },
      { "data": "pessoa_id" },
      { "data": "tiposolicitacao" },
      { "data": "status" },
      { "data": "datasolicitacao" },
      { "data": "usuario" },
      { "data": "acoes" }
    ],
    "responsive": true,
    "order": [[0, "desc"]],
    "language": {
      "url": "assets/locales/Portuguese-Brasil.json",
    }
  });

  $('#userSearch').on('click', function () {
    if ($(this).is(':checked')) {
      pesquisaSolicitacao
        .columns(5)
        .search(this.value)
        .draw();
    } else {
      pesquisaSolicitacao
        .columns(5)
        .search("")
        .draw();
    }
  });
}

// Solicitacao - Modal edita solicitacao
function editarSolicitacao() {
  //Retorna os dados pro modal
  $('#editarSolicitacao').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('solicitacao')
    $.ajax({
      url: 'src/solicitacao/include/GetSolicitacao.php',
      type: 'get',
      data: 'solicitacaoId=' + id,
      dataType: 'JSON',
      success: function (response) {
        var len = response.length;
        for (var i = 0; i < len; i++) {
          var pessoa = response[i].pessoa;
          var tiposolicitacao = response[i].tiposolicitacao;
          var solicitacao = response[i].solicitacao;
          var andamento = response[i].andamento;
          var status = response[i].status;

          $("#formEditaSolicitacao").find('#id-solicitacao').attr("value", id);
          $("#formEditaSolicitacao").find('#pessoa').attr("value", pessoa);
          $("#formEditaSolicitacao").find('#tipo-solicitacao').attr("value", tiposolicitacao);
          $("#formEditaSolicitacao").find('#solicitacao').text(solicitacao);
          $("#formEditaSolicitacao").find('#andamento').text(andamento);
          $("#formEditaSolicitacao").find('#status').attr("value", status);
          if (status == 0) {
            $("#formEditaSolicitacao").find('option[value="0"]').prop('selected', true);
          } else {
            $("#formEditaSolicitacao").find('option[value="1"]').prop('selected', true);
          }
        }
      }
    });
  })
  //Salva os dados
  jQuery('#formEditaSolicitacao').submit(function () {
    var dados = jQuery(this).serialize();
    $.ajax({
      url: 'src/solicitacao/include/EditarSolicitacao.php',
      cache: false,
      data: dados,
      type: "POST",
      success: function (msg) {
        var warn = $("#statusEditaSolicitacao").hasClass("alert-warning");
        var succ = $("#statusEditaSolicitacao").hasClass("alert-success");
        var dang = $("#statusEditaSolicitacao").hasClass("alert-danger");
        if (warn == true || succ == true || dang == true) {
          $("#statusEditaSolicitacao").removeClass("alert-danger alert-warning alert-success");
          $("#statusEditaSolicitacao").empty().append("&nbsp;");
        }
        if (msg == -1) {
          var mensagem = "Erro Banco de Dados! Entre em contato com o Administrador"
          $("#statusEditaSolicitacao").addClass("alert-danger");
          $("#statusEditaSolicitacao").append(mensagem);
        } else {
          var mensagem = "Atualizado com sucesso!"
          $("#statusEditaSolicitacao").addClass("alert-success");
          $("#statusEditaSolicitacao").append(mensagem);
        }
      }
    })
    event.preventDefault();
    $("#botaoEditaSolicitacao").prop('disabled', true);
    function disableButton() {
      $("#botaoEditaSolicitacao").prop('disabled', false);
    }
    window.setTimeout(disableButton, 5000);

    function disableAlert() {
      var warn = $("#statusEditaSolicitacao").hasClass("alert-warning");
      var succ = $("#statusEditaSolicitacao").hasClass("alert-success");
      var dang = $("#statusEditaSolicitacao").hasClass("alert-danger");

      if (warn == true || succ == true || dang == true) {
        $("#statusEditaSolicitacao").removeClass("alert-danger alert-warning alert-success");
        $("#statusEditaSolicitacao").empty().append("&nbsp;");
      }
    }
    window.setTimeout(disableAlert, 5000);
  });
}

// Webservice preencher CEP
function preencherCep() {
  function limpa_formulário_cep() {
    // Limpa valores do formulário de cep.
    $("#cidade-pessoa").val("");
    $("#endereco-pessoa").val("");
    $("#bairro-pessoa").val("");
  }
  //Quando o campo cep perde o foco.      
  $("#cep-pessoa").blur(function () {
    //Nova variável "cep" somente com dígitos.
    var cep = $(this).val().replace(/\D/g, '');
    //Verifica se campo cep possui valor informado.
    if (cep != "") {
      //Expressão regular para validar o CEP. 
      var validacep = /^[0-9]{8}$/;
      //Valida o formato do CEP.   
      if (validacep.test(cep)) {
        //Preenche os campos com "..." enquanto consulta webservice.
        $("#cidade-pessoa").val("...");
        $("#endereco-pessoa").val("...");
        $("#bairro-pessoa").val("...");
        //Consulta o webservice viacep.com.br
        $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
          if (!("erro" in dados)) {
            //Atualiza os campos com os valores da consulta.        
            $("#cidade-pessoa").val(dados.localidade);
            $("#endereco-pessoa").val(dados.logradouro);
            $("#bairro-pessoa").val(dados.bairro);
          } else {
            //CEP pesquisado não foi encontrado.   
            limpa_formulário_cep();
            alert("CEP não encontrado.");
          }
        });
      } else {
        //cep é inválido.          
        limpa_formulário_cep();
        alert("Formato de CEP inválido.");
      }
    } else {
      //cep sem valor, limpa formulário.  
      limpa_formulário_cep();
    }
  });
}

// Recarrega page ao fechar quaquer modal
function reloadPage() {
  $("#btnFecharEditarPessoa").click(function () {
    location.reload(true);
  });
  $("#btnFecharCadastrarCurriculo").click(function () {
    location.reload(true);
  });
  $("#btnFecharCadastrarSolicitacao").click(function () {
    location.reload(true);
  });
  $("#btnFecharEditarSolicitacao").click(function () {
    location.reload(true);
  });
  $("#btnFecharCadastrarExperiencia").click(function () {
    location.reload(true);
  });
  $("#btnFecharEditarInfos").click(function () {
    location.reload(true);
  });
  $("#btnFecharModalExperiencia").click(function () {
    location.reload(true);
  });
}

// Mascaras dos formulários
function mascarasInputForm() {
  //Mascara Telefone
  var maskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00)00000-0000' : '(00)0000-00009';
  },
    options = {
      onKeyPress: function (val, e, field, options) {
        field.mask(maskBehavior.apply({}, arguments), options);
      }
    };
  $('#tel1-pessoa').mask(maskBehavior, options);
  $('#tel2-pessoa').mask(maskBehavior, options);

  //Mascaras Gerais
  $('#datanasc-pessoa').mask('00/00/0000');
  $('#periodo-inicial').mask('00/00/0000');
  $('#periodo-final').mask('00/00/0000');
  $('#cep-pessoa').mask('00000-000');
}

// Válida campo Nome
function validaCampoNome() {
  $("#nome-pessoa").blur(function () {
    const regex = /^([A-Z\u00C0-\u00D6\u00D8-\u00DE])([a-z\u00DF-\u00F6\u00F8-\u00FF '&-]+) ([A-Za-z\u00C0-\u00D6\u00D8-\u00DE\u00DF-\u00F6\u00F8-\u00FF '&-]+)$/m;
    const str = $(this).val();
    let m;
    if ((m = regex.exec(str)) !== null) {
      $('#nome-pessoa').get(0).setCustomValidity("");
    } else {
      $('#nome-pessoa').get(0).setCustomValidity("Preencha o campo nome corretamente, exemplo: Rafael Fernando Borges");
    }
  });
}