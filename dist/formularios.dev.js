"use strict";

$(function () {
  $('body').on('submit', 'form', function () {
    var form = $(this);
    $.ajax({
      URL: include_path + 'ajax/formularios.php',
      method: 'post',
      dataType: 'json',
      data: form.serialize()
    }).done(function (data) {
      console.log(data.retorno);
    });
    return false;
  });
});