<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Cliente;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use App\Models\Veiculo;
use App\Models\CarrosAlugados;
use App\Models\VeiculoDetalhes;
use App\Models\FotoVeiculo;
use App\Models\FotoVeiculoDetalhes;
use App\Models\Aluguer;
use App\Models\AluguerDetalhes;
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
    //retornar todos pedidos e alugueres do cliente
    public function alugueres()
    {
        $alugueres = AluguerDetalhes::where('estado',1)->latest()->get();
        $novos_pedidos = AluguerDetalhes::where('forma_pagto','!=','PD')->where('estado',0)->latest()->get();
        $reservados = AluguerDetalhes::where('forma_pagto','PD')->where('estado',0)->latest()->get();
        return view('dashboard.alugueres',['alugueres'=>$alugueres,'novos_pedidos'=>$novos_pedidos,'reservados'=>$reservados]);
    }
    //area de aluguer de veiculos
    public function aluguer_veiculos(){

        Session::put('link_ativo','aluguer.veiculos');
        $veiculos = VeiculoDetalhes::latest()->paginate(6);
        $foto_veiculos = FotoVeiculoDetalhes::latest()->get();
        $marcas = MarcaDetalhes::orderBy('marca')->get();
        $fluidos = FLuido::orderBy('fluido')->get();
        
        return view('aluguer_search', ['veiculos'=>$veiculos,'foto_veiculos'=>$foto_veiculos,'marcas'=>$marcas,'fluidos'=>$fluidos]);
    }

    //area de aluguer de veiculos pesquisados
    public function search_veiculos(Request $request){
        try{
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
    }catch(\Exception $e){
        return redirect()->route('aluguer.veiculos')->with('error','Não foi possível efectuar o seu Pedido, tente novamente!');
    }
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
                $cliente->tipo_doc  = 'BI';
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
            $fluidos = Fluido::orderBy('fluido')->get();
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
            $novo_pedido->local_entrega = $request->local_entrega;
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
            return redirect()->back()->with('error','Não foi possível processar seu Pedido, tente novamente!');
        }
    }
    //alugar veiculos
    public function alugar_veiculos(Request $request){
        //dados recolhidos
        try{
            
            $pedido = Pedido::find($request->id_pedido);
            $cliente = Cliente::find($pedido->cliente_id);

            $novo_aluguer = new Aluguer;
            $novo_aluguer->pedido_id = $request->id_pedido;
            $novo_aluguer->total_pago = $request->total_pago;
            $novo_aluguer->forma_pagto = $request->forma_pagto;
            $novo_aluguer->data_entrega = $pedido->data_inicio;
            $novo_aluguer->data_prev_devolucao = $pedido->data_fim;
            $upload = upload_comprovativo($request);
            if(isset($upload) && $upload['estado'] == 1){
                $novo_aluguer->comprovativo_file  = $upload['url_file'];
            }else if($request->forma_pagto == 'ATM'){
                return redirect()->route('aluguer.veiculos')->with(['estado'=>0,'warning'=>"O formato do comprovotivo anexado é inválido, suportamos apenas JPG, PNG e PDF"]);
            }
            $novo_aluguer->save();
            
            if($novo_aluguer){
            //pega dados da operadora
            $empresa = Empresa::find(2);//2 Referece-se 
            $telef_admin = '+244'.$empresa->telefone;
            if($request->forma_pagto == "PD")
            $sms = 'Nova reserva de Automóvel(eis) detectado na plataforma, o(a) cliente '.$cliente->nome.' reservou '.$pedido->qtd_carros.' Automóvel(eis), local de entrega "'.$pedido->local_entrega.'" pretende receber no dia '.date('d/m/Y',strtotime($pedido->data_inicio));
            else
            $sms = 'Novo Pedido de Automóvel(eis) detectado na plataforma, o(a) cliente '.$cliente->nome.' pediu '.$pedido->qtd_carros.' Automóvel(eis), local de entrega "'.$pedido->local_entrega.'" pretende receber no dia '.date('d/m/Y',strtotime($pedido->data_inicio));
            //NOTIFICAR O ADMIN SLA sobre nova compra 
            $telegram = enviar_telegram($sms);
            //pegando os dados
            $dados = ["telef"=>$telef_admin,"sms"=>$sms,'id_pedido'=>$request->id_pedido,"destino"=>0];
            $send_sms = enviar_sms($dados);
              return view('veiculo_vendido', ['cliente'=>$cliente,'id_pedido'=>$request->id_pedido]);
            }
            
         }catch(\Exception $e){
            return redirect()->back()->with('error','Não foi possível efectuar o aluguer de seu(s) automóvel(eis), tente novamente!');
        }
    }

    //validacao do aluguer do automovel
    public function validacao_aluguer(Request $request){
        //buscar blhetes
        try{
        
            //verificar a origem do BI (Bilhete ou Reserva)
        if($request->ajax()){
            $n_aluguer = strtoupper('SLA_'.random_int(999,1000*$request->id_aluguer));
            $aluguer = Aluguer::find($request->id_aluguer);
            $aluguer->n_aluguer = $n_aluguer;
            $aluguer->data_entrega = $request->data_entrega;
            $aluguer->data_devolucao = $request->data_dev;
            $aluguer->estado = 1;
            $aluguer->save();

            if($aluguer){ 
                if(sizeof($request->matricula)>=1){
                    for($i=0;$i<sizeof($request->matricula);$i++){
                $register = new CarrosAlugados;
                $register->matricula = $request->matricula[$i];
                $register->aluguer_id = $request->id_aluguer;
                $register->save();
            }
        }
        }
        
        //envia no seu perfil 
        $cliente = Cliente::find($request->id_cliente);//pegar dados do cliente
        $aluguer = AluguerDetalhes::find($request->id_aluguer);//pegar dados da viagem
        
        //envia por email
        $sms = 'Bom dia prezado(a) cliente '.$cliente->nome.', a SLA vem por meio desta agradecer e '.
        'confirmar o aluguer do(s) automóvel(eis). abaixo temos o nº do aluguer, por favor faça-se '.
        'apresentado no seguinte Ponto de Levant. "'.$aluguer->local_entrega.'" no dia '.date('d/m/Y', strtotime($aluguer->data_entrega)).' com previsão de devolução no dia '.date('d/m/Y', strtotime($aluguer->data_devolucao));
        
        if((isset($aluguer) && $aluguer) || (isset($register) && $register))
        return response()->json(['estado'=>1,'success'=>'Aluguer de Automóvel(eis) confirmado com sucesso!','email'=>$cliente->email,'telef'=>$cliente->telefone,'sms'=>$sms,'n_aluguer'=>$n_aluguer,'destino'=>1]);
    
    }else{
        return redirect()->back()->with('error','Falha ao validar o aluguer do cliente, tente novamente!');
    }
        }catch(\Exception $e){
        return response()->json(['error'=>'Falha ao validar o aluguer, tente de novo!']);
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
     //delete aluguer
     public function delete_aluguer(Request $request){
    
        try{
            $remove_pedido = Pedido::find($request->id_pedido)->delete();
            $remove_aluguer = Aluguer::find($request->id_aluguer)->delete();
            if($remove_pedido && $remove_aluguer){
                return redirect()->back()->with('success','Aluguer de veículo removido com sucesso!');
            }else{
                return redirect()->back()->with('success','Não foi possível remover o Aluguer selecionado.');
            }
        }catch(\Exception $e) {
            return redirect()->back()->with('error','Aluguer não foi removido.');
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

        //envio de sms para o cliente
        public function send_sms_cliente(Request $request){

            $email = enviar_email($request);
            $whatsapp = enviar_sms_ws($request);
            $sms = enviar_sms($request);
            //return response()->json(['estado'=>1,'email'=>$email,'sms'=>$sms,'whatsapp'=>$whatsapp]);
            return response()->json(['estado'=>1,'sms'=>$sms]);
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

//subindo o comprovativo do aluguer do pagto
//upload ficheiro
function upload_comprovativo($request){
    //upload file do comprovativo pagto
    $estado_upload = 0;
    $url_file = null;
    if(isset($request->comprovativo_url) && $request->file('comprovativo_url')->isValid()){
      $extensao = strtolower($request->file('comprovativo_url')->getClientOriginalExtension());
      $formatos = ['jpeg','png','jpg','pdf'];
      $total = count($formatos);
      for($cont = 0; $cont<$total; $cont++){
      if(strpos($extensao, $formatos[$cont]) !== false){
      $nome_file = 'pagto_'.$request->nome_frota;
      $novo_file = uniqid($nome_file).'.'.$extensao;
      $novo_nome = str_replace(' ','_',$novo_file);
      $path = "Comprovativos/pagto_aluguer/".date('d-M-Y');
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


//funcao para enviar o email
function enviar_email($request){
    try{

        //trata-se do cliente
        $sms = $request->sms;
        $n_aluguer = $request->n_aluguer;
        $cliente = $request->cliente_email;

        $info = [
            'titulo'=> 'Confirmação do aluguer dos automóveis',
            'sms'=>$sms,
            'n_aluguer'=>$n_aluguer
        ];
        //enviando email
        \Mail::to($cliente)
        ->cc(['mmligeral@mmlisolucoes.com','josekinanga@mmlisolucoes.com'],'MMLI - Soluções Comércio & Prestação de Serviços')
        ->bcc('jose922884206@gmail.com','MMLI - Team Devs')//trocar com o da SLA
        ->send(new \App\Mail\AluguerCarroMail($info));

        return 1;//response()->json(['sms'=>'O email foi enviado com sucesso ao Admin. do Sistema']);
    
        }catch(\Exception $error){
        return -1;//falha no server
        }
}

function enviar_sms_ws($request){

    $telefone =  $request->telef;//cliente telef
    $sms = $request->sms;
    $n_aluguer = $request->n_aluguer;

    $whatsapp = $sms.'\n\n'.'Segue-se o nº do Bilhete comprado B.I nº _'.$n_aluguer.'_';
    //$curl = curl_init();
    $telef =  '+244'.$telefone;
    
    $url = "https://api.twilio.com/2010-04-01/Accounts/AC7987914196473b0e11ab10200f9cc1df/Messages.json";
    $from = "whatsapp:+14155238886";
    //$to = "whatsapp:+244932853283";
    $to = "whatsapp:".$telef;
    $body = $whatsapp;
    $id = "AC7987914196473b0e11ab10200f9cc1df";
    $token = "2b037f653818e5df0262f1c6706807ce";
    $data = array(
        'From' => $from,
        'To' => $to,
        'Body' => $body
    );

    $post = http_build_query($data);
    $x = curl_init($url);
    curl_setopt($x, CURLOPT_POST, true);
    curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
    curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($x, CURLOPT_POSTFIELDS, $post);
    // var_dump($post);
    $y = curl_exec($x);
    //var_dump($y);
    curl_close($x);

    return var_dump($y);
}
//function to send Telegram
function enviar_telegram($msg) {
    $id = '-655285160'; 
    $token = '5475892163:AAEJ1cHob6So7235lEYOTzc16qENUcDINTE'; 
    $silent = false;

    $data = array(
        'chat_id' => $id,
        'text' => $msg,
        //'parse_mode' => 'html',
        //'disable_web_page_preview' => true,
        //'disable_notification' => $silent
    );
    if($token != '') {
      $ch = curl_init('https://api.telegram.org/bot'.$token.'/sendMessage');
      curl_setopt_array($ch, array(
          CURLOPT_HEADER => 0,
          CURLOPT_RETURNTRANSFER => 1,
          CURLOPT_POST => 1,
          CURLOPT_POSTFIELDS => $data
      ));
     $res = curl_exec($ch);
      curl_close($ch);
    }
    return $res;
}

//function para enviar sms
function enviar_sms($request){
    //pegando os dados
    if((isset($request->destino) || isset($request['destino'])) && ($request['destino'] == 0 || $request->destino == 0))
    {
        $telefone =  $request['telef'];//cliente telef
        $sms = $request['sms'];
        $id_pedido = $request['id_pedido'];
        $destino = $request['destino'];

        //administrador sla - interno
        $content = $sms.' Segue-se o ID do Pedido '.$id_pedido;
        $telef =  $telefone; //telef do admin neste caso
    }else{
        //trata-se do cliente
        $telefone =  $request->telef;//cliente telef
        $sms = $request->sms;
        $n_aluguer = $request->n_aluguer;
        $destino = $request->destino;
        $content = $sms.'. Segue-se o código do Aluguer '.$n_aluguer;
        $telef =  '+244'.$telefone;
    }
 
    $url = "https://api.twilio.com/2010-04-01/Accounts/AC7987914196473b0e11ab10200f9cc1df/Messages.json";
    $from = "+19403985137";
    $to = $telef;
    $body = $content;
    $id = "AC7987914196473b0e11ab10200f9cc1df";
    $token = "2b037f653818e5df0262f1c6706807ce";
    $data = array(
        'From' => $from,
        'To' => $to,
        'Body' => $body
    );

    $post = http_build_query($data);
    $x = curl_init($url);
    curl_setopt($x, CURLOPT_POST, true);
    curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
    curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($x, CURLOPT_POSTFIELDS, $post);
    //var_dump($post);
    $y = curl_exec($x);
    //var_dump($y);
    curl_close($x);

    return $y;
}