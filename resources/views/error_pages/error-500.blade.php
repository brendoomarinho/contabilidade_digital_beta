<?php $page = 'error-500'; ?>
@extends('layout.mainlayout')
@section('content')
<div class="error-box">
    <div class="error-img">
        <img src="{{ URL::asset('/build/img/authentication/error-500.png')}}" class="img-fluid" alt="">
    </div>
    <h3 class="h2 mb-3">Oops, o sistema de cadastro ainda não é público.</h3>
    <p>Server Error 500. Entre em contato com a a contabilidade para realizar seu cadastro.</p>
    <a href="https://api.whatsapp.com/send?phone=5562981644362&text=Gostaria%20de%20saber%20como%20realizar%20meu%20cadastro." class="btn btn-primary">Realizar cadastro</a>
</div>
@endsection