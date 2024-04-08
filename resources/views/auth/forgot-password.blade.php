<?php $page = 'forgot-password'; ?>
@extends('layout.mainlayout')
@section('content')
<div class="account-content">
    <div class="login-wrapper login-new">
        <div class="container">

            <div class="login-content user-login">
                <div class="login-logo">
                    <img src="{{ URL::asset('/build/img/logo.png') }}" alt="img">
                    <a href="{{ url('index') }}" class="login-logo logo-white">
                        <img src="{{ URL::asset('/build/img/logo-white.png') }}" alt="">
                    </a>
                </div>
                @if(session()->has('status'))
                    <span class="text text-success">{{ session()->get('status') }}</span>
                @endif
                <form action="{{ route('password.email') }}" method="post">
                @csrf
                @error('email')
                <div class="text text-danger">{{$message}}</div>
                @enderror
                    <div class="login-userset">
                        <div class="login-userheading">
                            <h3>Recuperar senha</h3>
                            <h4>Enviaremos as instruções de recuperação para o email cadastrado.</h4>
                        </div>
                        <div class="form-login">
                            <label>Email</label>
                            <div class="form-addons">
                                <input type="email" class="form-control" name="email">
                                <img src="{{ URL::asset('/build/img/icons/mail.svg') }}"
                                    alt="img">
                            </div>
                        </div>
                        <div class="form-login">
                            <button type="submit" class="btn btn-login">Recuperar</button>
                        </div>
                        <div class="signinform text-center">
                            <h4>Return to<a href="{{ route('signin') }}" class="hover-a"> login </a>
                            </h4>
                        </div>
                        <div class="form-setlogin or-text">
                            <h4>OR</h4>
                        </div>
                        <div class="form-sociallink">
                            <ul class="d-flex justify-content-center">
                                <li>
                                    <a href="javascript:void(0);" class="facebook-logo">
                                        <img src="{{ URL::asset('/build/img/icons/facebook-logo.svg') }}"
                                            alt="Facebook">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="{{ URL::asset('/build/img/icons/google.png') }}"
                                            alt="Google">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="apple-logo">
                                        <img src="{{ URL::asset('/build/img/icons/apple-logo.svg') }}"
                                            alt="Apple">
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </form>
            </div>
            <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                <p>Copyright &copy; 2023 DreamsPOS. All rights reserved</p>
            </div>
        </div>
    </div>
</div>
@endsection
