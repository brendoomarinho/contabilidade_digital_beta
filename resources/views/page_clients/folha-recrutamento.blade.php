<?php $page = 'folha-recrutamento'; ?>
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
                @slot('li_3')
                    Admissão e rescisão
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
                        <span><i class="fa-solid fa-user fs-3"></i> {{ $funcionario->nome }}</span>
                        <p>CPF: {{ $funcionario->cpf }}</p>
                    </div>
                    <div class="table-responsive">
                        <ul class="timeline">

                            <!-- etapa1 -->
                            <li>
                                <div class="timeline-badge info">
                                    <i class="fas fa-hospital-user ms-1"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Exame Admissional</h4>
                                    </div>
                                    <div class="timeline-body mt-3">
                                        <p>
                                            Conforme determina o Art. 168 do Decreto Lei nº 5.452/43, é obrigatória a
                                            realização do exame médico admissional antes do início das atividades laborais.
                                            Solicite ao candidato a realização do exame e, após concluído, envie-nos o
                                            laudo.
                                        </p>
                                    </div>
                                </div>
                            </li>

                            <li class="timeline-inverted">
                                <div class="timeline-badge info">
                                    <i class="fa-solid fa-file-circle-check ms-1"></i>Enviar
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Anexar Exame Admissional </h4>
                                    </div>
                                    @if ($funcionario->recrutamento->etapa == 0)
                                        <div class="timeline-body mt-3">
                                            <p>O arquivo a ser anexado pode ser digitalizado ou foto.</p>
                                        </div>
                                        <form method="post"
                                            action="{{ route('recrutamento.etapas', ['funcionario' => $funcionario->id]) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            @component('components.upload-file')
                                            @endcomponent
                                            <script src="{{ asset('build/js/upload-file.js') }}"></script>
                                            <button type="submit" class="btn btn-success">Enviar</button>
                                        </form>
                                    @elseif($funcionario->recrutamento->etapa == 1)
                                        Enviado pra análise
                                    @else
                                        baixar aquivo
                                    @endif
                                </div>
                            </li>
                            <!-- etapa 2 -->
                            @if ($funcionario->recrutamento->etapa >= 2)
                                <li>
                                    <div class="timeline-badge info">
                                        <i class="fas fa-file-circle-plus ms-1"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Contrato de experiência</h4>
                                        </div>
                                        @if ($funcionario->recrutamento->etapa == 2)
                                            <div class="timeline-body mt-3">
                                                <p>
                                                    <i class="fa-solid fa-spinner fa-spin-pulse"></i> Aguarde, seu
                                                    contador(a)
                                                    está
                                                    preparando o contrato.
                                                </p>
                                            </div>
                                            <button class="btn btn-success mt-3" disabled>Baixar contrato</button>
                                        @elseif($funcionario->recrutamento->etapa > 2)
                                            <div class="timeline-body mt-3">
                                                <p>
                                                    baixar contrato
                                                </p>
                                            </div>
                                            <button class="btn btn-success mt-3">Baixar contrato</button>
                                        @endif
                                    </div>
                                </li>
                            @endif
                            @if ($funcionario->recrutamento->etapa >= 3)
                                <li class="timeline-inverted">
                                    <div class="timeline-badge info">
                                        <i class="fa-solid fa-file-circle-check ms-1"></i>Enviar
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Anexar Contrato assinado </h4>
                                        </div>
                                        @if ($funcionario->recrutamento->etapa == 3)
                                            <div class="timeline-body mt-3">
                                                <p>Após colher assinatura do canditato, envie-nos para finalizarmos o
                                                    processo.
                                                </p>
                                            </div>
                                            @component('components.upload-file')
                                            @endcomponent
                                            <script src="{{ asset('build/js/upload-file.js') }}"></script>
                                            <button class="btn btn-success" disabled>Enviar</button>
                                        @elseif ($funcionario->recrutamento->etapa == 4)
                                            em analise...
                                        @elseif ($funcionario->recrutamento->etapa > 4)
                                            baixar contrato
                                        @endif
                                    </div>
                                </li>
                            @endif
                            @if ($funcionario->recrutamento->etapa >= 5)
                                <li>
                                    <div class="timeline-badge info">
                                        <i class="fas fa-user-check ms-1"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><i class="fa-regular fa-circle-check fa-1xl"
                                                    style="color: #63E6BE;"></i> Admissão finalizada com sucesso!</h4>
                                        </div>
                                        <div class="timeline-body mt-3">
                                            <p>
                                                <b>BRENDO OLIVEIRA MARINHO</b> foi contratado em período de
                                                experiência, com vigência até 05/04/2023, podendo ser prorrogado até
                                                25/07/2023.
                                                Caso não haja solicitação de rescisão até a data final da experiência, o
                                                funcionário passará automaticamente para o regime de contrato definitivo.
                                            </p>
                                        </div>
                                        <button class="btn btn-success mt-3">Ficha do funcionário</button>
                                    </div>
                                </li>

                                <li class="timeline-inverted">
                                    <div class="timeline-badge warning">
                                        <i class="fa fa-user-slash fa-flip-horizontal"></i>
                                    </div>
                                    <div class="timeline-panel">

                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Quer solicitar a rescisão?</h4>
                                        </div>
                                        @if ($funcionario->recrutamento->etapa == 5)
                                            <div class="timeline-body mt-3">
                                                <p>Preencha o formulário de rescisão para inciar o processo.
                                                </p>
                                            </div>
                                            <a href="#" class="btn btn-danger mt-3" data-bs-toggle="modal"
                                                data-bs-target="#add-rescisao">
                                                Pedido de rescisão
                                            </a>
                                        @elseif($funcionario->recrutamento->etapa > 5)
                                            <div class="timeline-body mt-3">
                                                <p>
                                                    Rescisão solicitada em 10/05/2025
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </li>
                            @endif
                            @if ($funcionario->recrutamento->etapa >= 6)
                                <li>
                                    <div class="timeline-badge warning">
                                        <i class="fas fa-file-circle-plus ms-1"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Aviso prévio</h4>
                                        </div>
                                        @if ($funcionario->recrutamento->etapa == 6)
                                            <div class="timeline-body mt-3">
                                                <p>
                                                    <i class="fa-solid fa-spinner fa-spin-pulse"></i> Aguarde, seu
                                                    contador(a)
                                                    está
                                                    preparando o aviso prévio.
                                                </p>
                                            </div>
                                            <button class="btn btn-success mt-3" disabled>Baixar aviso prévio</button>
                                        @elseif($funcionario->recrutamento->etapa > 6)
                                            <div class="timeline-body mt-3">
                                                <p>
                                                    baixar aviso prévio.
                                                </p>
                                            </div>
                                            <button class="btn btn-success mt-3">Baixar aviso prévio</button>
                                        @endif
                                    </div>
                                </li>
                            @endif
                            @if ($funcionario->recrutamento->etapa >= 7)
                                <li class="timeline-inverted">
                                    <div class="timeline-badge warning">
                                        <i class="fa-solid fa-file-circle-check ms-1"></i>Enviar
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Anexar Aviso Prévio assinado </h4>
                                        </div>
                                        @if ($funcionario->recrutamento->etapa == 7)
                                            <div class="timeline-body mt-3">
                                                <p>Envie o aviso prévio assinado.</p>
                                            </div>
                                            <!-- anexo -->
                                            @component('components.upload-file')
                                            @endcomponent
                                            <script src="{{ asset('build/js/upload-file.js') }}"></script>
                                            <button class="btn btn-success" disabled>Enviar</button>
                                        @elseif ($funcionario->recrutamento->etapa == 8)
                                            em análise..
                                        @elseif ($funcionario->recrutamento->etapa > 8)
                                            baixar aquivo
                                        @endif
                                    </div>
                                </li>
                            @endif
                            @if ($funcionario->recrutamento->etapa >= 9)
                                <li>
                                    <div class="timeline-badge warning">
                                        <i class="fas fa-file-circle-plus ms-1"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Exame Demissional</h4>
                                        </div>
                                        <div class="timeline-body mt-3">
                                            <p>
                                                Conforme determina o Art. 168 do Decreto Lei nº 5.452/43, é obrigatória a
                                                realização do exame médico demissional antes da rescisão do contrato de
                                                trabalho.
                                                Solicite ao funcionário a realização do exame e, após concluído, envie-nos o
                                                laudo.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge warning">
                                        <i class="fa-solid fa-file-circle-check ms-1"></i>Enviar
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Anexar Exame Demissional</h4>
                                        </div>
                                        @if ($funcionario->recrutamento->etapa == 9)
                                            <div class="timeline-body mt-3">
                                                <p>O arquivo a ser anexado pode ser digitalizado ou foto.</p>
                                            </div>
                                            <!-- anexo -->
                                            @component('components.upload-file')
                                            @endcomponent
                                            <script src="{{ asset('build/js/upload-file.js') }}"></script>
                                            <button class="btn btn-success" disabled>Enviar</button>
                                        @elseif ($funcionario->recrutamento->etapa == 10)
                                            em análise...
                                        @elseif ($funcionario->recrutamento->etapa > 10)
                                            baixar aquivo
                                        @endif
                                    </div>
                                </li>
                            @endif
                            @if ($funcionario->recrutamento->etapa >= 11)
                                <li>
                                    <div class="timeline-badge warning">
                                        <i class="fas fa-file-circle-plus ms-1"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Termo de Rescisão</h4>
                                        </div>
                                        @if ($funcionario->recrutamento->etapa == 11)
                                            <div class="timeline-body mt-3">
                                                <p>
                                                    <i class="fa-solid fa-spinner fa-spin-pulse"></i> Aguarde, seu
                                                    contador(a)
                                                    está
                                                    preparando o Termo de Rescisão.
                                                </p>
                                            </div>
                                            <button class="btn btn-success mt-3" disabled>Baixar termo de rescisão</button>
                                        @elseif ($funcionario->recrutamento->etapa > 11)
                                            baixar rescisão
                                        @endif
                                    </div>
                                </li>
                            @endif
                            @if ($funcionario->recrutamento->etapa >= 12)
                            <li class="timeline-inverted">
                                <div class="timeline-badge warning">
                                    <i class="fa-solid fa-file-circle-check ms-1"></i>Enviar
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Termo de Rescisão assinado</h4>
                                    </div>
                                      @if ($funcionario->recrutamento->etapa == 12)
                                    <div class="timeline-body mt-3">
                                        <p>Após colher assinatura do funcionário, envie-nos para finalizarmos o
                                            processo.
                                        </p>
                                    </div>
                                    <!-- anexo -->
                                    @component('components.upload-file')
                                    @endcomponent
                                    <script src="{{ asset('build/js/upload-file.js') }}"></script>
                                    <button class="btn btn-success" disabled>Enviar</button>
                                     @elseif ($funcionario->recrutamento->etapa == 13)
                                     em análise...
                                     @elseif ($funcionario->recrutamento->etapa > 13)
                                     baixar aquivo
                                     @endif
                                </div>
                            </li>
                            @endif
                             @if ($funcionario->recrutamento->etapa >= 14)
                            <li>
                                <div class="timeline-badge info">
                                    <i class="fas fa-user-check ms-1"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title"><i class="fa-regular fa-circle-check fa-1xl"
                                                style="color: #63E6BE;"></i> Processo de rescisão concluído!</h4>
                                    </div>
                                    <div class="timeline-body mt-3">
                                        <p>
                                            <b>BRENDO OLIVEIRA MARINHO</b> foi desligado da empresa.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
