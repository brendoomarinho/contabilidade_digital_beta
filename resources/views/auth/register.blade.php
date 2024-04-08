<?php $page = 'register'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="account-content">
        <div class="login-wrapper login-new">
            <div class="login-content user-login">
                <form action="signin-3">
                    <div class="login-userset">
                    <div class="login-logo logo-normal">
                            <img src="{{ URL::asset('/build/img/logo.svg') }}" alt="img">
                        </div>
                        <a href="{{ url('index') }}" class="login-logo logo-white">
                            <img src="{{ URL::asset('/build/img/logo-white.png') }}" alt="">
                        </a>
                        <div class="login-userheading">
                            <h3>Cadastre-se</h3>
                            <h4>Realize seu cadastro para ter acesso aos nossos serviços contábeis.</h4>
                        </div>
                        <div class="form-login">
                            <label>Nome</label>
                            <div class="form-addons">
                                <input type="text" class="form-control">
                                <img src="{{ URL::asset('/build/img/icons/user-icon.svg') }}" alt="img">
                            </div>
                        </div>
                        <div class="form-login">
                            <label>Email</label>
                            <div class="form-addons">
                                <input type="text" class="form-control">
                                <img src="{{ URL::asset('/build/img/icons/mail.svg') }}" alt="img">
                            </div>
                        </div>
                        <div class="form-login">
                            <label>Senha</label>
                            <div class="pass-group">
                                <input type="password" class="pass-input">
                                <span class="fas toggle-password fa-eye-slash"></span>
                            </div>
                        </div>
                        <div class="form-login">
                            <label>Confirme a senha</label>
                            <div class="pass-group">
                                <input type="password" class="pass-inputs">
                                <span class="fas toggle-passwords fa-eye-slash"></span>
                            </div>
                        </div>
                        <div class="form-login authentication-check">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="custom-control custom-checkbox justify-content-start">
                                        <div class="custom-control custom-checkbox">
                                            <label class="checkboxs ps-4 mb-0 pb-0 line-height-1">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>Concordo com os <a href="#"
                                                    class="hover-a">Termos & Privacidade</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-login">
                            <button type="submit" class="btn btn-login">Sign Up</button>
                        </div>
                        <div class="signinform text-center">
                            <h4>Já é cadastrado? <a href="{{ url('signin') }}" class="hover-a">Entrar</a></h4>
                        </div>
                    </div>
                </form>
            </div>
            <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                <p>Copyright &copy; 2023 DreamsPOS. All rights reserved.</p>
            </div>
        </div>
    </div>
@endsection
