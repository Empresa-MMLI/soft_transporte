<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use App\Models\Tipo_usuario;
use App\Models\Cliente;
use App\Models\Empresa;

class UsuarioController extends Controller
{
    //
    public function index(){
        //
    }

    //register
    public function register(){
        $tipo_users = Tipo_usuario::where('id','<>',1)->latest()->get();
        return view('register', ['tipo_users'=>$tipo_users]);
    }
    //store conta 
    public function store(Request $request){
    try{
    //$hash_password = Hash::make($request->pass);
            
    $register = new Usuario;
    $register->name  = $request->nome;
    $register->email  = $request->user;
    $register->password  = Hash::make($request->pass);
    $register->id_tipo_user = $request->tipo;
    $register->save();

    //pega o ult registro
    $dados_acesso = Usuario::latest()->first();
    $id_acesso = $dados_acesso->id; 

    if($request->tipo == 2)
    {

    //trata-se de uma empresa
    $empresa = new Empresa;
    $empresa->nome  = $request->nome;
    $empresa->nif  = $request->nif;
    $empresa->email  = $request->email;
    $empresa->endereco_sede  = $request->endereco;
    $empresa->telefone  = $request->telefone;
    $empresa->id_usuario = $id_acesso;
    $empresa->save();
    }else{

    //trata-se de um cliente
    $cliente = new Cliente;
    $cliente->nome  = $request->nome;
    $cliente->tipo_doc  = $request->tipo_doc;
    $cliente->n_doc  = $request->n_doc;
    $cliente->telefone  = $request->telefone;
    $cliente->id_usuario = $id_acesso;
    $cliente->save();
        
    }

    if(isset($id_acesso) && $id_acesso >= 1){
        return redirect()->route('sessao')->with('success','Conta criada com sucesso!');
    }else{
        return redirect()->back()->with('error','Problemas ao criar conta!');
    }
    //faltando apenas as migrations para restringir acesos
        }catch(\Exception_ $e){
            return redirect()->back()->with('error','Error 500, ao tentar criar conta!');
        }
    }
    //login
    public function login(Request $request){
        //$hash_password = Hash::make($request->pass);
        $existe = Usuario::where('email',$request->user)->first();
        
        if(isset($existe->id) && Hash::check($request->pass, $existe->password)){
            return view('dashboard.index');
        }else{
            return redirect()->back()->with('error','Autenticação inválida!');
        }
        //faltando apenas as migrations para restringir acesos
    }
}
