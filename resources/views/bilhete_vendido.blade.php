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
					  <div class="container-fluids">
                    <div class="row mb-2">
                    <div class="main__title main__title--page">
						<h2 style="border-bottom:3px solid #ebebeb"><i class="fa fa-check"> </i>  Confirmação da compra do Bilhetes</h2>
					</div>
                        <div class="col-sm-12 col-md-7">
                            <h3 class="my-4 text-info"> <i class="text-info fa fa-info-circle"></i> Estimado(a) Cliente  <u>{{ isset($cliente->nome)? $cliente->nome:'...'}}</u>, desde já agradecemos sua preferência!</h3>
                            <p class="text-normal">Informamos que o seu Bilhete foi <span class="text-success"><strong>Comprado com sucesso!</strong></span><br>
                            Após a Validação do pagamento do seu Bilhete de viagem receberá o número de Bilhete no seu perfil, email ou sms. Previsão de recepção 30 min.</p>
                            <p class="text-normal"><code>*</code> ID Bilhete: <strong>{{ isset($id_bilhete)? $id_bilhete:'xxx' }}</strong></p>
                           <p class="text-simples mb-2"><strong>Caso não receber o Nº do Bilhete por email, no seu Perfil de usuário ou outro meio de comunicação, faça-se apresentado com o seu <u>ID do Bilhete</u>.</strong>
                            </p>
                            <a href="{{ route('index') }}" class="text-dark float-lefts"><i class="fa fa-home text-info"></i> Voltar à Página inicial</a>
                        </div>
                        <div class="col-sm-12 col-md-5 text-center">
                                <img src="{{ asset('assets/resources/checkout.gif') }}" class="resources-img" alt="Comprovativo de Pagto...">
                        </div>
                       
</div>             
</div>          
</div>
				<!-- end title -->
	
@endsection
