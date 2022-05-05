@extends ('layouts.visitor') <!--Call of template welcome-->
@section('content')  <!--Sectino to show content to yield -->
<!-- banner principal -->
<div class="banner-box-img">
<div class="banner-escuro-img">
    <div class="container">
           <div class="row">
               <div class="col-10">
               <h1 class="header-title padding-top">
            Olá! Já pensou em falar connosco?
            </h1>
               </div>
           </div>
    </div>
</div>
</div>
<!-- end banner --> 
<div class="container">
    <!-- title -->
<div class="col-12 mb-4">
					<div class="main__title main__title--page">
						<h2>Formulário de Contacto!</h2>
					</div>
				</div>
				<!-- end title -->
	<!-- contacts --> 
	<div class="row row--grid  mb-4">
				<div class="col-12 col-lg-7 col-xl-8">
					<form action="#" class="sign__form sign__form--contacts">
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="sign__group">
									<input type="text" name="name" class="sign__input" placeholder="Nome completo">
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="sign__group">
									<input type="text" name="email" class="sign__input" placeholder="Email válido">
								</div>
							</div>

							<div class="col-12">
								<div class="sign__group">
									<input type="text" name="subject" class="sign__input" placeholder="Assunto">
								</div>
							</div>

							<div class="col-12">
								<div class="sign__group">
									<textarea name="text" class="sign__textarea" placeholder="Escreve sua mensagem..."></textarea>
								</div>
							</div>

							<div class="col-12 col-xl-3">
								<button type="button" class="sign__btn"><span>Submeter</span></button>
							</div>
						</div>
					</form>	
				</div>

				<div class="col-12 col-md-6 col-lg-5 col-xl-4">
					<div class="main__title main__title--sidebar">
						<h2>Outros Detalhes</h2>
						<p>A SLA é uma Agência de viagem autorizada e Prestadora de Serviço diversos, estamos localizado em Viana perto a oficina do Tio Show. </p>
					</div>
					<ul class="contacts__list">
						<li><a href="tel:88002345678">+244 922 853 83</a></li>
						<li><a href="mailto:support@waydex.com">suporte@sla.transporte.com</a></li>
						<li><a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="open-map">554 Estalagem,Vina, Luanda</a></li>
					</ul>
				
				</div>
			</div>
	<!-- end contacts --> 
@endsection
