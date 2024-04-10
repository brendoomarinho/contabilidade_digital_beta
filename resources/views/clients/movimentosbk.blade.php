<?php $page = 'movimentos'; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.breadcrumb')
        @slot('title')
        Meu movimento
        @endslot
        @slot('li_1')
        Manage your Store
        @endslot
        @slot('li_2')
        Novo
        @endslot
        @endcomponent
        <!-- /product list -->
        <div class="card table-list-card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-path">
                        <a class="btn btn-filter" id="filter_search">
                            <i data-feather="filter" class="filter-icon"></i>
                            <span><img src="{{ URL::asset('/build/img/icons/closes.svg') }}" alt="img"></span>
                        </a>
                    </div>
                    <div class="form-sort">
                        <i data-feather="sliders" class="info-img"></i>
                        <select class="select">
                            <option>Sort by Date</option>
                            <option>Newest</option>
                            <option>Oldest</option>
                        </select>
                    </div>
                </div>
                <!-- /Filter -->
                <div class="card" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="input-blocks">
                                    <i data-feather="zap" class="info-img"></i>
                                    <select class="select">
                                        <option>Choose Stores</option>
                                        <option>Thomas</option>
                                        <option>Rasmussen</option>
                                        <option>Benjamin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="input-blocks">
                                    <i data-feather="calendar" class="info-img"></i>
                                    <div class="input-groupicon">
                                        <input type="text" class="datetimepicker" placeholder="Choose Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="input-blocks">
                                    <i data-feather="stop-circle" class="info-img"></i>
                                    <select class="select">
                                        <option>Choose Status</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12 ms-auto">
                                <div class="input-blocks">
                                    <a class="btn btn-filters ms-auto"> <i data-feather="search" class="feather-search"></i> Search </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table text-nowrap table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Invoice</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkebox-sm" checked="">
                                        <label class="form-check-label" for="checkebox-sm">
                                            Zelensky
                                        </label>
                                    </div>
                                </th>
                                <td>25-Apr-2021</td>
                                <td><span class="badge bg-soft-success">Paid</span></td>
                                <td>
                                    <div class="hstack gap-2 fs-15">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-light"><i class="feather-download"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-light"><i class="feather-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkebox-sm1">
                                        <label class="form-check-label" for="checkebox-sm1">
                                            Kim Jong
                                        </label>
                                    </div>
                                </th>
                                <td>29-April-2022</td>
                                <td><span class="badge bg-soft-danger">Pending</span></td>
                                <td>
                                    <div class="hstack gap-2 fs-15">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-light"><i class="feather-download"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-light"><i class="feather-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkebox-sm2">
                                        <label class="form-check-label" for="checkebox-sm2">
                                            Obana
                                        </label>
                                    </div>
                                </th>
                                <td>30-Nov-2022</td>
                                <td><span class="badge bg-soft-success">Paid</span></td>
                                <td>
                                    <div class="hstack gap-2 fs-15">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-light"><i class="feather-download"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-light"><i class="feather-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkebox-sm3">
                                        <label class="form-check-label" for="checkebox-sm3">
                                            Sean Paul
                                        </label>
                                    </div>
                                </th>
                                <td>01-Jan-2022</td>
                                <td><span class="badge bg-soft-success">Paid</span></td>
                                <td>
                                    <div class="hstack gap-2 fs-15">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-light"><i class="feather-download"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-light"><i class="feather-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkebox-sm4">
                                        <label class="form-check-label" for="checkebox-sm4">
                                            Karizma
                                        </label>
                                    </div>
                                </th>
                                <td>14-Feb-2022</td>
                                <td><span class="badge bg-soft-danger">Pending</span></td>
                                <td>
                                    <div class="hstack gap-2 fs-15">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-light"><i class="feather-download"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-light"><i class="feather-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>
@endsection