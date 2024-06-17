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
                    Mensagens
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
                                    <h4 class="mt-1"> Mensagens</h4>
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
                                <table class="table text-nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" style="width: 253.3px">Competência</th>
                                            <th scope="col" style="width: 213.3px">Cálculo</th>
                                            <th scope="col" style="width: 226.65px">Valor</th>
                                            <th scope="col" class="text-center">Resumo</th>
                                            <th scope="col" class="text-center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                {{ $folhaMsg->mesCompetencia->mes }}/{{ $folhaMsg->anoCompetencia->ano }}
                                            </td>
                                            <td>
                                                @if ($folhaMsg->recebido == false)
                                                    <i class="fa-solid fa-spinner fa-spin-pulse ms-3"></i>
                                                @else
                                                    <span
                                                        class="badge rounded-pill bg-outline-{{ $folhaMsg->retificador == 0 ? 'success' : 'warning' }}">
                                                        {{ $folhaMsg->retificador == 0 ? 'Original' : 'Retificado' }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($folhaMsg->recebido == false)
                                                    <i class="fa-solid fa-spinner fa-spin-pulse ms-2"></i>
                                                @else
                                                    R$ {{ number_format($folhaMsg->valor, 2, ',', '.') }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ Storage::url('folha_pagamento/resumos/' . $folhaMsg->anexo_resumo) }}"
                                                    target="_blank">
                                                    <i class="fa-solid fa-receipt btn-ico" data-bs-toggle="tooltip"
                                                        data-bs-custom-class="tooltip-dark" data-bs-placement="top"
                                                        title="Resumo da folha">
                                                    </i>
                                                </a>
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <div class="hstack gap-2">
                                                    @if ($folhaMsg->recebido == true)
                                                        <a href="{{ Storage::url('folha_pagamento/extratos/' . $folhaMsg->extrato) }}"
                                                            target="_blank">
                                                            <i class="fa-solid fa-calculator btn-ico"
                                                                data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark"
                                                                data-bs-placement="top"
                                                                data-bs-original-title="Extrato"></i>
                                                        </a>
                                                        <a href="{{ Storage::url('folha_pagamento/recibos/' . $folhaMsg->recibos) }}"
                                                            target="_blank">
                                                            <i class="fa-solid fa-file-arrow-down btn-ico"
                                                                data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark"
                                                                data-bs-placement="top"
                                                                data-bs-original-title="Recibos"></i>
                                                        </a>
                                                        <a href="#" class="btn-ico btn-disabled">
                                                            <i class="fa-solid fa-trash-can" data-bs-toggle="tooltip"
                                                                data-bs-custom-class="tooltip-dark" data-bs-placement="top"
                                                                data-bs-original-title="Excluir"></i>
                                                        </a>
                                                        <a
                                                            href="{{ route('folha.mensagens', ['registro' => $folhaMsg->id]) }}">
                                                            <i class="fa-solid fa-comment-dots btn-ico"
                                                                data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark"
                                                                data-bs-placement="top"
                                                                data-bs-original-title="Enviar mensagem"></i>
                                                        </a>
                                                    @else
                                                        <a href="#" class="btn-ico btn-disabled">
                                                            <i class="fa-solid fa-calculator" data-bs-toggle="tooltip"
                                                                data-bs-custom-class="tooltip-dark" data-bs-placement="top"
                                                                data-bs-original-title="Extrato"></i>
                                                        </a>
                                                        <a href="#" class="btn-ico btn-disabled">
                                                            <i class="fa-solid fa-file-arrow-down" data-bs-toggle="tooltip"
                                                                data-bs-custom-class="tooltip-dark" data-bs-placement="top"
                                                                data-bs-original-title="Recibos"></i>
                                                        </a>
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#delete-folha" data-id="{{ $folhaMsg->id }}"
                                                            class="delete-btn">
                                                            <i class="fa-solid fa-trash-can btn-ico"
                                                                data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark"
                                                                data-bs-placement="top" title="Excluir"></i>
                                                        </a>
                                                        <a href="#" class="btn-ico btn-disabled">
                                                            <i class="fa-solid fa-comment-dots" data-bs-toggle="tooltip"
                                                                data-bs-custom-class="tooltip-dark" data-bs-placement="top"
                                                                data-bs-original-title="Enviar mensagem"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
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
