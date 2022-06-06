<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\PontosDetalhes;
use App\Models\Veiculo;
use App\Models\VeiculoDetalhes;
use App\Models\Rota;
use App\Models\Provincia;
use App\Models\Classe;
use App\Models\Viagem;
use App\Models\Bilhete;
use App\Models\BilheteDetalhes;
use App\Models\BilheteReservado;
use App\Models\BilheteReservadoDetalhes;
use App\Models\Cliente;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client;
use App\Models\ViagemDetalhes;
//use Twilio\Rest\Client;
Use Mail;
use Session;

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
        $register->ref_autocarro  = $request->ref_autocarro;
        $register->capacidade = $request->capacidade;
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
    public function index_bilhetes(){
        $bilhete_novos = BilheteDetalhes::where('estado',0)->orderBy('data_partida','asc')->get();
        $total_bi_novo = $bilhete_novos->count();
        $bilhete_reservados = BilheteReservadoDetalhes::where('estado',0)->orderBy('data_partida','asc')->get();
        $total_bi_res = $bilhete_reservados->count();
        //total dos bi comprados e reservados
        $total_bi = $total_bi_novo+$total_bi_res;
        $bilhete_ativos = BilheteDetalhes::where('estado',1)->latest()->get();
        return view('dashboard.bilhetes', ['bilhete_novos'=>$bilhete_novos,'bilhete_ativos'=>$bilhete_ativos,'bilhete_reservados'=>$bilhete_reservados,'bi_reservados'=>$bilhete_reservados,'total_bi'=>$total_bi]);
    }
    public function cliente_bilhetes(){
        $cliente = Cliente::where('id_usuario', Session::get('usuario.id'))->first();
        $bilhete_novos = BilheteDetalhes::where('estado',0)->orderBy('data_partida','asc')->where('id_cliente',$cliente->id)->get();
        $total_bi_novo = $bilhete_novos->count();
        $bilhete_reservados = BilheteReservadoDetalhes::where('estado',0)->orderBy('data_partida','asc')->where('id_cliente',$cliente->id)->get();
        $total_bi_res = $bilhete_reservados->count();
        //total dos bi comprados e reservados
        $total_bi = $total_bi_novo+$total_bi_res;
        $bilhete_ativos = BilheteDetalhes::where('estado',1)->latest()->where('id_cliente',$cliente->id)->get();
        return view('dashboard.cliente.bilhetes', ['bilhete_novos'=>$bilhete_novos,'bilhete_ativos'=>$bilhete_ativos,'bilhete_reservados'=>$bilhete_reservados,'bi_reservados'=>$bilhete_reservados,'total_bi'=>$total_bi]);
    
    }
    public function comprar_bilhetes(Request $request){
        //buscar viagens 
        $provincias = Provincia::orderby('provincia','asc')->get();
        return view('bi_search', ['provincias'=>$provincias]);
    }

    public function bilhetes(Request $request){ 
        //buscar viagens 
        $provincias = Provincia::orderby('provincia','asc')->get();
        if(isset($request->origem)){
        $bilhetes = ViagemDetalhes::where('estado',1)->where('total_passageiro','>=',0)->where('rota_origem',$request->origem)->where('rota_destino',$request->destino)->where('data_partida','>=',$request->checkin)->orderBy('data_partida','asc')->get();
        $total_search = $bilhetes->count();

        if(!isset($bilhetes->id)){
            $bilhetes = ViagemDetalhes::where('estado',1)->where('total_passageiro','>=',0)->where('rota_origem',$request->origem)->where('rota_destino',$request->destino)->where('data_chegada','>=',$request->checkin)->orderBy('data_partida','asc')->get();
            $total_search = $bilhetes->count();  
            return view('bilhete_results', ['bilhetes'=>$bilhetes,'provincias'=>$provincias,'total_search'=>$total_search,'total_adultos'=>$request->group_adults,'total_criancas'=>$request->group_children,'founds'=>$total_search]);
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
            $cliente->id_usuario = $id_acesso;
            $cliente->save();
        }

        $empresa = null;//$empresa::first();
        $cliente = Cliente::where('n_doc',$request->n_doc_cliente)->orwhere('n_doc',$request->n_doc)->first();
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
     }catch(\Exception $e){
        return redirect()->back()->with('error','Não foi possível efectuar a Compra do Bilhete, tente novamente!');
    }
    }
     //store
     public function store_bilhete(Request $request){
        try{
        //buscar o total de assentos por veiculo
        $t_passageiro = ($request->t_passageiros);
        $viagem = ViagemDetalhes::find($request->id_viagem);
        $cliente = Cliente::find($request->id_cliente);
        //pega dados da operadora
        $empresa = Empresa::find(2);//2 Referece-se 
        $telef_admin = '+244'.$empresa->telefone;
        //$telef_admin = '+244932853283';
        
        if($request->forma_pagto == 'PD'){
            $register = new BilheteReservado;
            $register->viagem_id  = $request->id_viagem;
            $register->cliente_id = $request->id_cliente;
            $register->total_passageiro  = $t_passageiro;
            $register->forma_pagto  = $request->forma_pagto;
            $register->estado = 0;
            $register->data_compra = date('Y-m-d');
            $register->save();
            $sms = 'Nova reserva de Bilhete detectado na plataforma, o(a) cliente '.$cliente->nome.' comprou '.$t_passageiro.' bilhete(s) para '.$viagem->rota_origem.' - '.$viagem->rota_destino.' pretende viajar no dia '.date('d/m/Y',strtotime($viagem->data_partida));
        
        }else{
        $register = new Bilhete;
        $register->viagem_id  = $request->id_viagem;
        $register->cliente_id = $request->id_cliente;
        $register->total_passageiro  = $t_passageiro;
        $register->forma_pagto  = $request->forma_pagto;
        if($request->forma_pagto == 'ATM'){
            $upload = upload_file($request);
            if(isset($upload) && $upload['estado'] == 1){
                $register->comprovativo_file  = $upload['url_file'];
            }else{
                return redirect()->back()->with(['estado'=>0,'warning'=>"O formato do comprovotivo anexado é inválido, suportamos apenas JPG, PNG e PDF"]);
            }
        }
        $register->estado = 0;
        $register->data_compra = date('Y-m-d');
        $register->save();
        $sms = 'Nova compra de Bilhete detectado na plataforma, o(a) cliente '.$cliente->nome.' comprou '.$t_passageiro.' bilhete(s) para '.$viagem->rota_origem.' - '.$viagem->rota_destino.' pretende viajar no dia '.date('d/m/Y',strtotime($viagem->data_partida));
        
        }
        //NOTIFICAR O ADMIN SLA sobre nova compra 
        $telegram = enviar_telegram($sms);
        //pegando os dados
        $dados = ["telef"=>$telef_admin,"sms"=>$sms,"n_bilhete"=>null,"destino"=>0];
        $send_sms = enviar_sms($dados);
        //update total de passageiro
       // $viagem = ViagemDetalhes::find($request->id_viagem);
        $t_p_viagem = $viagem->total_passageiro+$t_passageiro;//buscar o total de passageiro atual
        if($t_p_viagem > $viagem->capacidade){
            return redirect()->back()->with(['estado'=>0,'warning'=>"Bilhete de viagem esgotado"]);
        }else{ 
        $update = Viagem::find($request->id_viagem);
        $t_p_viagem = $update->total_passageiro+$t_passageiro;
        $update->total_passageiro = $update->total_passageiro+$t_passageiro;
        if($t_p_viagem == $viagem->capacidade){
            $update->estado = 0;//ja nao esta disponivel
        }
        $update->save();
        }

        $bilhete = Bilhete::latest()->first();
        $id_bilhete = $bilhete->id;

        if($register && $update){
            return view('bilhete_vendido', ['estado'=>1,'id_bilhete'=>$id_bilhete,'cliente'=>$cliente]);
        }

        }catch(\Exception $e){
        return redirect()->back()->with('error_compra','O sistema detectou uma compra de Bilhete efectuada hoje em seu Nome');
        }
    }
    //apagar bilhete indicado
    public function delete_bilhete($id){
        try{
        $bilhete = Bilhete::find($id)->delete();
        if($bilhete)
        return redirect()->back()->with('success','Bilhete de viagem cancelado com sucesso!');
    }catch(\Exception $e){
        return redirect()->back()->with('error','Não foi possível cancelar seu Bilhete de viagem!');
        }
    }

    //validacao de compra de bilhete
    public function validacao_bilhete(Request $request){
        //buscar blhetes
        try{
            
            //verificar a origem do BI (Bilhete ou Reserva)
        if(1 == 1 || $request->ajax()){
        if($request->origem_bilhete == 'bi'){
            
            $bilhete = Bilhete::find($request->id_bilhete);
            $bilhete->n_bilhete = $request->n_bilhete;
            $bilhete->estado = 1;
            $bilhete->save();
            
            $id_viagem = Bilhete::find($request->id_bilhete);
            $id_viagem = $id_viagem->viagem_id;

        }else{
            $update = BilheteReservado::find($request->id_bilhete);
            $update->estado = 1;
            $update->save();
            $reserva = BilheteReservado::find($request->id_bilhete);
            //apos ativacao da reserva regista-se a compra do bi
            
            $register = new Bilhete;
            $register->n_bilhete = $request->n_bilhete;
            $register->viagem_id  = $reserva->viagem_id;
            $register->cliente_id = $reserva->cliente_id;
            $register->total_passageiro  = $reserva->total_passageiro;
            $register->forma_pagto  = $reserva->forma_pagto;
            $register->estado = 1;
            $register->data_compra = $reserva->data_compra;
            $register->save();
            

            $id_viagem = BilheteReservado::find($request->id_bilhete);
            $id_viagem = $id_viagem->viagem_id;
        }
        
        //envia no seu perfil 
        $cliente = Cliente::find($request->id_cliente);//pegar dados do cliente
        $viagem = ViagemDetalhes::find($id_viagem);//pegar dados da viagem
        
        //envia por email
        $sms = 'Bom dia prezado(a) cliente '.$cliente->nome.', a SLA vem por meio desta agradecer e '.
        'confirmar a compra do seu bilhete. abaixo temos o nº do seu Bilhete, por favor faça-se'.
        'apresentado do mesmo no Pontos de Levant. do(a) "'.$viagem->ponto_e.'" no dia '.date('d/m/Y', strtotime($viagem->data_partida));
        $n_bilhete = $request->n_bilhete;
        
       // $email = enviar_email($cliente, $sms, $request->n_bilhete);
       // $whatsapp = enviar_sms_ws($cliente, $sms, $request->n_bilhete);
       // $sms = enviar_sms($cliente, $sms, $request->n_bilhete, 1);
        //return $sms;
        //envia por sms
        if((isset($bilhete) && $bilhete) || (isset($register) && $register))
        return response()->json(['estado'=>1,'success'=>'Nº de Bilhete atribuido e enviado com sucesso!','telef'=>$cliente->telefone,'sms'=>$sms,'n_bilhete'=>$n_bilhete,'destino'=>1]);
    
    }else{
        return redirect()->back()->with('error','Falha ao validar o Bilhete de Viagem, tente novamente!');
    }
        }catch(\Exception $e){
        return response()->json(['error'=>'Falha ao atribuir nº do Bilhete, tente de novo!']);
        }
    
    }  
    //envio de sms para o cliente
    public function send_sms_cliente(Request $request){

       // $email = enviar_email($request);
       // $whatsapp = enviar_sms_ws($request);
        $sms = enviar_sms($request);
        //return response()->json(['estado'=>1,'email'=>$email,'sms'=>$sms,'whatsapp'=>$whatsapp]);
        return response()->json(['estado'=>1,'sms'=>$sms]);
    }
}

//upload ficheiro
function upload_file($request){
      //upload file do comprovativo pagto
      $estado_upload = 0;
      $url_file = null;
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

//funcao para enviar o email
function enviar_email($cliente, $sms, $n_bilhete){
    try{
     
        $info = [
            'titulo'=> 'Compra efectuada com sucesso!',
            'sms'=>$sms,
            'n_bilhete'=>$n_bilhete
        ];
        //enviando email
        \Mail::to($cliente)
        ->cc(['mmligeral@mmlisolucoes.com','josekinanga@mmlisolucoes.com'],'MMLI - Soluções Comércio & Prestação de Serviços')
        ->bcc('jose922884206@gmail.com','MMLI - Team Devs')//trocar com o da SLA
        ->send(new \App\Mail\NumeroBilheteMail($info));

        return 1;//response()->json(['sms'=>'O email foi enviado com sucesso ao Admin. do Sistema']);
    
        }catch(\Exception $error){
        return -1;//falha no server
        }
}

function enviar_sms_ws($cliente, $sms, $n_bilhete){
    $telefone =  $request->telef;//cliente telef
    $sms = $request->sms;
    $n_bilhete = $request->n_bilhete;

    $whatsapp = $sms.'\n\n'.'Segue-se o nº do Bilhete comprado B.I nº _'.$n_bilhete.'_';
    //$curl = curl_init();
    $telef =  $telefone;
    

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
    /*
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.positus.global/v2/sandbox/whatsapp/numbers/6334ea09-d3fe-4689-8acb-684eb0d0ec78/messages",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>"{\r\n  \"to\": \"$telef\",\r\n  \"type\": \"text\",\r\n  \"text\": {\r\n      \"body\": \"$whatsapp\"\r\n  }\r\n}",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYzNjM2M1YTNjMWYzNGY5NGE4NDI4NWUwNDJjNWRmYTM3MWUwMzY0ZjY3NzY3YzhiZjY4YmI0MTgxMGNkMDdiZTU5Mjg1MmE5NDg0MmUzMTIiLCJpYXQiOjE2NTMzMDQwMzEuODg5NzgsIm5iZiI6MTY1MzMwNDAzMS44ODk3ODMsImV4cCI6MTY4NDg0MDAzMS44ODc5OTQsInN1YiI6IjUyMDEiLCJzY29wZXMiOltdfQ.INU1lepOUANODgy7vvKE_LvtWt8bzF59ZLWso3AfULjQHTCVhVbXMmpVW082BsJmUC_TefCZmel-wH5parbcTJQ3fTrIAnBOBYMC--Z6b-zKwJvvKx2lYIAK5Zu-oBQ3oBg9RGsUeAu9QRWzmp1RbJ1Ixw_1NrpFRpCt9k0uaCRilm97wzbaN6Gefmjxw5gvSJz-eANjwZXYBNhvKc8Sx2URdtGJw0wuIn4niuBuwMpaw4dKWARD5oS35ccYA9BVpecxWe9lV1eQOTYvNh4BPMqcGf4TvVYwaWRlP3kpI59kdWH2ulV2UdHxsEox3YjZ20v4vP97HIqcRYryrb8R2id5oJRIviQIEVd7WriQRCCY69ETGxLQFpKwvF0ozd-fbIS-UTud-cB8EYLZTBrTxAmbg65URgyC3SN2nvUG1aT8Dwx1RELj5HTlSw2j297KSmr3i86oSSslk3UN9u93xm3hqnWeGuOTSsBiFbuDabNuTzhelXPXpHNurueCpyAYAMbktw5HkhXlY_BtXlgBcSSKP3UjmACNlFLodmTbgbywt8QA1rG5n5WbtXIsKFgIwBFXb_d3p0ak2VsC_MdlyVGVbi-wM2PL7FtvzBxddjO3G_KcZtLBoIDz_9cMqR6WK0lm0NmgBawj4yPojiaOAKGMF-gfw8G_5Ufj64FZhTs"
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    return $response;*/

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
        $n_bilhete = $request['n_bilhete'];
        $destino = $request['destino'];

        //administrador sla - interno
        $content = $sms;
        $telef =  $telefone; //telef do admin neste caso
    }else{
        //trata-se do cliente
        $telefone =  $request->telef;//cliente telef
        $sms = $request->sms;
        $n_bilhete = $request->n_bilhete;
        $destino = $request->destino;
        $content = $sms.'%0'.'Segue-se o nº do Bilhete comprado B.I nº '.$n_bilhete;
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