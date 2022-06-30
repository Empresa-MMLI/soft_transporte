<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="description" content="SLA - Agência de Turismo & Prestação de Serviços Lda. Somos responsável por garantir segurança e conforto em suas viagens.">
	  <meta name="author" content="M.M.L.I.- SOLUCÕES COMÉRCIO E P. DE SERVICOS LDA">
	  <meta name="keywords" content="Facilita, Gestão, Software de Gestão de Empresas, Empresa, mmlisoluções, mmlisolucoes,soluões">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Styles -->
    <!--<link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="{{ url('assets/css/hello.css') }}?r=<?php echo random_int(1,50); ?>" rel="stylesheet">
  <link href="{{ url('assets/css/bootstrap.grid.min.css') }}" rel="stylesheet"> 
	<link rel="stylesheet" href="{{ asset('assets/css/datatimepicker.min.css') }}">
  <!--<link rel="stylesheet" href="{{ asset('assets/css/splides.min.css') }}">-->
	<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style0.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/styles3.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/styles4.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/styles5.css') }}">

    <link href="{{ url('assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/fontawesome.min.css') }}" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('assets/img/logo/ico.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets/img/logo/ico.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/img/logo/ico.png') }}">
    <meta name="description" content="Facilita Viages e Alguer de Carros">
	<meta name="keywords" content="Viagens Alugar Carro Interprovincial Reservar Viagens Comprar Bilhetes Passageiro Lugares">
	<meta name="author" content="MMLI Soluções">
  <link href="//db.onlinewebfonts.com/c/fa8cbf16882d4c4c3336976be40d9410?family=Carnas-Medium" rel="stylesheet" type="text/css"/>
  @yield('map_links')
</head>
    <body>
    <!-- Config da tela de boas vindas-->
    	<!-- header -->
        <nav class="navbar navbar-expand static-top p-1">
<div class="container">
  <div class="row">
<div class="col-sm-8 col-md-6 col-lg-4 text-left">
<a class="navbar-brand " href="{{ route('index') }}">
    <img src="{{ url('assets/img/logo/logo.png') }}"  alt="logo" class="logotipo img-responsive">
    </a>
</div>
<div class="d-none d-sm-none d-md-block col-sm-6 col-sm col-md-6 col-lg-4 mt-4">
<ul class="list-group list-group-horizontal timeTable text-center p-2">
  <li class="list-group-items"><i class="fa fa-calendar"></i> Segunda - Domingo <i class="fa fa-clock"></i> 8:00 Am - 10:00 Pm</li>
</ul>
</div>

<div class="d-none d-sm-none d-md-block col-sm-6 col-md-6 col-lg-4 text-center">
<div class="header__action">
    <div class="header__action">
								<a class="btn btn-outline-primary" href="{{ route('register') }}">
								 <i class="fa fa-user"></i>	Registar
								</a>
							</div>
                            <div class="header__action">
								<a class="btn btn-outline-primary" href="{{ route('sessao') }}">
                                <i class="fa fa-lock"></i> Iniciar Sessão
								</a>
							</div>

				</div>
</div>

</div>
</div>
  </nav>
	<header class="header">
        <div class="container">
        <nav class="navbar navbar-expand-lg">
<!--  <a class="navbar-brand" href="#">Página inicial</a>-->
  <button class="navbar-toggler text-dark" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="text-light">
      <i class="fa fa-bars"></i>
    </span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item {{ (Session::has('link_ativo') && Session::get('link_ativo') == 'home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}"><i class="fa fa-home"></i> Página inicial <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item {{ (Session::has('link_ativo') && Session::get('link_ativo') == 'comprar.bilhete') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('comprar.bilhete') }}"><i class="fa fa-credit-card-alt"></i> Bilhetes e Horários</a>
      </li>
      <li class="nav-item {{ (Session::has('link_ativo') && Session::get('link_ativo') == 'pontos') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('pontos') }}"><i class="fa fa-map-marker"></i> Pontos de Venda e Embarque</a>
      </li>
      <li class="nav-item {{ (Session::has('link_ativo') && Session::get('link_ativo') == 'aluguer.veiculos') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('aluguer.veiculos') }}"><i class="fa fa-bus"> </i> Alugueres de Carros</a>
      </li>
      <li class="nav-item {{ (Session::has('link_ativo') && Session::get('link_ativo') == 'planos') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('planos') }}"><i class="fa fa-list"></i> Planos e Preçários</a>
      </li>
      
      <li class="nav-item {{ (Session::has('link_ativo') && Session::get('link_ativo') == 'contacts') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('contacts') }}"><i class="fa fa-phone"></i> Contactos</a>
      </li>
    </ul>
  </div>
</nav>

		</div>
        
	</header>
    <!-- end header -->
    <div id='app'>
    <main>
         @yield('content')
    </main>
    </div>
    
    <footer class="footer px-4">
     <div class="container"> 
      <div class="row">
        <div class="col-sm-12 col-md-3 col-lg-4 p-0">
        <ul class="Footer--footer__listVertical--2Hxvk">
          <li>
          <a href="#" title="SLA Agência - Logotipo" class="footer-img-logo" target="" rel="">
            <img class="footer-img-logo" src="{{ url('assets/images/logo/logo_branco.png') }}" alt="SLA Agência de Turismo- Logotipo" title="SLA Agência de Turismo - Logotipo" loading="lazy">
          </a>
        </li>
        <li>
        <a href="https://itunes.apple.com/pt/app/myrne/id551700536?mt=8" title="Instale a app iOS MySLA pela App Store" class="footer-img-logo" target="_blank" rel="noopener noreferrer">
          <img class="footer-img-logo" src="https://rnemedia.blob.core.windows.net/images/website/AppStore_PT.png" alt="Instale a app iOS SLA pela App Store" title="Instale a app iOS SLA pela App Store" loading="lazy">
        </a>
        </li>
        <li>
        <a href="https://play.google.com/store/apps/details?id=pt.beware.myrne" title="Instale a app Android SLA pelo Google Play" class="footer-img-logo" target="_blank" rel="noopener noreferrer">
          <img class="footer-img-logo" src="https://rnemedia.blob.core.windows.net/images/website/GooglePlay_PT.png" alt="Instale a app Android SLA pelo Google Play" title="Instale a app Android SLA pelo Google Play" loading="lazy">
        </a>
     </li>
    </ul>
    <p class="Footer--footer__copyrightItems--1FCqx footer__copyright" style="margin-left: 0px;">© {{ date('Y') }} Agência SLA | Todos os direitos reservados</p>
        </div>


        <div class="col-sm-12 col-md-3 col-lg-3 p-0">
        <ul class="Footer--footer__listVertical--2Hxvk">
        <li><p class="footer__title">Receba as nossas novidades</p></li>
        <li><a class="Footer--footer__subscribeLink--2HNIJ" href="#" target="_blank" rel="noopener noreferrer" title="Subscreva a nossa newsletter"><button class="footer__subscribeBtn">Registar</button></a></li>
        </ul>  
      </div>

        <div class="col-sm-12 col-md-3 col-lg-2 p-0">
        <ul class="Footer--footer__listVertical--2Hxvk">
          <li><p class="footer__title">Acesso rápido</p></li>
          <li class="footer__links"><a href="#" title="Pesquisa, reserva viagens e garante os teus bilhetes" target="" rel="">Bilhetes e horários</a></li>
          <li class="footer__links"><a href="#" title="Consulta as nossas FAQs" target="" rel="">FAQs</a></li>
          <li class="footer__links"><a href="#" title="Consulta os nossos contactos" target="" rel="">Contactos</a></li>
          <li class="footer__links"><a href="#" title="Feedback - Ajude-nos a melhorar os nossos serviços e a sua satisfação." target="_blank" rel="noopener noreferrer">Feedback</a></li>
        </ul>
        </div>

        <div class="col-sm-12 col-md-3 col-lg-3 p-0">
        <ul class="Footer--footer__listVertical--2Hxvk">
          <li><p class="footer__title">Siga as nossas novidades </p></li>
          <li><p class="footer__text">Veja as novidades no nosso feed do Instagram e conecte-se connosco no Facebook, Instagram, Twitter e muito mais</p></li>
          <div class="Footer--footer__socialIconsWrapper--UUIR1">
            <li class="Footer--footer__itemIcon--2uF-8">
              <a href="https://www.facebook.com/" title="Vê e interage com o Facebook da Agência SLA" target="_blank" rel="noopener noreferrer">
                <img src="https://rnemedia.blob.core.windows.net/images/website/Facebook_Footer.png" alt="Vê e interage com o Facebook da Agência SLA" title="Vê e interage com o Facebook da Agência SLA" loading="lazy">
              </a></li>
              <li class="Footer--footer__itemIcon--2uF-8">
                <a href="https://www.instagram.com/" title="Vê e interage com o Instagram da Agência SLA" target="_blank" rel="noopener noreferrer">
                  <img src="https://rnemedia.blob.core.windows.net/images/website/Instagram_Footer.png" alt="Vê e interage com o Instagram da Agência SLA" title="Vê e interage com o Instagram da Agência SLA" loading="lazy">
                </a></li>
                <li class="Footer--footer__itemIcon--2uF-8"><a href="https://twitter.com/" title="Vê e interage com o Twitter da Agência SLA" target="_blank" rel="noopener noreferrer">
                  <img src="https://rnemedia.blob.core.windows.net/images/website/Twitter_Footer.png" alt="Vê e interage com o Twitter da Agência SLA" title="Vê e interage com o Twitter da Agência SLA" loading="lazy"></a>
                </li>
                <li class="Footer--footer__itemIcon--2uF-8"><a href="https://www.youtube.com/" title="Vê e interage com o Youtube da Agência SLA" target="_blank" rel="noopener noreferrer">
                  <img src="https://rnemedia.blob.core.windows.net/images/website/Youtube_Footer.png" alt="Vê e interage com o Youtube da Agência SLA" title="Vê e interage com o Youtube da Agência SLA" loading="lazy"></a>
                </li>
                <li class="Footer--footer__itemIcon--2uF-8"><a href="https://www.linkedin.com/company/" title="Vê e interage com o LinkedIn da Agência SLA" target="_blank" rel="noopener noreferrer">
                  <img src="https://rnemedia.blob.core.windows.net/images/website/LinkedIn_Footer.png" alt="Vê e interage com o LinkedIn da Agência SLA" title="Vê e interage com o LinkedIn da Agência SLA" loading="lazy"></a>
                </li>
              </div>
            </ul>
        </div>
      </div>
    </div>
    </footer>
    <div class="footer-copyright text-center">
    <p class="color-padraos text-light text-simples">Copyright &copy; 2021-{{ date('Y') }} <strong>MMLI</strong> - Soluções Tecnólogicas para todos Lda. Todos direitos reservados.</p>
    </div>
 
    	<!-- modal operacao-->
<div class="modal fade" id="modal_carregamento" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
    <button class="btn btn-padrao" type="button" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  <span class="text-center">
  O Sistema está processando as informações... <br>
  Em breve, receberá uma mensagem de texto, e-mail <br> e notificação no seu perfil de usuário.
  </span>
</button>
    </div>
  </div>
</div>
<!-- fim do modal operacao-->
	    <!-- Scripts -->
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
  <script src="{{ url('assets/js/datapicker.min.js') }}" ></script>
	<script src="{{ url('assets/js/app.js') }}"></script>
	<script src="{{ url('assets/js/popper.min.js') }}" ></script>	
	<script src="{{ url('assets/js/bootstrap.min.js') }}" ></script>
	<script src="{{ url('assets/js/custom.js') }}" ></script>
    @yield('map_js')
  <script>
    /*
    let box = $('#xp__guests__inputs-container');
    if(!box.contains(event.target))
    {
      alert('ola')
    box.style.display = 'none';
    } */  
  $(document).ready(function() {
    $('[data-toggle="tooltip-"]').tooltip();

    $data = new Date();
    $('#picker, .picker').datetimepicker({
      timepicker:false,
      datepicker:true,
      format: 'Y-m-d',
      locale:'pt-br'
    })
  });
  </script>
<!--
<script type="text/javascript">
    $(window).bind("beforeunload", function() {
       if ($("#modalConfirmacao").is(":visible")) {
           return "Você não salvou a sua tarefa, gostaria mesmo de sair?";
       }
    });
    </script>
-->
    </body>
    
</html>
