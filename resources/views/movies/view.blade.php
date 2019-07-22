@extends('adminlte::page')

@section('title', 'Show Movie')

@section('content_header')
    <h1>Show Movie</h1>
@stop

@section('content')
    <div class="box box-primary">
        <form role="form">

            <input type="hidden" name="id" value="{{ isset($movie) && !empty($movie->id) ? $movie->id : '' }}">

            <div class="box-body">
                <div class="form-group col-md-10">
                    <label>Title</label>
                    <input type="text" name="title" disabled class="form-control" value="{{ isset($movie) && !empty($movie->title) ? $movie->title : '' }}">
                </div>
                <div class="form-group col-md-2">
                    <label>Year</label>
                    <input type="text" name="year" disabled class="form-control" value="{{ isset($movie) && !empty($movie->year) ? $movie->year : '' }}">
                </div>
                <div class="form-group col-md-12">
                    <label>Description</label>
                    <input type="text" name="description" disabled class="form-control" value="{{ isset($movie) && !empty($movie->description) ? $movie->description : '' }}">
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <div class="form-group col-md-12">
                    <a href="{{ route('movies.index') }}" class="btn btn-warning">Back</a>
                </div>
            </div>
        </form>
    </div>
@endsection