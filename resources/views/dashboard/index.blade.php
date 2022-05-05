@extends ('layouts.app') <!--Call of template welcome-->
@section('content')  <!--Sectino to show content to yield -->

<h1 class="h3 mb-3"><strong>Visão</strong> Geral da Agência</h1>

<div class="row">
    <div class="col-xl-6 col-xxl-12 d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">BIlhetes</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="truck"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3 text-dark">2.382</h1>
                            <div class="mb-0">
                                <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> 3.65% </span>
                                <span class="text-muted"> em Estoque </span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Clientes</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="users"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3 text-dark">150</h1>
                            <div class="mb-0">
                                <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
                                <span class="text-muted"> Cadastrados</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Vendas</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="dollar-sign"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3 text-dark">Ao 21.300</h1>
                            <div class="mb-0">
                                <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
                                <span class="text-muted"> Investidos</span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Pedidos</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3 text-dark">14</h1>
                            <div class="mb-0">
                                <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 2.25% </span>
                                <span class="text-muted">Recentes</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-12 col-md-6 col-xxl-6 d-flex order-2 order-xxl-3">
        <div class="card flex-fill w-100">
            <div class="card-header">

                <h5 class="card-title mb-0">Situação da Agência</h5>
            </div>
            <div class="card-body d-flex">
                <div class="align-self-center w-100">
                    <div class="py-3">
                        <div class="chart chart-xs">
                            <canvas id="chartjs-dashboard-pie"></canvas>
                        </div>
                    </div>

                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <td>Clientes</td>
                                <td class="text-end">506</td>
                            </tr>
                            <tr>
                                <td>BIlhetes vendidos</td>
                                <td class="text-end">3801</td>
                            </tr>
                            <tr>
                                <td>Serviços prestados</td>
                                <td class="text-end">16</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- inicio do map -->
    <!--
    <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
        <div class="card flex-fill w-100">
            <div class="card-header">

                <h5 class="card-title mb-0">Real-Time</h5>
            </div>
            <div class="card-body px-4">
                <div id="world_map" style="height:350px;"></div>
            </div>
        </div>
    </div>
-->
    <!-- fim do map -->
    
    <div class="col-12 col-md-6 col-xxl-6 d-flex order-1 order-xxl-1">
        <div class="card flex-fill">
            <div class="card-header">

                <h5 class="card-title mb-0">Viagens reservadas</h5>
            </div>
            <div class="card-body d-flex">
                <div class="align-self-center w-100">
                    <div class="chart">
                        <div id="datetimepicker-dashboard"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-6 col-xxl-6 d-flex">

    <div class="card flex-fill w-100">
            <div class="card-header">

                <h5 class="card-title mb-0">Vendas Mensais</h5>
            </div>
            <div class="card-body d-flex w-100">
                <div class="align-self-center chart chart-lg">
                    <canvas id="chartjs-dashboard-bar"></canvas>
                </div>
        </div>
            </div>
        </div>
    <div class="col-12 col-lg-6 col-xxl-7 d-flex">
    <div class="card flex-fill w-100">
            <div class="card-header">
  <h5 class="card-title mb-0">Estatísticas das Vendas</h5>
            </div>
            <div class="card-body py-3">
                <div class="chart chart-sm">
                    <canvas id="chartjs-dashboard-line"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
