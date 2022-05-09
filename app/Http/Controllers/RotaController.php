<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rota;
use App\Models\Provincia;
use App\Models\Classe;


class RotaController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Controller Rotas
    |--------------------------------------------------------------------------
    */
    public function index(){
        $rotas = Rota::latest()->get();
        $provincias = Provincia::orderby('provincia','asc')->get();
        return view('dashboard.rotas', ['rotas'=>$rotas,'provincias'=>$provincias]);
    }
    //store
    public function store(Request $request){
        try{
        //new province
        $register = new Rota;
        $register->origem  = $request->origem;
        $register->destino = $request->destino;
        $register->kilometros  = $request->km;
        $register->preco  = $request->preco;
        $register->save();

        if($register){
            return redirect()->back()->with('success','Rota adicionada com sucesso!');
        }

        }catch(\Exception $e){
        return redirect()->back()->with('error','Problemas ao registrar a Rota!');
        }
    }
     /*
    |--------------------------------------------------------------------------
    | Controller Classe
    |--------------------------------------------------------------------------
    */
    public function index_classe(){
        $classes = Classe::orderBy('classe','asc')->get();
        return view('dashboard.classe', ['classes'=>$classes]);
    }
    //store classe
    public function store_classe(Request $request){
        try{
        //new province
        $register = new Classe;
        $register->classe  = strtoupper($request->classe);
        $register->save();

        if($register){
            return redirect()->back()->with('success','Nova classe de viagem adicionada com sucesso!');
        }

        }catch(\Exception $e){
        return redirect()->back()->with('error','Problemas ao adicionar a classe!');
        }
    }
}
