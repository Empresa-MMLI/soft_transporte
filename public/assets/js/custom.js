 
$(document).ready(function(){
/*
  var divNome = document.querySelector("#xp__guests__inputs-container");
$(document).on("click", function(e) {
  var fora = divNome.contains(e.target);
  if (fora) $(divNome).css('display','none');
  console.log(fora ? 'Fora!' : 'Dentro!');
});*/
$('button.close').click(function(){
  $('.modal').modal('hide');
})
$('#xp__guests__inputs-container, #list_origem, #list_destino').on("mouseleave", function(e) {
$(this).css('display','nones');
});
  //pontos ou terminais de embarque
  $('#list_origem li').click(function(){
    $res = $(this).find('.search_hl_name').text();
    $('#origem').val($res);
    $('#list_origem, #list_destino, #xp__guests__inputs-container').css('display','none');
  });
  //pontos ou terminais de desembarque
  $('#list_destino li').click(function(){
    $res = $(this).find('.search_hl_name').text();
    $('#destino').val($res);
    $('#list_origem, #list_destino, #xp__guests__inputs-container').css('display','none');
  });
  //calculando o total de adultos
  //aumentar
  $('#btn_adult_asc').click(function(){
    $('#btn_adult_asc').attr('disabled',false);
    $('#btn_adult_desc').attr('disabled',false);
    var $qtd = parseInt($('#group_adults').val());
    
    if($qtd >= 30){
      $(this).attr('disabled',true);
      return false;
    }
    $('span').attr('data-adults-count',$qtd+1);
    $('span#adults-count').text(($qtd+1)+' adulto(s)');
    $('span#adults-qtd').text($qtd+1);
    
    $('#group_adults').val($qtd+1);
  
  });
  //diminuir
  $('#btn_adult_desc').click(function(){
    $('#btn_adult_asc').attr('disabled',false);
    $('#btn_adult_desc').attr('disabled',false);
    var $qtd = parseInt($('#group_adults').val());
    
    if($qtd <= 1){
      $(this).attr('disabled',true);
      return false;
    }
    $('span').attr('data-adults-count',$qtd+1);
    $('span#adults-count').text(($qtd-1)+' adulto(s)');
    $('span#adults-qtd').text($qtd-1);
    
    $('#group_adults').val($qtd-1);
  
  });
  //calculando o total de criancas
   //aumentar
   $('#btn_children_asc').click(function(){
    $('#btn_children_asc').attr('disabled',false);
    $('#btn_children_desc').attr('disabled',false);
    var $qtd = parseInt($('#group_childrens').val());
    
    if($qtd >= 50){
      $(this).attr('disabled',true);
      return false;
    }
    $('span').attr('data-childrens-count',$qtd+1);
    $('span#childrens-count').text(($qtd+1)+' criança(s)');
    $('span#childrens-qtd').text($qtd+1);
    
    $('#group_childrens').val($qtd+1);
  
  });
  //diminuir
  $('#btn_children_desc').click(function(){
    $('#btn_children_asc').attr('disabled',false);
    $('#btn_children_desc').attr('disabled',false);
    var $qtd = parseInt($('#group_childrens').val());
    
    if($qtd <= 0){
      $(this).attr('disabled',true);
      return false;
    }
    $('span').attr('data-childrens-count',$qtd+1);
    $('span#childrens-count').text(($qtd-1)+' criança(s)');
    $('span#childrens-qtd').text($qtd-1);
    
    $('#group_childrens').val($qtd-1);
  
  });
});

function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('mySearch');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
//criar conta
function criar_conta($value){
  if($value == 2)
  {
    $('#cliente_dados').fadeOut('fast');
    $('#empresa_dados').fadeIn();
  }else if($value == 3){
    $('#cliente_dados').fadeIn();
    $('#empresa_dados').fadeOut('fast');
  }
}
//selecionar conta
function selecionar_conta($value){
  if($value == 0)
  {
    $('#cliente_dados').fadeOut('fast');
    $('#nome_customer').fadeOut('fast');
    $('#n_documento').fadeIn('fast');
    $('#n_doc').val('');
  }else if($value == 1){
    $('#cliente_dados').fadeIn();
    $('#n_documento').fadeOut('fast');
    $('#nome_customer').fadeIn('fast');
    $('#n_doc').val('00');

  }
}
//escolher forma_pagto
function ativar_comprovativo($value){
  if($value == 'PD')
  {
    $('#comprovativo_url').removeAttr('required');
    $('#comprovativo_url').attr('disabled',true);
  }else if($value == 'REF'){
    $('#comprovativo_url').removeAttr('required');
    $('#comprovativo_url').attr('disabled',true);
    $custo = $('#custo_viagem').val();
    $('#valor_viagem').text($custo);
    $('#modalReferencia').modal('show');
  }else{
    $('#comprovativo_url').attr('required',true);
    $('#comprovativo_url').removeAttr('disabled');
  }
}