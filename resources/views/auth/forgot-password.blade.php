<?php $page = 'forgot-password'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="account-content">
        <div class="login-wrapper login-new">
            <div class="container">
                <div class="login-content user-login">
                    @if (session()->has('status'))
                        <div class="alert alert-solid-success alert-dismissible fade show">
                            <i class="feather-check-circle flex-shrink-0 me-2"></i>
                            <span> Email para redefinição de senha enviado com sucesso!</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fas fa-xmark"></i </button>
                        </div>
                    @endif
                    <form action="{{ route('password.email') }}" method="post">
                        @csrf
                        <div class="login-userset">
                            <div class="login-logo logo-normal">
                                <img src="{{ URL::asset('/build/img/logo.svg') }}" alt="img">
                            </div>
                            <a href="{{ url('index') }}" class="login-logo logo-white">
                                <img src="{{ URL::asset('/build/img/logo-white.png') }}" alt="">
                            </a>
                            <div class="login-userheading">
                                <h3><i class="fa fa-unlock-alt text-gray"></i> Recuperar senha</h3>
                                <h4>Enviaremos as instruções de recuperação de senha para o email cadastrado.</h4>
                            </div>
                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    <img src="{{ URL::asset('/build/img/icons/mail.svg') }}" alt="img">
                                </div>
                                <div class="text text-danger mt-1">
                                    @error('email')
                                        <i class='fa fa-exclamation-circle'></i> {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-login">
                                <button type="submit" class="btn btn-login">
                                    <span>Recuperar</span>
                                </button>
                            </div>
                            <div class="signinform text-center">
                                <h4>Voltar para o<a href="{{ route('signin') }}" class="hover-a"> login </a>
                                </h4>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="my-4 d-flex justify-content-center align-items-center">
                <p><i class="fa-solid fa-wrench"></i> Suporte Técnico | {{ config('app.name') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
