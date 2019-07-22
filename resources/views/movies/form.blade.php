@extends('adminlte::page')

@section('title', (isset($movie) && !empty($movie->id)) ? 'Edit Movie' : 'Create Movie')

@section('content_header')
    <h1>{{ (isset($movie) && !empty($movie->id)) ? 'Edit Movie' : 'Create Movie' }}</h1>
@stop

@section('content')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                {!! $error . "<br>" !!}
            @endforeach
        </div>
    @endif

    <div class="box box-primary">
        <form role="form" method="POST" action="{{ (isset($movie) && !empty($movie->id)) ? route('movies.update', $movie->id) : route('movies.store') }}">
            {{ csrf_field() }}
            {{ (isset($movie) && !empty($movie->id)) ? method_field('PUT') : '' }}

            <input type="hidden" name="id" value="{{ isset($movie) && !empty($movie->id) ? $movie->id : '' }}">
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">

            <div class="box-body">
                <div class="form-group col-md-8">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ isset($movie) && !empty($movie->title) ? $movie->title : old('title') }}">
                </div>
                <div class="form-group col-md-2">
                    <label>Year</label>
                    <input type="text" name="year" class="form-control" value="{{ isset($movie) && !empty($movie->year) ? $movie->year : old('year') }}">
                </div>
                <div class="form-group col-md-2">
                    <label>Genres</label>
                    <select name="genre_id" class="form-control">
                        <option>Selecione</option>

                        @foreach($genres as $key => $value)
                            <option value="{{ $key }}" {{ (isset($movie->genre_id) && $movie->genre_id == $key) ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control" value="{{ isset($movie) && !empty($movie->description) ? $movie->description : old('description') }}">
                </div>
            </div>

            <div class="box-footer">
                <div class="form-group col-md-12">
                    <a href="{{ route('movies.index') }}" class="btn btn-warning">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
