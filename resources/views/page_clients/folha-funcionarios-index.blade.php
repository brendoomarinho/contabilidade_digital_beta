<?php $page = 'folha-funcionarios-index'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Funcionários
                @endslot
                @slot('li_1')
                    Menu principal
                @endslot
                @slot('li_2')
                    Funcionários
                @endslot
            @endcomponent
            <!-- /Success message -->
            @include('components.success-message')

            @if (session('successMessageTitle') && session('successMessageSubTitle'))
                <script>
                    $(document).ready(function() {
                        $('#successModal').modal('show');
                    });
                </script>
            @endif

            <!-- reexibição do modal com erros de validação -->
            @if ($errors->any())
                <script>
                    $(document).ready(function() {
                        $('#add-funcionario').modal('show');
                    });
                </script>
            @endif
            <!-- /Modal Admissão -->
            @component('components.modal-forms')
            @endcomponent
            <!-- Lista Funcionários -->
            <div class="card table-list-card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-input">
                                <a href="" class="btn btn-searchset"><i data-feather="search"
                                        class="feather-search"></i></a>
                            </div>
                        </div>
                        <div class="search-path">
                            <div class="d-flex align-items-center">
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#add-funcionario">
                                    <i class="fa fa-user-plus"></i>
                                    Solicitar admissão
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table  datanew">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Telefone</th>
                                    <th>Salário</th>
                                    <th>Status</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="userimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="{{ URL::asset('/build/img/users/user-01.jpg') }}" alt="product">
                                            </a>
                                            <div class="emp-name ">
                                                <span>BRENDO OLIVEIRA MARINHO</span>
                                                <p class="role">Programador</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>058.433.223-86</td>
                                    <td>(62) 98164-4362</td>
                                    <td>R$ 2.200,00</td>
                                    <td><span class="badge badge-linesuccess">Contratado</span></td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action data-view">
                                            <a class="me-2" href="javascript:void(0);">
                                                <i data-feather="eye" class="action-eye"></i>
                                            </a>
                                            <a class="me-2" href="javascript:void(0);">
                                                <i data-feather="download" class="action-download"></i>
                                            </a>
                                            <a class="me-2"
                                                href="{{ route('funcionarios.admissao', ['funcionario' => 1]) }}">
                                                <i data-feather="folder" class="action-edit"></i>
                                            </a>
                                            <a class="confirm-text" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>

                                            </a>
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
@endsection
