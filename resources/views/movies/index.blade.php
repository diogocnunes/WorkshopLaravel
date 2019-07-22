@extends('layouts.master')

@section ('title', 'All Movies')

@section ('img')
    <img src="https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=3300&q=80" class="h-screen w-screen object-cover absolute top-0" style="z-index: -2;"></img>
    <div class="h-screen w-screen absolute top-0 bg-black opacity-25" style="z-index: -1;"></div>
@endsection
    
@section ('content')
<div class="mt-20">
    <h1 class="uppercase font-bold tracking-wider mx-2">Latest Movies</h1>

    <div class="flex flex-wrap">
        @foreach ($movies as $movie)
            <div class="my-4 mx-2 rounded">
                <a href="{{ $movie->path() }}">
                    <img src="{{ $movie->thumbnail }}" alt="" style="width: 260px; height: 150px; object-fit: cover;" class="rounded-sm shadow">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
