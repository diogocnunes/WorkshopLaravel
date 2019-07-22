@extends('adminlte::page')

@section('title', 'Movies')

@section('content_header')
    <h1>Movies</h1>
@stop

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a class="btn btn-primary" href="{{ route('movies.create') }}" title="Create Movie">Create</a>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Year</th>
                                <th>Genre</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @if(count($movies) > 0)
                            <tbody>
                                @foreach($movies as $movie)
                                    <tr>
                                        <td>{{ $movie->id }}</td>
                                        <td>{{ $movie->title }}</td>
                                        <td>{{ $movie->description }}</td>
                                        <td>{{ $movie->year }}</td>
                                        <td>{{ $movie->genre->name }}</td>
                                        <td>
                                            <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-sm btn-warning fa fa-edit" title="Edit Movie"></a>
                                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-sm btn-info fa fa-eye" title="View Movie"></a>
                                            <div class="btn-group">
                                                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-sm btn-danger fa fa-remove" title="Delete Movie"></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <div class="alert alert-warning">
                                            Movies not found
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
