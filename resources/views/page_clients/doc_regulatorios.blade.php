<?php $page = 'doc_regulatorios'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            @component('components.breadcrumb')
                @slot('title')
                    Alvarás e Licenças
                @endslot
                @slot('li_1')
                    Menu principal
                @endslot
                @slot('li_2')
                    alvarás e licenças
                @endslot
            @endcomponent
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="row card-body">
                            @foreach ($registros as $registro)
                                <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6 d-flex">
                                    <div class="connected-app-card d-flex w-100">
                                        <ul class="w-100">
                                            <li class="flex-column align-items-start">
                                                <div class="d-flex align-items-center justify-content-between w-100 mb-3">
                                                    <div class="security-type d-flex align-items-center">
                                                        <span class="system-app-icon">
                                                            <i class="fa-regular fa-file fs-3"></i>
                                                        </span>
                                                        <div class="security-title">
                                                            <h5>{{ $registro->docRegulaTitle->title }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="mb-2">Orgão: {{ $registro->docRegulaTitle->orgao }}</span>
                                                <span class="mb-2">Válido até:
                                                    {{ $registro->dt_venc ? \Carbon\Carbon::parse($registro->dt_venc)->format('d/m/Y') : 'sem validade' }}
                                                </span>
                                                @if ($registro->dt_venc)
                                                    <span>Restante:
                                                        @if ($registro->dias_restantes <= '0')
                                                            <span style="color: red">Vencido</span>
                                                        @else
                                                            {{ $registro->dias_restantes }}
                                                            {{ $registro->dias_restantes == 1 ? 'dia' : 'dias' }}
                                                        @endif
                                                    </span>
                                                @else
                                                    Documento de validade contínua.
                                                @endif
                                            </li>
                                            <li>
                                                <div class="integration-btn">
                                                    <a
                                                        href="{{ route('fileAction', ['directory' => 'certidoes', 'action' => 'download', 'file' => $registro->doc_anexo]) }}">
                                                        <i
                                                            class="feather-download align-middle me-2 d-inline-block"></i>Download</a>
                                                </div>
                                                <div>
                                                    <p>Atualizado em:
                                                        {{ \Carbon\Carbon::parse($registro->updated_at)->format('d/m/Y') }}
                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
