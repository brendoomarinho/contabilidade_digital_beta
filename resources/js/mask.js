$(document).ready(function(){
  $('#cpf').mask('000.000.000-00');
  $('#telefone').mask('(00) 00000-0000');
  $('#cnpj').mask('00.000.000/0000-00'); // Adiciona a máscara para CNPJ
  $('#valor').mask('000.000,00', { reverse: true }); // Corrige a máscara para valor em dinheiro
});

function UpperCase(elemento) {
  elemento.value = elemento.value.toUpperCase();
}

function formatarText(input) {

  let texto = input.value.charAt(0).toUpperCase() + input.value.slice(1).toLowerCase();
  
  let palavras = texto.split(' ');
  
  for (let i = 1; i < palavras.length; i++) {
      palavras[i] = palavras[i].charAt(0).toLowerCase() + palavras[i].slice(1).toLowerCase();
  }

  texto = palavras.join(' ');

  input.value = texto;
}