<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PontosDetalhes;
use App\Models\Veiculo;
use App\Models\VeiculoDetalhes;
use App\Models\Rota;
use App\Models\Provincia;
use App\Models\Classe;
use App\Models\Viagem;
use App\Models\Bilhete;
use App\Models\ViagemDetalhes;

class ViagemController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Controller Viagem
    |--------------------------------------------------------------------------
    */
    public function index(){

        $viagens = ViagemDetalhes::latest()->get();
        $rotas = Rota::latest()->get();
        $classes = Classe::orderBy('classe','asc')->get();
        $veiculos = VeiculoDetalhes::orderBy('marca','asc')->get();//depois ordenar por marca   
        $pontos_e = PontosDetalhes::where('tipo_ponto','like','Embarque')->orderby('provincia','asc')->get();
        $pontos_d = PontosDetalhes::where('tipo_ponto','like','Desembarque')->orderby('provincia','asc')->get();
        return view('dashboard.viagem', ['viagens'=>$viagens,'rotas'=>$rotas,'tipo_classes'=>$classes,'veiculos'=>$veiculos,'pontos_e'=>$pontos_e,'pontos_d'=>$pontos_d]);
    }
    //map de viagem
    public function map_viagem(){

        $viagens = ViagemDetalhes::latest()->get();
        return view('dashboard.map_viagem', ['viagens'=>$viagens]);
    }
    //map de viagem
    public function itinerarios(){

        $viagens = ViagemDetalhes::latest()->get();
        return view('dashboard.itinerarios', ['viagens'=>$viagens]);
    }
    //store
    public function store(Request $request){
        try{
        //buscar o total de assentos por veiculo
        //$total_p = Veiculo::find($request->id_veiculo)->first();
        //new province
        $register = new Viagem;
        $register->rota_id  = $request->id_rota;
        $register->itinerario = $request->itinerario;
        $register->embarque_id  = $request->id_ponto_e;
        $register->desembarque_id  = $request->id_ponto_d;
        $register->veiculo_id  = $request->id_veiculo;
        $register->classe_id  = $request->id_classe;
        $register->total_passageiro = 0;
        $register->data_partida  = $request->data_partida;
        $register->data_chegada  = $request->data_chegada;
        $register->save();

        if($register){
            return redirect()->back()->with('success','Bilhete de viagem criada com sucesso!');
        }

        }catch(\Exception $e){
        return redirect()->back()->with('error','Problemas ao registrar nova viagem!');
        }
    }  
    /*
    |--------------------------------------------------------------------------
    | Controller Bilhetes
    |--------------------------------------------------------------------------
    */
    public function compra_bilhetes(Request $request){
        //buscar viagens 
        $provincias = Provincia::orderby('provincia','asc')->get();
        return view('bi_search', ['provincias'=>$provincias]);
    }

    public function bilhetes(Request $request){
        //buscar viagens 
        $provincias = Provincia::orderby('provincia','asc')->get();
        $bilhetes = ViagemDetalhes::where('estado',1)->where('total_passageiro','>=',0)->latest()->get();
        $total_search = $bilhetes->count();
        return view('bilhete_results', ['bilhetes'=>$bilhetes,'provincias'=>$provincias,'total_search'=>$total_search,'total_adultos'=>$request->group_adults,'total_criancas'=>$request->group_children]);
    }
     //store
     public function store_bilhete(Request $request){
        try{
        //buscar o total de assentos por veiculo
        $t_passageiro = ($request->t_adultos + $request->t_criancas);
        $register = new Bilhete;
        $register->viagem_id  = $request->id_viagem;
        $register->cliente_id = $request->id_cliente;
        $register->total_passageiro  = $t_passageiro;
        $register->estado = 0;
        $register->save();

        $update = Viagem::find($request->id_viagem);
        $update->total_passageiro = $update->total_passageiro+$t_passageiro;
        $update->save();
        
        $bilhete = Bilhete::latest()->first();
        $id_bilhete = $bilhete->id;

        if($register && $update){
            return redirect()->back()->with('success',"Bilhete de viagem comprado com sucesso, aguarde resposta daqui a 10 min! \n ID Bilhete: ".$id_bilhete);
        }

        }catch(\Exception $e){
            return $e;
        return redirect()->back()->with('error','Problemas ao comprar bilhete de viagem!');
        }
    }  
}
