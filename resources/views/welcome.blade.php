@extends ('layouts.hello') <!--Call of template welcome-->
@section('content')  <!--Sectino to show content to yield -->
   
<div class="container text-center welcome">
<span> <img src="{{ url('assets/img/logo/logo.png') }}"  alt="logo" class="logo img-responsive"></span><br>
</div>
<div class="bg-content container text-center">

<form action="{{ route('search.res') }}">
<div class="input-group flex-nowrap mb-1">
  <span class="input-group-text search-radius-input" id="addon-wrapping"> <i class="fa fa-search fa-sm text-muted"></i> </span>
  <select  class="form-control custom-select input-radius-md" name="mySearch" id="mySearch"  placeholder="Escolher uma opção..." list="list_opcao" aria-describedby="addon-wrapping">
  <option value="Selecionar uma opção" selected disabled>Selecionar uma opção</option>
    <option value="Comprar Bilhetes">Comprar Bilhetes</option>
    <option value="Alugar Carro">Alugar Carro</option>
    <option value="Comprar B.I e Aluguel Carro">Comprar B.I e Aluguel Carro</option>
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
    <button class="btn btn-submit btn-lg my-2 btn-search" ><i class="fa fa-search fa-sm"></i> Buscar Resultados </button>
    </form>
    <div class="text-center btn-session">
    <span class="small small-text text-dark my-2">Powered By MMLI Soluções, Lda</span>
</div>

@endsection
