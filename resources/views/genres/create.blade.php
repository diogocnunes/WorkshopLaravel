@extends('templates.master')

@section('title', 'Create Genre')

@section('content')
    <form method="POST" action="/genres">

        @csrf

        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-danger">
                    <h4 class="card-title">Adicionar gênero</h4>
                    <p class="card-category">Preencha todos os campos</p>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nome</label>
                                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
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