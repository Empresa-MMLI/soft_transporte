@extends('layouts.hello')
@section('content')
<div class="container form-login">
    <div class="row justify-content-center">
 
        <div class="col-sm-12 col-md-8 col-lg-6">
        <div class="panel-login p-4">
        <form method="post" action="{{ route('login.root') }}">
            @csrf
            <div class="text-center">
    <a href="{{ route('index') }}"> <img src="{{ url('assets/img/logo/logo.png') }}"  alt="logo" class="logo_auth img-responsive"></a><br>
</div>
            <h5 class="text-center text-danger d-nones mt-4"><i class="fa fa-lock"></i> Acesso Restrito</h5>
            <div class="dropdown-divider mb-4"></div>

@include('inc.messages')            

  <div class="form-group">
    <label for="usuario">Usuário:</label>
    <input type="text" class="form-control" id="user" name="user" placeholder="Email ou Telefone" required>
  
  </div>
  <div class="form-group">
    <label for="senha">Código de acesso:</label>
    <input type="password" class="form-control" id="pass" name="pass" placeholder="Senha secreta" required>
  </div>
  <button type="submit" class="btn btn-submit btn-block">Entrar no Sistema</button>
</form>
    <div class="text-center my-2">
        <a href="{{ route('index') }}" class="text-center" ><small class="small text-dark text-center"><i class="fa fa-globe"></i> SLA - Agência de Turismo | Início</small></a>
    </div></div>
</div>
@endsection
