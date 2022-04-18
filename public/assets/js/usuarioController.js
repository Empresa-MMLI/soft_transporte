$(document).ready(function(){
  //register new usuarios
  $('#register_usuario').submit(function(e){
      e.preventDefault();
      //pegando todos dados do form
      var $url = $(this).attr('action');
      var $dados = $(this).serialize(), senha1 = $('#usuario_confirmar_senha').val(),
      senha2= $('#usuario_senha').val();
      //verificando se as senhas batem certo
      var retorno_confirmacao = verifiy_password(senha1, senha2);
      if(retorno_confirmacao == 1){
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
          //contentType: 'application/json',
          beforesend:function(){
            $('#loading').fadeIn();
            },
            success: function(response){
            if(response.sms !== undefined){
           
              $('#modal_confirmacao').modal('show');
              $('.modal-body > .modal-text').html('<em class="fa fa-lg fa-check-circle text-success" id="alert">&nbsp;</em> '+'<span class="text-dark">'+response.sms+'</span>');
              $('#lista_usuarios').load(window.location.href + " #lista_usuarios");
            }
            else{
                
                $('#modal_confirmacao').modal('show');
                $('.modal-body > .modal-text').html('<em class="fa fa-lg fa-info-circle text-danger" id="alert">&nbsp;</em>'+'<span class="text-dark">'+response.error+'</span>');
                $('#lista_usuarios').load(window.location.href + " #lista_usuarios");
         
            }
            },
            error: function(response){
             
                $('#modal_confirmacao').modal('show');
                $('.modal-body > .modal-text').html('<em class="fa fa-lg fa-info-circle text-danger" id="alert">&nbsp;</em>'+'<span class="text-dark"> Não foi possível adicionar este usuário!</span>');
                //console.log(response);
               
                // $('#lista_usuarios').load(window.location.href + " #lista_usuarios");
            },
            complete: function(){
              $('form button[type=reset]').click();
            $('#loading').fadeOut();
            }
        });
       }
  });
      //update usuario
      $('#update_usuario').submit(function(e){
        e.preventDefault();
        //pegando todos dados do form
        var $url = $(this).attr('action');
        var $dados = $(this).serialize();
        
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
            //contentType: 'application/json',
            beforesend:function(){
              $('#edit_loading').fadeIn();
              },
              success: function(response){
              if(response.sms !== undefined){
             
                $('#modal_confirmacao').modal('show');
                $('.modal-body > .modal-text').html('<em class="fa fa-lg fa-check-circle text-success" id="alert">&nbsp;</em> '+'<span class="text-dark">'+response.sms+'</span>');
                $('#lista_usuarios').load(window.location.href + " #lista_usuarios");
         
                
              }
              else{
                  
                  $('#modal_confirmacao').modal('show');
                  $('.modal-body > .modal-text').html('<em class="fa fa-lg fa-info-circle text-danger" id="alert">&nbsp;</em>'+'<span class="text-dark">'+response.error+'</span>');
                  $('#lista_usuarios').load(window.location.href + " #lista_usuarios");
           
              }
              },
              error: function(response){
               
                  $('#modal_confirmacao').modal('show');
                  $('.modal-body > .modal-text').html('<em class="fa fa-lg fa-info-circle text-danger" id="alert">&nbsp;</em>'+'<span class="text-dark"> Não foi possível adicionar este usuário!</span>');
                  $('#lista_usuarios').load(window.location.href + " #lista_usuarios");
              },
              complete: function(){
                $('.modalEditarUsuario').modal('hide');
              $('#edit_loading').fadeOut();
              }
          });
    });

// Funcao para procurar_usuario
$('#procurar_usuario').submit(function(e){
  e.preventDefault();
  var $input = $('#campo_busca').val();
  var $url = '/dashboard/procurar_usuario/'+$input;

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    url: $url,
    type: 'POST',
    dataType: 'json',
    //contentType: 'application/json',
    success: function(response){
    $('#lista_usuario_linhas').empty();
    tabela_usuario(response.dados);
    if(!(response.error === undefined)){
     // console.log(response.error);
      $('#modal_confirmacao').modal('show');
      $('.modal-body > .modal-text').html('<em class="fa fa-lg fa-info-circle text-danger" id="alert">&nbsp;</em>'+'<span class="text-dark">'+response.error+'</span>');
      
    }
    },
    error: function(){
        console.log('Falha a comunicar-se com o Servidor!');
    },
    complete: function(){
    $('[data-toggle="tooltip"]').tooltip();
    }
  });
  return false;
}); 

});

//verificacao
function verifiy_password(senha1,senha2){
if(senha1!=senha2){
    $('#usuario_confirmar_senha').focus().css({'border-color':'red'});
    $('#usuario_senha').focus().css({'border-color':'red'}); 
    $('.sms_confirmacao').removeClass('d-none');
    $('.sms_confirmacao').text('Senhas diferentes! Tente de novo...');
    return 0;
}else if(senha1.length < 6 || senha2.length < 6){
  $('#usuario_confirmar_senha').focus().css({'border-color':'red'});
  $('#usuario_senha').focus().css({'border-color':'red'}); 
  $('.sms_confirmacao').removeClass('d-none');
  $('.sms_confirmacao').text('Pelo menos 6 dígitos ******');
  return 0;
}
else{
    return 1;
}
}


// Table to show datas
function tabela_usuario(dados){
  var tabela_html = " ";
  $(dados).each(function(index, item){
    tabela_html = '<tr><td>'+ item.id +'</td>'+
    '<td>'+ item.nome +'</td>';
    tabela_html +='<td>'+item.usuario+'</td>'+
    '<td>'+ item.tipo +'</td>';
    if (item.estado == 1){
    tabela_html += '<td><button class="btn btn-success btn-sm opacity" data-toggle="tooltip" data-placement="top" title="A conta está Activada">Activada</button></td>';
    }
    else if (item.estado == 2){
    tabela_html += '<td><button class="btn btn-info btn-sm opacity" data-toggle="tooltip" data-placement="top" title="A conta está Bloqueada">Bloqueada</button></td>';
    }else if (item.estado == 3){
      tabela_html += '<td><button class="btn btn-danger btn-sm opacity" data-toggle="tooltip" data-placement="top" title="A conta está Desativada">Desativada</button></td>';
      }
    tabela_html += '<td class="text-center">'+
    '<a href="/dashboard/mostrar_usuario/'+item.id+'" class="btn btn-success btn-sm mb-1" onclick="event.preventDefault(); mostrar_usuario($(this).attr(\'href\'))"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Atualizar Informações do(a)'+item.nome+'"></i> Editar</a> '+
    '<a href="/dashboard/deletar_usuario/'+item.id+'" class="btn btn-danger btn-sm mb-1" onclick=" var confirmar =confirm(\'Pretendes remover este Hóspede do Sistema?\'); if(!confirmar){ return false;} "><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="Remover '+item.nome+'"></i> Remover</a>'+
    
  '</td>'+
    '</tr>';

    $('#lista_usuario_linhas').append(tabela_html);
  });
}

    //mostrar usuario afim de editar seus dados
    function mostrar_usuario(url){
      //e.preventDefault();
      
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
  
      $.ajax({
        url: url,
        method: 'GET',
        dataType: 'json',
        //contentType: 'application/json',
        success: function(response){
        var $codigo = response.detalhes.id, $usuario = response.detalhes.usuario, $entidade = response.detalhes.tipo, $estado = response.detalhes.estado;
        var $nome = response.detalhes.nome, $senha = response.detalhes.senha;
        var $novo_nome = $nome.split(' ');
        $('#id_usuario').val($codigo);
        $('#edit_usuario_nome').val($novo_nome[0]);
        $('#edit_usuario_sobrenome').val($novo_nome[1]);
        $('#edit_usuario').val($usuario);
        $('#senha_antiga').val($senha);
        $('#edit_usuario_tipo').val($entidade);
        $('#edit_usuario_estado').val($estado);
        $('#info_usuario').text($nome);
        $('.modalEditarUsuario').modal('show');
        },
        error: function(){
            console.log('Status: failed\n Não foi possível pegar os dados, Verifique o link!');
        }
      });
      return false;
    }