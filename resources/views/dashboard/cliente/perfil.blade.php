@extends ('layouts.app_cliente')
@section('html_title','SLA Dashboard | Perfil do cliente SLA')
<!--Call of template welcome-->
@section('content')
<!--Section to show content to yield -->

<h1 class="h3 mb-3"><strong>Conta cliente » </strong> Configurações da Conta</h1>

<div class="row">
    <div class="d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-12"><!--  -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <h2 class="my-4"><i class="fa fa-info-circle text-muted"></i> Informações pessoais</h2>
                                <hr>
                                @include('inc.messages')       
                                <!-- form de cadastro de provincias -->
                                <form method="post" action="{{ route('cliente.update') }}">
            @csrf
 
<div class="form-group">
    <label for="tipo">Tipo de conta:</label>
    <select  class="form-control custom-select text-capitalize" name="tipo" id="tipo" aria-describedby="addon-wrapping" onchange=" criar_conta($(this).val());" required disabled>
    <option value="3" selected readonly>Cliente</option>
  </select>
  </div>          
<div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{ $dados->nome }}" placeholder="Nome" required>
    <input type="hidden" class="form-control" id="id_user" name="id_user" value="{{ $dados->id_usuario }}"  placeholder="Nº Documento apresentado" required>

  </div>
  <!-- detalhes do cliente --> 
 <div id="cliente_dados">
  <div class="form-group">
    <label for="email_cliente">Email:</label>
    <input type="email" class="form-control" id="email_cliente" name="email_cliente" value="{{ $dados->email }}" placeholder="Email válido">
  </div>
  <div class="form-group">
    <label for="telefone_cliente">Telefone:</label>
    <input type="tel" class="form-control" id="telefone" name="telefone_cliente" value="{{ $dados->telefone }}" placeholder="Telefone válido" required>
  </div>
  <div class="form-group">
    <label for="tipo_doc">Tipo Documento:</label>
    <select  class="form-control custom-select text-capitalize" name="tipo_doc" id="tipo_doc"  aria-describedby="addon-wrapping">
    @if($dados->tipo_doc == "BI")
    <option value="{{ $dados->tipo_doc }}" selected>Bilhete de Identidade</option>
    <option value="PP">Passaporte</option>
    <option value="Outro">Outro...</option>
    @else
    @if($dados->tipo_doc == "PP")
    <option value="{{ $dados->tipo_doc }}" selected>Passaporte</option>
    <option value="BI">Bilhete de Identidade</option>
    <option value="Outro">Outro...</option>
    @else
    <option value="{{ $dados->tipo_doc }}">{{$dados->tipo_doc }}</option>
    <option value="BI">Bilhete de Identidade</option>
    <option value="PP">Passaporte</option>
    @endif
    @endif
    </select>
  </div>  
  <div class="form-group">
    <label for="n_doc">Nº Documento:</label>
    <input type="text" class="form-control" id="n_doc" name="n_doc" value="{{ $dados->n_doc }}"  placeholder="Nº Documento apresentado" required>
  </div>
  </div>
  <!-- fim detalhes do cliente --> 
  <div class="form-group">
    <label for="usuario">Usuário:</label>
    <input type="text" class="form-control" id="user" name="user" placeholder="Email ou Telefone" value="{{ $acesso->email }}" required>
  </div>
  <div class="form-group">
    <label for="senha">Código de acesso:</label>
    <input type="password" class="form-control" id="pass" name="pass" placeholder="Senha secreta" value="{{ $acesso->password }}" onfocus="$(this).val('');$(this).attr('readonly',false);" required readonly>
  </div>
  <button type="submit" class="btn btn-success btn-block"> <i class="fa fa-edit"></i>   Actualizar</button>
</form>
                          
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection