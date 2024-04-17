<?php $page = 'certidoes'; ?>
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
                                Certidões empresa
                            </div>
                        </div>
                        <div class="row card-body">
                            {{-- @if ($registros->isEmpty())
                                <p>Nenhum registro encontrado!</p>
                            @else
                                <div class="table-responsive"> --}}




                        @foreach ($registros as $registro)
                            
                    
                            <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6 d-flex">
                                <div class="connected-app-card d-flex w-100">
                                    <ul class="w-100">
                                        <li class="flex-column align-items-start">
                                            <div class="d-flex align-items-center justify-content-between w-100">
                                                <div class="security-type d-flex align-items-center">
                                                    <span class="system-app-icon">
                                                        <img src="{{ URL::asset('/build/img/icons/linkedin-icon.svg') }}"
                                                            alt="">
                                                    </span>
                                                    <div class="security-title">
                                                        <h5>{{ $registro->certidaoTitle->title }}</h5>
                                                    </div>
                                                </div>
                                                <div class="connect-btn">
                                                    bolinha
                                                </div>
                                            </div>
                                            <p>Network with people and professional organizations in your industry.</p>
                                        </li>
                                        <li>
                                            <div class="integration-btn">
                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#linkedin-connect"><i data-feather="upload"
                                                        class="me-2"></i>Download</a>
                                            </div>
                                            <div
                                                class="status-toggle modal-status d-flex justify-content-between align-items-center ms-2">
                                                <p>Atualizado em: 25/10/2023</p>
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
    </div>
@endsection
