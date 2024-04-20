<?php $page = 'activities'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>All Notifications</h4>
                    <h6>View your all activities</h6>
                </div>
            </div>
            <!-- /product list -->
            <div class="activity">
                <div class="activity-box">
                    <ul class="activity-list">
                        <li>
                            <div class="activity-user">
                                <a href="{{ url('profile') }}" title="" data-toggle="tooltip"
                                    data-original-title="Lesley Grauer">
                                    <img alt="Lesley Grauer" src="{{ URL::asset('/build/img/customer/profile3.jpg') }}"
                                        class=" img-fluid">
                                </a>
                            </div>
                            <div class="activity-content">
                                <div class="timeline-content">
                                    <a href="{{ url('profile') }}" class="name">Brendo Marinho </a> adicionou nova guia <a
                                        href="javascript:void(0);">INSS</a>
                                    <span class="time">4 mins ago</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="activity-user">
                                <a href="{{ url('profile') }}" title="" data-toggle="tooltip"
                                    data-original-title="Lesley Grauer">
                                    <img alt="Lesley Grauer" src="{{ URL::asset('/build/img/customer/profile4.jpg') }}"
                                        class=" img-fluid">
                                </a>
                            </div>
                            <div class="activity-content">
                                <div class="timeline-content">
                                    <a href="{{ url('profile') }}" class="name">Elizabeth Olsen</a> enviou nova mensagem
                                    <a href="javascript:void(0);">Processo em andamento</a>
                                    <span class="time">6 mins ago</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="activity-user">
                                <a href="{{ url('profile') }}" title="" data-toggle="tooltip"
                                    data-original-title="Lesley Grauer">
                                    <img alt="Lesley Grauer" src="{{ URL::asset('/build/img/customer/profile5.jpg') }}"
                                        class=" img-fluid">
                                </a>
                            </div>
                            <div class="activity-content">
                                <div class="timeline-content">
                                    <div class="timeline-content">
                                        <a href="{{ url('profile') }}" class="name">William </a> confirmou recebimento
                                        <a href="javascript:void(0);">Movimento do mês</a>
                                        <span class="time">12 mins ago</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="activity-user">
                                <a href="{{ url('profile') }}" title="" data-toggle="tooltip"
                                    data-original-title="Lesley Grauer">
                                    <img alt="Lesley Grauer" src="{{ URL::asset('/build/img/customer/customer4.jpg') }}"
                                        class=" img-fluid">
                                </a>
                            </div>
                            <div class="activity-content">
                                <div class="timeline-content">
                                    <a href="{{ url('profile') }}" class="name">Lesley Silva</a> atualizou o <a
                                        href="javascript:void(0);">Balanço</a>
                                    <span class="time">4 mins ago</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="activity-user">
                                <a href="{{ url('profile') }}" title="" data-toggle="tooltip"
                                    data-original-title="Lesley Grauer">
                                    <img alt="Lesley Grauer" src="{{ URL::asset('/build/img/customer/profile3.jpg') }}"
                                        class=" img-fluid">
                                </a>
                            </div>
                            <div class="activity-content">
                                <div class="timeline-content">
                                    <a href="{{ url('profile') }}" class="name">Daniel Silva </a> enviou documento <a
                                        href="javascript:void(0);">Contrato para assinatura</a>
                                    <span class="time">4 mins ago</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /product list -->
        </div>
    </div>
@endsection
