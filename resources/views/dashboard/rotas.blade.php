@extends ('layouts.app')
@section('html_title','SLA Dashboard | Rotas de Viagens')
<!--Call of template welcome-->
@section('content')
<!--Section to show content to yield -->

<h1 class="h3 mb-3"><strong>Rotas » </strong> Configurações de Rotas de Viagens</h1>

<div class="row">
    <div class="d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-12"><!--  -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <h2 class="my-4"><i class="fa fa-edit text-muted"></i> Formulário de cadastro</h2>
                                <hr>
                                @include('inc.messages')       
                                <!-- form de cadastro de provincias -->
                                <form method="post" action="{{ route('rotas.store') }}">
                                    @csrf
                            <div class="row">
                            <div class="col">
                                <label for="origem">Origem:</label>
                                <select  class="form-control custom-select text-capitalize" name="origem" id="origem" aria-describedby="addon-wrapping" required>
                                @if(isset($provincias[0]->id))
                                <option value="" selected disabled>Selecionar...</option>
                                @foreach($provincias as $item)
                                <option value="{{ $item->provincia }}">{{ $item->provincia }}</option>
                                @endforeach
                                @endif
                            </select>
                            </div>
                            <div class="col">
                                <label for="destino">Destino:</label>
                                <!-- <input type="text" class="form-control" name="pais" id="pais" placeholder="Angola">--> 
                                <select  class="form-control custom-select text-capitalize" name="destino" id="destino" aria-describedby="addon-wrapping" required>
                                @if(isset($provincias[0]->id))
                                <option value="" selected disabled>Selecionar...</option>
                                @foreach($provincias as $item)
                                <option value="{{ $item->provincia }}">{{ $item->provincia }}</option>
                                @endforeach
                                @endif
                            </select>
                            </div>
                            </div>
                            <div class="row my-4">
                            <div class="col">
                                <label for="km">Kilometragem:</label>
                                <div class="input-group">
                                <input type="number" class="form-control" name="km" id="km" min="0" placeholder="Distância entre os dois pontos">
                                <div class="input-group-append">
                                <span class="input-group-text">Km</span>
                            </div>
                            </div>
                            </div>

                            <div class="col">
                            <label for="preco">Preço:</label>
                            <div class="input-group">
                            <input type="number" class="form-control" name="preco" id="preco" min="2000" placeholder="Preço da viagem">
                                <div class="input-group-append">
                                <span class="input-group-text">Kz</span>
                            </div>
                            </div>
                            </div>
                            </div>

                            <div class="row my-2">
                                <div class="col">
                                <button type="submit" class="btn btn-submit">Salvar</button>
                                </div>
                            </div>
                            </form>
                            <div class="row">
                            <h3 class="my-4"> <i class="fa fa-list text-muted"></i>   Lista de Províncias</h3>
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
            @if(isset($rotas[0]->id))
            @foreach($rotas as $item)
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