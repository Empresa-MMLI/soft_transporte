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
    <script src="{{ url('assets/js/jquery.min.js') }}" ></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
	<style>
   
    </style>
</head>
    <body style="overflow-x: hidden;">
    <!-- Config da tela de boas vindas-->
    	<!-- header -->
        <nav class="navbar navbar-expand static-top p-1">
<div class="container">
<div class="col-4">
<a class="navbar-brand " href="{{ route('index') }}">
    <img src="{{ url('assets/img/logo/logo.png') }}"  alt="logo" class="logotipo img-responsive">
    </a>
</div>
<div class="col-1"></div>
<div class="col-3">
<ul class="list-group list-group-horizontal timeTable text-right">
  <li class="list-group-items"><i class="fa fa-calendar"></i> Segunda - Sexta <i class="fa fa-clock"></i> 8:00 Am - 18:00 Pm</li>
</ul>
</div>
<div class="col-4">
<div class="header__action">
    <div class="header__action">
								<a class="btn btn-outline-primary" href="cars.html">
								 <i class="fa fa-user"></i>	Registar
								</a>
							</div>
                            <div class="header__action">
								<a class="btn btn-outline-primary" href="cars.html">
                                <i class="fa fa-lock"></i> Iniciar Sessão
								</a>
							</div>

				</div>
</div>

</div>
  </nav>
	<header class="header">
        <div class="container">

        <nav class="navbar navbar-expand-lg">
<!--  <a class="navbar-brand" href="#">Página inicial</a>-->
  <button class="navbar-toggler btn-light" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon text-primary"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('index') }}"><i class="fa fa-home"></i> Página inicial <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="#"><i class="fa fa-credit-card-alt"></i> Bilhetes e Horários</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="#"><i class="fa fa-map-marker"></i> Pontos de Venda e Embarque</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="#"><i class="fa fa-car"></i> Alugueres de Carros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-list"></i> Planos e Preçários</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-phone"></i> Contactos</a>
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
    
	
	<script src="{{ url('assets/js/custom.js') }}" ></script>
    </body>
</html>
