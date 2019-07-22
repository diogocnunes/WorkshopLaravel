<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Cineflix')</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-900 text-white font-sans relative">
    <div id="app">
        @include('layouts.navbar')

        <div class="container mx-auto">
            @yield('content')
        </div>

        @auth
            <side-menu current-route="{{ request()->path() }}" avatar="{{ auth()->user()->avatar() }}"></side-menu>
        @endauth

        @yield('modals')
    </div>   


    @yield('img')

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
