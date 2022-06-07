@extends ('layouts.visitor') <!--Call of template welcome-->
@section('content')  <!--Sectino to show content to yield -->
<!-- banner principal -->
<div class="banner-box-img3">
<div class="banner-escuro-img3">
    <div class="container">
           <div class="row">
               <div class="col-8">
               <h1 class="header-title padding-top">
            Quer Alugar uma Viatura?
            </h1>
            <p class="padding-text py-4">
            A SLA oferece os melhores veículos com tecnologia de ponta que combinam com seus gostos, peça um veículo, viaje e faça um Turismo simples e seguro!
            </p>
        <a href="#veiculos" class="sb-searchbtn__button btn-header text-white px-4">Alugar agora!</a>
               </div>
           </div>
    </div>
</div>
</div>
<!-- end banner --> 
<div class="container">
    <!-- title -->
<div class="col-12">
					<div class="main__title main__title--page">
						<h2>Uma forma diferente de satisfazer seus gostos!</h2>
					</div>
				</div>
				<!-- end title -->
                <div class="row">
				<!-- sidebar -->
				<div class="col-12 col-xl-3 order-xl-1">
						<form method="post" action="#">
					<div class="filter-wrap">
						<button class="filter-wrap__btn" type="reset" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter"><span>Open filter</span></button>

						<div class="collapse filter-wrap__content" id="collapseFilter">
							<!-- filter -->
							<div class="filter filter--left filter--sticky">
								<h4 class="filter__title">Filtros <button class="text-danger" type="button">Limpar</button></h4>

								<div class="filter__group">
									<label class="filter__label">Pesquisar:</label>
									<input type="text" class="filter__input" placeholder="Marca ou Modelo">
								</div>

								<div class="filter__group">
									<label for="brands" class="filter__label">Marcas e Modelos:</label>

									<div class="filter__select-wrap">
										<select name="brands" id="brands" class="filter__select text-uppercase">
											@if(isset($marcas[0]->id))
                                <option value="" selected disabled>Selecionar uma marca...</option>
                                @foreach($marcas as $item)
                                <option value="{{ $item->marca_id }}">{{ $item->marca }} {{ $item->modelo }}</option>
                                @endforeach
                                @endif
										</select>
									</div>
								</div>

								<div class="filter__group">
									<label class="filter__label">Transmição:</label>
									<ul class="filter__checkboxes">
										<li>
											<input id="type5" type="checkbox" name="type" checked="">
											<label for="type5">Automático</label>
										</li>
										<li>
											<input id="type6" type="checkbox" name="type">
											<label for="type6">Manual</label>
										</li>
									</ul>
								</div>

								<div class="filter__group">
									<label class="filter__label">Combustível:</label>
									<ul class="filter__checkboxes">
									@if(isset($fluidos[0]->id))
                                @foreach($fluidos as $item)
								<li>
											<input class="form-check-input" type="radio" name="fluido" id="fluido{{ $item->id }}" value="{{ $item->fluido }}">
											<label for="fluido{{ $item->id }}" class="form-check-label">{{ $item->fluido }}</label>
							   </li>
								@endforeach
                                @endif
									
									</ul>
								</div>

								<div class="filter__group">
									<button class="filter__btn" type="submit"><span>Iniciar Filtrar</span></button>
								</div>
							</div>
</form>
							<!-- end filter -->
						</div>
					</div>
				</div>
<!-- end sidebar --> 
<!-- content -->
<div class="col-12 col-xl-9 order-xl-2 mb-4" id="veiculos">
					<div class="row row--grid">
						<!-- car -->
						@php $tem_imagem = 0; @endphp
            @if(isset($veiculos[0]->id))
            @foreach($veiculos as $item)
            			<div class="col-sm-12 col-md-6 col-lg-6">
							<div class="car">
								<div class="splide splide--card car__slider">
									<div class="splide__arrows d-none">
										<button class="splide__arrow splide__arrow--prev" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z"></path></svg></button>
										<button class="splide__arrow splide__arrow--next" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"></path></svg></button>
									</div>

									<div class="splide__track">
										<ul class="splide__list">
											<li class="splide__slide">
											@if(isset($foto_veiculos[0]->veiculo_id))
                    @foreach($foto_veiculos as $foto)
                    @if($foto->veiculo_id == $item->id)
                    <a href="#" foto_veiculo="{{ asset('storage/'.$foto->foto_url) }}" foto_nome="{{ $item->marca.' '.$item->modelo }}"  onclick="event.preventDefault(); $('#foto_veiculo').attr('src', $(this).attr('foto_veiculo')); $('#foto_detalhes').text($(this).attr('foto_nome')); $('#modalImagem').modal('show'); " > <img src="{{ asset('storage/'.$foto->foto_url) }}" alt="Imagem{{ $foto->veiculo_id }}"  class="foto_veiculo"></a>
                    @php $tem_imagem = 1; @endphp
                    @else
                    @if(isset($tem_imagem) && $tem_imagem == 0)
                    <img src="{{ asset('assets/resources/sem_foto.jpg') }}" alt="Imagem00" class="foto_veiculo">
                    @php echo $tem_imagem = 0; @endphp
                    @endif
                     @endif
                    @endforeach
                   @endif
											</li>
										</ul>
									</div>
								</div>
								<div class="car__title">
									<h5 class="car__name"><a href="#" class="p-0 m-0" data-toggle="tooltip" data-placement="top" title="Informações do Proprietário do Veículo..."  titular="{{ $item->nome_empresa }}" nif_empresa="{{ $item->nif_empresa }}" telef_empresa="{{ $item->telef_empresa }}" email_empresa="{{ $item->email_empresa }}" onclick="event.preventDefault(); $('#titular').text($(this).attr('titular')); $('#nif_empresa').text($(this).attr('nif_empresa')); $('#telef_empresa').text($(this).attr('telef_empresa')); $('#email_empresa').text($(this).attr('email_empresa')); $('#modalEmpresa').modal('show');"><i class="fa fa-sm fa-info-circle"></i> {{ $item->marca.' '.$item->modelo }} </a></h5>
									<span class="car__year">{{ $item->ano }}</span>
								</div>
								<ul class="car__list">
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z"/></svg>
										<span>{{ $item->n_assentos }} Pessoa(s)</span>
									</li>
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20.54,6.29,19,4.75,17.59,3.34a1,1,0,0,0-1.42,1.42l1,1-.83,2.49a3,3,0,0,0,.73,3.07l2.95,3V19a1,1,0,0,1-2,0V17a3,3,0,0,0-3-3H14V5a3,3,0,0,0-3-3H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3h6a3,3,0,0,0,3-3V16h1a1,1,0,0,1,1,1v2a3,3,0,0,0,6,0V9.83A5,5,0,0,0,20.54,6.29ZM12,19a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V12h8Zm0-9H4V5A1,1,0,0,1,5,4h6a1,1,0,0,1,1,1Zm8,1.42L18.46,9.88a1,1,0,0,1-.24-1l.51-1.54.39.4A3,3,0,0,1,20,9.83Z"/></svg>
										<span>{{ $item->fluido }}</span>
									</li>
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19.088,4.95453c-.00732-.00781-.00952-.01819-.01715-.02582s-.01819-.00995-.02606-.01733a9.97886,9.97886,0,0,0-14.08948,0c-.00787.00738-.01837.00964-.02606.01733s-.00983.018-.01715.02582a10,10,0,1,0,14.1759,0ZM12,20a7.9847,7.9847,0,0,1-6.235-3H9.78027a2.9636,2.9636,0,0,0,4.43946,0h4.01532A7.9847,7.9847,0,0,1,12,20Zm-1-5a1,1,0,1,1,1,1A1.001,1.001,0,0,1,11,15Zm8.41022.00208L19.3999,15H15a2.99507,2.99507,0,0,0-2-2.81573V9a1,1,0,0,0-2,0v3.18427A2.99507,2.99507,0,0,0,9,15H4.6001l-.01032.00208A7.93083,7.93083,0,0,1,4.06946,13H5a1,1,0,0,0,0-2H4.06946A7.95128,7.95128,0,0,1,5.68854,7.10211l.65472.65473A.99989.99989,0,1,0,7.75732,6.34277l-.65466-.65466A7.95231,7.95231,0,0,1,11,4.06946V5a1,1,0,0,0,2,0V4.06946a7.95231,7.95231,0,0,1,3.89734,1.61865l-.65466.65466a.99989.99989,0,1,0,1.41406,1.41407l.65472-.65473A7.95128,7.95128,0,0,1,19.93054,11H19a1,1,0,0,0,0,2h.93054A7.93083,7.93083,0,0,1,19.41022,15.00208Z"/></svg>
										<span>{{ number_format($item->km,2,'.',',') }}km / {{ number_format($item->litros,2,'.',',') }}-litro(s)</span>
									</li>
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12,12a1,1,0,1,0,1,1A1,1,0,0,0,12,12Zm9.71-2.36a0,0,0,0,1,0,0,10,10,0,0,0-19.4,0,0,0,0,0,1,0,0,9.75,9.75,0,0,0,0,4.72,0,0,0,0,1,0,0A10,10,0,0,0,9.61,21.7h0a9.67,9.67,0,0,0,4.7,0h0a10,10,0,0,0,7.31-7.31,0,0,0,0,1,0,0,9.75,9.75,0,0,0,0-4.72ZM12,4a8,8,0,0,1,7.41,5H4.59A8,8,0,0,1,12,4ZM4,12a8.26,8.26,0,0,1,.07-1H6v2H4.07A8.26,8.26,0,0,1,4,12Zm5,7.41A8,8,0,0,1,4.59,15H7a2,2,0,0,1,2,2Zm4,.52A8.26,8.26,0,0,1,12,20a8.26,8.26,0,0,1-1-.07V18h2ZM13.14,16H10.86A4,4,0,0,0,8,13.14V11h8v2.14A4,4,0,0,0,13.14,16ZM15,19.41V17a2,2,0,0,1,2-2h2.41A8,8,0,0,1,15,19.41ZM19.93,13H18V11h1.93A8.26,8.26,0,0,1,20,12,8.26,8.26,0,0,1,19.93,13Z"/></svg>
										<span>{{ $item->transmissao }}</span>
									</li>
								</ul>
								<div class="car__footer">
									<span class="car__price"> {{ $item->preco }} <sub class="d-none">/ hora</sub></span>
									<button class="car__favorite" type="button" aria-label="Add to favorite"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20.16,5A6.29,6.29,0,0,0,12,4.36a6.27,6.27,0,0,0-8.16,9.48l6.21,6.22a2.78,2.78,0,0,0,3.9,0l6.21-6.22A6.27,6.27,0,0,0,20.16,5Zm-1.41,7.46-6.21,6.21a.76.76,0,0,1-1.08,0L5.25,12.43a4.29,4.29,0,0,1,0-6,4.27,4.27,0,0,1,6,0,1,1,0,0,0,1.42,0,4.27,4.27,0,0,1,6,0A4.29,4.29,0,0,1,18.75,12.43Z"/></svg></button>
									<a href="#" class="car__more text-white"><span>Alugar agora!</span></a>
								</div>
							</div>
						</div>
						<!-- end car -->
						@endforeach
						@endif
							</div>
						</div>

						<div class="col-12 d-none">
							<button class="main__load" type="button" data-toggle="collapse" data-target="#collapsemore3" aria-expanded="false" aria-controls="collapsemore3"><span>Carregar mais...</span></button>
						</div>
						<!-- end collapse -->
					</div>
				</div>
</div>
                <!-- end content -->
<!-- search e results -->

<!-- end search e resuts -->


<!-- Modal exibir dados da empresa -->
<div class="modal fade" id="modalEmpresa" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
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
  <div class="modal-dialog modal-dialog-centered" role="document">
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
