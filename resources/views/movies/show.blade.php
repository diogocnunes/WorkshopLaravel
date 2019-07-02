@extends('templates.master')

@section('title', $movie->title)

@section('content')
    <div class="links">
        <ul>
            <li>Título: {{ $movie->title }}</li>
            <li>Descrição: {{ $movie->description }}</li>
            <li>Ano: {{ $movie->year }}</li>
        </ul>
        <div>
            <a href="/movies/{{ $movie->id }}/edit">Edit</a>
        </div>
        <div>
            <a href="/movies/">Movies List</a>
        </div>
    </div>
@endsection