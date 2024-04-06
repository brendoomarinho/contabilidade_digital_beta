<?php $page = 'signin'; ?>
@extends('layout.mainlayout')
@section('content')
<div class="account-content">
    <div class="login-wrapper login-new">
        <div class="container">
            <div class="login-content user-login">
                <form action="{{ route('signin.custom') }}" method="POST">
                    @csrf
                    <div class="login-userset">
                        <div class="login-logo logo-normal">
                            <img src="{{ URL::asset('/build/img/logo.png') }}" alt="img">
                        </div>
                        <a href="{{ url('index') }}" class="login-logo logo-white">
                            <img src="{{ URL::asset('/build/img/logo-white.png') }}" alt="">
                        </a>
                        <div class="login-userheading text-center">
                            <h4>A <b>contabilidade</b> do seu <b>negócio</b> de forma muito <br>mais prática e acessível é aqui.</h4>
                        </div>
                        <div class="form-login mb-3">
                            <label class="form-label">Email</label>
                            <div class="form-addons">
                                <input type="text" class="form- control" id="email" name="email" value="{{ old('email') }}">
                                <img src="{{ URL::asset('/build/img/icons/mail.svg') }}" alt="img">
                            </div>
                            <div class="text-danger small">
                                @error('0')
                                <i class='fa fa-exclamation-triangle'></i> {{ $message }}
                                @enderror
                                @error('email')
                                <i class='fa fa-exclamation-triangle'></i> {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-login mb-0">
                            <label class="form-label">Senha</label>
                            <div class="pass-group">
                                <input type="password" class="pass-input form-control" id="password" name="password">
                                <span class="fas toggle-password fa-eye-slash"></span>
                            </div>
                            <div class="text-danger pt-1 small">
                                @error('password')
                                <i class='fa fa-exclamation-triangle'></i> {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-login authentication-check">
                            <div class="row">
                                <div class="col-12 d-flex align-items-center justify-content-between">
                                    <div class="custom-control custom-checkbox">
                                        <label class="checkboxs ps-4 mb-0 line-height-1" for='remember'>
                                            <input type="checkbox" class="form-control" id="remember" name="remember">
                                            <span class="checkmarks"></span>
                                            <div class='small'>Mantenha conectado</div>
                                        </label>
                                    </div>
                                    <div class="text-end">
                                        <a class="forgot-link" href="{{ url('forgot-password') }}">
                                            <span class='small'>Esqueceu sua senha?</span>
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
                        <div class="signinform">
                            <span class='small'><b>Ainda não tem cadastro?</b><a href="{{ url('register') }}" class="hover-a"> Criar uma conta.</a>
                            </span>
                        </div>
                    </div>
                </form>

            </div>
            <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                <p>Copyright &copy; 2024.</p>
            </div>
        </div>
    </div>
</div>
@endsection
