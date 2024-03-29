@extends ('layouts.visitor') <!--Call of template welcome-->
@section('content')  <!--Sectino to show content to yield -->
<!-- banner principal -->
<!--
<div class="banner-box-img d-none">
<div class="banner-escuro-img">
    <div class="container">
           <div class="row">
               <div class="col-10">
               <h1 class="header-title padding-top">
                
                </h1>
               </div>
           </div>
    </div>
</div>
</div>
-->
<!-- end banner --> 
<div class="container">
    <!-- title -->
<div class="col-12 mb-4">
					<div class="main__title main__title--page">
						<h2 style="border-bottom:3px solid #ebebeb">Finalizar compra de Bilhetes</h2>
					</div>
                    <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <h3 class="my-4 text-info"> <i class="text-info fa fa-info-circle"></i> Estimado(a) Cliente <u>{{ isset($cliente->nome)? $cliente->nome:'...'}}</u>, desde já agradecemos sua preferência!</h3>
                            <p class="text-normal">Informamos que estão a pagamento os serviços indicados abaixo:</p>
                            <p class="text-normal"><code>*</code> Veículo: <strong>{{ isset($veiculo->marca)? $veiculo->marca.' '.$veiculo->modelo:'...' }}</strong></p>
                            <p class="text-normal"><code>*</code> Montante: <strong>{{ isset($veiculo->preco_aluguer)? number_format(($veiculo->preco_aluguer*$pedido->qtd_carros*$pedido->total_dias),2,',','.'):'0,00' }} Kz</strong></p>
                            <input type="hidden" value="{{ isset($veiculo->preco_aluguer)? number_format(($veiculo->preco_aluguer*$pedido->qtd_carros*$pedido->total_dias),2,',','.'):'0,00' }}" id="custo_veiculo" name="custo_veiculo">
                            <p class="text-normal"><code>*</code> Quantidade veículo(s): <strong>{{ isset($pedido->qtd_carros)? $pedido->qtd_carros:'1' }}</strong></p>
                            <p class="text-simples"><code>*Nota</code> Veículo será alugado por <strong>{{ isset($pedido->total_dias)? $pedido->total_dias:'1' }}</strong> dia(s)</p>
                            <h4 class="my-2">Meio de Pagamento: transferência Bancária</h4>
                            <p class="text-">Deve colocar na descrição da transferência o seguinte xxxx-xxx-xxx enviar o mesmo para comercial@mmlisolucoes.com</p>
                            <h4 class="my-2">Coordenadas Bancárias:</h4>
                            <p class="text-normal">Empresa: SLA - Agência de Turismo e Prestação de Serviços, Lda</p>
                            <p class="text-normal">Swift: MMLI</p>
                            <p class="text-normal">IBAN: AO06.0000.0000.0000.0000</p>
                            <p class="text-normal">Nº Conta: AOA 23994939994</p>
                            <span class="text-simples"><code>Nota:</code><strong>Esta informação também será enviada para seu Email email@dominio.com<br>
                        Apóis a validação do seu pagamento o serviço será activado o mais urgente possível.</strong></span>
                                    
                        </div>
                        <div class="col-sm-12 col-md-6">
                        <fieldset class="scheduler-border">
    <legend class="scheduler-border"> Formulário de Reserva de Veículos</legend>
    <form method="post" action="{{ route('veiculos.alugar') }}" enctype="multipart/form-data">
            @csrf
<p class="my-1"><code>* Detalhes do Pedido</code></p>

<div class="row">
<div class="col-6">
<div class="form-groups">
    <label for="nome">Veículo:</label>
    <input type="text" class="form-control" id="nome_veiculo" name="nome_veiculo" value="{{ isset($veiculo->marca)? $veiculo->marca.' '.$veiculo->modelo:'Desconhecido' }}" placeholder="Veículo" readonly>
    <input type="hidden" class="form-control" value="{{ $pedido->id }}" id="id_pedido" name="id_pedido" placeholder="ID Pedido">
</div>
</div>
  <div class="col-6">
<div class="form-groups">
    <label for="t_adultos">Quantidade Veículo:</label>
    <input type="number" class="form-control" min="0" id="qtd_veiculos" name="qtd_veiculos" value="{{ isset($pedido->qtd_carros)? $pedido->qtd_carros:1 }}" placeholder="Total veículos" required>
    <input type="hidden" class="form-control" value="{{ $veiculo->preco_aluguer*$pedido->qtd_carros*$pedido->total_dias }}" id="total_pago" name="total_pago" placeholder="Total carros">
</div>
</div>
</div>
<p class="my-1"><code>* Detalhes do cliente</code></p>
<div class="row mb-2">
  <div class="col-6">
<div class="form-groups">
    <label for="estado_cliente">Documento apresentado:</label>
    <select  class="form-control custom-select text-capitalize" name="estado_cliente" id="estado_cliente" aria-describedby="addon-wrapping" onchange=" criar_conta($(this).val());" readonly required>
    <option value="{{ isset($cliente->tipo_doc)? $cliente->tipo_doc:'' }}" selected>{{ (isset($cliente->tipo_doc) && $cliente->tipo_doc == 'BI')? 'Bilhete de Identidade':'Nº de Contribuinte' }}</option>
  </select>
</div>
</div>

<div class="col-6">
<div class="form-groups">
    <label for="nome">Nº Documento apresentado:</label>
    <input type="number" class="form-control" value="{{ $cliente->n_doc }}" id="n_doc" name="n_doc" placeholder="Número documento" required readonly>
   <input type="hidden" class="form-control" value="{{ $cliente->id }}" id="id_cliente" name="id_cliente" placeholder="ID viagem">
</div>
</div>
</div>

<div class="row mb-2">
  <div class="col-6">
<div class="form-groups">
    <label for="estado_cliente"><code>*</code> Forma de Pagamento:</label>
    <select  class="form-control custom-select" name="forma_pagto" id="forma_pagto" aria-describedby="addon-wrapping" onchange=" ativar_comprovativo($(this).val());" required>
    <option value="">Escolher...</option>
    <option value="PD">Pagamento Directo</option>
    <option value="REF">Pagamento por Referência</option>
    <option value="ATM" selected>Transferência Bancária</option>
  </select>
</div>
</div>
<div class="col-6">
<div class="form-groups">
    <label for="nome">Comprovativo (<code>PNG, JPG ou PDF</code>):</label>
    <input type="file" class="form-control" id="comprovativo_url" name="comprovativo_url" placeholder="Foto do comprovativo" required>
</div>
</div>
</div>
  <!-- detalhes do cliente --> 
  <button type="submit" class="btn btn-submit btn-blocks float-right"> <i class="fa fa-check-circle"></i> Confirmar</button>
</form>
</fieldset>
                        </div>
                    </div></div>
</div>
				<!-- end title -->
	
        <!-- Modal -->
<div class="modal fade" id="modalReferencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header bg-header-modal">
        <h5 class="modal-title text-light text-center" id="exampleModalLabel">Pagamento por Referência</h5>
        <button type="button" class="btn close" data-dismiss="modal" aria-label="Close" style="font-size:12px">
          <span class="text-white" aria-hidden="true">X</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row my-2 mx-1 alert alert-info p-1">
          <span class="p-2 text-dark"><i class="fa fa-info-circle"></i> Leia atentamente os passos para fazer seu pagamento!</span>
          </div>
        <h3 class="my-2">Passo 1</h3>
        <p class="mb-2">Teu ID de referência <strong>878928522</strong></p>
        <h3 class="my-2">Passo 2</h3>
        <p class="mb-2">
          <ul class="list-referencia">
            <li>Vá até uma multicaixa ou Serviço bancário na internet</li>
            <li>Escolha pagamentos por referência</li>
            <li>Introduza o código da entidade <strong>00266</strong></li>
            <li>Introduza o número da referência gerada em cima</li>
            <li>Introduza o valor total da viagem <strong><span id="valor_veiculo">0,00</span> kz</strong></li>
            <li>Confirmar pagamento</li>
          </ul>
        </p>
        <p><strong class="text-danger">Nota:</strong> Após a Validação do pagamento do seu Bilhete de viagem receberá o número de Bilhete no seu perfil, email ou sms. Previsão de recepção 30 min.</span>
      </div>
     
    </div>
  </div>
</div>
@endsection
