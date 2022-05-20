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
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet"> 
<link href="{{ url('assets/css/hello.css') }}?r=<?php echo random_int(1,50); ?>" rel="stylesheet"> 
    <link href="{{ url('assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/fontawesome.min.css') }}" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('assets/img/logo/ico.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets/img/logo/ico.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/img/logo/ico.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@600;&display=swap" rel="stylesheet">
    <style>
        html{
            font-family: 'Source Sans Pro','Segoe UI', Tahoma, Geneva, Verdana, sans-serif;font-size:1.1rem;
        }
    </style>
</head>
    <body style="overflow-x: hidden;overflow-y: hidden!important;background:#fff">
    <!-- Config da tela de boas vindas-->
    
    <div id='app'>
    <main>
    <div class="container">
        <div class="bg-hello">
         @yield('content')
        </div>
        </div>
    </main>
    </div>
    
	
    <!-- Scripts -->
	<script src="{{ url('assets/js/jquery.min.js') }}" ></script>
	<script src="{{ url('assets/js/app.js') }}"></script>
	<script src="{{ url('assets/js/popper.min.js') }}" ></script>	
	<script src="{{ url('assets/js/bootstrap.min.js') }}" ></script>
	<script src="{{ url('assets/js/custom.js') }}" ></script>
    </body>
</html>
