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
            @include('components.modalpopup')
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
                                    <th>Modalidade</th>
                                    <th>Status</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($funcionarios as $funcionario)
                                    <tr>
                                        <td>
                                            <div class="userimgname">
                                                <div class="avatar bg-info avatar-rounded me-2">
                                                    <i class="fa-solid fa-user fs-6"></i>
                                                </div>
                                                <div class="emp-name ">
                                                    <div class="mb-1">{{ $funcionario->nome }}</div>
                                                    <p class="role">{{ $funcionario->cargo }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $funcionario->cpf }}</td>
                                        <td>{{ $funcionario->telefone }}</td>
                                        <td>R$ {{ number_format($funcionario->salario, 2, ',', '.') }}</td>
                                        <td>{{ $funcionario->modalidade }}</td>

                                        <td>
                                            @if ($funcionario->status == 0)
                                                <span class="badge badge-warning">Pendente</span>
                                            @elseif($funcionario->status == 1)
                                                <span class="badge badge-success">Contratado</span>
                                            @elseif($funcionario->status == 2)
                                                <span class="badge badge-linesuccess">Demitido</span>
                                            @endif
                                        </td>

                                        <td class="action-table-data">
                                            <div class="edit-delete-action data-view">
                                                <a class="me-2" href="javascript:void(0);">
                                                    <i data-feather="user" class="action-eye"></i>
                                                </a>
                                                <a class="me-2"
                                                    href="{{ route('recrutamento.show', ['id' => $funcionario->id]) }}">
                                                    <i data-feather="folder" class="action-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
