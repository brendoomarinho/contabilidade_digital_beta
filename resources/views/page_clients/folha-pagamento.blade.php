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
                                    <i data-feather="users" class="me-2"></i> <h4 class="mt-1">Folha Pagamento</h4>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-light" data-bs-toggle="modal"
                                            data-bs-target="#add-folha">
                                            <h6><i class="fa-solid fa-plus"></i> Enviar resumo</h6>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                @if ($registros->isEmpty())
                                    <p>Nenhum registro encontrado!</p>
                                @else
                                    @foreach ($registros->groupBy('ano_id') as $anoCompetenciaId => $registrosPorAno)
                                        <table class="table text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col">
                                                        Ano: {{ $registrosPorAno->first()->anoCompetencia->ano }}</th>
                                                    </th>
                                                    <th scope="col">Cálculo</th>
                                                    <th scope="col">Mês</th>
                                                    <th scope="col">Valor</th>
                                                    <th scope="col">Resumo</th>
                                                    <th scope="col">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($registrosPorAno as $registro)
                                                    <tr>
                                                        <td>
                                                            {{ \Carbon\Carbon::parse($registro->created_at)->format('d/m/Y H:i') }}
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge rounded-pill bg-outline-{{ $registro->atd == 0 ? 'success' : 'warning' }}">
                                                                {{ $registro->atd == 0 ? 'Original' : 'Retificado' }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            {{ $registro->mesCompetencia->mes }}
                                                        </td>
                                                        <td>
                                                            @if ($registro->valor)
                                                                R$ {{ number_format($registro->valor, 2, ',', '.') }}
                                                            @else
                                                                <i class="fa-solid fa-spinner fa-spin-pulse"></i>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="#" class="me-2 delete-btn" disabled>
                                                                <i data-feather="list" class="action-edit"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <div class="hstack gap-2 fs-15">
                                                                <a href="{{ route('fileAction', ['directory' => 'movimentos-mensais', 'action' => 'download', 'file' => $registro->anexo_resumo]) }}"
                                                                    class="me-2" target="_blank">
                                                                    <i data-feather="file-text" class="action-edit"></i>
                                                                </a>
                                                                <a href="{{ route('fileAction', ['directory' => 'movimentos-mensais', 'action' => 'download', 'file' => $registro->anexo_resumo]) }}"
                                                                    class="me-2" target="_blank">
                                                                    <i data-feather="layers" class="action-edit"></i>
                                                                </a>
                                                                @if ($registro->atd == 0)
                                                                    <a href="#" class="me-e" data-bs-toggle="modal"
                                                                        data-bs-target="#delete-movimento"
                                                                        data-id="{{ $registro->id }}">
                                                                        <i data-feather="trash-2" class="action-edit"></i>
                                                                    </a>
                                                                    <a href="{{ route('fileAction', ['directory' => 'movimentos-mensais', 'action' => 'download', 'file' => $registro->anexo_resumo]) }}"
                                                                    class="me-2" target="_blank">
                                                                    <i data-feather="message-circle" class="action-edit"></i>
                                                                </a>
                                                                @else
                                                                    <a href="#" class="me-2 delete-btn" disabled>
                                                                        <i data-feather="trash" class="action-edit"></i>
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endforeach
                                @endif
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
