@extends('templates.master')

@section('title', 'Create Movie')

@section('content')
    <form method="POST" action="/movies">

        @csrf

        <div>
            <input type="text" name="title" placeholder="Título do Filme"/>
        </div>

        <div>
            <textarea name="description" placeholder="Descrição do Filme"></textarea>
        </div>

        <div>
            <input type="text" name="release_date" placeholder="Ano do Filme"/>
        </div>

        <div>
            <button type="submit">Create Movie</button>
        </div>
    </form>
    <div>
        <a href="/movies/">Movies List</a>
    </div>
@endsection
