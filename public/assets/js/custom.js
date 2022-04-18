  //array que pega os item selecionados
  var array_itens = [];
  var itens = [];
$(document).ready(function(){
    mostrar_precario();
    initialize_fatura();

    //imprimir acessos
  $('#imprimir_acessos').submit(function(e){
    e.preventDefault();
    var url = $(this).attr('action');
    var data = $('#campo_busca').val();
    window.open(url+'?campo_busca='+data);
  });
//salvando o caixa
$('#salvar_caixa').submit(function(e){
  e.preventDefault();
  //pegando todos dados do form
  var $dados = $(this).serialize();
  var $url = $(this).attr('action');
 
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
        url: $url,
        type: 'POST',
        dataType: 'json',
        data: $dados,
        success: function(response){
        if(response.sms !== undefined){
          $('#modal_confirmacao').modal('show');
          $('.modal-body > .modal-text').html('<em class="fa fa-lg fa-check-circle text-success" id="alert">&nbsp;</em> '+'<span class="text-dark">'+response.sms+'</span>');
          $('#lista_meu_caixa').load(window.location.href + " #lista_meu_caixa");
          $('#reports_caixa').load(window.location.href + " #reports_caixa");
        }
        else{
           $('#modal_confirmacao').modal('show');
            $('.modal-body > .modal-text').html('<em class="fa fa-lg fa-times text-danger" id="alert">&nbsp;</em> '+'<span class="text-dark">'+response.error+'</span>');
            
        }
        },
        error: function(response){
          $('#modal_confirmacao').modal('show');
            $('.modal-body > .modal-text').html('<em class="fa fa-lg fa-times text-danger" id="alert">&nbsp;</em>'+'<span class="text-dark"> Não foi possível realizar esta acção!</span>');
          
        },
        complete: function(){
          $('form button[type=reset]').click();
          $('.modalMeu_caixa').modal('hide');
        }
      });
});
//imprimir folha de caixa
$('#imprimir_caixa').submit(function(e){
  e.preventDefault();
  var $data_de = $('#data_de').val(), $data_ate = $('#data_ate').val();
  var $url = '/dashboard/imprimir_folha_caixa/'+$data_de+'/'+$data_ate;
  var aba_imprimir = window.open($url);
});
//imprimir Historico de Venda
$('#imprimir_venda').submit(function(e){
  e.preventDefault();
  var $data_saida = $('#campo_busca').val();
  var $url = '/dashboard/saida/imprimir_venda/'+$data_saida;
  var aba_imprimir = window.open($url);
});
$('#imprimir_hist_servico').submit(function(e){
  e.preventDefault();
  var $data_saida = $('#campo_busca').val();
  var $url = '/dashboard/saida/imprimir_hist_servico/'+$data_saida;
  var aba_imprimir = window.open($url);
});
    //function para add produto a lista
$('#add_item_fatura').submit(function(e){
  e.preventDefault();
  var $id_produto  = $('#prod_codigo').val();
  if(array_itens.indexOf($id_produto)>=0){
     $('#modal_confirmacao').modal('show');
     $('.modal-body > .modal-text').html('<em class="fa fa-lg fa-info-circle text-danger" id="alert">&nbsp;</em>'+'<span class="text-dark">O Produto selecionado, já foi alistado!</span>');
     //break;
  }else{
    array_itens.push($id_produto);
    var $html = "";
    
    var $preco = numeral ($('#valor_venda').val()).format('0,0.00');

    var $total = numeral ($('#total_venda').val()).format('0,0.00');

    $html += '<tr><td class="text-left">'+$('#prod_codigo').val()+'</td>';
    $html += '<td class="text-left">'+$('#nome_produto').val()+'</td>'+
    '<td>'+$('#qtd_vendido').val()+'</td>'+
    '<td>'+$preco+'</td>'+
    '<td>'+$total+'</td>'+
    '<td class="d-none">'+$('#prod_estoque').val()+'</td>'+
    '<td> <button class="close" onclick="remover_item($(this)); " type="button">'+
    '<span aria-hidden="true" class="text-danger" >×</span>'+
    '</button></td>'+
    '</tr>';
  
  $('#linha_itens').append($html);
  total_fatura();
  }
    //option to enable btns
    $('#btn_cancelar_fatura').attr('disabled',false);
    $('#btn_store_fatura').attr('disabled',false);
    $('#add_fatura').attr('disabled',false);
    $('#imprimir_f').addClass('disabled');
      
    //$('form button[type=reset]').click();
    //$('#modal_venda').attr('disabled',false);
  });
  //salvando todos Pedidos na DB
$('#btn_store_fatura').click(function(e){
  e.preventDefault();
  
  itens.length = 0;//limpa todos registros
  //lista de index
  var indeces = ['id','produto','qtd','valor','total','qtd_estoque'];
  //array itens
  
  //controladora da tabela
  var html = $('#lista_item_produtos tbody tr');
  $(html).each(function(index){
    var obj = {};
    //percorrendo cada item
    $(this).find('td').each(function(index){
      obj[indeces[index]] = $(this).text().replace(',','');
    });
  //adicionar itens ao array
    itens.push(obj);
  });
  //salvando os itens na BD
  //console.log(itens)
  //store_fatura_list(itens);
  $('#total_pago').text($('#total_fatura').text());
  $('#valor_pago').val('0,0');
  calculadora();

  
  $('#modal_pagamento').modal('show');
  //$('form button[type=reset]').click();

  });
//fim
  $('#form_pagamento').submit(function(e){
    e.preventDefault();
    store_fatura_list(itens);
  });
});

function mostrar_precario(){
  var count = 1000; var $html = null;
  while(count<=500000){//vai ate 500.000,00 AO
    
    $html = '<option value="'+count+'">Akz</option>';
    $('#precario').append($html);//show this value
    count+=500;//increment

  }
}

//initialize_item
function initialize_fatura(){
  $('#prod_codigo').val(0);
  //$('#').val(0);
  $('#valor_pago').val('');
  $('#fatura_preco').val('0.00');
  $('#fatura_qtd').val(1);
  $('#fatura_desconto').val(0);
  $('#fatura_total').val('0.00');
  $('#linha_faturas').empty();
  //zerar todo array
  array_itens.length = 0;
  itens.length = 0;
  $('#linha_itens').empty();
  $('#add_fatura').attr('disabled',true);
  $('#btn_store_fatura').attr('disabled',true);
  $('#btn_cancelar_fatura').attr('disabled',true);
  $('#imprimir_f').addClass('disabled');
  // modal pagamento
  $('#valor_troco').text("0.00");
  $('#valor_pago').text("0.00");
  $('#valor_total').text("0.00");
  $('#valor_troco').text("0.00");
  $('.div-troco').removeClass('btn-success');
  $('.div-troco').addClass('btn-danger');
  $('.div-troco').removeClass('opacity');
  $('#btn_confirmar').attr('disabled',true);
  $('form button[type=reset]').click();
  //$('#modal_venda').attr('disabled',true);
   //esconder o modal pagto
   $('#modal_pagamento').modal('hide');
 
}

//calc o total da fatura
function total_fatura(){
  //pega a linha mae
  var lista_total = $('#lista_item_produtos tbody tr');
  var total_venda = 0;
  //pegando os totais por linha
  $(lista_total).find('td:eq(4)').each(function(index){
    total_venda+=parseFloat($(this).text().replace(',',''));
    //console.log(total_venda);
  });
  
  var $total_pago = numeral (total_venda);
  var $total = $total_pago.format('0,0.00');
  $('#total_fatura').text($total);
  if($('#total_fatura').text() == '0.00'){
    //desativar os btn somente se total=0
    $('#btn_cancelar_fatura').attr('disabled',true);
    $('#btn_store_fatura').attr('disabled',true);
    $('#imprimir_f').addClass('disabled');
  }else{
    //ativar os btn se o total > 0
    $('#btn_cancelar_fatura').attr('disabled',false);
    $('#btn_store_fatura').attr('disabled',false);
    $('#imprimir_f').addClass('disabled');
  }
  
}

//funcao para remover produto da lista
function remover_item(e){
  //pega a linha mae
  var linha = $(e).closest('tr');
  //var nome = linha.find('td:eq(0)').text().trim();
  var confirmar =confirm('Pretendes Remover este Item da Lista de Pedidos?');
  if(!confirmar){ return false;}
  else{
    //eliminar linha inteira
    linha.remove();
    //calc o total da fatura apos a remocao dos itens da lista
    var $indice = array_itens.indexOf(linha.find('td:eq(0)').text());
    if($indice>=0){
      array_itens.splice($indice,1);
    }
    //console.log(array_itens);
    total_fatura();
    
    return false;
  }
  
}
//function para remover todos produto da lista
function remover_todos_itens(){
  var confirmar =confirm('Pretendes cancelar todos Pedidos?'); 
  if(!confirmar){ return false;}
  else{$('#linha_itens').empty();
   array_itens.length = 0;
   //console.log(array_itens);
   total_fatura();
   initialize_fatura();
   return false;
  } 
}

// funcao para salvar as solicitacoes
function store_fatura_list(lista){
  //function principal de venda
  var $total = $('#total_fatura').text().replace(',','');
  var $percent = parseInt($('#desconto').val());
  //$total = $total.replace('.00','');

    var $pago = $('#valor_pago').val();
    $falta_pagar = parseFloat($total-$pago);

    if(!(isNaN($pago)) && (parseFloat($pago) >= parseFloat($total))){
    
      var confirmar =confirm('Guardar e Imprimir a Fatura/Recibo?'); 
      if(confirmar){
      $('#modal_pagamento').modal('hide');
      var $cliente = $('#nome_cliente').val(), $codigo_s = $('#codigo_s').val();
      var $forma_pagto = $('#forma_pagto').val();  
      //window.location.href = "saida/store?itens="+lista+"&nome_cliente="+$cliente+"&codigo_s="+$codigo_s;
      $.post('saida/store', {'itens':lista,'nome_cliente':$cliente,'codigo_s':$codigo_s,'forma_pagto':$forma_pagto}, function(response){
        //confirmacao positiva
        if(response.sms !== undefined){
          
          $('#modal_confirmacao').modal('show');
          $('.modal-body > .modal-text').html('<em class="fa fa-lg fa-check-circle text-success" id="alert">&nbsp;</em> '+'<span class="text-dark">'+response.sms+'</span>');
          initialize_fatura();
          total_fatura();
    
        var $cliente_nome = response.cliente;//novo nome em funcao da ordem de imprensao...
        var $codigoSaida = response.codigo_s;
        var $url_fatura_r = 'saida/imprimir_fatura/'+$codigoSaida+'/'+$cliente_nome+'/'+Number($pago).toFixed(0);
          $('#imprimir_f').attr('href',$url_fatura_r);
          $('#imprimir_f').removeClass('disabled');
          
          var $codigo = parseInt($('#codigo_s').val());
          $('#codigo_s').val($codigo+1);
          $id_produtoSaida = $codigo+1;
        }else{
          //confirmacao negativa
          $('#modal_confirmacao').modal('show');
          $('.modal-body > .modal-text').html('<em class="fa fa-lg fa-times text-danger" id="alert">&nbsp;</em> '+'<span class="text-dark">'+response.error+'</span>');
          //$('#sms_venda').empty();
          $('#codigo_s').val($id_produtoSaida);
        }
        
        });
      }else{
        return false;
       // $('#codigo_s').val($id_produtoSaida);
      }
    }else{
      alert("Valor Recebido muito Inferior ao Total do Pedido! Falta receber do cliente "+numeral($falta_pagar).format('0,0.00')+" Akz");
       $('#codigo_s').val($id_produtoSaida);
    }
}
//calcular o total, troco e quanto falta pagar
function calculadora(){
  var $pago = $('#valor_pago').val();
  var $total = $('#total_fatura').text().replace(',','');
  if(!(isNaN($pago)) && (parseFloat($pago) >= parseFloat($total))){
    $troco = parseFloat($pago - $total);
    $troco = numeral ($troco).format('0,0.00');
    $('#valor_troco').text($troco);
    $('#text_troco').text('Troco ');
    $total = numeral ($pago).format('0,0.00');
    $('#valor_total').text($total);
    $('#btn_confirmar').attr('disabled',false);
    $('.div-troco').addClass('opacity');
    $('.div-troco').removeClass('btn-danger');
    $('#valor_sms').empty().removeClass('text-danger');
    $('.div-troco').addClass('btn-success');
  }else{
    $falta_pagar = parseFloat($total-$pago);
    if($falta_pagar>=0){
      $('#btn_confirmar').attr('disabled',false);
    }else{
    $('#btn_confirmar').attr('disabled',true);
    $falta_pagar = $total;
    }

    $total = numeral ($pago).format('0,0.00');
    $falta_pagar = numeral($falta_pagar).format('0,0.00');
    $('#valor_total').text($total);
    $('#valor_troco').text($falta_pagar);
    $('#text_troco').text('Falta Pagar ');
    $('.div-troco').removeClass('btn-success');
    $('.div-troco').addClass('btn-danger');
    $('.div-troco').removeClass('opacity');
    $('#valor_sms').text("Falta receber do cliente "+$falta_pagar).addClass('text-danger');
    $('#btn_confirmar').attr('disabled',false);
  }
}
/*
function calculadora(){
  var $pago = $('#valor_pago').val();
  var $total = $('#total_fatura').text().replace(',','');

  if(!(isNaN($pago)) && (parseFloat($pago) >= parseFloat($total))){
    $troco = parseFloat($pago - $total);
    $troco = numeral ($troco).format('0,0.00');
    $('#valor_troco').text($troco);
    $total = numeral ($pago).format('0,0.00');
    $('#valor_total').text($total);
    $('#btn_confirmar').attr('disabled',false);
    $('.div-troco').addClass('opacity');
    $('#valor_sms').empty().removeClass('text-danger');
    $('.div-troco').removeClass('btn-danger');
    $('.div-troco').addClass('btn-success');
  }else{
    $total = numeral ($pago).format('0,0.00');
    $('#valor_total').text($total);
    $('#valor_troco').text("Saldo fraco");
    $('.div-troco').removeClass('btn-success');
    $('.div-troco').addClass('btn-danger');
    $('.div-troco').removeClass('opacity');  
    $('#valor_sms').text("Valor recebido muito inferior...").addClass('text-danger');
    $('#btn_confirmar').attr('disabled',true);
  }
}
*/
//listagem dos Produtos em Estoque
function lista_produtoModal($url){
  $('#lista_produtoModal .modal-body').html('<iframe src="'+$url+'" frameborder="0" width="100%" height="500" id="janela"></iframe>');
  $('#lista_produtoModal').modal('show');
}

//funcao para desabilitar os campos
function desabilitar_entrada($campo){
  if($campo == 'entrada')
  {
    $('#valor_s').val(0);
    $('#credito').val(0);
    $('#valor_s').attr('readonly', true);
    $('#credito').attr('readonly', true);
    //activando os campos
    $('#valor_e').attr('readonly', false);
    $('#debito').attr('readonly', false);

  }
  
  else if($campo == 'saida')
  {
    $('#valor_e').val(0);
    $('#debito').val(0);
    $('#valor_e').attr('readonly', true);
    $('#debito').attr('readonly', true);

    $('#valor_s').attr('readonly', false);
    $('#credito').attr('readonly', false);

  }

}

//funcoes de notificacao
    
function disparar_notificacao(titulo,sms){
  
  var audio = ' <audio id="notify_audios" autoplay>'+
  '<source src="../audio/notify.wav" type="audio/wav">'+
  '</audio>';
  if(Notification.permission === 'granted')
{
  $('#notify_audio').html(audio);
  mostrar_notificacao(titulo,sms);
}
else if(Notification.permission !== 'denied'){
  Notification.requestPermission().then(permission=>{
     if(permission === 'granted'){
      $('#notify_audio').html(audio);
      mostrar_notificacao(titulo,sms);
     
     }
  });
}
//$('#notify_audio').empty();
}

//function para gerar sound notification
function mostrar_notificacao(titulo,sms){
      
  const notification = new Notification(titulo,{
    body: sms,
    icon: '../img/logo/logo_branco.png',
    //sound: '../assets/audio/notify.wav'
  });
 
}

//imprimir report viagem
function mostrar_print_viagem($id){
  //pdf
  $url_pdf = $('#campo_export_pdf').val();
  $('#viagem_print_pdf').attr('href', $url_pdf+'?id='+$id);
  //excell
  $url_excell = $('#campo_export_excell').val();
  $('#viagem_print_excell').attr('href', $url_excell+'?id='+$id);
  //csv
  $url_csv = $('#campo_export_csv').val();
  $('#viagem_print_csv').attr('href', $url_csv+'?id='+$id);

  $('#modal_print').modal('show');
}