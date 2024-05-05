<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Contadgo | Contabilidade</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('/build/img/logo-small.png') }}">

    <!-- Biblioteca jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script>
        var pusherKey = "{{ config('settings.pusher_key') }}";
        var pusherCluster = "{{ config('settings.pusher_cluster') }}";
    </script>

    @vite(['public/build/js/app.js'])

    @include('layout.partials.head')

</head>

@if (Route::is(['chat']))

    <body class="main-chat-blk">
@endif
@if (
    !Route::is([
        'chat',
        'under-maintenance',
        'coming-soon',
        'error-404',
        'error-500',
        'two-step-verification-3',
        'two-step-verification-2',
        'two-step-verification',
        'email-verification-3',
        'email-verification-2',
        'email-verification',
        'password.reset',
        'forgot-password-3',
        'forgot-password-2',
        'password.request',
        'register-3',
        'register-2',
        'register',
        'signin-3',
        'signin-2',
        'signin',
        'success',
        'success-2',
        'success-3',
    ]))

    <body>
@endif
@if (Route::is(['under-maintenance', 'coming-soon', 'error-404', 'error-500']))

    <body class="error-page">
@endif
@if (Route::is([
        'two-step-verification-3',
        'two-step-verification-2',
        'two-step-verification',
        'email-verification-3',
        'email-verification-2',
        'email-verification',
        'password.reset',
        'forgot-password-3',
        'forgot-password-2',
        'password.request',
        'register-3',
        'register-2',
        'register',
        'signin-3',
        'signin-2',
        'signin',
        'success',
        'success-2',
        'success-3',
    ]))

    <body class="account-page">
@endif
@component('components.loader')
@endcomponent
<!-- Main Wrapper -->
@if (!Route::is(['lock-screen']))
    <div class="main-wrapper">
@endif
@if (Route::is(['lock-screen']))
    <div class="main-wrapper login-body">
@endif
@if (
    !Route::is([
        'under-maintenance',
        'coming-soon',
        'error-404',
        'error-500',
        'two-step-verification-3',
        'two-step-verification-2',
        'two-step-verification',
        'email-verification-3',
        'email-verification-2',
        'email-verification',
        'password.reset',
        'forgot-password-3',
        'forgot-password-2',
        'password.request',
        'register-3',
        'register-2',
        'register',
        'signin-3',
        'signin-2',
        'signin',
        'success',
        'success-2',
        'success-3',
        'lock-screen',
    ]))
    @include('layout.partials.header')
@endif
@if (
    !Route::is([
        'pos',
        'under-maintenance',
        'coming-soon',
        'error-404',
        'error-500',
        'two-step-verification-3',
        'two-step-verification-2',
        'two-step-verification',
        'email-verification-3',
        'email-verification-2',
        'email-verification',
        'password.reset',
        'forgot-password-3',
        'forgot-password-2',
        'password.request',
        'register-3',
        'register-2',
        'register',
        'signin-3',
        'signin-2',
        'signin',
        'success',
        'success-2',
        'success-3',
        'lock-screen',
    ]))
    @include('layout.partials.sidebar')
    @include('layout.partials.collapsed-sidebar')
    @include('layout.partials.horizontal-sidebar')
@endif
@yield('content')
</div>
<!-- /Main Wrapper -->
@include('layout.partials.theme-settings')
@component('components.modalpopup')
@endcomponent
@include('layout.partials.footer-scripts')

<!-- Mask JS -->
<script src="{{ asset('build/js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('build/js/mask.js') }}"></script>

</body>
</html>
