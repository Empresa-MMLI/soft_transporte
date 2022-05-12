@extends ('layouts.app')
@section('html_title','SLA Dashboard | Itinerários de viagens')
<!--Call of template welcome-->
@section('content')
<!--Section to show content to yield -->

<h1 class="h3 mb-3"><strong>Itinerários » </strong> Lista de itinerários</h1>

<div class="row">
    <div class="d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                            <h3 class="my-4"> <i class="fa fa-list text-muted"></i>   Itinerário de viagem</h3>
                            <hr>
                               <!-- tabela de viagem --> 
                               <div class="container">
                               <div class="table-responsive">
                               <table id="dataTables" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Origem</th>
                <th>Destino</th>
                <th>Itinerário</th>
                <th>Kilómetros</th>
                <th>Ponto de embarque</th>
                <th>Ponto de desembarque</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($viagens[0]->id))
            @foreach($viagens as $item)
            <tr>
                <td class="text-uppercase">{{ $item->rota_origem }}</td>
                <td class="text-uppercase">{{ $item->rota_destino }}</td>
                <td class="text-left  text-uppercase">
                @if(strlen($item->itinerario) > 16)
                <span data-toggle="tooltip" data-placement="bottom" title="{{ $item->itinerario }}">{{ substr($item->itinerario,0,20).'...' }} </span>
                @else
                {{ $item->itinerario }}
                @endif
                </td>
                <td class="text-right">{{ number_format($item->kilometros,2,',','')  }}</td>
                <td class="text-uppercase">{{ $item->ponto_e }}</td>
                <td class="text-uppercase">{{ $item->ponto_d }}</td>
                <td class="text-center">
		        <a href="" class="btn btn-success btn-sm mb-1" data-toggle="tooltip" data-placement="left" title="Editar Itinerário"><i class="fa fa-edit" ></i></a>
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