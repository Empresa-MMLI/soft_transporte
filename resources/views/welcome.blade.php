@extends ('layouts.hello') <!--Call of template welcome-->
@section('content')  <!--Sectino to show content to yield -->
   
<div class="container text-center welcome">
<span> <img src="{{ url('assets/img/logo/logo_branco.png') }}"  alt="logo" class="logo img-responsive"></span><br>
</div>
<div class="bg-content container text-center">
    <h1 class="header-title">Gestão de Empresas</h1>
    <div class="text-center btn-session">
    <a href="{{ route('sessao') }}" class="btn btn-submit btn-lg my-2">Gerir Empresa</a><br>
    <span class="small small-text text-light my-2">Powered By MMLI Soluções, Lda</span>
</div>
@endsection
