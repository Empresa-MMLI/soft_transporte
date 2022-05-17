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
<link href="{{ url('assets/css/hello.css') }}?r=<?php echo random_int(1,50); ?>" rel="stylesheet"> 
    <link href="{{ url('assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/fontawesome.min.css') }}" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('assets/img/logo/ico.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets/img/logo/ico.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/img/logo/ico.png') }}">

    <style>
   
    </style>
</head>
    <body style="overflow-x: hidden;overflow-y: auto!important;background:#fff">
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
