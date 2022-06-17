@extends ('layouts.app')
@section('html_title','SLA Dashboard | Pedidos e Aluguer de carros')
<!--Call of template welcome-->
@section('content')
<!--Section to show content to yield -->

<h1 class="h3 mb-3"><strong>Automóveis » </strong> Pedidos » Alugueres</h1>

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
    <a class="nav-item nav-link active" id="nav-form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form" aria-selected="true"><i class="fa fa-edit text-muted"></i> Novos Pedidos</a>
    <a class="nav-item nav-link" id="nav-reservados-tab" data-toggle="tab" href="#reservados" role="tab" aria-controls="embarque" aria-selected="false"><i class="fa fa-cart-plus text-muted"></i> Carros Reservados</a>
    <a class="nav-item nav-link" id="nav-vendidos-tab" data-toggle="tab" href="#vendidos" role="tab" aria-controls="embarque" aria-selected="false"><i class="fa fa-check-circle text-muted"></i> Carros Alugados</a>
    <a class="nav-item nav-link" id="nav-report-tab" data-toggle="tab" href="#report" role="tab" aria-controls="desembarque" aria-selected="false"><i class="fa fa-line-chart text-muted"></i> Estatítiscas</a>
  </div>
</nav>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab">
  <div class="row">
                                <h2 class="my-4"><i class="fa fa-edit text-muted"></i> Confirmação de Aluguer de Automóveis</h2>
 <a href="{{ route('aluguer.send_sms') }}" id="link_send_sms" class="btn btn-submit d-none">Enviar sms</a>
                                <hr>
 <!-- tabela de pedido de aluguer --> 

 <div class="container">
                               <div class="table-responsive">
 @include('inc.messages') 
      <table  id="dataTables" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Pedido</th>
                <th class="text-center">Cliente</th>
                <th>Veículo</th>
                <th>Qtd. carros</th>
                <th>Local entrega</th>
                <th>Data Entrega</th>
                <th>Data Prev. Dev.</th>
                <th>Total pago(Akz)</th>
                <th>Comprovativo</th>
                <th>Data Aluguer</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($novos_pedidos[0]->id_aluguer))
            @foreach($novos_pedidos as $item)
            <tr>
                <td class="text-right">{{ $item->id_aluguer }}</td>
                <td class="text-right">{{ $item->pedido_id }}</td>
                <td class="text-left"><a href="#" class="btn btn-light p-0 m-0" data-toggle="tooltip" data-placement="top" title="Detalhes do cliente..."  cliente="{{ $item->nome_cliente }}" bi_cliente="{{ $item->n_doc }}" telef_cliente="{{ $item->telefone }}" email_cliente="{{ $item->email }}" endereco="{{ $item->endereco_cliente }}" onclick="event.preventDefault(); $('#cliente').text($(this).attr('cliente')); $('#bi_cliente').text($(this).attr('bi_cliente')); $('#telef_cliente').text($(this).attr('telef_cliente')); $('#email_cliente').text($(this).attr('email_cliente')); $('#endereco').text($(this).attr('endereco')); $('#modalCliente').modal('show');"><i class="fa fa-sm fa-info-circle text-muted"></i></a> {{ $item->nome_cliente }}</td>
                <td>{{ $item->marca }}  {{ $item->modelo }}</td>
                <td class="text-right">{{ $item->qtd_carros }}</td>
                <td>{{ $item->local_entrega }}</td>
                <td class="text-right">{{ date('d/m/Y', strtotime($item->data_entrega)) }}</td>
                <td class="text-right">{{ date('d/m/Y', strtotime($item->data_prev_devolucao)) }}</td>
                <td class="text-right">{{ number_format($item->total_pago,2,',','.') }}</td>
                <td>
                @if(isset($item->comprovativo_file) && $item->forma_pagto == 'ATM')	
                <a href="{{ asset('storage/'.$item->comprovativo_file) }}" target="_blank" class="btn btn-warning btn-sm mb-1 btn-block text-dark" data-toggle="tooltip" data-placement="bottom" title="Mostrar comprovativo" onclick="event.preventDefault(); $('#comprovativo').attr('src', $(this).attr('href')); $('#modalComprovativo').modal('show');"><i class="fa fa-file-pdf"></i> Comprovativo</a>
                @else
                @if($item->forma_pagto == 'REF')
                <a href="#" class="btn btn-warning btn-sm btn-block mb-1 text-dark" data-toggle="tooltip" data-placement="bottom" title="Detalhes do Pagamento..." id-bi="{{ $item->id_aluguer }}" onclick=" $('id_bi').val($(this).attr('id-bi')); $('#modalReferencia').modal('show');"><i class="fa fa-credit-card"></i> Referência</a>
                @else
                @if($item->forma_pagto == 'PD')
                <a href="#" class="btn btn-warning btn-sm mb-1 btn-block text-dark" data-toggle="tooltip" data-placement="bottom" title="Nenhum arquivo anexado" onclick=" alert('Nenhum arquivo anexado')"><i class="fa fa-money"></i> Pagto à Cash</a>
                @endif
                @endif
                @endif    
                </td>
                <td class="text-center">{{ date('d/m/Y', strtotime($item->updated_at)) }}</td>
                <td class="text-left">
		        <a href="#" class="btn btn-success btn-sm mb-1" data-toggle="tooltip" data-placement="bottom" title="Confirmar aluguer de Automóvel" nome_cliente="{{ $item->nome_cliente }}" id_cliente="{{ $item->id_cliente }}" veiculo="{{ $item->marca }} {{ $item->modelo }}" qtd_carros="{{ $item->qtd_carros }}" id_aluguer="{{ $item->id_aluguer }}" data_entrega="{{ $item->data_entrega }}" onclick="event.preventDefault(); validarAluguer($(this)); "><i class="fa fa-check" ></i></a>
            <a href="{{ route('aluguer.delete', ['id_aluguer'=>$item->id_aluguer, 'id_pedido'=>$item->pedido_id]) }}" class="btn btn-danger btn-sm mb-1" onclick=" return confirm('Pretendes cancelar o aluguer do veículo?');" data-toggle="tooltip" data-placement="right" title="cancelar o aluguer do veículo..."><i class="fa fa-trash"></i></a>
                 </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        </table>
                               <!-- fim tabela de pedidos comprados --> 
                            </div>
                        </div>
                        </div>
                        </div>


  <div class="tab-pane fade" id="reservados" role="tabpanel" aria-labelledby="reservados-tab">    
  <div class="row">
                            <h3 class="my-4"> <i class="fa fa-list text-muted"></i>   Lista de Automóveis reservados</h3>
                            <hr>
                               <!-- tabela de provincias --> 
                               <div class="container">
                               <div class="table-responsive">
                               <table id="dataTables1" class="display nowrap dataTables" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Pedido</th>
                <th class="text-center">Cliente</th>
                <th>Veículo</th>
                <th>Qtd. carros</th>
                <th>Local entrega</th>
                <th>Data Entrega</th>
                <th>Data Prev. Dev.</th>
                <th>Total pago(Akz)</th>
                <th>Estado</th>
                <th>Data Aluguer</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($reservados[0]->id_aluguer))
            @foreach($reservados as $item)
            <tr>
                <td class="text-right">{{ $item->id }}</td>
                <td class="text-right">{{ $item->pedido_id }}</td>
                <td class="text-left"><a href="#" class="btn btn-light p-0 m-0" data-toggle="tooltip" data-placement="top" title="Detalhes do cliente..."  cliente="{{ $item->nome_cliente }}" bi_cliente="{{ $item->n_doc }}" telef_cliente="{{ $item->telefone }}" email_cliente="{{ $item->email }}" endereco="{{ $item->endereco_cliente }}" onclick="event.preventDefault(); $('#cliente').text($(this).attr('cliente')); $('#bi_cliente').text($(this).attr('bi_cliente')); $('#telef_cliente').text($(this).attr('telef_cliente')); $('#email_cliente').text($(this).attr('email_cliente')); $('#endereco').text($(this).attr('endereco')); $('#modalCliente').modal('show');"><i class="fa fa-sm fa-info-circle text-muted"></i></a> {{ $item->nome_cliente }}</td>
                <td>{{ $item->marca }}  {{ $item->modelo }}</td>
                <td class="text-right">{{ $item->qtd_carros }}</td>
                <td>{{ $item->local_entrega }}</td>
                <td class="text-right">{{ date('d/m/Y', strtotime($item->data_entrega)) }}</td>
                <td class="text-right">{{ date('d/m/Y', strtotime($item->data_prev_devolucao)) }}</td>
                <td class="text-right">{{ number_format($item->total_pago,2,',','.') }}</td>
                <td>
                    <span class="alert alert-warning text-dark p-1" data-toggle="tooltip" data-placement="top" title="Recebido {{ number_format($item->preco*$item->total_passageiro,2,',','.') }} kz"> <i class="fa fa-check-circle"></i> Reservado</span>
                </td>
                <td class="text-center">{{ date('d/m/Y', strtotime($item->updated_at)) }}</td>
                <td class="text-left">
                <a href="#" class="btn btn-success btn-sm mb-1" data-toggle="tooltip" data-placement="bottom" title="Confirmar aluguer de Automóvel" nome_cliente="{{ $item->nome_cliente }}" id_cliente="{{ $item->id_cliente }}" veiculo="{{ $item->marca }} {{ $item->modelo }}" qtd_carros="{{ $item->qtd_carros }}" id_aluguer="{{ $item->id_aluguer }}" data_entrega="{{ $item->data_entrega }}" onclick="event.preventDefault(); validarAluguer($(this)); "><i class="fa fa-check" ></i></a>
            <a href="{{ route('aluguer.delete', ['id_aluguer'=>$item->id_aluguer, 'id_pedido'=>$item->pedido_id]) }}" class="btn btn-danger btn-sm mb-1" onclick=" return confirm('Pretendes cancelar o aluguer do veículo?');" data-toggle="tooltip" data-placement="right" title="cancelar o aluguer do veículo..."><i class="fa fa-trash"></i></a>
                 </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        </table>
     
                               <!-- fim tabela de pedidos --> 
                            </div>
                            </div>
                            </div>
                            <!-- fim tabela pontos de Desembarques --> 
                        
  </div>
  <div class="tab-pane fade" id="vendidos" role="tabpanel" aria-labelledby="vendidos-tab">
                            <div class="row">
                            <h3 class="my-4"> <i class="fa fa-list text-muted"></i>   Lista de Automóveis alugados</h3>
                            <hr>
                               <!-- tabela de provincias --> 
                               <div class="container">
                               <div class="table-responsive">
                               <table id="dataTables2" class="display nowrap dataTables" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Pedido</th>
                <th class="text-center">Cliente</th>
                <th>Veículo</th>
                <th>Qtd. carros</th>
                <th>Local entrega</th>
                <th>Data Entrega</th>
                <th>Data Prev. Dev.</th>
                <th>Total pago(Akz)</th>
                <th>Comprovativo</th>
                <th>Data Aluguer</th>
                <th>Opções</th> 
            </tr>
        </thead>
        <tbody>
            @if(isset($alugueres[0]->id_aluguer))
            @foreach($alugueres as $item)
            <tr>
                <td class="text-right">{{ $item->id }}</td>
                <td class="text-right">{{ $item->pedido_id }}</td>
                <td class="text-left"><a href="#" class="btn btn-light p-0 m-0" data-toggle="tooltip" data-placement="top" title="Detalhes do cliente..."  cliente="{{ $item->nome_cliente }}" bi_cliente="{{ $item->n_doc }}" telef_cliente="{{ $item->telefone }}" email_cliente="{{ $item->email }}" endereco="{{ $item->endereco_cliente }}" onclick="event.preventDefault(); $('#cliente').text($(this).attr('cliente')); $('#bi_cliente').text($(this).attr('bi_cliente')); $('#telef_cliente').text($(this).attr('telef_cliente')); $('#email_cliente').text($(this).attr('email_cliente')); $('#endereco').text($(this).attr('endereco')); $('#modalCliente').modal('show');"><i class="fa fa-sm fa-info-circle text-muted"></i></a> {{ $item->nome_cliente }}</td>
                <td>{{ $item->marca }}  {{ $item->modelo }}</td>
                <td class="text-right">{{ $item->qtd_carros }}</td>
                <td>{{ $item->local_entrega }}</td>
                <td class="text-right">{{ date('d/m/Y', strtotime($item->data_entrega)) }}</td>
                <td class="text-right">{{ date('d/m/Y', strtotime($item->data_prev_devolucao)) }}</td>
                <td class="text-right">{{ number_format($item->total_pago,2,',','.') }}</td>
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
                <td class="text-center">{{ date('d/m/Y', strtotime($item->updated_at)) }}</td>
                <td class="text-center">
		    <a href="{{ route('aluguer.delete', ['id_aluguer'=>$item->id_aluguer, 'id_pedido'=>$item->pedido_id]) }}" class="btn btn-danger btn-sm mb-1" onclick=" return confirm('Pretendes cancelar o aluguer do veículo?');" data-toggle="tooltip" data-placement="right" title="cancelar o aluguer do veículo..."><i class="fa fa-trash"></i></a>
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
        <h5 class="modal-title text-light" id="confirmModalLabel">Confirmar aluguer de Automóvel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-light">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="get" action="{{ route('aluguer.validacao') }}" id="form_validacao_aluguer">
                                    @csrf
                            <div class="row mb-2">
                            <div class="col-12">
                                <label for="id_provincia">Cliente:</label>
                                <input  type="text" class="form-control text-capitalize" name="nome_cliente" id="nome_cliente" placeholder="Nome cliente" required readonly>
                                <input type="hidden" class="form-control" name="id_cliente" id="id_cliente" placeholder="ID cliente" required>
                            </div></div>
                            <div class="row mb-2">
                            <div class="col-12">
                            <label for="nome_rota">Automóvel:</label>
                                <input type="text" class="form-control text-capitalize" name="veiculo" id="veiculo" placeholder="Automóvel" required readonly>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-2" style="max-height:250px;overflow-y:auto;overflow-x:hidden;">
                                <label for="nome_rota">Matrículas:</label>
                                    <div class="inputs" id="carros_alugados"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                <label for="data_entrega"><code>*</code>Data entrega:</label>
                                <input type="hidden" class="form-control" id="id_aluguer" name="id_aluguer" placeholder="ID do Aluguer" required>
                                <input type="hidden" class="form-control" id="origem_aluguer" name="origem_aluguer" value="pedido" placeholder="Origem Aluguer" required>
                                <input type="date" class="form-control" id="data_entrega" name="data_entrega" placeholder="Data entrega" required >
  
                                </div>
                                <div class="col-6">
                                <label for="data_dev"><code>*</code>Data Devolução:</label>
                                <input type="date" class="form-control" id="data_dev" name="data_dev" placeholder="Data entrega" required >
                                </div>
                            </div>
                            <div class="row my-2">
                              <div class="col-12" id="spinner" style="display:none">
                              <button class="btn btn-secondarys btn-sm text-info text-capitalize" type="button" disabled>
                              <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
  Validando detalhes do Aluguer do Automóvel
</button>
                              </div>
                              
                                <div class="col-12">
                                <button type="submit" class="btn btn-submit float-right" onclick=" var matricula = $('#matricula').val(); if(matricula != null){ $('#spinner').fadeIn(); }"> <i class="fa fa-check"></i> Confirmar</button>
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
              <h5>E-mail: <span id="email_cliente" class="text-muted"></span></h5>
              <h5>Telefone: <span id="telef_cliente" class="text-muted"></span> </h5>
              <h5>Endereço: <span id="endereco" class="text-muted"></span> </h5>
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

<!-- Modal -->
<div class="modal fade" id="modalOperacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Mensagem de Confirmação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-normal"> <i class="fa fa-check-circle fa-lg text-success" id="icon_sms"></i>  <span id="text_sms">Compra de Bilhete validado com sucesso!</span></p>
      </div>
    </div>
  </div>
</div>
@endsection