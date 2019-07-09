<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

</head>
<body>

<div class="wrapper ">
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
                    <a class="nav-link">
                        <i class="material-icons">local_offer</i>
                        <p>Gênero</p>
                    </a>
                    <ul class="list-group">
                        {{ $menu }}
                        <a href="" class="nav-link m-0 py-0"><li class="list-group-item border-bottom">Romântico</li></a>
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
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#login" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">person</i>
                            </a>
                        </li>
                    </ul>
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


</body>

</html>
