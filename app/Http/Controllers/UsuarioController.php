<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use App\Models\Tipo_usuario;
use App\Models\Cliente;
use App\Models\Empresa;
use Session;

class UsuarioController extends Controller
{
    //
    public function index(){
        //
    }
    //perfil do cliente SLA
    public function cliente_perfil(){
        $cliente = Cliente::where('id_usuario',Session::get('usuario.id'))->first();
        $acesso = Usuario::find(Session::get('usuario.id'));
        return view('dashboard.cliente.perfil', ['dados'=>$cliente,'acesso'=>$acesso]);
    }
 //update conta Cliente
 public function cliente_update(Request $request){
    try{

    $update = Usuario::find($request->id_user);
    $update->name  = $request->nome;
    $update->email  = $request->user;
    if(!($request->pass == $update->password)){
    $update->password  = Hash::make($request->pass);
    }
    $update->save();

    //trata-se de um cliente
    $cliente = Cliente::where('id_usuario',$request->id_user)->first();
    $cliente->nome  = $request->nome;
    $cliente->tipo_doc  = $request->tipo_doc;
    $cliente->n_doc  = $request->n_doc;
    $cliente->email  = $request->email_cliente;
    $cliente->telefone  = $request->telefone_cliente;
    $cliente->save();
        

    if(isset($cliente) && $cliente){
        return redirect()->back()->with('success','Conta atualizada com sucesso!');
    }else{
        return redirect()->back()->with('error','Problemas ao atualizar a conta!');
    }
    //faltando apenas as migrations para restringir acesos
        }catch(\Exception $e){
            return redirect()->back()->with('error','Error 500, ao tentar atualizar a conta!');
        }
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
    $cliente->email  = $request->email_cliente;
    $cliente->telefone  = $request->telefone_cliente;
    $cliente->id_usuario = $id_acesso;
    $cliente->save();
        
    }

    if(isset($id_acesso) && $id_acesso >= 1){
        return redirect()->route('sessao')->with('success','Conta criada com sucesso!');
    }else{
        return redirect()->back()->with('error','Problemas ao criar conta!');
    }
    //faltando apenas as migrations para restringir acesos
        }catch(\Exception $e){
            return redirect()->back()->with('error','Error 500, ao tentar criar conta!');
        }
    }
    //login
    public function login(Request $request){
      try{
  //$hash_password = Hash::make($request->pass);
  $existe = Usuario::where('email',$request->user)->whereBetween('id_tipo_user',[2,3])->first();
  if(isset($existe->id) && Hash::check($request->pass, $existe->password)){
      Session::put('usuario.id',$existe->id);
      return redirect()->route('cliente.index');
  }else{
      return redirect()->back()->with('error','Autenticação inválida!');
  }
  //faltando apenas as migrations para restringir acesos
      }catch(\Exception $e){
        return redirect()->back()->with('error','Falha ao iniciar sessão...');
      }
    } 
    //login admin
    public function login_root(Request $request){
        //$hash_password = Hash::make($request->pass);
        $existe = Usuario::where('email',$request->user)->where('id_tipo_user',1)->first();
        Session::put('usuario.id',$existe->id);

        if(isset($existe->id) && Hash::check($request->pass, $existe->password)){
            return redirect()->route('dashboard.index');
        }else{
            return redirect()->back()->with('error','Autenticação inválida!');
        }
        //faltando apenas as migrations para restringir acesos
    }
}
