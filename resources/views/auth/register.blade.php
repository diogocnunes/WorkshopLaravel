@extends('layouts.master')

@section ('title', 'Cineflix | Sign Up')

@section ('img')
    <img src="https://images.alphacoders.com/787/thumb-1920-787294.png" class="h-screen w-screen object-cover absolute top-0" style="z-index: -2;">
    <div class="h-screen w-screen absolute top-0 bg-black opacity-50" style="z-index: -1;"></div>
@endsection

@section('content')
<div class="w-2/5 mt-32 mx-auto">
    <div class="text-4xl">{{ __('Register') }}</div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="flex flex-col mt-8">
            <label for="name">{{ __('Name') }}</label>

            <div>
                <input id="name" type="text" class="w-2/3 rounded bg-transparent border px-4 py-2 outline-none mt-2 @error('name') border-red-400 @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                @error('name')
                    <span class="text-red-400 block mt-2" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div class="flex flex-col mt-8">
            <label for="email">{{ __('E-Mail Address') }}</label>

            <div>
                <input id="email" type="email" class="w-2/3 rounded bg-transparent border px-4 py-2 outline-none mt-2 @error('email') border-red-400 @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

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
                <input id="password" type="password" class="w-2/3 rounded bg-transparent border px-4 py-2 outline-none mt-2 @error('password') border-red-400 @enderror" name="password" autocomplete="new-password">

                @error('password')
                    <span class="text-red-400 block mt-2" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div class="flex flex-col mt-8">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>

            <div>
                <input id="password-confirm" type="password" class="w-2/3 rounded bg-transparent border px-4 py-2 outline-none mt-2" name="password_confirmation" autocomplete="new-password">
            </div>
        </div>

        <div class="mt-8">
            <button type="submit" class="border rounded-full border-green-500 hover:border-green-400 text-green-500 hover:text-green-400 transition-color px-4 py-2 mr-8">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</div>
@endsection
