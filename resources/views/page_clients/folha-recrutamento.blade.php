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
            <!-- reexibição do modal com erros de validação -->
            @if ($errors->any())
                <script>
                    $(document).ready(function() {
                        $('#add-rescisao').modal('show');
                    });
                </script>
            @endif
            @include('components.modalpopup', ['funcionario' => $funcionario])
            <!-- Lista Funcionários -->
            <div class="card table-list-card">
                <div class="card-body">
                    <div class="table-top">
                        <div>
                            <div class="avatar bg-info avatar-rounded me-2">
                                <i class="fa-solid fa-user fs-6"></i>
                            </div>{{ $funcionario->nome }}
                        </div>
                        <p>CPF: {{ $funcionario->cpf }}</p>
                    </div>
                    <div class="table-responsive">
                        <ul class="timeline">
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
                                <div class="timeline-badge success">
                                    <i class="fa-solid fa-paperclip"></i>Enviar
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Anexo Exame Admissional </h4>
                                    </div>
                                    @if ($funcionario->recrutamento->etapa == 0)
                                        <div class="timeline-body mt-3">
                                            <p>O arquivo a ser anexado pode ser digitalizado ou foto.</p>
                                        </div>
                                        <form method="post"
                                            action="{{ route('recrutamento.exameAdmissional', ['funcionario' => $funcionario->id]) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            @component('components.upload-file')
                                            @endcomponent
                                            <script src="{{ asset('build/js/upload-file.js') }}"></script>
                                            <button type="submit" class="btn btn-success">Enviar</button>
                                        </form>
                                    @elseif($funcionario->recrutamento->etapa == 1)
                                        <div class="timeline-body mt-3">
                                            <p>
                                                <i class="fa-solid fa-spinner fa-spin-pulse"></i> Aguarde, seu
                                                contador(a) está validando seu documento.
                                            </p>
                                        </div>
                                    @else
                                        <div class="timeline-body mt-3">
                                            <p>O exame admissional foi validado e registrado com sucesso.</p>
                                        </div>
                                        <!-- Upload existis -->
                                        @if ($funcionario->recrutamento->exame_admissao)
                                            <a href="{{ route('fileAction', ['directory' => 'funcionarios_recrutamento_documentos', 'action' => 'download', 'file' => $funcionario->recrutamento->exame_admissao]) }}"
                                                class="btn btn-success mt-3" target="_blank">
                                                <i class="feather-download"></i> Exame admissional
                                            </a>
                                        @else
                                            <div class="text-muted mt-3"><i class="fa-solid fa-circle-exclamation"></i>
                                                Arquivo não encontrado</div>
                                        @endif
                                    @endif
                                </div>
                            </li>
                            <!-- etapa 2 -->
                            @if ($funcionario->recrutamento->etapa >= 2)
                                <li>
                                    <div class="timeline-badge info">
                                        <i class="fas fa-handshake"></i>
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
                                            <button class="btn btn-info mt-3" disabled>Baixar contrato.pdf</button>
                                        @elseif($funcionario->recrutamento->etapa > 2)
                                            <div class="timeline-body mt-3">
                                                <p>
                                                    O contrato de admissão para o seu candidato está pronto.
                                                    Se a assinatura for feita manualmente, o documento precisará ser
                                                    digitalizado. Se optarem pela assinatura digital, o
                                                    documento permanecerá em PDF.
                                                </p>
                                            </div>
                                            <!-- Upload existis -->
                                            @if ($funcionario->recrutamento->contrato_original)
                                                <a href="{{ route('fileAction', ['directory' => 'funcionarios_recrutamento_documentos', 'action' => 'view', 'file' => $funcionario->recrutamento->contrato_original]) }}"
                                                    class="btn btn-info mt-3" target="_blank">
                                                    <i class="feather-download"></i> Baixar contrato.pdf
                                                </a>
                                            @else
                                                <div class="text-muted mt-3"><i class="fa-solid fa-circle-exclamation"></i>
                                                    Arquivo não encontrado</div>
                                            @endif
                                        @endif
                                    </div>
                                </li>
                            @endif
                            @if ($funcionario->recrutamento->etapa >= 3)
                                <li class="timeline-inverted">
                                    <div class="timeline-badge success">
                                        <i class="fa-solid fa-paperclip"></i>Enviar
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Anexo Contrato assinado </h4>
                                        </div>
                                        @if ($funcionario->recrutamento->etapa == 3)
                                            <div class="timeline-body mt-3">
                                                <p>Após colher a assinatura do canditato, envie-nos para finalizarmos o
                                                    processo.
                                                </p>
                                            </div>
                                            <form method="post"
                                                action="{{ route('recrutamento.contratoAssinado', ['funcionario' => $funcionario->id]) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                @component('components.upload-file')
                                                @endcomponent
                                                <script src="{{ asset('build/js/upload-file.js') }}"></script>
                                                <button class="btn btn-success">Enviar</button>
                                            </form>
                                        @elseif ($funcionario->recrutamento->etapa == 4)
                                            <div class="timeline-body mt-3">
                                                <p>
                                                    <i class="fa-solid fa-spinner fa-spin-pulse"></i> Aguarde, seu
                                                    contador(a) está validando seu documento.
                                                </p>
                                            </div>
                                        @elseif ($funcionario->recrutamento->etapa > 4)
                                            <div class="timeline-body mt-3">
                                                <p>Contrato verificado com sucesso.</p>
                                            </div>
                                            <!-- Upload existis -->
                                            @if ($funcionario->recrutamento->contrato_assinado)
                                                <a href="{{ route('fileAction', ['directory' => 'funcionarios_recrutamento_documentos', 'action' => 'view', 'file' => $funcionario->recrutamento->contrato_assinado]) }}"
                                                    class="btn btn-success mt-3" target="_blank">
                                                    <i class="feather-download"></i> Contrato assinado.pdf
                                                </a>
                                            @else
                                                <div class="text-muted mt-3"><i class="fa-solid fa-circle-exclamation"></i>
                                                    Arquivo não encontrado</div>
                                            @endif
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
                                                <b>{{ $funcionario->nome }}</b> foi contratado em período de
                                                experiência, com vigência até 05/04/2023, podendo ser prorrogado até
                                                25/07/2023.
                                                Caso não haja solicitação de rescisão até a data final da experiência, o
                                                funcionário passará automaticamente para o regime de contrato definitivo.
                                            </p>
                                        </div>
                                        <!-- Upload existis -->
                                        @if ($funcionario->recrutamento->ficha_cadastral)
                                            <a href="{{ route('fileAction', ['directory' => 'funcionarios_recrutamento_documentos', 'action' => 'view', 'file' => $funcionario->recrutamento->ficha_cadastral]) }}"
                                                class="btn btn-info mt-3" target="_blank">
                                                <i class="feather-download"></i> Ficha cadastral
                                            </a>
                                        @else
                                            <div class="text-muted mt-3"><i class="fa-solid fa-circle-exclamation"></i>
                                                Arquivo não encontrado</div>
                                        @endif
                                    </div>
                                </li>

                                <li class="timeline-inverted">
                                    <div class="timeline-badge danger">
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
                                                    Rescisão solicitada em
                                                    {{ \Carbon\Carbon::parse($funcionario->recrutamento->pedido_rescisao)->format('d/m/Y') }}.
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </li>
                            @endif
                            @if ($funcionario->recrutamento->etapa >= 6)
                                <li>
                                    <div class="timeline-badge info">
                                        <i class="fas fa-file-circle-exclamation ms-1"></i>
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
                                            <button class="btn btn-info mt-3" disabled>Baixar aviso prévio.pdf</button>
                                        @elseif($funcionario->recrutamento->etapa > 6)
                                            <div class="timeline-body mt-3">
                                                <p>
                                                    O aviso prévio para o seu funcionário está pronto.
                                                    Se a assinatura for feita manualmente, o documento precisará ser
                                                    digitalizado. Se optarem pela assinatura digital, o
                                                    documento permanecerá em PDF.
                                                </p>
                                            </div>
                                            <!-- Upload existis -->
                                            @if ($funcionario->recrutamento->aviso_original)
                                                <a href="{{ route('fileAction', ['directory' => 'funcionarios_recrutamento_documentos', 'action' => 'view', 'file' => $funcionario->recrutamento->aviso_original]) }}"
                                                    class="btn btn-info mt-3" target="_blank">
                                                    <i class="feather-download"></i> Baixar aviso prévio.pdf
                                                </a>
                                            @else
                                                <div class="text-muted mt-3"><i
                                                        class="fa-solid fa-circle-exclamation"></i> Arquivo não encontrado
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </li>
                            @endif
                            @if ($funcionario->recrutamento->etapa >= 7)
                                <li class="timeline-inverted">
                                    <div class="timeline-badge success">
                                        <i class="fa-solid fa-paperclip"></i>Enviar
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Anexo Aviso Prévio assinado </h4>
                                        </div>
                                        @if ($funcionario->recrutamento->etapa == 7)
                                            <div class="timeline-body mt-3">
                                                <p>Envie o aviso prévio assinado pelo funcionário.</p>
                                            </div>
                                            <form method="post"
                                                action="{{ route('recrutamento.avisoAssinado', ['funcionario' => $funcionario->id]) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                @component('components.upload-file')
                                                @endcomponent
                                                <script src="{{ asset('build/js/upload-file.js') }}"></script>
                                                <button class="btn btn-success">Enviar</button>
                                            </form>
                                        @elseif ($funcionario->recrutamento->etapa == 8)
                                            <div class="timeline-body mt-3">
                                                <p>
                                                    <i class="fa-solid fa-spinner fa-spin-pulse"></i> Aguarde, seu
                                                    contador(a) está validando seu documento.
                                                </p>
                                            </div>
                                        @elseif ($funcionario->recrutamento->etapa > 8)
                                            <div class="timeline-body mt-3">
                                                <p>O Aviso prévio foi validado com sucesso.</p>
                                            </div>
                                            <!-- Upload existis -->
                                            @if ($funcionario->recrutamento->aviso_assinado)
                                                <a href="{{ route('fileAction', ['directory' => 'funcionarios_recrutamento_documentos', 'action' => 'view', 'file' => $funcionario->recrutamento->aviso_assinado]) }}"
                                                    class="btn btn-success mt-3" target="_blank">
                                                    <i class="feather-download"></i> Aviso prévio assinado.pdf
                                                </a>
                                            @else
                                                <div class="text-muted mt-3"><i
                                                        class="fa-solid fa-circle-exclamation"></i>
                                                    Arquivo não encontrado</div>
                                            @endif
                                        @endif
                                    </div>
                                </li>
                            @endif
                            @if ($funcionario->recrutamento->etapa >= 9)
                                <li>
                                    <div class="timeline-badge info">
                                        <i class="fas fa-hospital-user ms-1"></i>
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
                                    <div class="timeline-badge success">
                                        <i class="fa-solid fa-paperclip"></i>Enviar
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Anexar Exame Demissional</h4>
                                        </div>
                                        @if ($funcionario->recrutamento->etapa == 9)
                                            <div class="timeline-body mt-3">
                                                <p>O arquivo a ser anexado pode ser digitalizado ou foto.</p>
                                            </div>
                                            <form method="post"
                                                action="{{ route('recrutamento.exameDemissional', ['funcionario' => $funcionario->id]) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                @component('components.upload-file')
                                                @endcomponent
                                                <script src="{{ asset('build/js/upload-file.js') }}"></script>
                                                <button class="btn btn-success">Enviar</button>
                                            </form>
                                        @elseif ($funcionario->recrutamento->etapa == 10)
                                            <div class="timeline-body mt-3">
                                                <p>
                                                    <i class="fa-solid fa-spinner fa-spin-pulse"></i> Aguarde, seu
                                                    contador(a) está validando seu documento.
                                                </p>
                                            </div>
                                        @elseif ($funcionario->recrutamento->etapa > 10)
                                            <div class="timeline-body mt-3">
                                                <p>O exame demissional foi validado e registrado com sucesso.</p>
                                            </div>
                                            <!-- Upload existis -->
                                            @if ($funcionario->recrutamento->exame_demissao)
                                                <a href="{{ route('fileAction', ['directory' => 'funcionarios_recrutamento_documentos', 'action' => 'download', 'file' => $funcionario->recrutamento->exame_demissao]) }}"
                                                    class="btn btn-success mt-3" target="_blank">
                                                    <i class="feather-download"></i> Exame demissional
                                                </a>
                                            @else
                                                <div class="text-muted mt-3"><i
                                                        class="fa-solid fa-circle-exclamation"></i>
                                                    Arquivo não encontrado</div>
                                            @endif
                                        @endif
                                    </div>
                                </li>
                            @endif
                            @if ($funcionario->recrutamento->etapa >= 11)
                                <li>
                                    <div class="timeline-badge info">
                                        <i class="fas fa-file-signature ms-1"></i>
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
                                            <button class="btn btn-info mt-3" disabled>Baixar termo de rescisão
                                                .pdf</button>
                                        @elseif ($funcionario->recrutamento->etapa > 11)
                                            <div class="timeline-body mt-3">
                                                <p>O termo de rescisão para o seu funcionário está pronto. Se a assinatura
                                                    for
                                                    feita manualmente, o documento precisará ser digitalizado. Se optarem
                                                    pela assinatura digital, o documento permanecerá
                                                    em PDF.
                                                </p>
                                            </div>
                                            <!-- Upload existis -->
                                            @if ($funcionario->recrutamento->termo_rescisao_original)
                                                <a href="{{ route('fileAction', ['directory' => 'funcionarios_recrutamento_documentos', 'action' => 'view', 'file' => $funcionario->recrutamento->termo_rescisao_original]) }}"
                                                    class="btn btn-info mt-3" target="_blank">
                                                    <i class="feather-download"></i> Termo de rescisão.pdf
                                                </a>
                                            @else
                                                <div class="text-muted mt-3"><i
                                                        class="fa-solid fa-circle-exclamation"></i> Arquivo não encontrado
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </li>
                            @endif
                            @if ($funcionario->recrutamento->etapa >= 12)
                                <li class="timeline-inverted">
                                    <div class="timeline-badge success">
                                        <i class="fa-solid fa-paperclip"></i>Enviar
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Termo de Rescisão assinado</h4>
                                        </div>
                                        @if ($funcionario->recrutamento->etapa == 12)
                                            <div class="timeline-body mt-3">
                                                <p>Após colher a assinatura do funcionário, envie-nos para finalizarmos o
                                                    processo.
                                                </p>
                                            </div>
                                            <form method="post"
                                                action="{{ route('recrutamento.rescisaoAssinada', ['funcionario' => $funcionario->id]) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                @component('components.upload-file')
                                                @endcomponent
                                                <script src="{{ asset('build/js/upload-file.js') }}"></script>
                                                <button class="btn btn-success">Enviar</button>
                                            </form>
                                        @elseif ($funcionario->recrutamento->etapa == 13)
                                            <div class="timeline-body mt-3">
                                                <p>
                                                    <i class="fa-solid fa-spinner fa-spin-pulse"></i> Aguarde, seu
                                                    contador(a) está validando seu documento.
                                                </p>
                                            </div>
                                        @elseif ($funcionario->recrutamento->etapa > 13)
                                            <div class="timeline-body mt-3">
                                                <p>
                                                    Termo de rescisão validado com sucesso.
                                                </p>
                                            </div>
                                            <!-- Upload existis -->
                                            @if ($funcionario->recrutamento->termo_rescisao_assinado)
                                                <a href="{{ route('fileAction', ['directory' => 'funcionarios_recrutamento_documentos', 'action' => 'view', 'file' => $funcionario->recrutamento->termo_rescisao_assinado]) }}"
                                                    class="btn btn-success mt-3" target="_blank">
                                                    <i class="feather-download"></i> Termo de rescisão assinado.pdf
                                                </a>
                                            @else
                                                <div class="text-muted mt-3"><i
                                                        class="fa-solid fa-circle-exclamation"></i> Arquivo não encontrado
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </li>
                            @endif
                            @if ($funcionario->recrutamento->etapa >= 14)
                                <li>
                                    <div class="timeline-badge info">
                                        <i class="fas fa-user-xmark ms-1"></i>
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
