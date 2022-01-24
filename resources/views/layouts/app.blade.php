<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('css/animation.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>
        @yield('css')
    </head>
    <body class="{{ (Route::currentRouteName() == 'login' || Route::currentRouteName() == 'register' || Route::currentRouteName() == 'password.request' || Route::currentRouteName() == 'password.update' || Route::currentRouteName() == 'password.reset') ? 'bg-dark shape-1' : ''}}">
      @include('layouts.alert')
      @include('layouts.modal')
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div id="app">
        <div class="row g-0">
            @guest
            @else
            @if(Auth::user()->hasRole('owner') || Auth::user()->hasRole('admin'))
            <div class="col-md-2 bg-dark min-vh-100">
            <div class="sticky-top">
            <nav class="navbar navbar-light bg-primary text-center">
              <div class="container">
                <a class="navbar-brand mx-auto" href="{{ route(Auth::user()->roles[0]->name) }}">
                  <img src="{{ asset('img/logo-2.png') }}" alt="" width="100" class="opacity-0">
                </a>
              </div>
            </nav>
            <div class="list-group list-group-flush nav-admin">
                <a href="{{ route(Auth::user()->roles[0]->name) }}" class="list-group-item list-group-item-action"><i class='bx bxl-tailwind-css me-3'></i>Dashboard</a>
                <a href="javascript:void(0)" class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-target="#nav-1" aria-expanded="false">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class='bx bxs-message-square-dots me-3'></i>Artikel
                        </div>
                        <div>
                            <i class='bx bxs-chevron-down'></i>
                        </div>
                    </div>
                </a>
                <div class="collapse" id="nav-1" style="">
                  <div class="list-group list-group-flush nav-admin">
                    <a href="{{ route(Auth::user()->roles[0]->name . '.blog') }}" class="list-group-item list-group-item-action">
                      <i class="bi bi-dot me-3"></i>List Artikel
                    </a>
                    <a href="{{ route(Auth::user()->roles[0]->name . '.blog_new') }}" class="list-group-item list-group-item-action">
                      <i class="bi bi-dot me-3"></i>Create Artikel
                    </a>
                  </div>
                </div>
                <a href="javascript:void(0)" class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-target="#nav-2" aria-expanded="false">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class='bx bxs-user me-3'></i>Users
                        </div>
                        <div>
                            <i class='bx bxs-chevron-down'></i>
                        </div>
                    </div>
                </a>
                <div class="collapse" id="nav-2" style="">
                  <div class="list-group list-group-flush nav-admin">
                    <a href="{{ route(Auth::user()->roles[0]->name.'.user') }}" class="list-group-item list-group-item-action">
                      <i class="bi bi-dot me-3"></i>List User
                    </a>
                    @if(Auth::user()->hasRole('owner'))
                    <a href="{{ route('owner.user_new') }}" class="list-group-item list-group-item-action">
                      <i class="bi bi-dot me-3"></i>Create User
                    </a>
                    @endif
                  </div>
                </div>
                @if(Auth::user()->hasRole('owner'))
                <a href="javascript:void(0)" class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-target="#nav-3" aria-expanded="false">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class='bx bxs-calendar-alt me-3'></i>Event
                        </div>
                        <div>
                            <i class='bx bxs-chevron-down'></i>
                        </div>
                    </div>
                </a>
                <div class="collapse" id="nav-3" style="">
                  <div class="list-group list-group-flush nav-admin">
                  @php
                    $eve = App\Event::all();
                    @endphp
                  @if(count($eve))
                    <a href="{{ route('owner.event') }}" class="list-group-item list-group-item-action">
                      <i class="bi bi-dot me-3"></i>Detail Event
                    </a>
                    @endif
                    @if(Auth::user()->hasRole('owner'))
                    @if(!count($eve))
                    <a href="{{ route('owner.event_new') }}" class="list-group-item list-group-item-action">
                      <i class="bi bi-dot me-3"></i>Create Event
                    </a>
                    @endif
                    @endif
                  </div>
                </div>
                @endif
            </div>
            </div>
            </div>
            @endif
            @endguest
            @guest
            <div class="col-md">
            @else
            <div class="col-md-10">
            @endguest
            @guest
            @else
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4 sticky-top">
  <div class="container">
    <a class="navbar-brand title-2" href="{{ route(Auth::user()->roles[0]->name) }}">
      <!-- <img src="https://dummyimage.com/800x300" alt="" width="100"> -->
      Dashboard
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 nav-top">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Artikel</a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="py-1 btn btn-primary align-items-center d-flex" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class='bx bx-chevron-down me-1'></i>Account Page
          </a>
          <ul class="dropdown-menu title-2 dropdown-menu-dark mt-3 dropdown-menu-end fade-in-top" aria-labelledby="navbarDropdown">
            @guest
            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('register') }}">register</a></li>
            @else
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalOut">Logout</a>
          </li>
            <!-- <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
          </li> -->
          @endguest
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
            @endguest
            <div class="p-3">
              @yield('content')
            </div>
            </div>
        </div>
    
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('js')
    <script>
      $('.dt-button').addClass('btn btn-primary');
    </script>
</body>
</html>
