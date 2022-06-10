<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\RotaController;
use App\Http\Controllers\ViagemController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Routes de acesso ao soft - MMLI Teams
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
        return redirect()->route('compra.bilhetes');
    else if($request->mySearch == "Alugar Carro")
    //return view('aluguer_search');
        return redirect()->route('aluguer.veiculos');
    else if($request->mySearch == "Comprar B.I e Aluguel Carro")
        return redirect()->route('compra.bilhetes');

})->name('search.res');

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
//acesso root
Route::get('/login_mmli', function () {
    return view('login_admin');
})->name('root');

//login
Route::post('/login', [UsuarioController::class, 'login'])->name('login');
//login admin
Route::post('/login_root', [UsuarioController::class, 'login_root'])->name('login.root');
//logout
Route::get('/logout', function () {
    //destrua todas sessions
    Session::flush();
    return redirect()->route('sessao');
})->name('logout');
//logout admin
Route::get('/logout_admin', function () {
    //destrua todas sessions
    Session::flush();
    return redirect()->route('root');
})->name('logout.admin');
//register
Route::get('/register', [UsuarioController::class, 'register'])->name('register');
//store register user
Route::post('/store_user', [UsuarioController::class, 'store'])->name('user.store');

Route::get('/cliente/pefil', [UsuarioController::class, 'cliente_perfil'])->name('cliente.perfil');
Route::post('/cliente/update', [UsuarioController::class, 'cliente_update'])->name('cliente.update');
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


/*
|--------------------------------------------------------------------------
| Routes de configuracao das Rotas de viagens
|--------------------------------------------------------------------------
*/

//mostrar rotas
Route::get('/rotas', [RotaController::class, 'index'])->name('dashboard.rotas');
//store new rota
Route::post('/store_rota', [ROtaController::class, 'store'])->name('rotas.store');
/*
|--------------------------------------------------------------------------
| Routes de configuracao das Classes de viagens
|--------------------------------------------------------------------------
*/

//mostrar rotas
Route::get('/classe', [RotaController::class, 'index_classe'])->name('dashboard.classe');
//store new classe
Route::post('/store_classe', [RotaController::class, 'store_classe'])->name('classe.store');

/*
|--------------------------------------------------------------------------
| Routes de configuracao das Viagem
|--------------------------------------------------------------------------
*/

//mostrar viagem
Route::get('/viagens', [ViagemController::class, 'index'])->name('dashboard.viagem');
//mostrar mapa de viagem
Route::get('/map_viagens', [ViagemController::class, 'map_viagem'])->name('dashboard.map_viagem');
//store new viagem
Route::post('/store_viagem', [ViagemController::class, 'store'])->name('viagem.store');
//mostrar itinerarios
Route::get('/itinerarios', [viagemController::class, 'itinerarios'])->name('dashboard.itinerarios');
//Bilhetes emitidos
Route::any('/bilhetes', [ViagemController::class, 'index_bilhetes'])->name('dashboard.bilhetes');
//Bilhetes comprados pelos clientes
Route::get('/bilhete_clientes', [ViagemController::class, 'cliente_bilhetes'])->name('cliente.bilhetes');
//compra de Bilhetes
Route::get('/comprar_bilhetes', [ViagemController::class, 'comprar_bilhetes'])->name('comprar.bilhete');
//store new bilhete
Route::post('/store_bilhete', [ViagemController::class, 'store_bilhete'])->name('bilhete.store');
//delete bilhete
Route::get('/delete_bilhete/{id}', [ViagemController::class, 'delete_bilhete'])->name('bilhete.delete');

//store new reserva
Route::any('/reservar_bilhete', [ViagemController::class, 'reservar_bilhetes'])->name('bilhete.reservar');
//validacao do bilhete comprado
Route::any('/validacao_bi', [ViagemController::class, 'validacao_bilhete'])->name('bilhete.validacao');
//Envio de email, sms e whatsapp para o cliente e admin
Route::any('/send_sms', [ViagemController::class, 'send_sms_cliente'])->name('bilhete.send_sms');

//buscar bilhetes de viagens
Route::any('/compras_bi', [ViagemController::class, 'comprar_bilhetes'])->name('compra.bilhetes');

//buscar veiculos
Route::any('/veiculos_search', [VeiculoController::class, 'aluguer_veiculos'])->name('aluguer.veiculos');
//resultado busca bilhetes de viagens
Route::any('/search_bi', [ViagemController::class, 'bilhetes'])->name('search.bilhetes');

/*
|--------------------------------------------------------------------------
| Routes de configuracao dos veiculos , marcas e modelos
|--------------------------------------------------------------------------
*/

//mostrar veiculos
Route::get('/veiculos', [VeiculoController::class, 'index'])->name('dashboard.veiculos');

//mostrar results do veiculos searched
Route::post('/search_veiculos', [VeiculoController::class, 'search_veiculos'])->name('veiculos.search');

//store
Route::post('/store_veiculos', [VeiculoController::class, 'store'])->name('veiculos.store');
//delete
Route::get('/delete_veiculos', [VeiculoController::class, 'delete'])->name('veiculos.delete');
//store new pedido
Route::any('/reservar_veiculos', [ViagemController::class, 'reservar_veiculos'])->name('veiculos.reservar');

//mostrar marcas
Route::get('/marcas', [VeiculoController::class, 'marcas'])->name('dashboard.marcas');
//new marcas
Route::post('/store_marca', [VeiculoController::class, 'store_marca'])->name('marca.store');

//mostrar modelos
Route::get('/url_modelos', [VeiculoController::class, 'url_modelos'])->name('veiculo.modelos');
//mostrar modelos
Route::get('/modelos', [VeiculoController::class, 'modelos'])->name('dashboard.modelos');
//new modelo
Route::post('/store_modelo', [VeiculoController::class, 'store_modelo'])->name('modelo.store');

//mostrar mapa de viagem

//dashboard admin
Route::get('/dashbord', [DashboardController::class, 'index'])->name('dashboard.index');
//dashboard cliente
Route::get('/dashbord/cliente', [DashboardController::class, 'index_cliente'])->name('cliente.index');


Route::get('/alugueres', function () {
    return view('dashboard.alugueres');
})->name('dashboard.alugueres');

Route::get('/servicos', function () {
    return view('dashboard.servicos');
})->name('dashboard.servicos');

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

