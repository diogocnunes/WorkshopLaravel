<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="danger" data-background-color="white" data-image="{{ asset('img/avengers.jpg   ') }}">
        <div class="logo">
            <a href="/" class="simple-text logo-normal">
                <i class="material-icons mr-2 text-danger">play_circle_filled</i>My Movies
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="/">
                        <i class="material-icons">home</i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('movies*') ? 'active' : '' }}">
                    <a class="nav-link" href="/movies">
                        <i class="material-icons">movies</i>
                        <p>Filmes</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('genre*') ? 'active' : '' }}">
                    <div class="d-flex flex-row justify-content-end position-absolute container z-index-1" style="z-index: 1">
                        <a href="/genres/create" class="btn {{ !Request::is('genre*') ? 'btn-danger text-white' : 'btn-white text-danger' }} rounded-circle btn-sm my-1" role="button">+</a>
                    </div>
                    <a class="nav-link {{ !Request::is('genre*') ? 'bg-light' : '' }}">
                        <i class="material-icons">local_offer</i>
                        <p>Gênero</p>
                    </a>
                    <ul class="list-group">
                        @foreach($menu as $item)
                        <a href="" class="nav-link m-0 py-0"><li class="nav-item list-group-item border-bottom py-2">{{ $item->name }}</li></a>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand">@yield('title')</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->full_name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>
