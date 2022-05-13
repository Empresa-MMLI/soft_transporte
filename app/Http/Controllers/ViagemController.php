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
use App\Models\Cliente;
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
        if(isset($request->origem)){
        $bilhetes = ViagemDetalhes::where('estado',1)->where('total_passageiro','>=',0)->where('rota_origem',$request->origem)->where('rota_destino',$request->destino)->where('data_partida','>=',$request->checkin)->latest()->get();
        $total_search = $bilhetes->count();

        if(!isset($bilhetes->id)){
            $bilhetes = ViagemDetalhes::where('estado',1)->where('total_passageiro','>=',0)->where('rota_origem',$request->origem)->where('rota_destino',$request->destino)->where('data_chegada','>=',$request->checkin)->latest()->get();
            $total_search = $bilhetes->count();  
            return view('bilhete_results', ['bilhetes'=>$bilhetes,'provincias'=>$provincias,'total_search'=>$total_search,'total_adultos'=>$request->group_adults,'total_criancas'=>$request->group_children,'found'=>$total_search]);
        }
        }
        else{
        $bilhetes = null;
        $total_search = 0;
        }
        return view('bilhete_results', ['bilhetes'=>$bilhetes,'provincias'=>$provincias,'total_search'=>$total_search,'total_adultos'=>$request->group_adults,'total_criancas'=>$request->group_children]);
    }
    //reservar bilhete
    public function reservar_bilhetes(Request $request){
        //dados recolhidos
        $empresa = null;//$empresa::first();
        $cliente = Cliente::where('n_doc',$request->n_doc)->first();
        if(!isset($cliente)){
        //buscar viagens 
        $provincias = Provincia::orderby('provincia','asc')->get();
        $bilhetes = ViagemDetalhes::where('estado',1)->where('total_passageiro','>=',0)->latest()->get();
        $total_search = $bilhetes->count();    
        return view('bilhete_results', ['bilhetes'=>$bilhetes,'provincias'=>$provincias,'total_search'=>$total_search,'total_adultos'=>$request->group_adults,'total_criancas'=>$request->group_children,'error'=>"Nº de Documento não encontrado."]);
        }
   
        $viagem = ViagemDetalhes::find($request->id_viagem);
        $total_p = ($request->t_adultos+$request->t_criancas);
        $total_p = (isset($total_p) && $total_p>0)? $total_p:1;
        return view('bilhete_pagto', ['cliente'=>$cliente,'empresa'=>$empresa,'total_passageiros'=>$total_p,'viagem'=>$viagem]);
    }
     //store
     public function store_bilhete(Request $request){
        try{
        //buscar o total de assentos por veiculo
        $t_passageiro = ($request->t_passageiros);
        $register = new Bilhete;
        $register->viagem_id  = $request->id_viagem;
        $register->cliente_id = $request->id_cliente;
        $register->total_passageiro  = $t_passageiro;
        $register->forma_pagto  = $request->forma_pagto;
        if($request->forma_pagto != 'PD'){
            $upload = upload_file($request);
            if(isset($upload) && $upload['estado'] == 1){
                $register->comprovativo_file  = $upload['url_file'];
            }
        }
        $register->estado = 0;
        $register->data_compra = date('Y-m-d');
        $register->save();
        //update total de passageiro
        $viagem = ViagemDetalhes::find($request->id_viagem);
        $t_p_viagem = $viagem->total_passageiro+$t_passageiro;//buscar o total de passageiro atual
        if($t_p_viagem > $viagem->capacidade){
            return redirect()->back()->with(['estado'=>0,'warning'=>"Bilhete de viagem esgotado"]);
        }else{ 
        $update = Viagem::find($request->id_viagem);
        $t_p_viagem = $update->total_passageiro+$t_passageiro;
        $update->total_passageiro = $update->total_passageiro+$t_passageiro;
        if($t_p_viagem == $viagem->capacidade){
            $update->estado = 0;
        }
        $update->save();
        }

        $bilhete = Bilhete::latest()->first();
        $id_bilhete = $bilhete->id;
        $cliente = Cliente::find($request->id_cliente);
        if($register && $update){
            return view('bilhete_vendido', ['estado'=>1,'id_bilhete'=>$id_bilhete,'cliente'=>$cliente]);
        }

        }catch(\Exception $e){
        return redirect()->back()->with('error_compra','O sistema detectou uma compra de Bilhete efectuada hoje em seu Nome');
        }
    }  
}

function upload_file($request){
      //upload file do comprovativo pagto
      if(isset($request->comprovativo_url) && $request->file('comprovativo_url')->isValid()){
        $extensao = strtolower($request->file('comprovativo_url')->getClientOriginalExtension());
        $formatos = ['jpeg','png','jpg','pdf'];
        $total = count($formatos);
        for($cont = 0; $cont<$total; $cont++){
        if(strpos($extensao, $formatos[$cont]) !== false){
        $nome_file = 'abast_'.$request->nome_frota;
        $novo_file = uniqid($nome_file).'.'.$extensao;
        $novo_nome = str_replace(' ','_',$novo_file);
        $path = "Comprovativos/".date('d-M-Y');
        $upload_file = $request->file('comprovativo_url')->storeAs($path, $novo_nome);
        $url_file = $path.'/'.$novo_nome;
        $estado_upload = 1; 
        }
        }
    }else{
        $estado_upload = 0;
    }
    $res = ['estado'=>$estado_upload,'url_file'=>$url_file];
    return $res;//retorna o estado upload e a URL file gerada
}