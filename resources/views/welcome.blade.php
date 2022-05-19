
@extends ('layouts.hello') <!--Call of template welcome-->
<div class="raw bg-light">
  <div class="col-sm-10"></div>
  <div class="col-sm-1 float-right m-3">
    <a href="https://mmlisolucoes.com/" class="float-right" target="_blank" id="link_mmli">
    <img src="{{ url('assets/resources/logo_mmli.png') }}"  class="logo_mmli img-responsive">
    </a>
  </div>
</div>
@section('content')  <!--Sectino to show content to yield -->


<div class="containers text-center welcome mb-4">
<span> <img src="{{ url('assets/img/logo/logo.png') }}"  alt="logo" class="logo img-responsive"></span><br>
</div>
<div class="bg-contents text-center">
<div class="row justify-content-center">
<div class="col-sm-12 col-md-10 col-lg-9">
<form action="{{ route('search.res') }}">
<div class="input-group flex-nowrap mb-1">
  <span class="input-group-text search-radius-input" id="addon-wrapping"> <i class="fa fa-search fa-sm text-muted"></i> </span>
  <select  class="form-control custom-select input-radius-md" name="mySearch" id="mySearch"  placeholder="Escolher uma opção..." list="list_opcao" aria-describedby="addon-wrapping">
  <option value="Selecionar uma opção" selected disabled>Selecionar uma opção</option>
    <option value="Comprar Bilhetes">Comprar Bilhetes</option>
    <option value="Alugar Carro">Alugar Carro</option>
    <option value="Comprar B.I e Aluguel Carro">Comprar B.I e Aluguer de Carros</option>
  </select>
</div>

  <!-- <input type="search" class="form-control input-radius-md" name="mySearch" id="mySearch"  onclick=" $('#myUL').css('display','block'); " onkeyup="myFunction();" placeholder="Escolher uma opção..." list="list_opcao" aria-describedby="addon-wrapping">

</div>
<ul id="myUL" style="display:none">
  
  <li><a href="#">Comprar Bilhetes</a></li>
  <li><a href="#">Alugar Carro</a></li>
  <li><a href="#">Comprar B.I e Aluguel Carro</a></li>
</ul>
--> 
    <button class="btn btn-submit btn-lg my-2 btn-search text-hello" > Avançar <i class="fa fa-arrow-right fa-sm"></i> </button>
    </form>
</div>
</div>
    <div class="text-center btn-session d-none">
    <p class="text-dark my-2 text-hello"><strong class="text-padrao">Últimas novidades</strong>  <span class="text-small text-muted">"Novo Ponto de Embarque adicionada a Plataforma..."</span> </p>
</div>
</div></div></div>

  <div class="row px-4s pt-3 bg-footer">
    
      <h6 class="text mx-4 px-3 mb-2 w-100 pb-2">SLA - Agência de Turismo</h6>
      <div class=" w-100" style="border:1px solid #dadce2"></div>
      <div class="col-sm-12 pb-0 mb-0 px-3 mx-2 pt-2">
    <ul class="list-inline nav-list px-3">
  <li class="list-inline-item">
  <a class="nav-links" href="{{ route('comprar.bilhete') }}"> Bilhetes e Horários</a>
  </li>
  <li class="list-inline-item">
  <a class="nav-links" href="{{ route('pontos') }}"> Pontos de Venda e Embarque</a>
  </li>
  <li class="list-inline-item">
  <a class="nav-links" href="{{ route('aluguer.carro') }}"> Aluguer de Carro</a>
  </li>
  <li class="list-inline-item">
  <a class="nav-links" href="{{ route('planos') }}"> Planos e Preçários</a>
  </li>
  <li class="list-inline-item">
  <a class="nav-links" href="{{ route('contacts') }}"> Contactos</a>
  </li>
  </ul>
  </div>
</div>

@endsection
