<?php $page = 'pusher-settings'; ?>
@extends('layout.mainlayout')
@section('content')
    @include('components.success-message')
    @if (session('successMessage'))
        <script>
            $(document).ready(function() {
                $('#successModalUpdate').modal('show');
            });
        </script>
    @endif
    <div class="page-wrapper">
        <div class="content settings-content">
            <div class="page-header settings-pg-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4>Settings</h4>
                        <h6>Manage your settings on portal</h6>
                    </div>
                </div>
                <ul class="table-top-head">
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i data-feather="rotate-ccw"
                                class="feather-rotate-ccw"></i></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                                data-feather="chevron-up" class="feather-chevron-up"></i></a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="settings-wrapper d-flex">
                        @component('components.settings-sidebar')
                        @endcomponent
                        <div class="settings-page-wrap">
                            <form action="{{ route('pusher.update') }}" method='post'>
                                @csrf
                                @method('PUT')
                                <div class="setting-title">
                                    <h4>Credenciais Pusher</h4>
                                </div>
                                <div class="company-info border-0">
                                    <div class="localization-info">
                                        <div class="row align-items-center">
                                            <div class="col-sm-2">
                                                <div class="setting-info">
                                                    <h6>App ID</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="localization-select">
                                                    <input name="pusher_app_id" type="text" class="form-control"
                                                        value="{{ config('settings.pusher_app_id') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="localization-info">
                                        <div class="row align-items-center">
                                            <div class="col-sm-2">
                                                <div class="setting-info">
                                                    <h6>Key</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="localization-select">
                                                    <input name="pusher_key" type="text" class="form-control"
                                                        value="{{ config('settings.pusher_key') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="localization-info">
                                        <div class="row align-items-center">
                                            <div class="col-sm-2">
                                                <div class="setting-info">
                                                    <h6>Secret</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="localization-select">
                                                    <input name="pusher_secret" type="text" class="form-control"
                                                        value="{{ config('settings.pusher_secret') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="localization-info">
                                        <div class="row align-items-center">
                                            <div class="col-sm-2">
                                                <div class="setting-info">
                                                    <h6>Cluster</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="localization-select">
                                                    <input name="pusher_cluster" type="text" class="form-control"
                                                        value="{{ config('settings.pusher_cluster') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-submit">Salvar alteração</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
