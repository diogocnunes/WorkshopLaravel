@extends('templates.master')

@section('title', 'Create Movie')

@section('content')
    <form method="POST" action="/movies">

        @csrf

        <div>
            <input type="text" name="title" placeholder="Título do Filme" @if($errors->has('title')) class="alert-warning" @endif value="{{ old('title') }}" required/>
        </div>

        <div>
            <textarea name="description" placeholder="Descrição do Filme" required>{{ old('description') }}</textarea>
        </div>

        <div>
            <input type="text" name="year" placeholder="Ano do Filme" value="{{ old('year') }}"/>
        </div>

        <div>
            <button type="submit">Create Movie</button>
        </div>
    </form>
    <div>
        <a href="/movies/">Movies List</a>
    </div>

    @if($errors->any())
    <div class="alert alert-warning">
        Erros:
        @foreach($errors->all() as $error)
            {{ $error }}
            @endforeach
    </div>
    @endif
@endsection