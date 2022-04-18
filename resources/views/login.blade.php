@extends('layouts.hello')
@section('content')
<div class="container form-login">
    <div class="row justify-content-center">
 
        <div class="col-sm-12 col-md-8 col-lg-4">
        <div class="panel-login p-4">
        <form method="post" action="{{ route('login') }}">
            @csrf
    <div class="text-center">
<span> <img src="{{ url('assets/img/logo/logo.png') }}"  alt="logo" class="logo_oficial img-responsive"></span>
</div>
            <h3 class="text-center d-none">Iniciar Sessão</h3>
            <div class="dropdown-divider"></div>
@error('error')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
   <i class="fas fa-info-circle"></i> {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @enderror
@error('warning')
<div class="alert alert-warning text-dark alert-dismissible fade show" role="alert">
<i class="fa fa-warning text-warning"></i> {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@enderror

  <div class="form-group">
    <label for="usuario">Usuário:</label>
    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Email ou Telefone" required>
  
  </div>
  <div class="form-group">
    <label for="senha">Código de acesso:</label>
    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha secreta" required>
  </div>
  <div class="form-group form-check mb-2">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Lembrar-me</label>
  </div>
  <button type="submit" class="btn btn-submit btn-block">Entrar no Sistema</button>
</form>

        </div> 
        </div>
        <a href="{{ route('index') }}" class="text-center" ><small class="small text-light text-center"><i class="fas fa-home"></i> Voltar a Tela Principal</small></a>
    </div>
</div>
@endsection
