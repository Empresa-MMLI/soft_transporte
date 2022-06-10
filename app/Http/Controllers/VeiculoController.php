<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Cliente;
use App\Models\Veiculo;
use App\Models\VeiculoDetalhes;
use App\Models\FotoVeiculo;
use App\Models\FotoVeiculoDetalhes;
use App\Models\Pedido;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Fluido;
use App\Models\MarcaDetalhes;
use Session;
use Carbon\Carbon;

class VeiculoController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Controller Veiculos
    |--------------------------------------------------------------------------
    */
    public function index(){
        $veiculos = VeiculoDetalhes::latest()->get();
        $foto_veiculos = FotoVeiculoDetalhes::latest()->get();
        $empresas = Empresa::latest()->get();
        $marcas = Marca::orderBy('marca')->get();
        $modelos = Modelo::orderBy('modelo')->get();
        $fluidos = FLuido::orderBy('fluido')->get();
        return view('dashboard.veiculos', ['empresas'=>$empresas,'veiculos'=>$veiculos,'marcas'=>$marcas,'modelos'=>$modelos,'fluidos'=>$fluidos,'foto_veiculos'=>$foto_veiculos]);
    }
    //area de aluguer de veiculos
    public function aluguer_veiculos(){
        $veiculos = VeiculoDetalhes::latest()->paginate(6);
        $foto_veiculos = FotoVeiculoDetalhes::latest()->get();
        $marcas = MarcaDetalhes::orderBy('marca')->get();
        $fluidos = FLuido::orderBy('fluido')->get();
        
        return view('aluguer_search', ['veiculos'=>$veiculos,'foto_veiculos'=>$foto_veiculos,'marcas'=>$marcas,'fluidos'=>$fluidos]);
    }

    //area de aluguer de veiculos pesquisados
    public function search_veiculos(Request $request){
        $valor = '%'.$request->valor_p.'%';
        $res = $request->valor_p;

        if(isset($request->valor_p))
            $veiculos = VeiculoDetalhes::where('marca','like',$valor)->orwhere('modelo','like', $valor)->latest()->paginate(6);
        else{
            $item = MarcaDetalhes::find($request->modelo_id);
            $res = $item->marca.' '.$item->modelo.' » '.$request->transmissao; 
            $veiculos = VeiculoDetalhes::where('modelo_id', $request->modelo_id)->where('fluido_id', $request->fluido_id)->latest()->paginate(6);
            //return $veiculos;
        }
        $foto_veiculos = FotoVeiculoDetalhes::latest()->get();
        $marcas = MarcaDetalhes::orderBy('marca')->get();
        $fluidos = FLuido::orderBy('fluido')->get();
        
        return view('veiculos_procurados', ['veiculos'=>$veiculos,'foto_veiculos'=>$foto_veiculos,'marcas'=>$marcas,'fluidos'=>$fluidos, 'valor_p'=>$res]);
    }
    //store
    public function store(Request $request){
        
        try {

            $register = new Veiculo;
            $register->marca_id = $request->id_marca;
            $register->modelo_id = $request->id_modelo;
            $register->n_assentos = $request->capacidade;
            $register->transmissao = (isset($request->transmissao) && $request->transmissao == 1)? 'Automático':'Manual';
            $register->fluido_id = $request->fluido;
            $register->km = $request->km;
            $register->litros = $request->litros;
            $register->ano = $request->ano_lancamento;
            $register->preco_aluguer = $request->preco;
            $register->tempo = $request->tempo;
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
                $imagem->tem_foto = 1;
                $imagem->foto_url  = $upload['url_file'];
                $imagem->save();
            }else{
                $imagem = new FotoVeiculo;
                $imagem->veiculo_id = $veiculo->id;
                $imagem->tem_foto = 0;
             //   $imagem->foto_url  = $upload['url_file'];
                $imagem->save();
                //return redirect()->back()->with(['estado'=>0,'warning'=>"Veículo foi cadastrado, mas sem Imagem porque O Formato/Tamanho do ficheiro anexado é inválido, suportamos apenas JPG e PNG no máximo de 2Mb"]);
            }
    
            if(isset($register)){
                return redirect()->back()->with('success','Novo Veículo adicionada com sucesso!');
            }else{
                return redirect()->back()->with('error','Veículo não foi adicionado!');
            }

            }catch(\Exception $e) {
                return redirect()->back()->with('error','Veículo não foi cadastrado na plataforma!');
            }
    }
    //reservar ou pedidos de levantamento de veiculos
    public function reservar_veiculos(Request $request){
        //dados recolhidos
        try{
            if(isset($request->estado_cliente) && $request->estado_cliente == 1){//cliente novo
                                    
                $register = new Usuario;
                $register->name  = $request->nome_cliente;
                $register->email  = $request->user;
                $register->password  = Hash::make($request->pass);
                $register->id_tipo_user = 3;
                $register->save();

                //pega o ult registro
                $dados_acesso = Usuario::latest()->first();
                $id_acesso = $dados_acesso->id;
                
                $cliente = new Cliente;
                $cliente->nome  = $request->nome_cliente;
                $cliente->tipo_doc  = $request->tipo_doc_cliente;
                $cliente->n_doc  = $request->n_doc_cliente;
                $cliente->email  = $request->email_cliente;
                $cliente->telefone  = $request->telef_cliente;
                $cliente->endereco_fisico  = $request->endereco;
                $cliente->id_usuario = $id_acesso;
                $cliente->save();
            }
    
            $empresa = null;//$empresa::first();
            $cliente = Cliente::where('n_doc',$request->n_doc_cliente)->orwhere('n_doc',$request->n_doc)->first();
            if(!isset($cliente)){
            //buscar veiculos
            $veiculos = VeiculoDetalhes::latest()->paginate(6);
            $foto_veiculos = FotoVeiculoDetalhes::latest()->get();
            $marcas = MarcaDetalhes::orderBy('marca')->get();
            $fluidos = FLuido::orderBy('fluido')->get();
            return view('aluguer_search', ['veiculos'=>$veiculos,'foto_veiculos'=>$foto_veiculos,'marcas'=>$marcas,'fluidos'=>$fluidos, 'error'=>"Nº de Documento não encontrado."]);
            }
            //calculando o total de dias
            $data_inicio = Carbon::parse($request->data_inicio);
            $data_fim = Carbon::parse($request->data_fim);

            $total_dias = $data_fim->diffInDays($data_inicio);
            $novo_pedido = new Pedido;
            $novo_pedido->veiculo_id = $request->id_veiculo;
            $novo_pedido->cliente_id = $cliente->id;
            $novo_pedido->qtd_carros = $request->qtd_veiculos;
            $novo_pedido->total_dias = $total_dias;
            $novo_pedido->data_inicio = $request->data_inicio;
            $novo_pedido->data_fim = $request->data_fim;
            $novo_pedido->save();
            //buscar o ult registro
            $dados_pedido = Pedido::latest()->first();

            $id_pedido = $dados_pedido->id;

            $pedido = Pedido::find($id_pedido);
            $veiculo = VeiculoDetalhes::find($request->id_veiculo);
            
            
             //return $total_dias. ' Diferenca entre os dias...' ;
            
            return view('veiculo_pagto', ['cliente'=>$cliente,'empresa'=>$empresa,'veiculo'=>$veiculo,'total_dias'=>$total_dias,'pedido'=>$pedido]);
         }catch(\Exception $e){
            return redirect()->back()->with('error','Não foi possível efectuar a Compra do Bilhete, tente novamente!');
        }
    }
    //delatar os itens selecionados
    public function delete(Request $request){
    
    try{
        $remove_foto = FotoVeiculo::where('veiculo_id',$request->id_veiculo)->delete();
        $remove_veiculo = Veiculo::find($request->id_veiculo)->delete();
        if($remove_veiculo && $remove_foto){
            return redirect()->back()->with('success','Veículo removido com sucesso!');
        }else{
            return redirect()->back()->with('success','Não foi possível remover o Veículo selecionado.');
        }
    }catch(\Exception $e) {
        return redirect()->back()->with('error','Veículo não foi removido.');
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
//pesquisar ou buscar veiculo modelos
public function url_modelos(Request $request)
{
    $id = $request->id_marca;
    $modelos = Modelo::where('marca_id',$id)->get();
    return response()->json(['dados'=>$modelos]);
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