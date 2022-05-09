@extends ('layouts.app')
@section('html_title','SLA Dashboard | Pronvíncia disponíveis')
<!--Call of template welcome-->
@section('content')
<!--Section to show content to yield -->

<h1 class="h3 mb-3"><strong>Províncias » </strong> Origem e Destino das Rotas de viagens</h1>

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
                                <form method="post" action="{{ route('provincia.store') }}">
                                    @csrf
                            <div class="row">
                            <div class="col">
                                <label for="provincia">Província:</label>
                                <input type="text" class="form-control" name="provincia"  id="provincia" placeholder="Província" required>
                            </div>
                            <div class="col">
                                <label for="pais">País:</label>
                                <input type="text" class="form-control" name="pais" id="pais" placeholder="Angola">
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
                <th>País</th>
                <th>Província</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($provincias[0]->id))
            @foreach($provincias as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->pais }}</td>
                <td>{{ $item->provincia }}</td>
                <td class="text-left">
		        <a href="" class="btn btn-success btn-sm mb-1" data-toggle="tooltip" data-placement="left" title="Editar Província"><i class="fa fa-edit" ></i></a>
                <a href="" class="btn btn-danger btn-sm mb-1" onclick=" return confirm('Pretendes excluir Província?');" data-toggle="tooltip" data-placement="right" title="Excluir Província..."><i class="fa fa-trash"></i></a>
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