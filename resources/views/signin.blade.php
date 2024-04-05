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
                            <div class="login-userheading">
                                <h3>Entrar</h3>
                                <h4>Sua contabilidade de forma prática, rápida e segura.</h4>
                            </div>
                            <div class="form-login mb-3">
                                <label class="form-label">Email</label>
                                <div class="form-addons">
                                    <input type="text" class="form- control" id="email" name="email">
                                    <img src="{{ URL::asset('/build/img/icons/mail.svg') }}" alt="img">
                                </div>
                                <div class="text-danger pt-2">
                                    @error('0')
                                        {{ $message }}
                                    @enderror
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-login mb-3">
                                <label class="form-label">Senha</label>
                                <div class="pass-group">
                                    <input type="password" class="pass-input form-control" id="password" name="password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                                <div class="text-danger pt-2">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-login authentication-check">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-between">
                                        <div class="custom-control custom-checkbox">
                                            <label class="checkboxs ps-4 mb-0 pb-0 line-height-1">
                                                <input type="checkbox" class="form-control">
                                                <span class="checkmarks"></span>Mantenha conectado
                                            </label>
                                        </div>
                                        <div class="text-end">
                                            <a class="forgot-link" href="{{ url('forgot-password') }}">Esqueceu sua senha?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-login">
                                <button type="submit" class="btn btn-login">Entar</button>
                            </div>
                            <div class="signinform">
                                <h4>Ainda não tem cadastro?<a href="{{ url('register') }}" class="hover-a"> Criar uma conta</a>
                                </h4>
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
