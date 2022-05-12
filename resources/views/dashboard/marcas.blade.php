@extends ('layouts.app')
@section('html_title','SLA Dashboard | Marcas de veículos')
<!--Call of template welcome-->
@section('content')
<!--Section to show content to yield -->

<h1 class="h3 mb-3"><strong>Classe » </strong> Configuração de marcas</h1>

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
                                <form method="post" action="{{ route('marca.store') }}">
                                    @csrf
                            <div class="row">
                            <div class="col">
                                <label for="classe">Nome da Marca:</label>
                                <input type="text" class="form-control text-uppercase" name="marca"  id="marca" placeholder="Exemplo de marca - Toyota" required>
                            </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                <button type="submit" class="btn btn-submit">Salvar</button>
                                </div>
                            </div>
                            </form>
                            <div class="row">
                            <h3 class="my-4"> <i class="fa fa-list text-muted"></i>   Lista de marcas</h3>
                            <hr>
                               <!-- tabela de provincias --> 
                               <div class="container">
                               <table id="dataTables" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th></th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($marcas[0]->id))
            @foreach($marcas as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td class="text-uppercase">{{ $item->marca }}</td>
                <td></td>
                <td class="text-left">
		        <a href="" class="btn btn-success btn-sm mb-1" data-toggle="tooltip" data-placement="left" title="Editar Marca"><i class="fa fa-edit" ></i></a>
                <a href="" class="btn btn-danger btn-sm mb-1" onclick=" return confirm('Pretendes excluir Marca?');" data-toggle="tooltip" data-placement="right" title="Excluir Marca..."><i class="fa fa-trash"></i></a>
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