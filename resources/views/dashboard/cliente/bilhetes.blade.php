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
    <a class="nav-item nav-link" id="nav-reservados-tab" data-toggle="tab" href="#reservados" role="tab" aria-controls="embarque" aria-selected="false"><i class="fa fa-cart-plus text-muted"></i> Bilhetes Reservados</a>
    <a class="nav-item nav-link" id="nav-vendidos-tab" data-toggle="tab" href="#vendidos" role="tab" aria-controls="embarque" aria-selected="false"><i class="fa fa-check-circle text-muted"></i> Bilhetes Comprados</a>
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
                <td class="text-center">
		            <a href="{{ route('bilhete.delete', $item->id) }}" class="btn btn-danger btn-sm mb-1" onclick=" return confirm('Pretendes cancelar compra do seu Bilhete?');" data-toggle="tooltip" data-placement="right" title="Cancelar compra do Bilhete indicado..."><i class="fa fa-trash"></i></a>
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
		            <a href="{{ route('bilhete.delete', $item->id) }}" class="btn btn-danger btn-sm mb-1" onclick=" return confirm('Pretendes cancelar compra do seu Bilhete?');" data-toggle="tooltip" data-placement="right" title="Cancelar compra do Bilhete indicado..."><i class="fa fa-trash"></i></a>
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
                <th class="d-none">Opções</th>
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
                
                <td class="text-center d-none">
		            <a href="{{ route('bilhete.delete', $item->id) }}" class="btn btn-danger btn-sm mb-1" onclick=" return confirm('Pretendes cancelar compra do seu Bilhete?');" data-toggle="tooltip" data-placement="right" title="Cancelar compra do Bilhete indicado..."><i class="fa fa-trash"></i></a>
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


@endsection