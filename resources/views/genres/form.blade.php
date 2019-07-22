@extends('adminlte::page')

@section('title', (isset($genre) && !empty($genre->id)) ? 'Edit Genre' : 'Create Genre')

@section('content_header')
    <h1>{{ (isset($genre) && !empty($genre->id)) ? 'Edit Genre' : 'Create Genre' }}</h1>
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
        <form role="form" method="POST" action="{{ (isset($genre) && !empty($genre->id)) ? route('genres.update', $genre->id) : route('genres.store') }}">
            {{ csrf_field() }}
            {{ (isset($genre) && !empty($genre->id)) ? method_field('PUT') : '' }}

            <input type="hidden" name="id" value="{{ isset($genre) && !empty($genre->id) ? $genre->id : '' }}">

            <div class="box-body">
                <div class="form-group col-md-10">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ isset($genre) && !empty($genre->name) ? $genre->name : old('name') }}">
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <div class="form-group col-md-12">
                    <a href="{{ route('genres.index') }}" class="btn btn-warning">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
