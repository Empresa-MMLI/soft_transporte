<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Veiculo;
use App\Models\VeiculoDetalhes;
use App\Models\FotoVeiculo;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Fluido;
use App\Models\MarcaDetalhes;
use Session;

class VeiculoController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Controller Veiculos
    |--------------------------------------------------------------------------
    */
    public function index(){
        $veiculos = VeiculoDetalhes::latest()->get();
        $empresas = Empresa::latest()->get();
        $marcas = Marca::orderBy('marca')->get();
        $modelos = Modelo::orderBy('modelo')->get();
        $fluidos = FLuido::orderBy('fluido')->get();
        return view('dashboard.veiculos', ['empresas'=>$empresas,'veiculos'=>$veiculos,'marcas'=>$marcas,'modelos'=>$modelos,'fluidos'=>$fluidos]);
    }
    //store
    public function store(Request $request){
        
        try {

            $register = new Veiculo;
            $register->marca_id = $request->id_marca;
            $register->modelo_id = $request->id_modelo;
            $register->n_assentos = $request->capacidade;
            $register->transmissao = (isset($request->transmissao) && $request->transmissao == 1)? 'Automático':'Manual';
            $register->fluido = $request->fluido;
            $register->km = $request->km;
            $register->litros = $request->litros;
            $register->ano = $request->ano_lancamento;
            $register->empresa_id = $request->operadora;
            $register->save();
        
            $veiculo = Veiculo::latest()->first();
            if(isset($veiculo->id))
            {   //faca upload
                $upload = upload_file($request);
            }

            if(isset($upload) && $upload['estado'] == 1){
                $imagem = new FotoVeiculo;
                $imagem->veiculo_id = $veiculo->id;
                $imagem->foto_url  = $upload['url_file'];
                $imagem->save();
            }else{
                return redirect()->back()->with(['estado'=>0,'warning'=>"O formato do ficheiro anexado é inválido, suportamos apenas JPG, PNG e PDF"]);
            }
    
            if(isset($register)){
                return redirect()->back()->with('success','Novo Veículo adicionada com sucesso!');
            }else{
                return redirect()->back()->with('error','Veículo não foi adicionado!');
            }

            }catch(\Exception $e) {
                return $e;
                return redirect()->back()->with('error','Veículo não foi cadastrado na plataforma!');
            }
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
//upload file
function upload_file($request){
    //upload file do comprovativo pagto
    $estado_upload = 0;
    $url_file = null;
    if(isset($request->foto_url) && $request->file('foto_url')->isValid()){
      $extensao = strtolower($request->file('foto_url')->getClientOriginalExtension());
      $formatos = ['jpeg','png','jpg'];
      $total = count($formatos);
      for($cont = 0; $cont<$total; $cont++){
      if(strpos($extensao, $formatos[$cont]) !== false){
      $nome_file = 'sla_car_'.date('dmyhi');
      $novo_file = uniqid($nome_file).'.'.$extensao;
      $novo_nome = str_replace(' ','_',$novo_file);
      $path = "Veiculos/".date('d-M-Y');
      $upload_file = $request->file('foto_url')->storeAs($path, $novo_nome);
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