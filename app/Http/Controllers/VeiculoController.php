<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Veiculo;
use App\Models\Marca;
use App\Models\MarcaDetalhes;
use App\Models\Modelo;
use Session;

class VeiculoController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Controller Veiculos
    |--------------------------------------------------------------------------
    */
    public function index(){
        $veiculos = Veiculo::latest()->get();
        $empresas = Empresa::latest()->get();
        $marcas = Marca::orderBy('marca')->get();
        $modelos = Modelo::orderBy('modelo')->get();
        $fluidos = FLuido::orderBy('fluido')->get();
        return view('dashboard.veiculos', ['empresas'=>$empresas,'veiculos'=>$veiculos,'marcas'=>$marcas,'modelos'=>$modelos,'fluidos'=>$fluidos]);
    }
    /*
    |--------------------------------------------------------------------------
    | Controller Marca
    |--------------------------------------------------------------------------
    */
    public function marcas(){

        $marcas = Marca::orderBy('marca','asc')->get();
        return view('dashboard.marcas', ['marcas'=>$marcas]);
    }
    //store marca
    public function store_marca(Request $request){
    try{
    //new marca
    $register = new Marca;
    $register->marca  = strtoupper($request->marca);
    $register->save();

    if($register){
        return redirect()->back()->with('success','Nova Marca de veículo adicionada com sucesso!');
    }

    }catch(\Exception $e){
    return redirect()->back()->with('error','Problemas ao adicionar a classe!');
    }
} /*
|--------------------------------------------------------------------------
| Controller Modelo
|--------------------------------------------------------------------------
*/
public function modelos(){

    $marcas = Marca::orderBy('marca','asc')->get();
    $modelos = MarcaDetalhes::orderBy('marca','asc')->get();
    return view('dashboard.modelos', ['marcas'=>$marcas,'modelos'=>$modelos]);
}
//store marca
public function store_modelo(Request $request){
try{
//new marca
$register = new Modelo;
$register->marca_id  = $request->id_marca;
$register->modelo  = strtoupper($request->modelo);
$register->save();

if($register){
    return redirect()->back()->with('success','Novo Modelo de veículo adicionada com sucesso!');
}

}catch(\Exception $e){
return redirect()->back()->with('error','Problemas ao adicionar a classe!');
}
}
}
