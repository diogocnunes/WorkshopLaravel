@extends('layouts.master')

@section ('title', $movie->title)

@section ('img')
    <img src='{{ $movie->poster }}' class="h-screen w-screen object-cover absolute top-0" style="z-index: -2;"></img>
    <div class="h-screen w-screen absolute top-0 bg-black opacity-50" style="z-index: -1;"></div>
@endsection

@section ('content')
    <div class="mt-20">
        <div>
            <h1 class="text-6xl font-bold uppercase tracking-wide">{{ $movie->title }}</h1>

            <div>
                @foreach ($movie->genres as $genre)
                    <a href="{{ $genre->path() }}" class="inline-block uppercase font-bold text-xs text-blue-400 hover:text-blue-300 tracking-widest mr-6 transition-color">
                        {{ $genre->name }}
                    </a>
                @endforeach
            </div>

            <star-rating icon="star" movie="{{ $movie->id }}" logged-in="{{ auth()->check() }}"></star-rating>

        </div>

        <div class="mt-16 w-3/4">
            <p class="leading-loose text-gray-200">{{ $movie->description }}</p>
        </div>

        <div class="mt-5">
            <p class="text-sm font-bold tracking-wider uppercase mt-6">Director: <span class="ml-2 text-gray-200">{{ $movie->director }}</span></p>
        </div>

        <div class="-ml-4 mt-8">
            <a href="#" class="border-2 px-4 py-3 rounded-full inline-block mx-4 font-semibold focus:outline-none">Watch Trailer</a>

            @auth
                @if (auth()->user()->playlist->contains($movie->id))

                    <form action="/playlist" method="POST" class="inline-block">
                        @csrf
                        @method ('DELETE')

                        <input type="hidden" name="movie_id" value="{{ $movie->id }}">

                        <button type="submit" class="border-2 px-4 py-3 rounded-full inline-block mx-4 font-semibold focus:outline-none">Remove from playlist</button>
                    </form>
                @else
                    <form action="/playlist" method="POST" class="inline-block">
                        @csrf

                        <input type="hidden" name="movie_id" value="{{ $movie->id }}">

                        <button type="submit" class="border-2 px-4 py-3 rounded-full inline-block mx-4 font-semibold focus:outline-none">Add to playlist</button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
@endsection
