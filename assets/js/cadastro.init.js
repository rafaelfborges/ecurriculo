console.log("Antes");

$(function () {
  $('#atualizaPessoa').modal({
    keyboard: true,
    backdrop: "static",
    show: false,
  }).on('show.bs.modal', function (event) {
    var targetTd = $(event.relatedTarget);
    var getIdFromRow = $(targetTd).data('pessoa-id');
    console.log(getIdFromRow);
  });
});