<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RotaController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Controller Rotas
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
}
