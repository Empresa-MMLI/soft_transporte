@extends ('layouts.app')
@section('html_title','SLA Dashboard | Pontos de Embarques e Desembarques')
<!--Call of template welcome-->
@section('content')
<!--Section to show content to yield -->

<h1 class="h3 mb-3"><strong>localização » </strong> Pontos de Embarques e Desembarques</h1>

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
    <a class="nav-item nav-link active" id="nav-form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form" aria-selected="true"><i class="fa fa-edit text-muted"></i> Novo Ponto</a>
    <a class="nav-item nav-link" id="nav-embarque-tab" data-toggle="tab" href="#embarque" role="tab" aria-controls="embarque" aria-selected="false"><i class="fa fa-list text-muted"></i> Pontos de Embarque</a>
    <a class="nav-item nav-link" id="nav-desembarque-tab" data-toggle="tab" href="#desembarque" role="tab" aria-controls="desembarque" aria-selected="false"><i class="fa fa-list text-muted"></i> Pontos de Desembarque</a>
  </div>
</nav>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab">

                                <h2 class="my-4"><i class="fa fa-edit text-muted"></i> Formulário de cadastro</h2>
                                <hr>
                                @include('inc.messages')       
                                <!-- form de cadastro de provincias -->
                                <form method="post" action="{{ route('pontos.store') }}">
                                    @csrf
                            <div class="row mb-2">
                            <div class="col">
                                <label for="id_provincia">Província:</label>
                                <select  class="form-control custom-select text-capitalize" name="id_provincia" id="id_provincia" aria-describedby="addon-wrapping" required>
                                @if(isset($provincias[0]->id))
                                <option value="" selected disabled>Selecionar...</option>
                                @foreach($provincias as $item)
                                <option value="{{ $item->id }}">{{ $item->provincia }}</option>
                                @endforeach
                                @endif
                            </select>
                            </div>
                            <div class="col">
                                <label for="tipo_ponto">Tipo de Ponto:</label>
                                <select  class="form-control custom-select text-capitalize" name="tipo_ponto" id="tipo_ponto" aria-describedby="addon-wrapping" required>
                                <option value="" selected disabled>Selecionar...</option>
                                <option value="Embarque">Embarque</option>
                                <option value="Desembarque">Desembarque</option>
                                </select>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                <label for="ponto">Descrição do Ponto:</label>
                                <textarea class="form-control" id="ponto" name="ponto" placeholder="Ponto de embarque ou Desembarque" required></textarea>
  
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                <button type="submit" class="btn btn-submit">Salvar</button>
                                </div>
                            </div>
                            </form>
                        
                        </div>


  <div class="tab-pane fade" id="embarque" role="tabpanel" aria-labelledby="form-tab">
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

<div class="tab-pane fade" id="desembarque" role="tabpanel" aria-labelledby="form-tab">
                            <!-- tabela pontos de Desembarques --> 
                            <h3 class="my-4"> <i class="fa fa-list text-muted"></i>   Lista de Pontos de Desembarques</h3>
                            <hr>
                               <!-- tabela de provincias --> 
                               <div class="container">
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
                            <!-- 
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