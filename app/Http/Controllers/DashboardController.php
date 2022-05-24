<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\BilheteDetalhes;
use App\Models\BilheteReservado;
use App\Models\BilheteReservadoDetalhes;
use Session;

class DashboardController extends Controller
{
    //dashboard admin index
    public function index(){
        $bilhete_novos = BilheteDetalhes::where('estado',0)->orderBy('data_partida','asc')->get();
        $total_bi_novo = $bilhete_novos->count();
        $bilhete_reservados = BilheteReservadoDetalhes::where('estado',0)->orderBy('data_partida','asc')->get();
        $total_bi_res = $bilhete_reservados->count();
        //total dos bi comprados e reservados
        $total_bi = $total_bi_novo+$total_bi_res;
        return view('dashboard.index', ['bilhete_novos'=>$bilhete_novos,'bilhete_reservados'=>$bilhete_reservados,'total_bi'=>$total_bi]);
    }

    //dashboard cliente
    public function index_cliente(){
        $cliente = Cliente::where('id_usuario', Session::get('usuario.id'))->first();
        $bilhete_novos = BilheteDetalhes::where('estado',0)->orderBy('data_partida','asc')->where('id_cliente',$cliente->id)->get();
        $total_bi_novo = $bilhete_novos->count();
        $bilhete_reservados = BilheteReservadoDetalhes::where('estado',0)->orderBy('data_partida','asc')->where('id_cliente',$cliente->id)->get();
        $total_bi_res = $bilhete_reservados->count();
        //total dos bi comprados e reservados
        $total_bi = $total_bi_novo+$total_bi_res;
       
        return view('dashboard.cliente.index', ['bilhete_novos'=>$bilhete_novos,'bilhete_reservados'=>$bilhete_reservados,'total_bi'=>$total_bi]);
    }
}
