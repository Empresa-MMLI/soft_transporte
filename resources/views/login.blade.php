@extends('layouts.hello')
@section('content')
<div class="container form-login">
    <div class="row justify-content-center">
 
        <div class="col-sm-12 col-md-8 col-lg-4">
        <div class="panel-login p-4">
        <form method="post" action="{{ route('login') }}">
            @csrf
    <div class="text-center">
    <span> <img src="{{ url('assets/img/logo/logo.png') }}"  alt="logo" class="logo_auth img-responsive"></span><br>
</div>
            <h3 class="text-center d-none">Iniciar Sessão</h3>
            <div class="dropdown-divider"></div>

@include('inc.messages')            

  <div class="form-group">
    <label for="usuario">Usuário:</label>
    <input type="text" class="form-control" id="user" name="user" placeholder="Email ou Telefone" required>
  
  </div>
  <div class="form-group">
    <label for="senha">Código de acesso:</label>
    <input type="password" class="form-control" id="pass" name="pass" placeholder="Senha secreta" required>
  </div>
  <div class="form-group">
    <a href="{{ route('register') }}" class="text-left text-danger" ><i class="fa fa-lock"></i> Esqueceu a senha.</a> ou  
    <a href="{{ route('register') }}" class="text-left text-dark" ><i class="fa fa-user"></i> Criar nova conta.</a>
  </div>
  <button type="submit" class="btn btn-submit btn-block">Entrar no Sistema</button>
</form>

        </div> 
        </div>
        <a href="{{ route('index') }}" class="text-center" ><small class="small text-dark text-center"><i class="fa fa-globe"></i> SLA - Agência de Turismo | Início</small></a>
    </div>
</div>
@endsection
