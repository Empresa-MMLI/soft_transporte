@extends ('layouts.app')
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
    <a class="nav-item nav-link" id="nav-vendidos-tab" data-toggle="tab" href="#vendidos" role="tab" aria-controls="embarque" aria-selected="false"><i class="fa fa-check-circle text-muted"></i> Bilhetes vendidos</a>
    <a class="nav-item nav-link" id="nav-report-tab" data-toggle="tab" href="#report" role="tab" aria-controls="desembarque" aria-selected="false"><i class="fa fa-line-chart text-muted"></i> Estatítiscas</a>
  </div>
</nav>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab">

                                <h2 class="my-4"><i class="fa fa-edit text-muted"></i> Confirmar compras de Bilhetes</h2>
                                <hr>
 <!-- tabela de bilhetes comprados --> 
 <div class="container-fluid">
                               <table id="dataTables" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Rota</th>
                <th>Classe</th>
                <th>Preço</th>
                <th>Comprovativo</th>
                <th>Data compra</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($bilhetes[0]->id))
            @foreach($bilhetes as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->cliente }}</td>
                <td>{{ $item->rota_origem }} - {{ $item->rota_destino }}</td>
                <td>{{ $item->classe }}</td>
                <td>{{ number_format($item->preco,2,',','.') }} Akz</td>
                <td>
                @if(isset($item->comprovativo_file))	
                <a href="{{ asset('storage/'.$item->comprovativo_file) }}" target="_blank" class="btn btn-warning btn-sm mb-1 text-dark" data-toggle="tooltip" data-placement="bottom" title="Mostrar comprovativo" onclick="event.preventDefault(); $('#comprovativo').attr('src', $(this).attr('href')); $('#modalComprovativo').modal('show');"><i class="fa fa-file-pdf"></i> Comprovativo</a>
                @else
                <a href="#" class="btn btn-warning btn-sm mb-1 text-dark" data-toggle="tooltip" data-placement="bottom" title="Nenhum arquivo anexado" onclick=" alert('Nenhum arquivo anexado')"><i class="fa fa-eye-slash"></i> Sem  Comprovativo</a>
            
                @endif    
                </td>
                <td>{{ date('d/m/Y', strtotime($item->data_compra)) }}</td>
                <td class="text-left">
		        <a href="#" class="btn btn-success btn-sm mb-1" title="Confirmar compra de Bilhete" data-toggle="modal" data-target="#modalConfirmacao"><i class="fa fa-check" ></i></a>
                <a href="" class="btn btn-danger btn-sm mb-1" onclick=" return confirm('Pretendes excluir Ponto?');" data-toggle="tooltip" data-placement="right" title="Cancelar Bilhete..."><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        </table>
                               <!-- fim tabela de bilhetes comprados --> 
                            </div>
                        </div>


  <div class="tab-pane fade" id="vendidos" role="tabpanel" aria-labelledby="vendidos-tab">
                            <div class="row">
                            <h3 class="my-4"> <i class="fa fa-list text-muted"></i>   Lista de Pontos de Embarques</h3>
                            <hr>
                               <!-- tabela de provincias --> 
                               <div class="container">
                               <table id="dataTables" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>País</th>
                <th>Província</th>
                <th>Ponto</th>
                <th>Tipo de Ponto</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($pontos_e[0]->id))
            @foreach($pontos_e as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->pais }}</td>
                <td>{{ $item->provincia }}</td>
                <td>{{ $item->ponto }}</td>
                <td>{{ $item->tipo_ponto }}</td>
                <td class="text-left">
		        <a href="" class="btn btn-success btn-sm mb-1" data-toggle="tooltip" data-placement="left" title="Editar Ponto"><i class="fa fa-edit" ></i></a>
                <a href="" class="btn btn-danger btn-sm mb-1" onclick=" return confirm('Pretendes excluir Ponto?');" data-toggle="tooltip" data-placement="right" title="Excluir Ponto..."><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        </table>
                               <!-- fim tabela de provincias --> 
                            </div>
                            </div></div>

<div class="tab-pane fade" id="report" role="tabpanel" aria-labelledby="report-tab">
                            <!-- tabela pontos de Desembarques --> 
                            <h3 class="my-4"> <i class="fa fa-list text-muted"></i>   Lista de Pontos de Desembarques</h3>
                            <hr>
                               <!-- tabela de provincias --> 
                               <div class="containers">
                               <table class="display nowrap dataTables" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>País</th>
                <th>Província</th>
                <th>Ponto</th>
                <th>Tipo de Ponto</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($pontos_d[0]->id))
            @foreach($pontos_d as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->pais }}</td>
                <td>{{ $item->provincia }}</td>
                <td>{{ $item->ponto }}</td>
                <td>{{ $item->tipo_ponto }}</td>
                <td class="text-left">
		        <a href="" class="btn btn-success btn-sm mb-1" data-toggle="tooltip" data-placement="left" title="Editar Ponto"><i class="fa fa-edit" ></i></a>
                <a href="" class="btn btn-danger btn-sm mb-1" onclick=" return confirm('Pretendes excluir Ponto?');" data-toggle="tooltip" data-placement="right" title="Excluir Ponto..."><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        </table>
                               <!-- fim tabela de provincias --> 
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
<div class="modal fade" id="modalConfirmacao" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-header-modal">
        <h5 class="modal-title text-light" id="confirmModalLabel">Confirmar compra de Bilhete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-light">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
     
    </div>
  </div>
</div>
@endsection