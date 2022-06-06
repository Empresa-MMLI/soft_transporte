@extends ('layouts.app')
@section('html_title','SLA Dashboard | Mapa de Viagens')
<!--Call of template welcome-->
@section('content')
<!--Section to show content to yield -->

<h1 class="h3 mb-3"><strong>Mapa de Viagens » </strong> Últimas viagens registradas</h1>

<div class="row">
    <div class="d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                        <div class="row">
                            <h3 class="my-4"> <i class="fa fa-list text-muted"></i>   Mapa de viagens</h3>
                            <hr>
                               <!-- tabela de viagem --> 
                               <div class="container">
                               <div class="table-responsive">
                               <table id="dataTables" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Veículo</th>
                <th>Rota</th>
                <th>Itinerário</th>
                <th>Kilómetros</th>
                <th>Preço</th>
                <th>Classe</th>
                <th>Nº Assentos</th>
                <th>Nº Passageiros</th>
                <th>Ponto de embarque</th>
                <th>Ponto de desembarque</th>
                <th>Data Partida</th>
                <th>Data Chegada</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($viagens[0]->id))
            @foreach($viagens as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->ref_autocarro }}</td>
                <td class="text-uppercase">{{ $item->rota_origem }} - {{ $item->rota_destino }}</td>
                <td class="text-left  text-uppercase">
                @if(strlen($item->itinerario) > 16)
                <span data-toggle="tooltip" data-placement="bottom" title="{{ $item->itinerario }}">{{ substr($item->itinerario,0,20).'...' }} </span>
                @else
                {{ $item->itinerario }}
                @endif
                </td>
                <td class="text-right">{{ number_format($item->kilometros,2,',','')  }}</td>
                <td class="text-right">{{ number_format($item->preco,2,',','.') }}</td>
                <td class="text-uppercase">{{ $item->classe }}</td>
                <td class="text-right">{{ $item->capacidade }}</td>
                <td class="text-right">
                @if($item->total_passageiro >= ($item->capacidade - 5) )
                <span class="p-1 alert alert-danger text-dark" data-toggle="tooltip" data-placement="right" title="Falta apenas ({{ ($item->capacidade - $item->total_passageiro) }}) passageiro(s)">{{ $item->total_passageiro }}</span>
                @else 
                @if($item->total_passageiro >= ($item->capacidade - 15) )
                <span class="p-1 alert alert-warning text-dark"  data-toggle="tooltip" data-placement="top" title="Falta apenas ({{ ($item->capacidade - $item->total_passageiro) }}) passageiro(s)">{{ $item->total_passageiro }}</span>
                @else
                <span class="p-1 alert alert-light text-dark"  data-toggle="tooltip" data-placement="bottom" title="Falta ({{ ($item->capacidade - $item->total_passageiro) }}) passageiro(s) para o embarque">{{ $item->total_passageiro }}</span>
                @endif
                @endif
                </td>
                <td class="text-uppercase">{{ $item->ponto_e }}</td>
                <td class="text-uppercase">{{ $item->ponto_d }}</td>
                <td>{{ date('d/m/d H:i:s', strtotime($item->data_partida)) }}</td>
                <td>{{ date('d/m/d H:i:s', strtotime($item->data_chegada)) }}</td>
                <td class="text-left">
		        <a href="" class="btn btn-success btn-sm mb-1" data-toggle="tooltip" data-placement="left" title="Editar Rota"><i class="fa fa-edit" ></i></a>
                <a href="" class="btn btn-danger btn-sm mb-1" onclick=" return confirm('Pretendes excluir Rota?');" data-toggle="tooltip" data-placement="right" title="Excluir Rota..."><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        </table>
                               <!-- fim tabela de viagem --> 
                            </div>
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