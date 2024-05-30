<?php $page = 'movimento'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            @component('components.breadcrumb')
                @slot('title')
                    Meu movimento
                @endslot
                @slot('li_1')
                    Menu principal
                @endslot
                @slot('li_2')
                    Movimento
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
                            @if ($registros->isEmpty())
                                <p>Nenhum registro encontrado!</p>
                            @else
                                <div class="table-top">
                                    <div class="search-set">
                                        <i class="fa fa-archive"></i> MOVIMENTO
                                    </div>
                                    <div class="search-path">
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="btn btn-light rounded-pill" data-bs-toggle="modal"
                                                data-bs-target="#add-movimento">
                                                Adicionar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    @foreach ($registros->groupBy('competencia_id') as $competenciaId => $registrosCompetencia)
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col">
                                                        {{ $registrosCompetencia->first()->competencia->mes->mes }} de
                                                        {{ $registrosCompetencia->first()->competencia->ano->ano }}</th>
                                                    </th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Descrição</th>
                                                    <th scope="col">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($registrosCompetencia as $registro)
                                                    <tr>
                                                        <td>
                                                            {{ \Carbon\Carbon::parse($registro->created_at)->format('d/m/Y H:i:s') }}
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge rounded-pill bg-outline-{{ $registro->atendimento == 0 ? 'warning' : 'success' }}">
                                                                {{ $registro->atendimento == 0 ? 'em análise' : 'recebido' }}
                                                            </span>
                                                        </td>
                                                        <td>{{ $registro->movimentoTitle->title }}</td>
                                                        <td>
                                                            <div class="hstack gap-2 fs-15">
                                                                <a href="{{ route('fileAction', ['directory' => 'movimentos-mensais', 'action' => 'download', 'file' => $registro->doc_anexo]) }}"
                                                                    class="me-2" target="_blank">
                                                                   <i data-feather="folder" class="action-edit"></i>
                                                                    </a>

                                                                        

                                                                @if ($registro->atd == 0)
                                                                    <a href="#" class="btn btn-light rounded-pill"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#delete-movimento"
                                                                        data-id="{{ $registro->id }}">
                                                                        <i class="feather-trash-2"></i>
                                                                    </a>
                                                                @else
                                                                    <a href="#"
                                                                        class="btn btn-icon btn-sm btn-info delete-btn disabled">
                                                                        <i class="feather-trash-2"></i>
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
                            @endif
                        </div>
                        @include('components.pagination', ['registros' => $registros])
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- reexibição do modal com erros de validação -->
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#add-movimento').modal('show');
            });
        </script>
    @endif
    <!-- Modal Movimento -->
    <div class="modal fade" id="add-movimento">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="modal-header border-0 custom-modal-header">
                            <div class="page-title">
                                <h4>Enviar movimento</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <form method="post" action="{{ route('movimento.store') }}" enctype="multipart/form-data">
                                @csrf
                                <input class="d-none" name="atendimento" type="number" value="0" />
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="mb-3">
                                            <label class="form-label">Competência</label>
                                            <select class="select" id="competencia_id" name="competencia_id"
                                                value="{{ old('competencia_id') }}">
                                                <option value="">Selecione</option>
                                                @foreach ($competencias->reverse() as $competencia)
                                                    <option value="{{ $competencia->id }}">
                                                        {{ $competencia->mes->mes }}
                                                        {{ $competencia->ano->ano }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('competencia_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="mb-3">
                                            <label class="form-label">Descrição</label>
                                            <select class="select id="title_id" name="title_id">
                                                <option value="">Selecione</option>
                                                @foreach ($movimentoTitles->reverse() as $movimentoTitle)
                                                    <option value="{{ $movimentoTitle->id }}">
                                                        {{ $movimentoTitle->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('title_id')
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
                                <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancelar</button>
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
