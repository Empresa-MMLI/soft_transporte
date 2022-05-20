@extends ('layouts.app_cliente')
@section('html_title','SLA Dashboard | Bilhetes emitidos')
<!--Call of template welcome-->
@section('content')
<!--Section to show content to yield -->

<h1 class="h3 mb-3"><strong>Bilhetes » </strong> Bilhetes emitidos » Comprovativos » Facturação</h1>

<div class="row">
    <div class="d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-12"><!--  -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                            <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form" aria-selected="true"><i class="fa fa-edit text-muted"></i> Novos Bilhetes</a>
    <a class="nav-item nav-link" id="nav-reservados-tab" data-toggle="tab" href="#reservados" role="tab" aria-controls="embarque" aria-selected="false"><i class="fa fa-cart-plus text-muted"></i> Reservados</a>
    <a class="nav-item nav-link" id="nav-vendidos-tab" data-toggle="tab" href="#vendidos" role="tab" aria-controls="embarque" aria-selected="false"><i class="fa fa-check-circle text-muted"></i> Bilhetes vendidos</a>
    <a class="nav-item nav-link" id="nav-report-tab" data-toggle="tab" href="#report" role="tab" aria-controls="desembarque" aria-selected="false"><i class="fa fa-line-chart text-muted"></i> Estatítiscas</a>
  </div>
</nav>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab">
  <div class="row">
                                <h2 class="my-4"><i class="fa fa-edit text-muted"></i> Confirmar compras de Bilhetes</h2>
                                <hr>
 <!-- tabela de bilhetes comprados --> 

 <div class="container">
                               <div class="table-responsive">
 @include('inc.messages') 
                               <table id="dataTables" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th class="text-center">Cliente</th>
                <th>Rota</th>
                <th>Ponto Levant.</th>
                <th>Data Viagem</th>
                <th>Classe</th>
                <th>Passageiro(s)</th>
                <th>Total Pago</th>
                <th>Comprovativo</th>
                <th>Data compra</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($bilhete_novos[0]->id))
            @foreach($bilhete_novos as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td class="text-left"><a href="#" class="btn btn-light p-0 m-0" data-toggle="tooltip" data-placement="top" title="Detalhes do cliente..."  cliente="{{ $item->cliente }}" bi_cliente="{{ $item->n_doc }}" telef_cliente="{{ $item->telefone }}" onclick="event.preventDefault(); $('#cliente').text($(this).attr('cliente')); $('#bi_cliente').text($(this).attr('bi_cliente')); $('#telef_cliente').text($(this).attr('telef_cliente')); $('#modalCliente').modal('show');"><i class="fa fa-sm fa-info-circle text-muted"></i></a> {{ $item->cliente }}</td>
                <td>{{ $item->rota_origem }} - {{ $item->rota_destino }}</td>
                <td>{{ $item->ponto_e }}</td>
                <td class="text-center">{{ date('d/m/Y H:i', strtotime($item->data_partida)) }}</td>
                <td class="text-uppercase">{{ $item->classe }}</td>
                <td class="text-center">{{ $item->total_passageiro }}</td>
                <td>{{ number_format($item->preco*$item->total_passageiro,2,',','.') }} Kz</td> 
                <td>
                @if(isset($item->comprovativo_file) && $item->forma_pagto == 'ATM')	
                <a href="{{ asset('storage/'.$item->comprovativo_file) }}" target="_blank" class="btn btn-warning btn-sm mb-1 btn-block text-dark" data-toggle="tooltip" data-placement="bottom" title="Mostrar comprovativo" onclick="event.preventDefault(); $('#comprovativo').attr('src', $(this).attr('href')); $('#modalComprovativo').modal('show');"><i class="fa fa-file-pdf"></i> Comprovativo</a>
                @else
                @if($item->forma_pagto == 'REF')
                <a href="#" class="btn btn-warning btn-sm btn-block mb-1 text-dark" data-toggle="tooltip" data-placement="bottom" title="Detalhes do Pagamento..." id-bi="{{ $item->id }}" onclick=" $('id_bi').val($(this).attr('id-bi')); $('#modalReferencia').modal('show');"><i class="fa fa-credit-card"></i> Referência</a>
                @else
                @if($item->forma_pagto == 'PD')
                <a href="#" class="btn btn-warning btn-sm mb-1 btn-block text-dark" data-toggle="tooltip" data-placement="bottom" title="Nenhum arquivo anexado" onclick=" alert('Nenhum arquivo anexado')"><i class="fa fa-money"></i> Pagto à Cash</a>
                @endif
                @endif
                @endif    
                </td>
                <td class="text-center">{{ date('d/m/Y', strtotime($item->data_compra)) }}</td>
                <td class="text-left">
		        <a href="#" class="btn btn-success btn-sm mb-1" data-toggle="tooltip" data-placement="bottom" title="Confirmar compra de Bilhete" nome_cliente="{{ $item->cliente }}" id_cliente="{{ $item->id_cliente }}" nome_rota="{{ $item->rota_origem }} - {{ $item->rota_destino }}" id_bilhete="{{ $item->id }}" onclick="event.preventDefault(); $('#origem_bilhete').val('bi'); $('#id_cliente').val($(this).attr('id_cliente')); $('#nome_cliente').val($(this).attr('nome_cliente')); $('#nome_rota').val($(this).attr('nome_rota')); $('#id_bilhete').val($(this).attr('id_bilhete'));  $('#modalConfirmacao').modal('show');"><i class="fa fa-check" ></i></a>
                <a href="" class="btn btn-danger btn-sm mb-1" onclick=" return confirm('Pretendes excluir Ponto?');" data-toggle="tooltip" data-placement="right" title="Cancelar compra Bilhete..."><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        </table>
                               <!-- fim tabela de bilhetes comprados --> 
                            </div>
                        </div>
                        </div>
                        </div>


  <div class="tab-pane fade" id="reservados" role="tabpanel" aria-labelledby="reservados-tab">    
  <div class="row">
                            <h3 class="my-4"> <i class="fa fa-list text-muted"></i>   Lista de Bilhetes reservados</h3>
                            <hr>
                               <!-- tabela de provincias --> 
                               <div class="container">
                               <div class="table-responsive">
                               <table class="display nowrap dataTables" style="width:100%">
                               <thead>
            <tr>
                <th>ID</th>
                <th class="text-left">Cliente</th>
                <th>Rota</th>
                <th>Ponto Levant.</th>
                <th>Data viagem</th>
                <th>Classe</th>
                <th>Passageiro(s)</th>
                <th>Total Pago</th>
                <th>Estado</th>
                <th>Data compra</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($bi_reservados[0]->id))
            @foreach($bi_reservados as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td class="text-left"><a href="#" class="btn btn-light p-0 m-0" data-toggle="tooltip" data-placement="top" title="Detalhes do cliente..."  cliente="{{ $item->cliente }}" bi_cliente="{{ $item->n_doc }}" telef_cliente="{{ $item->telefone }}" onclick="event.preventDefault(); $('#cliente').text($(this).attr('cliente')); $('#bi_cliente').text($(this).attr('bi_cliente')); $('#telef_cliente').text($(this).attr('telef_cliente')); $('#modalCliente').modal('show');"><i class="fa fa-sm fa-info-circle text-muted"></i></a> {{ $item->cliente }}</td>
                <td>{{ $item->rota_origem }} - {{ $item->rota_destino }}</td>
                <td>{{ $item->ponto_e }}</td>
                <td class="text-center">{{ date('d/m/Y H:i', strtotime($item->data_partida)) }}</td>
                <td class="text-uppercase">{{ $item->classe }}</td> 
                <td class="text-center">{{ $item->total_passageiro }}</td>
                <td>{{ number_format($item->preco*$item->total_passageiro,2,',','.') }} Kz</td>   
                <td>
                    <span class="alert alert-success p-1" data-toggle="tooltip" data-placement="top" title="Recebido {{ number_format($item->preco*$item->total_passageiro,2,',','.') }} kz"> <i class="fa fa-check-circle"></i> Pago</span>
                </td>
                <td class="text-center">{{ date('d/m/Y', strtotime($item->data_compra)) }}</td>
              
                <td class="text-center">
                <a href="#" class="btn btn-success btn-sm mb-1" data-toggle="tooltip" data-placement="bottom" title="Confirmar compra de Bilhete" nome_cliente="{{ $item->cliente }}" id_cliente="{{ $item->id_cliente }}" nome_rota="{{ $item->rota_origem }} - {{ $item->rota_destino }}" id_bilhete="{{ $item->id }}" onclick="event.preventDefault(); $('#origem_bilhete').val('res'); $('#id_cliente').val($(this).attr('id_cliente')); $('#nome_cliente').val($(this).attr('nome_cliente')); $('#nome_rota').val($(this).attr('nome_rota')); $('#id_bilhete').val($(this).attr('id_bilhete'));  $('#modalConfirmacao').modal('show');"><i class="fa fa-check" ></i></a>
                <a href="" class="btn btn-danger btn-sm mb-1" onclick=" return confirm('Pretendes excluir Ponto?');" data-toggle="tooltip" data-placement="right" title="Cancelar Bilhete..."><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        </table>
                               <!-- fim tabela de provincias --> 
                            </div>
                            </div>
                            </div>
                            <!-- fim tabela pontos de Desembarques --> 
                        
  </div>
  <div class="tab-pane fade" id="vendidos" role="tabpanel" aria-labelledby="vendidos-tab">
                            <div class="row">
                            <h3 class="my-4"> <i class="fa fa-list text-muted"></i>   Lista de Bilhetes comprados</h3>
                            <hr>
                               <!-- tabela de provincias --> 
                               <div class="container">
                               <div class="table-responsive">
                               <table id="dataTables" class="display nowrap" style="width:100%">
                               <thead>
            <tr>
                <th>ID</th>
                <th>Nº Bilhete</th>
                <th class="text-left">Cliente</th>
                <th>Rota</th>
                <th>Ponto Levant.</th>
                <th>Data viagem</th>
                <th>Passageiro(s)</th>
                <th>Classe</th>
                <th>Total Pago</th>
                <th>Estado</th>
                <th class="text-center">Comprovativo</th>
                <th>Data compra</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($bilhete_ativos[0]->id))
            @foreach($bilhete_ativos as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->n_bilhete }}</td>
                <td class="text-left"><a href="#" class="btn btn-light p-0 m-0" data-toggle="tooltip" data-placement="top" title="Detalhes do cliente..."  cliente="{{ $item->cliente }}" bi_cliente="{{ $item->n_doc }}" telef_cliente="{{ $item->telefone }}" onclick="event.preventDefault(); $('#cliente').text($(this).attr('cliente')); $('#bi_cliente').text($(this).attr('bi_cliente')); $('#telef_cliente').text($(this).attr('telef_cliente')); $('#modalCliente').modal('show');"><i class="fa fa-sm fa-info-circle text-muted"></i></a> {{ $item->cliente }}</td>
                <td>{{ $item->rota_origem }} - {{ $item->rota_destino }}</td>
                <td>{{ $item->ponto_e }}</td>
                <td class="text-center">{{ date('d/m/Y H:i', strtotime($item->data_partida)) }}</td>
                <td class="text-center">{{ $item->total_passageiro }}</td>
                <td class="text-uppercase">{{ $item->classe }}</td>
                <td>{{ number_format($item->preco*$item->total_passageiro,2,',','.') }} Kz</td>
               
                <td>
                    <span class="alert alert-success p-1" data-toggle="tooltip" data-placement="top" title="Recebido {{ number_format($item->preco*$item->total_passageiro,2,',','.') }} kz"> <i class="fa fa-check-circle"></i> Pago</span>
                </td>
                <td>
                @if(isset($item->comprovativo_file) && $item->forma_pagto == 'ATM')	
                <a href="{{ asset('storage/'.$item->comprovativo_file) }}" target="_blank" class="btn btn-warning btn-sm mb-1 btn-block text-dark" data-toggle="tooltip" data-placement="bottom" title="Mostrar comprovativo" onclick="event.preventDefault(); $('#comprovativo').attr('src', $(this).attr('href')); $('#modalComprovativo').modal('show');"><i class="fa fa-file-pdf"></i> Comprovativo</a>
                @else
                @if($item->forma_pagto == 'REF')
                <a href="#" class="btn btn-warning btn-sm btn-block mb-1 text-dark" data-toggle="tooltip" data-placement="bottom" title="Detalhes do Pagamento..." id-bi="{{ $item->id }}" onclick=" $('id_bi').val($(this).attr('id-bi')); $('#modalReferencia').modal('show');"><i class="fa fa-credit-card"></i> Referência</a>
                @else
                @if($item->forma_pagto == 'PD')
                <a href="#" class="btn btn-warning btn-sm mb-1 btn-block text-dark" data-toggle="tooltip" data-placement="bottom" title="Nenhum arquivo anexado" onclick=" alert('Nenhum arquivo anexado')"><i class="fa fa-money"></i> Pagto à Cash</a>
                @endif
                @endif
                @endif    
                </td>
                <td class="text-center">{{ date('d/m/Y', strtotime($item->data_compra)) }}</td>
                
                <td class="text-center">
		        <a href="" class="btn btn-danger btn-sm mb-1" onclick=" return confirm('Pretendes excluir Ponto?');" data-toggle="tooltip" data-placement="right" title="Cancelar Bilhete..."><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        </table>
                               <!-- fim tabela de provincias --> 
                            </div>
                            </div>
                            </div>
                            <!-- fim tabela pontos de Desembarques --> 
                        </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalComprovativo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header bg-header-modal">
        <h5 class="modal-title text-light text-center" id="exampleModalLabel">Comprovativo anexado</h5>
        <button type="button" class="btn close" data-dismiss="modal" aria-label="Close" style="font-size:12px">
          <span class="text-white" aria-hidden="true">X</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="embed-responsives embed-responsive-16by9s">
  <iframe class="embed-responsive-item" id="comprovativo" src="#" width="100%" height="500" ></iframe>
</div>
      </div>
     
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalConfirmacao" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-header-modal">
        <h5 class="modal-title text-light" id="confirmModalLabel">Confirmar compra de Bilhete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-light">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{ route('bilhete.validacao') }}">
                                    @csrf
                            <div class="row mb-2">
                            <div class="col-12">
                                <label for="id_provincia">Cliente:</label>
                                <input  type="text" class="form-control text-capitalize" name="nome_cliente" id="nome_cliente" placeholder="Nome cliente" required>
                                <input type="hidden" class="form-control" name="id_cliente" id="id_cliente" placeholder="ID cliente" required>
                            </div></div>
                            <div class="row mb-2">
                            <div class="col-12">
                            <label for="nome_rota">Rota:</label>
                                <input type="text" class="form-control text-capitalize" name="nome_rota" id="nome_rota" placeholder="Rota" required>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                <label for="n_bilhete">Nº Bilhete de Viagem:</label>
                                <input type="hidden" class="form-control" id="id_bilhete" name="id_bilhete" placeholder="ID de Bilhete" required>
                                <input type="hidden" class="form-control" id="origem_bilhete" name="origem_bilhete" value="bi" placeholder="Origem Bilhete" required>
                                <input type="text" class="form-control" id="n_bilhete" name="n_bilhete" placeholder="Nº de Bilhete de viagem" required>
  
                                </div>
                            </div>
                            <div class="row my-2">
                              <div class="col-12" id="spinner" style="display:none">
                              <button class="btn btn-secondarys btn-sm text-info text-capitalize" type="button" disabled>
                              <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
  Validando detalhes do Bilhete de Viagem comprado...
</button>
                              </div>
                              
                                <div class="col-12">
                                <button type="submit" class="btn btn-submit float-right" onclick=" var n_bi = $('#n_bilhete').val(); if(n_bi != null){ $('#spinner').fadeIn(); }"> <i class="fa fa-check"></i> Confirmar</button>
                                </div>
                            </div>
                            </form>
      </div>
     
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-header-modal">
        <h5 class="modal-title text-light" id="confirmModalLabel">Detalhes do Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-light">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
              <h5>Nome completo: <span id="cliente" class="text-muted"></span> </h5>
              <h5>Nº Documento: <span id="bi_cliente" class="text-muted"></span> </h5>
              <h5>Telefone: <span id="telef_cliente" class="text-muted"></span> </h5>
          </div>
        </div>
      </div>
     
    </div>
  </div>
</div>

	
        <!-- Modal -->
        <div class="modal fade" id="modalReferencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header bg-header-modal">
        <h5 class="modal-title text-light text-center" id="exampleModalLabel">Pagamento por Referência</h5>
        <button type="button" class="btn close" data-dismiss="modal" aria-label="Close" style="font-size:12px">
          <span class="text-white" aria-hidden="true">X</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row my-2 mx-1 alert alert-info p-1">
          <span class="p-2 text-dark"><i class="fa fa-info-circle"></i> Abaixo temos as coordenadas do Pagamento</span>
          </div>
          <form>
  <div class="form-group">
    <label for="entidade_ref">Entidade</label>
    <input type="text" class="form-control" id="entidade_ref" placeholder="Entidade" readonly>
  </div>
  <div class="form-group">
    <label for="referencia_pagto">Referência</label>
    <input type="text" class="form-control" id="referencia_pagto" placeholder="Referência" readonly>
  </div>
  <div class="form-group">
    <label for="valor_ref">Valor</label>
    <input type="text" class="form-control" id="valor_ref" placeholder="Valor" readonly>
  </div>
  
  
</form>
      </div>
     
    </div>
  </div>
</div>
@endsection