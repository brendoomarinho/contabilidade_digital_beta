<?php $page = 'data-tables'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            @component('components.breadcrumb')
                @slot('title')
                    Category
                @endslot
                @slot('li_1')
                    Manage your categories
                @endslot
                @slot('li_2')
                    Add Category
                @endslot
            @endcomponent
            <!-- Always responsive -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <div class="card-title">
                                Movimento competências
                            </div>
                        </div>
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
                                                            <a href="javascript:void(0);"
                                                                class="btn btn-icon btn-sm btn-info"><i
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
@endsection
