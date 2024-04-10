<?php $page = 'signin'; ?>
@extends('layout.mainlayout')
@section('content')
<div class="account-content">
    <div class="login-wrapper login-new">
        <div class="container">
            <div class="login-content user-login">
                @if(session()->has('status'))

                <div class="alert alert-solid-success alert-dismissible fade show">
                    <i class="feather-check-circle flex-shrink-0 me-2"></i><span> Senha alterada com sucesso.<span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-xmark"></i></button>
                </div>

                @endif
                <form action="{{ route('signin.custom') }}" method="POST">
                    @csrf
                    <div class="login-userset">
                        <div class="login-logo logo-normal">
                            <img src="{{ URL::asset('/build/img/logo.svg') }}" alt="img">
                        </div>
                        <a href="{{ url('index') }}" class="login-logo logo-white">
                            <img src="{{ URL::asset('/build/img/logo-white.png') }}" alt="">
                        </a>
                        <div class="login-userheading text-center">
                            <h4>A <b>contabilidade</b> do seu <b>negócio</b> de forma muito <br>mais prática e acessível
                                é aqui.</h4>
                        </div>
                        <div class="form-login mb-3">
                            <label class="form-label">Email</label>
                            <div class="form-addons">
                                <input type="text" class="form- control" id="email" name="email" value="{{ old('email') }}">
                                <img src="{{ URL::asset('/build/img/icons/mail.svg') }}" alt="img">
                            </div>
                            <div class="text text-danger mt-1">
                                @error('0')
                                <i class='fa fa-exclamation-circle'></i> {{ $message }}
                                @enderror
                                @error('email')
                                <i class='fa fa-exclamation-circle'></i> {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-login mb-0">
                            <label class="form-label">Senha</label>
                            <div class="pass-group">
                                <input type="password" class="pass-input form-control" id="password" name="password">
                                <span class="fas toggle-password fa-eye-slash"></span>
                            </div>
                            <div class="text text-danger mt-1">
                                @error('password')
                                <i class='fa fa-exclamation-circle'></i> {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-login authentication-check">
                            <div class="row">
                                <div class="col-12 d-flex mt-3 align-items-center justify-content-between">
                                    <div class="custom-control custom-checkbox">
                                        <label class="checkboxs ps-4 mb-0 line-height-1" for='remember'>
                                            <input type="checkbox" class="form-control" id="remember" name="remember">
                                            <span class="checkmarks"></span>
                                            Manter conectado
                                        </label>
                                    </div>
                                    <div>
                                        <a href="{{ route('password.request') }}">
                                            Esqueceu sua senha?
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-login">
                            <button type="submit" class="btn btn-login" onclick="this.disabled=true; this.innerHTML='<i class=\'fas fa-spinner fa-spin me-2\'></i>acessando...'; this.form.submit();">
                                <span>Entrar</span>
                            </button>
                        </div>
                        <div class="signinform text-center">
                            <h4>Ainda não tem cadastro?<a href="{{ route('register') }}" class="hover-a"> Criar conta. </a>
                            </h4>
                        </div>
                    </div>
                </form>
            </div>
            <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                <p><i class="fa-solid fa-arrow-pointer"></i> Sistema | {{ config('app.name') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection