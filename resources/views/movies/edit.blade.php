@extends('templates.master')

@section('title', 'MovieResource')

@section('content')
    <form method="POST" action="/movies/{{ $movie->id }}">

        {{ method_field('PATCH') }}

        @csrf

        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-danger">
                    <h4 class="card-title">Adicionar filme</h4>
                    <p class="card-category">Preencha todos os campos</p>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Título do filme</label>
                                    <input type="text" name="title" class="form-control" required value="{{ $movie->title }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Genre</label>
                                    <select class="form-control" name="genre_id" id="genre_id">
                                        @foreach ($genres as $genre)
                                            <option value="{{ $genre->id }}" @if($movie->genre_id === $genre->id) selected  @endif>{{ $genre->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Ano</label>
                                    <input type="text" name="year" class="form-control" required value="{{ $movie->year }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Capa do filme</label>
                                    <input type="text" name="cover" class="form-control" required value="{{ $movie->cover }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <div class="form-group bmd-form-group">
                                        <textarea class="form-control" name="description" rows="5" required >{{ $movie->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger pull-right">Salvar</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
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