@extends ('layouts.app')
@section('html_title','SLA Dashboard | Viagens')
<!--Call of template welcome-->
@section('content')
<h1 class="h3 mb-3"><strong>Viagens » </strong> Serviço de Viagem</h1>

<div class="row">
    <div class="d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-12"><!--  -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <h2 class="my-4"><i class="fa fa-edit text-muted"></i> Nova viagem</h2>
                                <hr>
                                @include('inc.messages')       
                                <!-- form de cadastro de provincias -->
                                <form method="post" action="{{ route('rotas.store') }}">
                                    @csrf
                          

                                    <div class="row my-4">
                            <div class="col">
                                <label for="origem">Rota:</label>
                                <select  class="form-control custom-select text-capitalize" name="id_rota" id="id_rota" aria-describedby="addon-wrapping" required>
                                @if(isset($rotas[0]->id))
                                <option value="" selected disabled>Selecionar...</option>
                                @foreach($rotas as $item)
                                <option value="{{ $item->id }}">{{ $item->origem }} - {{ $item->destino }}</option>
                                @endforeach
                                @endif
                            </select>
                            </div>
                            <div class="col">
                                <label for="etinerario">Etinerário de viagem <code>(Comentário)</code>:</label>
                                <textarea class="form-control" id="etinerario" name="etinerario" placeholder="Pontos de paradas obrigatórias..." required></textarea>
                            </div>
                            </div>

                                    <div class="row my-4">
                            <div class="col">
                                <label for="origem">Ponto de Embarque:</label>
                                <select  class="form-control custom-select text-capitalize" name="id_veiculo" id="id_veiculo" aria-describedby="addon-wrapping" required>
                                @if(isset($pontos_e[0]->id))
                                <option value="" selected disabled>Selecionar...</option>
                                @foreach($pontos_e as $item)
                                <option value="{{ $item->id }}">{{ $item->ponto }}</option>
                                @endforeach
                                @endif
                            </select>
                            </div>
                            <div class="col">
                                <label for="classe">Ponto Desembarque:</label>
                                <select  class="form-control custom-select text-capitalize" name="id_ponto_d" id="id_ponto_d" aria-describedby="addon-wrapping" required>
                                @if(isset($pontos_d[0]->id))
                                <option value="" selected disabled>Selecionar...</option>
                                @foreach($pontos_d as $item)
                                <option value="{{ $item->id }}">{{ $item->ponto }}</option>
                                @endforeach
                                @endif
                            </select>
                            </div>
                            </div>

                            <div class="row my-4">
                            <div class="col">
                                <label for="origem">Meio de Transporte:</label>
                                <select  class="form-control custom-select text-capitalize" name="id_veiculo" id="id_veiculo" aria-describedby="addon-wrapping" required>
                                @if(isset($veiculos[0]->id))
                                <option value="" selected disabled>Selecionar...</option>
                                @foreach($veiculos as $item)
                                <option value="{{ $item->id }}">{{ $item->matricula }}</option>
                                @endforeach
                                @endif
                            </select>
                            </div>
                            <div class="col">
                                <label for="classe">Tipo de classe:</label>
                                <select  class="form-control custom-select text-capitalize" name="id_classe" id="id_classe" aria-describedby="addon-wrapping" required>
                                @if(isset($tipo_classes[0]->id))
                                <option value="" selected disabled>Selecionar...</option>
                                @foreach($tipo_classes as $item)
                                <option value="{{ $item->id }}">{{ $item->classe }}</option>
                                @endforeach
                                @endif
                            </select>
                            </div>
                            </div>
                            

                            <div class="row my-4">
                            <div class="col">
                                <label for="data_chegada">Data e Hora <code>(Partida)</code>:</label>
                                <input type="text" class="form-control datapicker" name="partida" id="data_partida"  value="{{ date('Y-m-d H:i:s') }}" placeholder="Data Partida">
                                </div>

                            <div class="col">
                            <label for="data_chegada">Data e Hora <code>(Chegada)</code>:</label>
                            <input type="text" class="form-control datapicker" name="data_chegada" id="data_chegada" min="{{ date('Y-m-d H:i:s') }}" placeholder="Data de chegada">
                            </div>

                            </div>

                            <div class="row my-2">
                                <div class="col">
                                <button type="submit" class="btn btn-submit">Salvar</button>
                                </div>
                            </div>
                            </form>
                            <div class="row">
                            <h3 class="my-4"> <i class="fa fa-list text-muted"></i>   Últimas viagens</h3>
                            <hr>
                               <!-- tabela de provincias --> 
                               <div class="container">
                               <table id="dataTables" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Origem</th>
                <th>Destino</th>
                <th>Kilómetros (km)</th>
                <th>Preço (Akz)</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($viagens[0]->id))
            @foreach($viagens as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->origem }}</td>
                <td>{{ $item->destino }}</td>
                <td>{{ $item->kilometros }}</td>
                <td>{{ $item->preco }}</td>
                <td class="text-left">
		        <a href="" class="btn btn-success btn-sm mb-1" data-toggle="tooltip" data-placement="left" title="Editar Rota"><i class="fa fa-edit" ></i></a>
                <a href="" class="btn btn-danger btn-sm mb-1" onclick=" return confirm('Pretendes excluir Rota?');" data-toggle="tooltip" data-placement="right" title="Excluir Rota..."><i class="fa fa-trash"></i></a>
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
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection