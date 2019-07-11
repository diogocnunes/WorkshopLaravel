@extends('templates.master')

@section('title', 'Create Movie')

@section('content')
    <form method="POST" action="/movies">

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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Título do filme</label>
                                    <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Gênero</label>
                                    <select class="form-control" name="genre_id" id="genre_id">
                                        @foreach ($genres as $genre)
                                        <option value="{{ $genre->id }}" @if(old('genre_id') === $genre->id) selected  @endif>{{ $genre->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Ano</label>
                                    <input type="text" name="year" class="form-control" required value="{{ old('ano') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Capa do filme</label>
                                    <input type="text" name="cover" class="form-control" required value="{{ old('cover') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <div class="form-group bmd-form-group">
                                        <textarea class="form-control" name="description" rows="5" required>{{ old('description') }}</textarea>
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

    @if($errors->any())
    <div class="alert alert-warning">
        Erros:
        @foreach($errors->all() as $error)
            {{ $error }}
            @endforeach
    </div>
    @endif
@endsection