@extends('templates.master')

@section('title', 'Create Movie')

@section('content')
    <form method="POST" action="/movies/{{ $movie->id }}">

        {{ method_field('PATCH') }}

        @csrf

        <div>
            <input type="text" name="title" placeholder="Título do Filme" value="{{ $movie->title }}"/>
        </div>

        <div>
            <textarea name="description" placeholder="Descrição do Filme">{{ $movie->description }}</textarea>
        </div>

        <div>
            <input type="text" name="release_date" placeholder="Ano do Filme" value="{{ $movie->release_date }}"/>
        </div>

        <div>
            <button type="submit">Update Movie</button>
        </div>
    </form>
    <form method="POST" action="/movies/{{ $movie->id }}">

        {{ method_field('DELETE') }}

        @csrf

        <div>
            <button type="submit">Delete Movie</button>
        </div>
    </form>
    <div>
        <a href="/movies/">Movies List</a>
    </div>
@endsection
