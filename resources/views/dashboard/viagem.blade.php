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
                            <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form" aria-selected="true"><i class="fa fa-edit text-muted"></i> Anunciar nova Viagem</a>
    <a class="nav-item nav-link" id="nav-viagem-tab" data-toggle="tab" href="#viagem" role="tab" aria-controls="embarque" aria-selected="false"><i class="fa fa-list text-muted"></i> Últimas Viagens</a>
  </div>
</nav>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab">

                                <h2 class="my-4"><i class="fa fa-edit text-muted"></i> Nova viagem</h2>
                                <hr>
                                @include('inc.messages')       
                                <!-- form de cadastro de provincias -->
                                <form method="post" action="{{ route('viagem.store') }}">
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
                                <label for="itinerario">Etinerário de viagem <code>(Comentário)</code>:</label>
                                <textarea class="form-control" id="itinerario" name="itinerario" placeholder="Pontos de paradas obrigatórias..." required></textarea>
                            </div>
                            </div>

                                    <div class="row my-4">
                            <div class="col">
                                <label for="origem">Ponto de Embarque:</label>
                                <select  class="form-control custom-select text-capitalize" name="id_ponto_e" id="id_ponto_e" aria-describedby="addon-wrapping" required>
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
                                <div class="row">
                                    <div class="col-sm-6">
                                    <label for="ref_autocarro">Autocarro:</label>
                                    <input type="text" class="form-control" name="ref_autocarro" id="ref_autocarro" placeholder="Código do autocarro">
                                    </div>
                                    <div class="col-sm-6">
                                    <label for="capacidade">Nº Assento:</label>
                                    <input type="number" class="form-control" name="capacidade" id="capacidade" min="1" placeholder="Total de passageiros">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <label for="classe">Tipo de classe:</label>
                                <select  class="form-control custom-select text-uppercase" name="id_classe" id="id_classe" aria-describedby="addon-wrapping" required>
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
                                <input type="text" class="form-control datapicker" name="partida" id="data_partida"  value="{{ date('Y-m-d H:i:s') }}" placeholder="Data Partida" required>
                                </div>

                            <div class="col">
                            <label for="data_chegada">Data e Hora <code>(Chegada)</code>:</label>
                            <input type="text" class="form-control datapicker" name="data_chegada" id="data_chegada" min="{{ date('Y-m-d H:i:s') }}" placeholder="Data de chegada" required>
                            </div>

                            </div>

                            <div class="row my-2">
                                <div class="col">
                                <button type="submit" class="btn btn-submit">Salvar</button>
                                </div>
                            </div>
                            </form>
</div>

  <div class="tab-pane fade" id="viagem" role="tabpanel" aria-labelledby="viagem-tab">

                            <div class="row">
                            <h3 class="my-4"> <i class="fa fa-list text-muted"></i>   Últimas viagens</h3>
                            <hr>
                               <!-- tabela de viagem --> 
                               <div class="container">
                               <div class="table-responsive">
                               <table id="dataTables" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Autocarro</th>
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
        </div>
    </div>
</div>

@endsection