<!-- Header -->
<div class="header">
    <!-- Logo -->
    <div class="header-left active">
        <a href="{{ url('index') }}" class="logo logo-normal">
            <img src="{{ URL::asset('/build/img/logo.svg') }}" alt="">
        </a>
        <a href="{{ url('index') }}" class="logo logo-white">
            <img src="{{ URL::asset('/build/img/logo-white.png') }}" alt="">
        </a>
        <a href="{{ url('index') }}" class="logo-small">
            <img src="{{ URL::asset('/build/img/logo-small.png') }}" alt="">
        </a>
        <a id="toggle_btn" href="javascript:void(0);">
            <i data-feather="chevrons-left" class="feather-16"></i>
        </a>
    </div>
    <!-- /Logo -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Menu -->
    <ul class="nav user-menu">

        <!-- Search -->
        <li class="nav-item nav-searchinputs">
            <div class="top-nav-search">
                <a href="javascript:void(0);" class="responsive-search">
                    <i class="fa fa-search"></i>
                </a>
                <form action="#" class="dropdown">
                    <div class="searchinputs dropdown-toggle" id="dropdownMenuClickable" data-bs-toggle="dropdown"
                        data-bs-auto-close="false">
                        <input type="text" placeholder="Procurar">
                        <div class="search-addon">
                            <span><i data-feather="x-circle" class="feather-14"></i></span>
                        </div>
                    </div>
                    <div class="dropdown-menu search-dropdown" aria-labelledby="dropdownMenuClickable">
                        {{-- <div class="search-info">
                            <h6><span><i data-feather="search" class="feather-16"></i></span>Mais procurados
                            </h6>
                            <ul class="search-tags">
                                <li><a href="javascript:void(0);">Contratar</a></li>
                                <li><a href="javascript:void(0);">Demitir</a></li>
                                <li><a href="javascript:void(0);">Férias</a></li>
                            </ul>
                        </div> --}}
                        <div class="search-info">
                            <h6><span><i data-feather="help-circle" class="feather-16"></i></span>Ajuda</h6>
                            <p>Procure suporte digitando palavras-chave acerca do tema que gostaria de ajuda. </p>
                            <p>Fale com nossos especialistas.</p>
                        </div>
                        <div class="search-info">
                            <h6><span><i data-feather="user" class="feather-16"></i></span>Fale com o suporte</h6>
                            <ul class="customers">
                                <li>
                                    <a href="javascript:void(0);" class="d-flex justify-content-start">
                                        <img src="{{ URL::asset('/build/img/profiles/avator1.jpg') }}" alt=""
                                            class="img-fluid">
                                        <h6>Fiscal</h6>
                                        <p>retenções, tributação, alíquotas...
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="d-flex justify-content-start">
                                        <img src="{{ URL::asset('/build/img/profiles/avator1.jpg') }}" alt=""
                                            class="img-fluid">
                                        <h6>Trabalhista<br></h6>
                                        <p>folha, rescisão, férias...
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="d-flex justify-content-start">
                                        <img src="{{ URL::asset('/build/img/profiles/avator1.jpg') }}" alt=""
                                            class="img-fluid">
                                        <h6>Contábil<br></h6>
                                        <p>balanços, DRE, licitação...
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <!-- /Search -->


        {{-- <!-- Select Filial -->
        <li class="nav-item dropdown has-arrow main-drop select-store-dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link select-store" data-bs-toggle="dropdown">
                <span class="user-info">
                    <span class="user-letter">
                        <img src="{{ URL::asset('/build/img/store/store-01.png') }}" alt="Store Logo"
                            class="img-fluid">
                    </span>
                    <span class="user-detail">
                        <span class="user-name">Select Store</span>
                    </span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="{{ URL::asset('/build/img/store/store-01.png') }}" alt="Store Logo" class="img-fluid">
                    Grocery Alpha
                </a>
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="{{ URL::asset('/build/img/store/store-02.png') }}" alt="Store Logo" class="img-fluid">
                    Grocery Apex
                </a>
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="{{ URL::asset('/build/img/store/store-03.png') }}" alt="Store Logo" class="img-fluid">
                    Grocery Bevy
                </a>
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="{{ URL::asset('/build/img/store/store-04.png') }}" alt="Store Logo" class="img-fluid">
                    Grocery Eden
                </a>
            </div>
        </li>
        <!-- /Select Store --> --}}

        <li class="nav-item nav-item-box">
            <a href="javascript:void(0);" id="btnFullscreen">
                <i data-feather="maximize"></i>
            </a>
        </li>
        {{-- <li class="nav-item nav-item-box">
            <a href="{{ url('email') }}">
                <i data-feather="mail"></i>
                <span class="badge rounded-pill">1</span>
            </a>
        </li> --}}
        <!-- Notifications -->
        @php
            $notifications = \App\Models\Notification::where('seen', 0)->latest()->take(10)->get();
        @endphp
        <li class="nav-item dropdown nav-item-box">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <i data-feather="bell"></i>
                <span
                    class="notification_beep {{ count($notifications) > 0 ? 'badge rounded-pill' : '' }}"><span>{{ count($notifications) > 0 ? count($notifications) : '' }}</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notificações</span>
                    <a href="{{ route('clear-notification') }}" class="clear-noti"> Limpar tudo </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list guia_notification">
                        @foreach ($notifications as $notification)
                            <li class="notification-message">
                                <a href="{{ url('activities') }}">
                                    <div class="media d-flex">
                                        <span class="avatar flex-shrink-0">
                                            <img alt=""
                                                src="{{ URL::asset('/build/img/profiles/avatar-02.jpg') }}">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">Guilherme - fiscal</span>
                                                {{ $notification->message }} <span class="noti-title">Simples
                                                    Nacional</span>
                                            </p>
                                            <p class="noti-time"><span
                                                    class="notification-time">{{ date('H:i | d-m-Y', strtotime($notification->created_at)) }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="{{ route('view-all-notification') }}">Ver todas as notificações</a>
                </div>
            </div>
        </li>
        <!-- /Notifications -->
        <!-- user -->
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                <span class="user-info">
                    <span class="user-letter">
                        <img src="{{ URL::asset('/build/img/profiles/profile-01.png') }}" alt=""
                            class="img-fluid">
                    </span>
                    <span class="user-detail">
                         <span class="user-name">{{ auth()->user()->name }}</span>
                        <span class="user-role">34.391.002/0001-70</span>
                    </span>
                </span>
            </a>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilename">
                    <div class="profileset">
                        <span class="user-img"><img src="{{ URL::asset('/build/img/profiles/profile-01.png') }}"
                                alt="">
                            <span class="status online"></span></span>
                        <div class="profilesets">
                            <h6>Guilherme</h6>
                            <h5>Fiscal</h5>
                        </div>
                    </div>
                    <hr class="m-0">
                  {{--  <a class="dropdown-item" href="{{ url('profile') }}" -->> <i class="me-2"
                            data-feather="user"></i> Meu cadastro</a>
                    <a class="dropdown-item" href="{{ url('general-settings') }}"><i class="me-2"
                            data-feather="settings"></i>Configurações</a>
                    <hr class="m-0">--}}
                    <a class="dropdown-item logout pb-0" href="{{ route('signout') }}"><img
                            src="{{ URL::asset('/build/img/icons/log-out.svg') }}" class="me-2"
                            alt="img">Encerrar</a>
                </div>
            </div>
        </li>
    </ul>

    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ url('#') }}">Em desenvolvimento...</a>
           {{-- <a class="dropdown-item" href="{{ url('profile') }}">My Profile</a>
            <a class="dropdown-item" href="{{ url('general-settings') }}">Settings</a>
            <a class="dropdown-item" href="{{ url('signin') }}">Logout</a>--}}
        </div>
    </div>
    <!-- /Mobile Menu -->
</div>
<!-- /Header -->
