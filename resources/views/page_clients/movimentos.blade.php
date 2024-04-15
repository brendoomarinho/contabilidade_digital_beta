<?php $page = 'data-tables'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            @component('components.breadcrumb')
                @slot('title')
                    Meu movimento
                @endslot
                @slot('li_1')
                    principal
                @endslot
                @slot('li_2')
                    meu movimento
                @endslot
            @endcomponent
            <!-- Always responsive -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
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
                                                            class="badge rounded-pill bg-outline-{{ $registro->rtc == 0 ? 'success' : 'warning' }}">
                                                            {{ $registro->rtc == 0 ? 'recebido' : 'retificado' }}
                                                        </span>
                                                    </td>
                                                    </td>
                                                    <td>{{ $registro->movimentoTitle->title }}</td>
                                                    <td>
                                                        <div class="hstack gap-2 fs-15">
                                                             <a href="{{ route('fileAction', ['directory' => 'movimentos_mensais', 'action' => 'download', 'file' => $registro->doc_anexo]) }}"
                                                                    class="btn btn-icon btn-sm btn-info" target="_blank"><i
                                                                        class="feather-download"></i></a>
                                                            <a href="javascript:void(0);"
                                                                class="btn btn-icon btn-sm btn-info">
                                                                <i class="feather-trash-2"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Always responsive -->
        </div>
    </div>

    <!-- modal adicionar Movimento -->
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
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Selecione a competência</label>
                                            <select class="form-select @error('competencia_id') is-invalid @enderror"
                                                id="competencia_id" name="competencia_id">
                                                <option></option>
                                                @foreach ($competencias->reverse() as $competencia)
                                                    <option value="{{ $competencia->id }}">
                                                        {{ $competencia->mes->mes }}
                                                        {{ $competencia->ano->ano }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('competencia_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Selecione o descrição</label>
                                            <select class="form-select @error('title_id') is-invalid @enderror"
                                                id="title_id" name="title_id">
                                                <option></option>
                                                @foreach ($movimentoTitles->reverse() as $movimentoTitle)
                                                    <option value="{{ $movimentoTitle->id }}">
                                                        {{ $movimentoTitle->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('title_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- anexo -->
                                <div class="mb-3">
                                    <label for="doc_anexo" class="btn btn-success w-100" style="cursor: pointer">
                                        <i class="fa-solid fa-upload"></i> Anexo
                                    </label><br>
                                    <input type="file"
                                        class="form-control d-none @error('doc_anexo') is-invalid @enderror" id="doc_anexo"
                                        name="doc_anexo">
                                    <small class="text-muted" id="anexo-nome">Nenhum arquivo selecionado</small>
                                    @error('doc_anexo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
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
    <!-- /Add Department -->

    <script>
        // Atualiza o nome do arquivo exibido ao selecionar um arquivo
        document.getElementById('doc_anexo').addEventListener('change', function() {
            document.getElementById('anexo-nome').textContent = this.files.length > 0 ? this.files[0].name :
                'Nenhum arquivo selecionado';
        });
    </script>
@endsection





