@if(isset($erros) && count($errors) > 0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
   <i class="fa fa-info-circle"></i> {{ $error }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
    @endforeach
@endif

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
   <i class="fa fa-info-circle"></i> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif

  @if(session('warning'))
<div class="alert alert-warning alert-dismissible fade show text-dark" role="alert">
   <i class="fa fa-alert"></i> {{ session('warning') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<i class="fa fa-info-circle"></i> {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@if(session('error_compra'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<i class="fa fa-info-circle"></i> {{ session('error_compra') }} <a href="/sessao" class="text-dark">Verificar movimentos da Conta.</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif