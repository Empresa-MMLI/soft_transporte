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
    <a class="nav-item nav-link" id="nav-veiculos-tab" data-toggle="tab" href="#veiculos" role="tab" aria-controls="veiculos" aria-selected="false"><i class="fa fa-list text-muted"></i> Veículos em Destaques</a>
  </div>
</nav>


<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab">
  <h2 class="my-4"><i class="fa fa-edit text-muted"></i> Novos Veículos</h2>
  <hr>
                                @include('inc.messages')       
                                <!-- form de cadastro de provincias -->
                                <a href="{{ route('veiculo.modelos') }}" id="url_modelos" class="d-none">Buscar Modelos</a>							

                                <form method="post" action="{{ route('veiculos.store') }}" enctype="multipart/form-data">
                                    @csrf
                          

                                    <div class="row my-4">
                            <div class="col">
                                <label for="id_marca">Marca:</label>
                                <select  class="form-control custom-select text-uppercase" name="id_marca" id="id_marca" aria-describedby="addon-wrapping" required>
                                @if(isset($marcas[0]->id))
                                <option value="" selected disabled>Selecionar uma marca...</option>
                                @foreach($marcas as $item)
                                <option value="{{ $item->id }}">{{ $item->marca }}</option>
                                @endforeach
                                @endif
                            </select>
                            </div>
                            <div class="col">
                                <label for="">Modelos <code>(Selecione 1º uma marca de veículo)</code>:</label>
                                <select  class="form-control custom-select text-uppercase" name="id_modelo" id="id_modelo" aria-describedby="addon-wrapping" required>
                                    <option value="">Selecionar um modelo...</option>
                                </select>
                            </div>
                            </div>

                                    <div class="row my-4">
                            <div class="col">
                                <label for="capacidade">Nº Assento:</label>
                                <input type="number" class="form-control" name="capacidade" id="capacidade" min="1" value="4" placeholder="Total de passageiros">
                            </div>
                            <div class="col">
                                <label for="transmissao">Transmissão:</label>
                                <select  class="form-control custom-select text-uppercase" name="transmissao" id="transmissao" aria-describedby="addon-wrapping" required>
                                <option value="0">Manual</option>
                                <option value="1" selected>Automático</option>
                            </select>
                            </div>
                            </div>

                            <div class="row my-4">
                            <div class="col">
                                    <label for="km">kilometragem:</label>
                                    <input type="number" class="form-control" name="km" id="km" min="1" value="1" placeholder="Informe a Kilometragem...">
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
                                <label for="ano_lancamento">Ano de Lançamento:</label>
                                <input type="number" class="form-control" name="ano_lancamento" id="ano_lancamento" min="1999" value="date('Y')" placeholder="Ano de Lançamento" list="anos_lancamentos">
                                <datalist id="anos_lancamentos">
                                    @php $anos = range(1999, strftime('%Y', time()));  @endphp
                                    @foreach($anos as $ano)
                                    <option value="{{ $ano }}" selected>{{ $ano }}</option>
                                    @endforeach
                                <option value=""></option>
                                </datalist>
                            </div>
                            <div class="col">
                                <label for="operadora">Titular <code>(Proprietário do Veículo)</code>:</label>
                                <select  class="form-control custom-select text-uppercase" name="operadora" id="operadora" aria-describedby="addon-wrapping" required>
                                @if(isset($empresas[0]->id))
                                <option value="" selected disabled>Selecionar...</option>
                                @foreach($empresas as $item)
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                @endforeach
                                @endif
                            </select>
                            </div>
                            </div>

                            <div class="row my-4">
                            <div class="col">
                                <label for="litros">Litros <code>(Capacidade máxima)</code>:</label>
                                <input type="number" class="form-control" name="litros" id="litros"  value="1" placeholder="Litros de combustível" required>
                                </div>

                            <div class="col">
                            <label for="foto_url">Carregar Imagem de Destaque (<code>PNG, JPG</code>):</label>
                            <input type="file" class="form-control" id="foto_url" name="foto_url" placeholder="Foto do veículo" required>
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
<div class="container">
<div class="table-responsive">
                               <table id="dataTables" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagem</th>
                <th>Veículo</th>
                <th>Proprietário</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Nº Assentos</th>
                <th>Transmissão</th>
                <th>Combustível</th>
                <th>Kilometragem (Km)</th>
                <th>Litros (L)</th>
                <th>Ano</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
          @php $tem_imagem = 0; @endphp
            @if(isset($veiculos[0]->id))
            @foreach($veiculos as $item)
            <tr>
                <td class="text-center">{{ $item->id }}</td>
                <td>
                    @if(isset($foto_veiculos[0]->veiculo_id))
                    @foreach($foto_veiculos as $foto)
                    @if($foto->veiculo_id == $item->id)
                    <a href="#" foto_veiculo="{{ asset('storage/'.$foto->foto_url) }}" foto_nome="{{ $item->marca.' '.$item->modelo }}"  onclick="event.preventDefault(); $('#foto_veiculo').attr('src', $(this).attr('foto_veiculo')); $('#foto_detalhes').text($(this).attr('foto_nome')); $('#modalImagem').modal('show'); " > <img src="{{ asset('storage/'.$foto->foto_url) }}" alt="Imagem{{ $foto->veiculo_id }}"  class="foto_veiculo"></a>
                    @php $tem_imagem = 1; @endphp
                    @else
                    @if(isset($tem_imagem) && $tem_imagem == 0)
                    <img src="{{ asset('assets/resources/sem_foto.jpg') }}" alt="Imagem00" class="foto_veiculo">
                    @php $tem_imagem = 0; @endphp
                    @endif
                     @endif
                    @endforeach
                   @endif
                </td>
                <td>{{ $item->marca }} {{ $item->modelo }}</td>
                <td class="text-left"><a href="#" class="btn btn-light p-0 m-0" data-toggle="tooltip" data-placement="top" title="Informações do Proprietário do Veículo..."  titular="{{ $item->nome_empresa }}" nif_empresa="{{ $item->nif_empresa }}" telef_empresa="{{ $item->telef_empresa }}" email_empresa="{{ $item->email_empresa }}" onclick="event.preventDefault(); $('#titular').text($(this).attr('titular')); $('#nif_empresa').text($(this).attr('nif_empresa')); $('#telef_empresa').text($(this).attr('telef_empresa')); $('#email_empresa').text($(this).attr('email_empresa')); $('#modalEmpresa').modal('show');"><i class="fa fa-sm fa-info-circle text-muted"></i></a> 
                @if(strlen($item->nome_empresa) >= 20)
                <span data-toggle="tooltip" data-placement="right" title="{{ $item->nome_empresa }}">{{ substr($item->nome_empresa,0,25) }}...</span>
                @else
                {{ $item->nome_empresa }}
                @endif
                </td>
                <td>{{ $item->marca }}</td>
                <td>{{ $item->modelo }}</td>
                <td class="text-center">{{ $item->n_assentos }}</td>
                <td class="text-center">{{ $item->transmissao }}</td>
                <td class="text-center">{{ $item->fluido }}</td>
                <td class="text-right">{{ number_format($item->km,2,'.',',') }}</td>
                <td class="text-center">{{ number_format($item->litros,2,'.',',') }}</td>
                <td>{{ $item->ano }}</td>
                <td class="text-left">
		        <a href="" class="btn btn-success btn-sm mb-1" data-toggle="tooltip" data-placement="left" title="Editar Veículo"><i class="fa fa-edit" ></i></a>
                <a href="" class="btn btn-danger btn-sm mb-1" onclick=" return confirm('Pretendes excluir Veículo?');" data-toggle="tooltip" data-placement="right" title="Excluir Veículo..."><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        </table>
                               <!-- fim tabela de provincias --> 
                            </div></div>
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


<!-- Modal exibir dados da empresa -->
<div class="modal fade" id="modalEmpresa" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-header-modal">
        <h5 class="modal-title text-light" id="confirmModalLabel">Detalhes do Proprietário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-light">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
              <h5>Nome completo: <span id="titular" class="text-muted"></span> </h5>
              <h5>Nº de Contribuinte: <span id="nif_empresa" class="text-muted"></span> </h5>
              <h5>E-mail: <span id="email_empresa" class="text-muted"></span></h5>
              <h5>Telefone: <span id="telef_empresa" class="text-muted"></span> </h5>
          </div>
        </div>
      </div>
     
    </div>
  </div>
</div>

<!-- modal exibir a foto do veiculo --> 
<!-- Modal -->
<div class="modal fade" id="modalImagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header bg-header-modal">
        <h5 class="modal-title text-light text-center" id="exampleModalLabel">Veículo » <span id="foto_detalhes" class="text-warning"></span></h5>
        <button type="button" class="btn close" data-dismiss="modal" aria-label="Close" style="font-size:12px">
          <span class="text-white" aria-hidden="true">X</span>
        </button>
      </div>
      <div class="embed-responsives embed-responsive-16by9s">
    <iframe class="embed-responsive-item" id="foto_veiculo" src="#" width="100%" height="500" ></iframe>
    </div>
     
    </div>
  </div>
</div>
@endsection