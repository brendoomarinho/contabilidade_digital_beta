<?php $page = 'folha_pagamento'; ?>
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
                                    <h4 class="mt-1"> Folha Pagamento</h4>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="btn-menu" data-bs-toggle="modal"
                                            data-bs-target="#add-folha">
                                            <i class="fa-solid fa-arrow-up-from-bracket me-2"></i>Enviar resumo
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">

                                @foreach ($registros->groupBy('ano_id') as $anoCompetenciaId => $registrosPorAno)
                                    <table class="table text-nowrap">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="width: 253.3px">
                                                    <i class="fa-regular fa-calendar-check me-2"></i>
                                                    <b>{{ $registrosPorAno->first()->anoCompetencia->ano }}</b>
                                                </th>
                                                </th>
                                                <th scope="col" style="width: 213.3px">Cálculo</th>
                                                <th scope="col" style="width: 206.3px">Mês</th>
                                                <th scope="col" style="width: 226.65px">Valor</th>
                                                <th scope="col" class="text-center">Resumo</th>
                                                <th scope="col" class="text-center">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($registrosPorAno as $registro)
                                                <tr>
                                                    <td>
                                                        {{ \Carbon\Carbon::parse($registro->created_at)->format('d/m/Y H:i') }}
                                                    </td>
                                                    <td>
                                                        @if ($registro->recebido == false)
                                                            <i class="fa-solid fa-spinner fa-spin-pulse ms-3"></i>
                                                        @else
                                                            <span
                                                                class="badge rounded-pill bg-outline-{{ $registro->retificador == 0 ? 'success' : 'warning' }}">
                                                                {{ $registro->retificador == 0 ? 'Original' : 'Retificado' }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $registro->mesCompetencia->mes }}
                                                    </td>
                                                    <td>
                                                        @if ($registro->recebido == false)
                                                            <i class="fa-solid fa-spinner fa-spin-pulse ms-2"></i>
                                                        @else
                                                            R$ {{ number_format($registro->valor, 2, ',', '.') }}
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ Storage::url('folha_pagamento/resumos/' . $registro->anexo_resumo) }}"
                                                            target="_blank">
                                                            <i class="fa-solid fa-receipt btn-ico" data-bs-toggle="tooltip"
                                                                data-bs-custom-class="tooltip-dark" data-bs-placement="top"
                                                                title="Resumo da folha">
                                                            </i>
                                                        </a>
                                                    </td>
                                                    <td class="d-flex justify-content-center">
                                                        <div class="hstack gap-2">
                                                            @if ($registro->recebido == true)
                                                                <a href="{{ Storage::url('folha_pagamento/extratos/' . $registro->extrato) }}"
                                                                    target="_blank">
                                                                    <i class="fa-solid fa-calculator btn-ico"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-custom-class="tooltip-dark"
                                                                        data-bs-placement="top"
                                                                        data-bs-original-title="Extrato"></i>
                                                                </a>
                                                                <a href="{{ Storage::url('folha_pagamento/recibos/' . $registro->recibos) }}"
                                                                    target="_blank">
                                                                    <i class="fa-solid fa-file-arrow-down btn-ico"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-custom-class="tooltip-dark"
                                                                        data-bs-placement="top"
                                                                        data-bs-original-title="Recibos"></i>
                                                                </a>
                                                                <a href="#" class="btn-ico btn-disabled">
                                                                    <i class="fa-solid fa-trash-can"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-custom-class="tooltip-dark"
                                                                        data-bs-placement="top"
                                                                        data-bs-original-title="Excluir"></i>
                                                                </a>
                                                                <a href="#">
                                                                    <i class="fa-solid fa-comment-dots btn-ico"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-custom-class="tooltip-dark"
                                                                        data-bs-placement="top"
                                                                        data-bs-original-title="Enviar mensagem"></i>
                                                                </a>
                                                            @else
                                                                <a href="#" class="btn-ico btn-disabled">
                                                                    <i class="fa-solid fa-calculator"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-custom-class="tooltip-dark"
                                                                        data-bs-placement="top"
                                                                        data-bs-original-title="Extrato"></i>
                                                                </a>
                                                                <a href="#" class="btn-ico btn-disabled">
                                                                    <i class="fa-solid fa-file-arrow-down"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-custom-class="tooltip-dark"
                                                                        data-bs-placement="top"
                                                                        data-bs-original-title="Recibos"></i>
                                                                </a>
                                                                <a href="#" data-bs-toggle="modal"
                                                                    data-bs-target="#delete-movimento"
                                                                    data-id="{{ $registro->id }}">
                                                                    <i class="fa-solid fa-trash-can btn-ico"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-custom-class="tooltip-dark"
                                                                        data-bs-placement="top"
                                                                        data-bs-original-title="Excluir"></i>
                                                                </a>
                                                                <a href="#" class="btn-ico btn-disabled">
                                                                    <i class="fa-solid fa-comment-dots"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-custom-class="tooltip-dark"
                                                                        data-bs-placement="top"
                                                                        data-bs-original-title="Enviar mensagem"></i>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endforeach
                            </div>
                            <!-- Exibir a paginação -->
                            <div class="d-flex justify-content-end">
                                @include('components.pagination', ['registros' => $registros])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- reexibição do modal com erros de validação -->
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#add-folha').modal('show');
            });
        </script>
    @endif
    <!-- Modal Folha -->
    <div class="modal fade" id="add-folha">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="modal-header border-0 custom-modal-header">
                            <div class="page-title">
                                <h4>Enviar resumo da folha</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <form method="post" action="{{ route('pagamento.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Mês</label>
                                            <select class="select" id="mes" name="mes">
                                                <option value="">Selecione</option>
                                                @foreach ($mesesCompetencia as $mes)
                                                    <option value="{{ $mes->id }}">
                                                        {{ $mes->mes }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('mes')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Ano</label>
                                            <select class="select" id="ano" name="ano">
                                                <option value="">Selecione</option>
                                                @foreach ($anosCompetencia as $ano)
                                                    <option value="{{ $ano->id }}">
                                                        {{ $ano->ano }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('ano')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- anexo -->
                                @component('components.upload-file')
                                @endcomponent
                                <script src="{{ asset('build/js/upload-file.js') }}"></script>
                                <div class="modal-footer-btn">
                                    <button type="button" class="btn btn-cancel me-2"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-submit">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Note -->
    <div class="modal fade" id="delete-movimento">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="delete-popup">
                            <div class="delete-image text-center mx-auto">
                                <img src="{{ URL::asset('/build/img/icons/close-circle.png') }}" alt="Img"
                                    class="img-fluid">
                            </div>
                            <div class="delete-heads">
                                <h4>Excluir registro</h4>
                                <p>Tem certeza que deseja excluir este registro?</p>
                            </div>
                            <div class="modal-footer-btn delete-footer">
                                <button type="button" class="btn btn-cancel me-2"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-submit confirm-delete">Sim</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Note -->
    <!-- AJAX Request -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var id = button.getAttribute('data-id');
                    var confirmDeleteButton = document.querySelector('.confirm-delete');

                    confirmDeleteButton.addEventListener('click', function() {
                        fetch('/meu-movimento/' + id, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        }).then(response => {
                            if (response.ok) {
                                location.reload();
                            } else {
                                console.error('Erro ao excluir registro');
                            }
                        }).catch(error => {
                            console.error('Erro ao excluir registro:', error);
                        });
                    });
                });
            });
        });
    </script>
@endsection
