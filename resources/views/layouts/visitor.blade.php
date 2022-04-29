<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Styles -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet"> 
    <link href="{{ url('assets/css/app.css') }}" rel="stylesheet"> 
    <link href="{{ url('assets/css/hello.css') }}?r=<?php echo random_int(1,50); ?>" rel="stylesheet"> 
   
    <link rel="stylesheet" href="{{ asset('assets/css/splide.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <link href="{{ url('assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/fontawesome.min.css') }}" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('assets/img/logo/ico.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets/img/logo/ico.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/img/logo/ico.png') }}">
    <meta name="description" content="Facilita Viages e Alguer de Carros">
	<meta name="keywords" content="Viagens Alugar Carro Interprovincial Reservar Viagens Comprar Bilhetes Passageiro Lugares">
	<meta name="author" content="Mmli Soluções">
    <!-- Scripts -->
	<script src="{{ url('assets/js/app.js') }}">
	</script><script src="{{ url('assets/js/jquery.min.js') }}" ></script>
	<script src="{{ url('assets/js/popper.min.js') }}" ></script>
    <style>
   
    </style>
</head>
    <body style="overflow-x: hidden;">
    <!-- Config da tela de boas vindas-->
    	<!-- header -->
        <nav class="navbar navbar-expand static-top p-1">
<div class="container">
<div class="col-4">
<a class="navbar-brand " href="">
    <img src="{{ url('assets/img/logo/logo.png') }}"  alt="logo" class="logo img-responsive">
    </a>
</div>
<div class="col-4"></div>
<div class="col-4">
<div class="header__actions">
    <div class="header__action">
								<a class="header-btn" href="cars.html">
									Registar
								</a>
							</div>
                            <div class="header__action">
								<a class="header-btn" href="cars.html">
									Iniciar Sessão
								</a>
							</div>

				</div>
</div>

</div>
  </nav>
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="header__content">

						<div class="header__menu">
							<ul class="header__nav">
                                <li class="header__nav-item">
									<a href="{{ route('home') }}" class="header__nav-link">Página Inicial</a>
								</li>
                                <li class="header__nav-item">
                                    <a href="#" class="header__nav-link">Bilhetes</a>
								</li>


								<li class="header__nav-item">
                                    <a href="#" class="header__nav-link">Como Funciona</a>
								</li>
								<li class="header__nav-item">
									<a href="#" class="header__nav-link">Centro de Ajuda</a>
								</li>


							</ul>
						</div>

					
			</div>
		</div>
	</header>
    
	<!-- end header -->
    <div id='app'>
    <main>
    <div class="bg-img">
        <div class="bg-img-dark">
         @yield('content')
        </div>
        </div>
    </main>
    </div>
    
	
	<script src="{{ url('assets/js/custom.js') }}" ></script>
    </body>
</html>
