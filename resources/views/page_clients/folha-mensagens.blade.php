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
                                <div>
                                    <h4 class="mb-2">Dados do chamado</h4>
                                    <span class="mb-2">Competência:</span>
                                    {{ $folhaMsg->mesCompetencia->mes }}/{{ $folhaMsg->anoCompetencia->ano }}<br>

                                    Valor da folha: R$
                                    {{ number_format($folhaMsg->valor, 2, ',', '.') }}<br>

                                </div>
                                <!-- Chat -->
                                <div class="chat chat-messages">
                                    <div class="slimscroll">
                                        <div class="chat-body">
                                            <div class="messages">
                                                <div class="chats">
                                                    <div class="chat-avatar">
                                                        <img src="{{ URL::asset('/build/img/avatar/avatar-2.jpg') }}"
                                                            class="rounded-circle dreams_chat" alt="image">
                                                    </div>
                                                    <div class="chat-content">
                                                        <div class="chat-profile-name">
                                                            <h6>Mark Villiams<span>8:16 PM</span></h6>
                                                        </div>
                                                        <div class="message-content">
                                                            Hello <a href="javascript:void(0);">@Alex</a> Thank you for
                                                            the beautiful web
                                                            design ahead schedule.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chats chats-right">
                                                    <div class="chat-content">
                                                        <div class="chat-profile-name justify-content-end">
                                                            <h6>Alex Smith<span>8:16 PM</span></h6>
                                                        </div>
                                                        <div class="message-content fancy-msg-box">
                                                            Hello <a href="javascript:void(0);">@Alex</a> Thank you for
                                                            the beautiful web
                                                            design ahead schedule.
                                                        </div>
                                                    </div>
                                                    <div class="chat-avatar">
                                                        <img src="{{ URL::asset('/build/img/avatar/avatar-10.jpg') }}"
                                                            class="rounded-circle dreams_chat" alt="image">
                                                    </div>
                                                </div>
                                                <div class="chats chats-right">
                                                    <div class="chat-content">
                                                        <div class="chat-profile-name justify-content-end">
                                                            <h6>Alex Smith<span>8:16 PM</span></h6>
                                                        </div>
                                                        <div class="message-content fancy-msg-box">
                                                            Hello <a href="javascript:void(0);">@Alex</a> Thank you for
                                                            the beautiful web
                                                            design ahead schedule.
                                                        </div>
                                                    </div>
                                                    <div class="chat-avatar">
                                                        <img src="{{ URL::asset('/build/img/avatar/avatar-10.jpg') }}"
                                                            class="rounded-circle dreams_chat" alt="image">
                                                    </div>
                                                </div>
                                                <div class="chats chats-right">
                                                    <div class="chat-content">
                                                        <div class="chat-profile-name justify-content-end">
                                                            <h6>Alex Smith<span>8:16 PM</span></h6>
                                                        </div>
                                                        <div class="message-content fancy-msg-box">
                                                            Hello <a href="javascript:void(0);">@Alex</a> Thank you for
                                                            the beautiful web
                                                            design ahead schedule.
                                                        </div>
                                                    </div>
                                                    <div class="chat-avatar">
                                                        <img src="{{ URL::asset('/build/img/avatar/avatar-10.jpg') }}"
                                                            class="rounded-circle dreams_chat" alt="image">
                                                    </div>
                                                </div>
                                                <div class="chats chats-right">
                                                    <div class="chat-content">
                                                        <div class="chat-profile-name justify-content-end">
                                                            <h6>Alex Smith<span>8:16 PM</span></h6>
                                                        </div>
                                                        <div class="message-content fancy-msg-box">
                                                            Hello <a href="javascript:void(0);">@Alex</a> Thank you for
                                                            the beautiful web
                                                            design ahead schedule.
                                                        </div>
                                                    </div>
                                                    <div class="chat-avatar">
                                                        <img src="{{ URL::asset('/build/img/avatar/avatar-10.jpg') }}"
                                                            class="rounded-circle dreams_chat" alt="image">
                                                    </div>
                                                </div>
                                                <div class="chats chats-right">
                                                    <div class="chat-content">
                                                        <div class="chat-profile-name justify-content-end">
                                                            <h6>Alex Smith<span>8:16 PM</span></h6>
                                                        </div>
                                                        <div class="message-content fancy-msg-box">
                                                            Hello <a href="javascript:void(0);">@Alex</a> Thank you for
                                                            the beautiful web
                                                            design ahead schedule.
                                                        </div>
                                                    </div>
                                                    <div class="chat-avatar">
                                                        <img src="{{ URL::asset('/build/img/avatar/avatar-10.jpg') }}"
                                                            class="rounded-circle dreams_chat" alt="image">
                                                    </div>
                                                </div>
                                                <div class="chats">
                                                    <div class="chat-avatar">
                                                        <img src="{{ URL::asset('/build/img/avatar/avatar-2.jpg') }}"
                                                            class="rounded-circle dreams_chat" alt="image">
                                                    </div>
                                                    <div class="chat-content">

                                                        <div class="message-content review-files">
                                                            <p class="d-flex align-items-center">Please check and review
                                                                the files<span class="ms-1 d-flex"><img
                                                                        src="{{ URL::asset('/build/img/icons/smile-chat.svg') }}"
                                                                        alt="Icon"></span></p>
                                                            <div class="file-download d-flex align-items-center mb-0">
                                                                <div
                                                                    class="file-type d-flex align-items-center justify-content-center me-2">
                                                                    <i class="bx bxs-file-doc"></i>
                                                                </div>
                                                                <div class="file-details">
                                                                    <span class="file-name">Landing_page_V1.doc</span>
                                                                    <ul>
                                                                        <li>80 Bytes</li>
                                                                        <li><a href="javascript:void(0);">Download</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                  <div class="chats">
                                                    <div class="chat-avatar">
                                                        <img src="{{ URL::asset('/build/img/avatar/avatar-2.jpg') }}"
                                                            class="rounded-circle dreams_chat" alt="image">
                                                    </div>
                                                    <div class="chat-content">

                                                        <div class="message-content review-files">
                                                            <p class="d-flex align-items-center">Please check and review
                                                                the files<span class="ms-1 d-flex"><img
                                                                        src="{{ URL::asset('/build/img/icons/smile-chat.svg') }}"
                                                                        alt="Icon"></span></p>
                                                            <div class="file-download d-flex align-items-center mb-0">
                                                                <div
                                                                    class="file-type d-flex align-items-center justify-content-center me-2">
                                                                    <i class="bx bxs-file-doc"></i>
                                                                </div>
                                                                <div class="file-details">
                                                                    <span class="file-name">Landing_page_V1.doc</span>
                                                                    <ul>
                                                                        <li>80 Bytes</li>
                                                                        <li><a href="javascript:void(0);">Download</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                  <div class="chats">
                                                    <div class="chat-avatar">
                                                        <img src="{{ URL::asset('/build/img/avatar/avatar-2.jpg') }}"
                                                            class="rounded-circle dreams_chat" alt="image">
                                                    </div>
                                                    <div class="chat-content">

                                                        <div class="message-content review-files">
                                                            <p class="d-flex align-items-center">Please check and review
                                                                the files<span class="ms-1 d-flex"><img
                                                                        src="{{ URL::asset('/build/img/icons/smile-chat.svg') }}"
                                                                        alt="Icon"></span></p>
                                                            <div class="file-download d-flex align-items-center mb-0">
                                                                <div
                                                                    class="file-type d-flex align-items-center justify-content-center me-2">
                                                                    <i class="bx bxs-file-doc"></i>
                                                                </div>
                                                                <div class="file-details">
                                                                    <span class="file-name">Landing_page_V1.doc</span>
                                                                    <ul>
                                                                        <li>80 Bytes</li>
                                                                        <li><a href="javascript:void(0);">Download</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Chat -->
                                <div>
                                    <form method="post" action="{{ route('folha.mensagens.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="folha_id" value="{{ $folhaMsg->id }}">
                                        <input type="hidden" name="user_admin_id"
                                            value="{{ $folhaMsg->user_admin_id }}">

                                        <div class="mb-3 mt-5">
                                            <label class="form-label">Enviar mensagem:</label>
                                            <textarea rows="5" cols="5" class="form-control" name="mensagem" placeholder="Digite a mensagem..."></textarea>
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
