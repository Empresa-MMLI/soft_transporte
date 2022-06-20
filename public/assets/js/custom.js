 
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
  //validacao BI de viagem
  $('#form_validacao_bi').submit(function(e){
    e.preventDefault();
    $dados = $(this).serialize();
    $url  = $(this).attr('action');

    $.post($url, $dados, function(response){
      if(response.estado !== undefined){

        $('#modalConfirmacao').modal('hide');

        $('#modalOperacao span#text_sms').text(response.success);
        $('#modalOperacao #icon_sms').removeClass('fa-info-circle');
        $('#modalOperacao #icon_sms').removeClass('text-danger');

        $('#modalOperacao #icon_sms').addClass('fa-check-circle');
        $('#modalOperacao #icon_sms').addClass('text-success');
        $('#dataTables').load(window.location.href + " #dataTables");
        $('#dataTables1').load(window.location.href + " #dataTables1");
        $('#dataTables2').load(window.location.href + " #dataTables2");

        $('#modalOperacao').modal('show');
        $link_sms = $('#link_send_sms').attr('href');
        $dados = {'telef':response.telef,'sms':response.sms,'n_bilhete':response.n_bilhete,'destino':response.destino,'cliente_email':response.email};
        //console.log($link_sms);
        $.get($link_sms, $dados, function(data){
          if(data.estado !== undefined){
            console.log(data)
            console.log('Mensagem enviada com sucesso ao cliente referenciado...');
          }
          
          else
          console.log('Mensagem não enviada com sucesso ao cliente...');
        });

      }else{

        $('#modalConfirmacao').modal('hide');
        
        $('#modalOperacao span#text_sms').text(response.error);
        $('#modalOperacao #icon_sms').addClass('fa-info-circle');
        $('#modalOperacao #icon_sms').addClass('text-danger');
        $('#modalOperacao #icon_sms').removeClass('fa-check-circle');
        $('#modalOperacao #icon_sms').removeClass('text-success');

        $('#modalOperacao span#text_sms').text(response.error);
        $('#modalOperacao').modal('show');
      }
    });

  });
  //Validacao do aluguer do automovel

  $('#form_validacao_aluguer').submit(function(e){
    e.preventDefault();
    $dados = $(this).serialize();
    $url  = $(this).attr('action');

    $.post($url, $dados, function(response){
      if(response.estado !== undefined){

        $('#modalConfirmacao').modal('hide');

        $('#modalOperacao span#text_sms').text(response.success);
        $('#modalOperacao #icon_sms').removeClass('fa-info-circle');
        $('#modalOperacao #icon_sms').removeClass('text-danger');

        $('#modalOperacao #icon_sms').addClass('fa-check-circle');
        $('#modalOperacao #icon_sms').addClass('text-success');
        $('#dataTables').load(window.location.href + " #dataTables");
        $('#dataTables1').load(window.location.href + " #dataTables1");
        $('#dataTables2').load(window.location.href + " #dataTables2");

        $('#modalOperacao').modal('show');
        $link_sms = $('#link_send_sms').attr('href');
        $dados = {'telef':response.telef,'sms':response.sms,'n_aluguer':response.n_aluguer,'destino':response.destino,'cliente_email':response.email};
        //console.log($link_sms);
        $.get($link_sms, $dados, function(data){
          if(data.estado !== undefined){
           // console.log(data)
            console.log('Mensagem enviada com sucesso ao cliente referenciado...');
          }
          
          else
          console.log('Mensagem não enviada com sucesso ao cliente...');
        });

      }else{

        $('#modalConfirmacao').modal('hide');
        
        $('#modalOperacao span#text_sms').text(response.error);
        $('#modalOperacao #icon_sms').addClass('fa-info-circle');
        $('#modalOperacao #icon_sms').addClass('text-danger');
        $('#modalOperacao #icon_sms').removeClass('fa-check-circle');
        $('#modalOperacao #icon_sms').removeClass('text-success');

        $('#modalOperacao span#text_sms').text(response.error);
        $('#modalOperacao').modal('show');
      }
    });

  });

   //buscar_modelos
   $('#id_marca').change(function(){
    //processando a info
    $('#modal_carregamento').modal('show');
    $id_marca = $(this).val();
    $url = $('#url_modelos').attr('href');
    $('#id_modelo').empty();
    $.get($url,{'id_marca':$id_marca}, function(response){
        $(response.dados).each(function(index, item){
        $options = '<option value="'+item.id+'">'+item.modelo+'</option>';
        $('#id_modelo').append($options);
        });
    });

    setTimeout(function(){
        $('#modal_carregamento').modal('hide'); 
          },1000);
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
    $custo = $('#custo_viagem, #custo_veiculo').val();
    
    $('#valor_viagem, #valor_veiculo').text($custo);
    $('#modalReferencia').modal('show');
  }else{
    $('#comprovativo_url').attr('required',true);
    $('#comprovativo_url').removeAttr('disabled');
  }
}
//funcao para validar aluguer
function validarAluguer($this){
  $('#origem_aluguer').val('pedido');
  $('#id_cliente').val($($this).attr('id_cliente'));
  $('#nome_cliente').val($($this).attr('nome_cliente'));
  $('#veiculo').val($($this).attr('veiculo'));
  $qtd_carros = parseInt($($this).attr('qtd_carros'));
  $('#id_aluguer').val($($this).attr('id_aluguer'));
  $('#data_entrega').val($($this).attr('data_entrega'));
  
  $('#carros_alugados').empty();

  for(let i=1;i<=$qtd_carros;i++){
    if(i == 1)
    $('#carros_alugados').append('   <input type="text" class="form-control mb-1" name="matricula[]" id="matricula[]" placeholder="Informe nº da matrícula do Automóvel" required>');
    else
    $('#carros_alugados').append('   <input type="text" class="form-control mb-1" name="matricula[]" id="matricula[]" placeholder="Informe nº da matrícula do '+(i)+' º Automóvel" required>');
  }

  $('#modalConfirmacao').modal('show');
}
//filtro
function BilheteOrdenacao(){
  $url = $('#bilheteFiltro_ordem').attr('action');
  $dados = $('#ordenacao').val();
  //preenchimento da url
  $url = $url+'?ordem='+$dados;
  window.location.replace($url);    

}
