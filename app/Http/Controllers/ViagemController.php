<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PontosDetalhes;
use App\Models\Veiculo;
use App\Models\Rota;
use App\Models\Classe;

class ViagemController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Controller Viagem
    |--------------------------------------------------------------------------
    */
    public function index(){
        $rotas = Rota::latest()->get();
        $classes = Classe::orderBy('classe','asc')->get();
        $veiculos = Veiculo::latest()->get();//depois ordenar por marca   
        $pontos_e = PontosDetalhes::where('tipo_ponto','like','Embarque')->orderby('provincia','asc')->get();
        $pontos_d = PontosDetalhes::where('tipo_ponto','like','Desembarque')->orderby('provincia','asc')->get();
        return view('dashboard.viagem', ['rotas'=>$rotas,'tipo_classes'=>$classes,'veiculos'=>$veiculos,'pontos_e'=>$pontos_e,'pontos_d'=>$pontos_d]);
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
}
