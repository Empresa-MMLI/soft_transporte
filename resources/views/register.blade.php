@extends('layouts.hello')
@section('content')
<div class="container form-login">
    <div class="row justify-content-center">
 
        <div class="col-sm-12 col-md-8 col-lg-8">
        <div class="panel-login p-4">
        <form method="post" action="{{ route('user.store') }}">
            @csrf
    <div class="text-center">
    <a href="{{ route('index') }}"> <img src="{{ url('assets/img/logo/logo.png') }}"  alt="logo" class="logo_auth_0 img-responsive"></a><br>
</div>
            <h5 class="text-center d-nones mt-4"><i class="fa fa-edit"></i> Formulário de cadastro</h5>
            <div class="dropdown-divider mb-4"></div>
            
@include('inc.messages')  
<div class="row">
  <div class="col-sm-12 col-md-6">
  <div class="form-group">
    <label for="tipo">Tipo de conta:</label>
    <select  class="form-control custom-select text-capitalize" name="tipo" id="tipo" aria-describedby="addon-wrapping" onchange=" criar_conta($(this).val());" required>
    @if(isset($tipo_users[0]->id))
    @foreach($tipo_users as $tipo)
    @if($tipo->id == 3)
    <option value="{{ $tipo->id }}" selected>{{ $tipo->tipo_usuario }}</option>
    @else
    <option value="{{ $tipo->id }}">{{ $tipo->tipo_usuario }}</option>
    @endif

    @endforeach
    @endif
  </select>
  </div>   
  </div>

  <div class="col-sm-12 col-md-6">
<div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Empresa ou cliente" required>
  </div>
  </div>
</div>

  <!-- detalhes da empresa -->
  <div id="empresa_dados" style="display:none">
  
<div class="row">
  <div class="col-sm-12 col-md-6">
  <div class="form-group">
    <label for="nif">Nif:</label>
    <input type="text" class="form-control" id="nif" name="nif" placeholder="Nif reconhecido pela AGT">
  </div>
  </div>

  <div class="col-sm-12 col-md-6">
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" value="example@dominio.com" name="email" onfocus="$(this).val('');" placeholder="Email" required>
  </div>
</div>
</div>

<div class="row">
<div class="col-sm-12 col-md-6">
  <div class="form-group">
    <label for="telefone">Telefone:</label>
    <input type="tel" class="form-control" id="telefone" name="telefone" value="9xxxxxxxx" onfocus="$(this).val('');" placeholder="Telefone válido" required>
  </div>
</div>

  <div class="col-sm-12 col-md-6">
  <div class="form-group">
    <label for="telefone">Endereço físico:</label>
    <textarea class="form-control" id="endereco" name="endereco" placeholder="Endereço sede..." onfocus="$(this).val('');" required>Luanda-Angola</textarea>
  </div>
</div>
  </div>
  </div>
  <!-- fim detalhes da empresa -->

  <!-- detalhes do cliente --> 

  <div id="cliente_dados">

<div class="row">
<div class="col-sm-12 col-md-6">
  <div class="form-group">
    <label for="email_cliente">Email:</label>
    <input type="email" class="form-control" id="email_cliente" name="email_cliente" value="example@sla.com" onfocus="$(this).val('');" placeholder="Email válido">
  </div>
</div>

<div class="col-sm-12 col-md-6">
  <div class="form-group">
    <label for="telefone_cliente">Telefone:</label>
    <input type="tel" class="form-control" id="telefone" name="telefone_cliente" value="9xxxxxxxx" onfocus="$(this).val('');" placeholder="Telefone válido" required>
  </div>
</div>
</div>

<div class="row">
<div class="col-sm-12 col-md-6">
  <div class="form-group">
    <label for="tipo_doc">Tipo Documento:</label>
    <select  class="form-control custom-select text-capitalize" name="tipo_doc" id="tipo_doc" aria-describedby="addon-wrapping">
    <option value="" selected disabled>Selecionar...</option>
    <option value="BI">Bilhete de Identidade</option>
    <option value="PP">Passaporte</option>
    <option value="Outro">Outro...</option>
    </select>
  </div>  
</div>

<div class="col-sm-12 col-md-6">
  <div class="form-group">
    <label for="n_doc">Nº Documento:</label>
    <input type="text" class="form-control" id="n_doc" name="n_doc" value="00" onfocus="$(this).val('');"  placeholder="Nº Documento apresentado" required>
  </div>
</div>
  </div>
  </div>
  <!-- fim detalhes do cliente --> 

<div class="row">
<div class="col-sm-12 col-md-6">
  <div class="form-group">
    <label for="usuario">Usuário:</label>
    <input type="text" class="form-control" id="user" name="user" placeholder="Email ou Telefone" required>
  </div>
</div>

<div class="col-sm-12 col-md-6">
  <div class="form-group">
    <label for="senha">Código de acesso:</label>
    <input type="password" class="form-control" id="pass" name="pass" placeholder="Senha secreta" required>
  </div>
  </div>
  </div>
  <button type="submit" class="btn btn-submit btn-block">Criar conta</button>
</form>
<div class="text-center my-2">
        <a href="{{ route('sessao') }}" class="text-center" ><small class="small text-dark text-center"><i class="fa fa-globe"></i> SLA - Agência de Turismo | Login</small></a>
    </div>
    </div>
</div>
@endsection
