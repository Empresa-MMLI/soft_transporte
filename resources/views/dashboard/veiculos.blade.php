@extends ('layouts.app')
@section('html_title','SLA Dashboard | Veículos')
<!--Call of template welcome-->
@section('content')
<!--Section to show content to yield -->

<h1 class="h3 mb-3"><strong>Veículos » </strong> Serviço de viagens</h1>

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
    <a class="nav-item nav-link active" id="nav-form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form" aria-selected="true"><i class="fa fa-edit text-muted"></i> Anunciar novo Veículo</a>
    <a class="nav-item nav-link" id="nav-veiculos-tab" data-toggle="tab" href="#veiculos" role="tab" aria-controls="veiculos" aria-selected="false"><i class="fa fa-list text-muted"></i> Veículos em aluguel</a>
  </div>
</nav>


<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab">
  <h2 class="my-4"><i class="fa fa-edit text-muted"></i> Novos Veículos</h2>
  <hr>
                                @include('inc.messages')       
                                <!-- form de cadastro de provincias -->
                                <form method="post" action="{{ route('veiculos.store') }}">
                                    @csrf
                          

                                    <div class="row my-4">
                            <div class="col">
                                <label for="id_marca">Marca:</label>
                                <select  class="form-control custom-select text-uppercase" name="id_marca" id="id_marca" aria-describedby="addon-wrapping" required>
                                @if(isset($marcas[0]->id))
                                <option value="" selected disabled>Selecionar...</option>
                                @foreach($marcas as $item)
                                <option value="{{ $item->id }}">{{ $item->marca }}</option>
                                @endforeach
                                @endif
                            </select>
                            </div>
                            <div class="col">
                                <label for="">Etinerário de viagem <code>(Comentário)</code>:</label>
                                <select  class="form-control custom-select text-uppercase" name="id_modelo" id="id_modelo" aria-describedby="addon-wrapping" required>
                                @if(isset($modelos[0]->id))
                                <option value="" selected disabled>Selecionar...</option>
                                @foreach($modelos as $item)
                                <option value="{{ $item->id }}">{{ $item->modelo }}</option>
                                @endforeach
                                @endif
                            </select>
                            </div>
                            </div>

                                    <div class="row my-4">
                            <div class="col">
                                <label for="capacidade">Nº Assento:</label>
                                <input type="number" class="form-control" name="capacidade" id="capacidade" min="1" placeholder="Total de passageiros">
                            </div>
                            <div class="col">
                                <label for="transmissao">Transmissão:</label>
                                <select  class="form-control custom-select text-capitalize" name="transmissao" id="transmissao" aria-describedby="addon-wrapping" required>
                                <option value="0">Manual</option>
                                <option value="1" selected>Automático</option>
                            </select>
                            </div>
                            </div>

                            <div class="row my-4">
                            <div class="col">
                                    <label for="km">kilometragem:</label>
                                    <input type="number" class="form-control" name="km" id="km" min="1" placeholder="Km já percorridos">
                            </div>
                            <div class="col">
                                <label for="fluido">Fluído:</label>
                                <select  class="form-control custom-select text-uppercase" name="fluido" id="fluido" aria-describedby="addon-wrapping" required>
                                @if(isset($fluidos[0]->id))
                                <option value="" selected disabled>Selecionar...</option>
                                @foreach($fluidos as $item)
                                <option value="{{ $item->id }}">{{ $item->fluido }}</option>
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
<div class="tab-pane" id="veiculos" role="tabpanel" aria-labelledby="veiculos-tab">
<h2 class="my-4"><i class="fa fa-list text-muted"></i> Lista de Veículos</h2>

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