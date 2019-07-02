@extends('templates.master')

@section('title', 'Movies')

@section('content')
    <div class="links">
        <a href="/movies/create">New</a>
        <ul>
            @foreach($movies as $movie)
                <li>{{ $movie->title }} {{ $movie->description }} {{ $movie->release_date }}
                    <a href="/movies/{{$movie->id}}">show</a>
                    <a href="/movies/{{$movie->id}}/edit">Edit</a>
                    <form method="POST" action="/movies/{{$movie->id}}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit">deletar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection