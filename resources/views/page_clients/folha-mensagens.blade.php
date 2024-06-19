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
                                <h4 class="mb-2">Dados do chamado</h4>
                                <span class="mb-2">Competência:</span>
                                {{ $folhaMsg->mesCompetencia->mes }}/{{ $folhaMsg->anoCompetencia->ano }}<br>

                                Valor da folha: R$
                                {{ number_format($folhaMsg->valor, 2, ',', '.') }}<br>
                                </table>


                              
                                    <div class="mt-5">
                                        @foreach ($folhaMsg->folhaMensagens as $mensagem)
                                            <div
                                                class="d-flex @if ($mensagem->user_id == $mensagem->sender_id) justify-content-end @else justify-content-start @endif">
                                                <div
                                                    class="message @if ($mensagem->user_id == $mensagem->sender_id) sender @else recipient @endif">
                                                    <p class="mb-1 @if ($mensagem->user_id == $mensagem->sender_id) text-end @endif">
                                                        {{ $mensagem->message }}
                                                    </p>
                                                    <!-- Outros campos da mensagem, se houver -->
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                              

                                <form method="post" action="{{ route('folha.mensagens.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="folha_id" value="{{ $folhaMsg->id }}">
                                    <input type="hidden" name="user_admin" value="{{ $folhaMsg->user_admin }}">

                                    <div class="mb-3 mt-5">
                                        <label class="form-label">Enviar mensagem:</label>
                                        <textarea rows="5" cols="5" class="form-control" name="message" placeholder="Digite a mensagem..."></textarea>
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
    <!-- reexibição do modal com erros de validação -->
    {{-- @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#add-folha').modal('show');
            });
        </script>
    @endif --}}
@endsection
