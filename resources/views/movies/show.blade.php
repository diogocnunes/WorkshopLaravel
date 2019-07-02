@extends('templates.master')

@section('title', $movie->title)

@section('content')
    <div class="links">
        <ul>
            <li>Título: {{ $movie->title }}</li>
            <li>Descrição: {{ $movie->description }}</li>
            <li>Ano: {{ $movie->year }}</li>
        </ul>
    </div>
@endsection