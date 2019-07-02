@extends('templates.master')

@section('title', 'My Movies')

@section('content')
    <div class="links">
        <ul>
            @foreach($movies as $movie)
                <li><a href="/movies/{{ $movie->id }}">{{ $movie->title }}</a></li>
            @endforeach
        </ul>
        <div>
            <a href="/movies/create">New Movie</a>
        </div>
    </div>
@endsection
