<?php $page = 'folha-funcionarios-contratos'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Funcionários
                @endslot
                @slot('li_1')
                    Menu principal
                @endslot
                @slot('li_2')
                    Funcionários
                @endslot
            @endcomponent
            <!-- /Success message -->
            @include('components.success-message')

            @if (session('successMessageTitle') && session('successMessageSubTitle'))
                <script>
                    $(document).ready(function() {
                        $('#successModal').modal('show');
                    });
                </script>
            @endif

            <!-- Lista Funcionários -->
            <div class="card table-list-card">
                <div class="card-body">
                    <div class="table-top">
                        BRENDO OLIVEIRA MARINHO
                        <p>CPF: 058.433.223-86</p>
                    </div>
                    <div class="table-responsive">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-badge success">
                                    <i class="fas fa-file"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Contrato de experiência</h4>
                                    </div>
                                    <div class="timeline-body mt-3">
                                        <p>

                                            <i class="fa-solid fa-spinner fa-spin-pulse"></i> Seu contador(a) está
                                            preparando o contrato.

                                        </p>
                                    </div>
                                    <button class="btn btn-success mt-3" disabled><i
                                            class="fa-solid fa-file-arrow-down"></i> Baixar contrato</button>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge info">
                                    <i class="fas fa-file"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Anexar contrato assinado </h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Solicite ao funcionario a assinatura e depois anexe o contrato assinado aqui.</p>
                                    </div>
                                    <button class="btn btn-success mt-3" disabled><i
                                            class="fa-solid fa-file-arrow-down"></i> Anexar contrato assinado</button>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge info">
                                    <i class="fas fa-file-contract"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Tudo certo!</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>BRENDO OLIVEIRA MARINHO está efetivado na sua empresa por período de experiência.
                                        Após o vencimento do período, caso não seja solicitado a rescisão o funcionário iniciará
                                        estará em regime de contrato definitivo</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge success">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt obcaecati,
                                            quaerat tempore officia voluptas debitis consectetur culpa amet, accusamus
                                            dolorum fugiat, animi dicta aperiam, enim incidunt quisquam maxime neque
                                            eaque.
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
