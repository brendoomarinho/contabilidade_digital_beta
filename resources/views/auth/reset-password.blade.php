<?php $page = 'reset-password-3'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="account-content">
        <div class="login-wrapper login-new">
            <div class="login-content user-login">
                <div class="login-logo">
                    <img src="{{ URL::asset('/build/img/logo.png') }}" alt="img">
                    <a href="{{ url('index') }}" class="login-logo logo-white">
                        <img src="{{ URL::asset('/build/img/logo-white.png') }}" alt="">
                    </a>
                </div>
                @if (session()->has('status'))
                    <span class="text text-success">{{ session()->get('status') }}</span>
                @endif
                @error('email')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror
                <form action="{{ route('password.update', ['token' => $token]) }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="login-userset">
                        <div class="login-userheading">
                            <h3>Redefinir senha</h3>
                            <h4>Para redefinir sua senha, digite uma nova senha e depois confirme</h4>
                        </div>
                        <div class="form-login">
                            <label>Email</label>
                            <div class="form-addons">
                                <input type="email" class="form-control" name="email">
                                <img src="{{ URL::asset('/build/img/icons/mail.svg') }}" alt="img">
                            </div>
                        </div>
                        <div class="form-login">
                            <label>Nova Senha</label>
                            <div class="pass-group">
                                <input type="password" class="pass-inputa" name="password">
                                <span class="fas toggle-passworda fa-eye-slash"></span>
                            </div>
                        </div>
                        <div class="form-login">
                            <label> Confirme a nova senha</label>
                            <div class="pass-group">
                                <input type="password" class="pass-inputs" name="password_confirmation">
                                <span class="fas toggle-passwords fa-eye-slash"></span>
                            </div>
                        </div>
                        <div class="form-login">
                            <button type="submit" class="btn btn-login">Confirmar</button>
                        </div>
                        <div class="signinform text-center">
                            <h4>Voltar para <a href="{{ route('signin') }}" class="hover-a"> login </a></h4>
                        </div>
                    </div>
                </form>

            </div>
            <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                <p>Copyright &copy; 2023 DreamsPOS. All rights reserved</p>
            </div>
        </div>
    </div>
@endsection
