@extends('layouts.master')

@section ('title', 'Cineflix | Login')

@section ('img')
    <img src="https://www.wallpaperbetter.com/wallpaper/355/958/550/tobin-bell-saw-black-face-hd-720P-wallpaper.jpg" class="h-screen w-screen object-cover absolute top-0" style="z-index: -2;">
    <div class="h-screen w-screen absolute top-0 bg-black opacity-50" style="z-index: -1;"></div>
@endsection

@section('content')
<div class="w-2/5 mt-32 mx-auto">
    <div class="text-4xl">{{ __('Login') }}</div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="flex flex-col mt-8">
            <label for="email">{{ __('Email') }}</label>

            <div>
                <input id="email" type="email" class="w-2/3 rounded bg-transparent border px-4 py-2 outline-none mt-2 @error('email') border-red-400 @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                @error('email')
                    <span class="text-red-400 block mt-2" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div class="flex flex-col mt-8">
            <label for="password">{{ __('Password') }}</label>

            <div>
                <input id="password" type="password" class="w-2/3 rounded bg-transparent border px-4 py-2 outline-none mt-2 @error('password') border-red-400 @enderror" name="password" autocomplete="current-password">

                @error('password')
                    <span class="text-red-400 block mt-2" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div class="mt-8 flex items-baseline">
            <input class="mr-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>

        <div class="mt-8">
            <button type="submit" class="border rounded-full border-green-500 hover:border-green-400 text-green-500 hover:text-green-400 transition-color px-4 py-2 mr-8">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a class="text-blue-500 underline transition-color hover:text-blue-400" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </form>
</div>
@endsection
