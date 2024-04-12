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

            <!-- Always responsive -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <div class="card-title">
                                Always responsive
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">Janeiro/2024</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Descrição</th>
                                            <th scope="col">Valor</th>
                                            <th scope="col">Vencimento</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                10/05/2024 05:45:45
                                            </td>
                                            <td><span class="badge rounded-pill bg-outline-warning">retificado</span></td>
                                            <td>PGDAS Simples Nacional</td>
                                            <td>R$ 10,984.29</td>
                                            <td>10/05/2024</td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-success"><i
                                                            class="feather-download"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info">
                                                        <i class="feather-printer"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                10/05/2024 05:45:45
                                            </td>
                                            <td><span class="badge rounded-pill bg-outline-success">original</span></td>
                                            <td>PGDAS Simples Nacional</td>
                                            <td>R$ 10,984.29</td>
                                            <td>10/05/2024</td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-success"><i
                                                            class="feather-download"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info">
                                                        <i class="feather-printer"></i></a>
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
            <!-- /Always responsive -->

        </div>
    </div>
@endsection
