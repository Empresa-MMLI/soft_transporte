
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="SLA - Agência de Turismo & Prestação de Serviços Lda. Somos responsável por garantir segurança e conforto em suas viagens.">
	<meta name="author" content="M.M.L.I.- SOLUCÕES COMÉRCIO E P. DE SERVICOS LDA">
	<meta name="keywords" content="Facilita, Gestão, Software de Gestão de Empresas, Empresa, mmlisoluções, mmlisolucoes,soluões">
	<link rel="shortcut icon" href="{{ url('assets/img/logo/ico.png') }}" />
	<title>@yield('html_title')</title>
	<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">--> 
	<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<!-- Link dataTables -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">		
	<!-- fim Link dataTables -->
	<link rel="stylesheet" href="{{ asset('assets/css/datatimepicker.min.css') }}">
  	<link href="{{ url('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/fontawesome.min.css') }}" rel="stylesheet">
	
	<link href="{{ url('assets/css/custom.css') }}?@php echo 'time='.random_int(10,50) @endphp" rel="stylesheet">
	<link href="//db.onlinewebfonts.com/c/fa8cbf16882d4c4c3336976be40d9410?family=Carnas-Medium" rel="stylesheet" type="text/css"/>
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="{{ route('dashboard.index') }}">
          <span class="align-middle welcome">
    <img src="{{ url('assets/img/logo/logo_branco.png') }}" alt="Logo-facilita" class="logo_ img-responsive"></span>
        </a>

				<ul class="sidebar-nav">
				
					<li class="sidebar-item  active">
						<a class="sidebar-link" href="{{ route('cliente.index') }}">
              <i class="align-middle" data-feather="activity"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>

					<li class="sidebar-item">
				<a class="sidebar-link" href="{{ route('cliente.perfil') }}">
              	<i class="align-middle" data-feather="user"></i> <span class="align-middle">Meu Perfil</span>
            	</a>
				</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('cliente.bilhetes') }}">
              <i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Bilhetes comprados</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="#">
              <i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Veículos alugados</span>
            </a>
					</li>
</ul>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
                    <li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">{{ isset($total_bi)? $total_bi: 0 }}</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
								{{ isset($total_bi)? $total_bi: 0 }} Nova(s) Notificações
								</div>
								<div class="list-group" style="overflow-y: auto!important; max-height:500px;">
									<!-- BI comprados -->
									@if(isset($bilhete_novos[0]->id))
									@foreach($bilhete_novos as $item)
									<a href="{{ route('cliente.bilhetes') }}#form" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">+{{ $item->total_passageiro}} Bilhete(s) comprado(s)!</div>
												<div class="text-muted small mt-1"><strong>{{ $item->cliente }} (você)</strong> comprou ({{ $item->total_passageiro}}) bilhete(s), pretende receber em {{ $item->ponto_e }}.</div>
												<div class="text-muted small mt-1">Previsão de viagem: {{ date('d-m-Y H:i', strtotime($item->data_partida)) }}</div>
											</div>
										</div>
									</a>
									@endforeach
									<!-- BI reservados -->
									@endif
									@if(isset($bilhete_reservados[0]->id))
									@foreach($bilhete_reservados as $item)
									<a href="{{ route('cliente.bilhetes') }}#reservados" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">+{{ $item->total_passageiro}} Bilhete(s) reservado(s)!</div>
												<div class="text-muted small mt-1"><strong>{{ $item->cliente }} (você)</strong> comprou ({{ $item->total_passageiro}}) bilhete(s), pretende receber em {{ $item->ponto_e }}.</div>
												<div class="text-muted small mt-1">Previsão de viagem: {{ date('d-m-Y H:i', strtotime($item->data_partida)) }}</div>
											</div>
										</div>
									</a>
									@endforeach
									@endif

								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Mostrar todas Notificações</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
									<span class="indicator">1</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										1 Novas Mensagens
									</div>
								</div>
								<div class="list-group" style="overflow-y: auto!important; max-height:500px;">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{ url('assets/img/avatars/avatar.png') }}" class="avatar img-fluid rounded-circle" alt="Cliente">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">MMLI - Comércio/Serviços</div>
												<div class="text-muted small mt-1">Agradecemos a preferência e escolha do Software de Transporte SLA</div>
												<div class="text-muted small mt-1">Recente</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="{{ route('dashboard.mensagens') }}" class="text-muted">Mostrar todas Mensagens</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
							<i class="fa fa-user"></i> <span class="text-dark">{{ Session::has('usuario.nome')? substr(Session::get('usuario.nome'), 0,30):"Cliente" }}</span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="{{ route('cliente.perfil') }}"><i class="align-middle me-1" data-feather="user"></i> Perfil</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Visão Geral</a>
								<div class="dropdown-divider"></div>
								<!--<a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Configurações</a>-->
								<!--<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Centro de ajuda</a>-->
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{ route('logout') }}"><i class="align-middle me-1 text-danger" data-feather="power"></i> Sair do Sistema</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">
        @yield('content')
				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://mmlisolucoes.com" target="_blank"><strong>MMLI - Soluções Tecnológicas</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://mmlisolucoes.com/facilita/" target="_blank">Suporte</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://mmlisolucoes.com/contactos/" target="_blank">Centro de ajuda</a>
								</li>
						
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<!--<script src="{{ url('assets/js/jquery.min.js') }}" ></script>-->
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="{{ url('assets/js/datapicker.min.js') }}" ></script>
	<script src="{{ url('assets/js/app.js') }}"></script>
	<script src="{{ url('assets/js/custom.js') }}" ></script>
	
	@yield('html_graphics')
	<!-- Datatable -->
	<script>
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();

    $('#dataTables, .dataTables').DataTable( {
        "paging":   true,
        "ordering": true,
        "info":     true,
		dom: 'Bfrtip',
        buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "buttons": 
        [       
            {
                "extend": "copyHtml5",
                "text": "COPIAR"
            },          
            {
                "extend": "pdf",
                "text": "PDF"
            },
            {
                "extend": "excelHtml5",
                "text": "EXCEL"
            },
            {
                "extend": "print",
                "text": "IMPRIMIR"
            }
        ],
        language: {
            buttons: {
                copyTitle: 'Copiado para área de transferência',
                copyKeys: 'Appuyez sur <i>ctrl</i> ou <i>\u2318</i> + <i>C</i> pour copier les données du tableau à votre presse-papiers. <br><br>Pour annuler, cliquez sur ce message ou appuyez sur Echap.',
                copySuccess: {
                    _: '%d linhas copiadas',
                    1: '1 linha copiada'
                }
            }
        },
        "order": [[ 3, "desc" ]],
        "language": {
          "decimal":        "",
          "emptyTable":     "Nenhum registro disponíveis na tabela",
          "info":           "Mostrando _START_ a _END_ de _TOTAL_ entradas",
          "infoEmpty":      "Mostrando 0 a 0 de 0 entradas",
          "infoFiltered":   "(filtrado de _MAX_ entradas totais)",
          "infoPostFix":    "",
          "thousands":      ",",
          "lengthMenu":     "Mostrar _MENU_ entradas",
          "loadingRecords": "Carregando...",
          "processing":     "Em processamento...",
          "search":         "Procurar:",
          "zeroRecords":    "Nenhum registro correspondente encontrado",
          "paginate": {
              "first":      "Primeiro",
              "last":       "Último",
              "next":       "Próximo",
              "previous":   "Anterior"
    },
        }
    } );
	//dataTimeTable
	$data = new Date();
    $('#datapicker, .datapicker').datetimepicker(); 
} );
</script>
</body>

</html>
        