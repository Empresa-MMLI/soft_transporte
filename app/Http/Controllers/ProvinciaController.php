<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincia;
use App\Models\Pontos_e_d;
use App\Models\PontosDetalhes;

class ProvinciaController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Controller Provincia
    |--------------------------------------------------------------------------
    */
    public function index(){
        $provincias = Provincia::orderby('provincia','asc')->get();
        return view('dashboard.provincias', ['provincias'=>$provincias]);
    }
    //store
    public function store(Request $request){
        try{
        //new province
        $register = new Provincia;
        $register->provincia  = $request->provincia;
        $register->pais  = (isset($request->pais))? $request->pais: 'Angola';
        $register->save();

        if($register){
            return redirect()->back()->with('success','Província adicionada com sucesso!');
        }

        }catch(\Exception $e){
        return redirect()->back()->with('error','Problemas ao registrar a Província!');
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Controller Embarque
    |--------------------------------------------------------------------------
    */
    //mostrar pontos de embarque e desembarque
    public function index_pontos(){
        $provincias = Provincia::orderby('provincia','asc')->get();
        $pontos_e = PontosDetalhes::where('tipo_ponto','like','Embarque')->orderby('provincia','asc')->get();
        $pontos_d = PontosDetalhes::where('tipo_ponto','like','Desembarque')->orderby('provincia','asc')->get();
        return view('dashboard.pontos', ['provincias'=>$provincias, 'pontos_e'=>$pontos_e,'pontos_d'=>$pontos_d]);
    }
    //store ponto de embarque e desembarque
    public function store_pontos(Request $request){
        try{
        //new province
        $register = new Pontos_e_d;
        $register->provincia_id  = $request->id_provincia;
        $register->ponto  = $request->ponto;
        $register->tipo_ponto  = $request->tipo_ponto;
        $register->save();

        if($register){
            return redirect()->back()->with('success','Pontos de '.$request->tipo_ponto.' adicionado com sucesso!');
        }

        }catch(\Exception $e){
        return redirect()->back()->with('error','Problemas ao registrar a Pontos de '.$request->tipo_ponto.'!');
        }
    }
      /*
    |--------------------------------------------------------------------------
    | Controller Desembarque
    |--------------------------------------------------------------------------
    */
}
