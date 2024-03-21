document.addEventListener('DOMContentLoaded', function () {
  // Adicione as máscaras aos campos de input
  $('#cpf').inputmask('999.999.999-99');
  $('#celular').inputmask('(99) 9 9999-9999');
  $('#nascimento').inputmask('99/99/9999');

});
