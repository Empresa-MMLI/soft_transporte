<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Routes de acesso ao soft
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('/index', function () {
    return view('welcome');
})->name('index');

Route::get('/search', function (Request $request) {
    //return view('aluguel_res');
    if($request->mySearch == "Comprar Bilhetes")
    return view('bi_search');
    else if($request->mySearch == "Alugar Carro")
    return view('aluguer_search');
    else if($request->mySearch == "Comprar B.I e Aluguel Carro")
    return view('bi_search');

})->name('search.res');


Route::get('/results', function (Request $request) {
    return view('bi_results');
})->name('res.bilhetes');

Route::get('/aluguer', function () {
    return view('aluguer_search');
})->name('aluguer.carro');

Route::get('/bilhetes', function () {
    return view('bi_search');
})->name('comprar.bilhete');

Route::get('/planos', function () {
    return view('planos');
})->name('planos');

Route::get('/pontos', function () {
    return view('pontos');
})->name('pontos');

Route::get('/contactos', function () {
    return view('contactos');
})->name('contacts');

Route::get('/sessao', function () {
    return view('login');
})->name('sessao');

Route::post('/login', function () {
    return view('dashboard.index');
})->name('login');

Route::get('/logout', function () {
    return view('login');
})->name('logout');

Route::get('/dashbord', function () {
    return view('dashboard.index');
})->name('dashboard');


/*
|--------------------------------------------------------------------------
| Routes de configuracao do servidor
|--------------------------------------------------------------------------
*/

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize:clear');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

