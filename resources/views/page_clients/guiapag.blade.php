<?php $page = 'guiapag'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            @component('components.breadcrumb')
                @slot('title')
                    Data Tables
                @endslot
                @slot('li_1')
                    Dashboard
                @endslot
                @slot('li_2')
                    Data Tables
                @endslot
            @endcomponent
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <div class="card-title">
                                Movimento competências
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($registros->isEmpty())
                                <p>Nenhum registro encontrado!</p>
                            @else
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
                                                    <th scope="col">Valor</th>
                                                    <th scope="col">Vencimento</th>
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
                                                                class="badge rounded-pill bg-outline-{{ $registro->rtf == 0 ? 'success' : 'warning' }}">
                                                                {{ $registro->rtf == 0 ? 'original' : 'retificado' }}
                                                            </span>
                                                        </td>
                                                        </td>
                                                        <td>{{ $registro->guiapagTitle->title }}</td>
                                                        <td>R$ {{ number_format($registro->valor, 2, ',', '.') }}</td>
                                                        <td>
                                                            {{ \Carbon\Carbon::parse($registro->created_at)->format('d/m/Y') }}
                                                        </td>
                                                        <td>
                                                            <div class="hstack gap-2 fs-15">
                                                                <a href="{{ route('fileAction', ['directory' => 'guias-pagamento', 'action' => 'download', 'file' => $registro->doc_anexo]) }}"
                                                                    class="btn btn-icon btn-sm btn-info" target="_blank"><i
                                                                        class="feather-download"></i></a>
                                                                <a href="{{ route('fileAction', ['directory' => 'guias-pagamento', 'action' => 'view', 'file' => $registro->doc_anexo]) }}"
                                                                    class="btn btn-icon btn-sm btn-info" target="_blank"><i
                                                                        class="feather-printer"></i></a>
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
@endsection
