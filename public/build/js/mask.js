$(document).ready(function(){
  $('#cpf').mask('000.000.000-00');
  $('#telefone').mask('(00) 00000-0000');
  $('#cnpj').mask('00.000.000/0000-00'); // Adiciona a máscara para CNPJ
  $('#valor').mask('000.000,00', { reverse: true }); // Corrige a máscara para valor em dinheiro
});