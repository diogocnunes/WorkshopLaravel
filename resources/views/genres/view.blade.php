@extends('adminlte::page')

@section('title', 'Show Genre')

@section('content_header')
    <h1>Show Genre</h1>
@stop

@section('content')
    <div class="box box-primary">
        <form role="form">

            <input type="hidden" name="id" value="{{ isset($genre) && !empty($genre->id) ? $genre->id : '' }}">

            <div class="box-body">
                <div class="form-group col-md-10">
                    <label>Name</label>
                    <input type="text" disabled class="form-control" value="{{ isset($genre) && !empty($genre->name) ? $genre->name : '' }}">
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <div class="form-group col-md-12">
                    <a href="{{ route('genres.index') }}" class="btn btn-warning">Back</a>
                </div>
            </div>
        </form>
    </div>
@endsection
