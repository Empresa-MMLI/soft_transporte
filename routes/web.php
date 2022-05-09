<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProvinciaController;

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

Route::get('/comprar_bilhetes', function () {
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

/*
|--------------------------------------------------------------------------
| Routes de configuracao de auth
|--------------------------------------------------------------------------
*/

//start sessao
Route::get('/sessao', function () {
    return view('login');
})->name('sessao');

//login
Route::post('/login', [UsuarioController::class, 'login'])->name('login');
//logout
Route::get('/logout', function () {
    //destrua todas sessions
    Session::flush();
    return view('login');
})->name('logout');

//register
Route::get('/register', [UsuarioController::class, 'register'])->name('register');
//store register user
Route::post('/store_user', [UsuarioController::class, 'store'])->name('user.store');

/*
|--------------------------------------------------------------------------
| Routes de configuracao de provincia e pontos de E e D
|--------------------------------------------------------------------------
*/

//mostrar provincias
Route::get('/provincias', [ProvinciaController::class, 'index'])->name('dashboard.provincias');
//store new provincia
Route::post('/store_provincia', [ProvinciaController::class, 'store'])->name('provincia.store');

//mostrar pontos de E e D
Route::get('/pontos_e_d', [ProvinciaController::class, 'index_pontos'])->name('dashboard.pontos');
//store new pontos de E e D
Route::post('/store_pontos', [ProvinciaController::class, 'store_pontos'])->name('pontos.store');


Route::get('/dashbord', function () {
    return view('dashboard.index');
})->name('dashboard.index');

Route::get('/rotas', function () {
    return view('dashboard.rotas');
})->name('dashboard.rotas');

Route::get('/bilhetes', function () {
    return view('dashboard.bilhetes');
})->name('dashboard.bilhetes');

Route::get('/alugueres', function () {
    return view('dashboard.alugueres');
})->name('dashboard.alugueres');

Route::get('/servicos', function () {
    return view('dashboard.servicos');
})->name('dashboard.servicos');

Route::get('/viagens', function () {
    return view('dashboard.viagem');
})->name('dashboard.viagem');

Route::get('/map_viagens', function () {
    return view('dashboard.map_viagem');
})->name('dashboard.map_viagem');

Route::get('/itinerarios', function () {
    return view('dashboard.itinerarios');
})->name('dashboard.itinerarios');

Route::get('/veiculos', function () {
    return view('dashboard.veiculos');
})->name('dashboard.veiculos');

Route::get('/relatorios', function () {
    return view('dashboard.relatorios');
})->name('dashboard.relatorios');

Route::get('/empresa', function () {
    return view('dashboard.empresa');
})->name('dashboard.empresa');

Route::get('/users', function () {
    return view('dashboard.usuarios');
})->name('dashboard.usuarios');

Route::get('/notificacoes', function () {
    return view('dashboard.notificacoes');
})->name('dashboard.notificacoes');

Route::get('/mensagens', function () {
    return view('dashboard.mensagens');
})->name('dashboard.mensagens');


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

