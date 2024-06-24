<?php $page = 'folha_mensagens'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            @component('components.breadcrumb')
                @slot('li_1')
                    Menu principal
                @endslot
                @slot('li_2')
                    Folha pagamento
                @endslot
                @slot('li_3')
                    Atendimento Folha
                @endslot
            @endcomponent
            @include('components.success-message')
            @if (session('successMessageTitle') && session('successMessageSubTitle'))
                <script>
                    $(document).ready(function() {
                        $('#successModal').modal('show');
                    });
                </script>
            @endif
            <!-- Always responsive -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card table-list-card">
                        <div class="card-body">
                            <div class="table-top">
                                <div class="search-set">
                                    <i data-feather="users" class="me-2"></i>
                                    <h4 class="mt-1"> Atendimento Folha</h4>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('folha.pagamento.index') }}" class="btn-menu">
                                            <i class="fa-solid fa-arrow-right fa-rotate-180"></i> Voltar
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                {{-- <div>
                                    <h4 class="mb-2">Dados do chamado</h4>
                                    <span class="mb-2">Competência:</span>
                                    {{ $folhaMsg->mesCompetencia->mes }}/{{ $folhaMsg->anoCompetencia->ano }}<br>

                                    Valor da folha: R$
                                    {{ number_format($folhaMsg->valor, 2, ',', '.') }}<br>
                                </div> --}}
                                <!-- Chat -->
                                <div class="chat chat-messages">
                                    <div class="slimscroll">
                                        <div class="chat-body">
                                            <div class="messages">
                                                @foreach ($folhaMsg->folhaMensagens as $mensagem)
                                                    <div
                                                        class="chats @if ($mensagem->user_id !== $mensagem->remetente_id) @else chats-right @endif">
                                                        <div class="chat-avatar">
                                                            <img src="{{ URL::asset('/build/img/avatar/avatar-2.jpg') }}"
                                                                class="rounded-circle dreams_chat" alt="image">
                                                        </div>
                                                        <div class="chat-content">
                                                            <div class="chat-profile-name @if ($mensagem->user_id == $mensagem->remetente_id) justify-content-end @endif">
                                                                <h6>
                                                                    @if ($mensagem->user_id == $mensagem->remetente_id)
                                                                        {{ $mensagem->user->name }}
                                                                    @else
                                                                        {{ $mensagem->userAdmin->name }}
                                                                    @endif
                                                                </h6>
                                                            </div>
                                                            <div class="message-content">
                                                               {{ $mensagem->mensagem }}
                                                                @if ($mensagem->doc_anexo)
                                                                    <div class="file-download d-flex align-items-center mb-0">
                                                                        <div
                                                                            class="file-type d-flex align-items-center justify-content-center me-2">
                                                                            <i class="bx bxs-file-doc"></i>
                                                                        </div>
                                                                        <div class="file-details">
                                                                            <span
                                                                                class="file-name">{{ $mensagem->doc_anexo }}</span>
                                                                            <ul>
                                                                                <li>80 Bytes</li>
                                                                                <li>
                                                                                    <a
                                                                                        href="{{ route('folha.mensagens.index', ['registro' => $mensagem->doc_anexo]) }}">Download</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div
                                                                class="chat-profile-name @if ($mensagem->user_id == $mensagem->remetente_id) justify-content-end @endif">
                                                                <h6><span>{{ \Carbon\Carbon::parse($mensagem->created_at)->format('d-m-Y H:i') }}</span>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Chat -->
                                <div class="chat-footer">
                                    <form method="post" action="{{ route('folha.mensagens.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="folha_id" value="{{ $folhaMsg->id }}">
                                        <input type="hidden" name="user_admin_id" value="{{ $folhaMsg->user_admin_id }}">

                                        <div class="mb-3 mt-4">
                                            <label class="form-label">Enviar mensagem:</label>
                                            <textarea rows="2" cols="5" class="form-control" name="mensagem" placeholder="Digite a mensagem..."></textarea>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn-menu">
                                                <i class="fa-solid fa-paper-plane"></i> Enviar mensagem
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- reexibição do modal com erros de validação -->
    {{-- @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#add-folha').modal('show');
            });
        </script>
    @endif --}}
@endsection
