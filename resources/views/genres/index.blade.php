@extends('adminlte::page')

@section('title', 'Genres')

@section('content_header')
    <h1>Genres</h1>
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
                    <a class="btn btn-primary" href="{{ route('genres.create') }}" title="Create Genre">Create</a>
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
                                <th>Name</th>
                                <th class="col-md-2">Actions</th>
                            </tr>
                        </thead>
                        @if(count($genres) > 0)
                            <tbody>
                                @foreach($genres as $genre)
                                    <tr>
                                        <td>{{ $genre->id }}</td>
                                        <td>{{ $genre->name }}</td>
                                        <td>
                                            <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-sm btn-warning fa fa-edit" title="Edit Genre"></a>
                                            <a href="{{ route('genres.show', $genre->id) }}" class="btn btn-sm btn-info fa fa-eye" title="View Genre"></a>
                                            <a href="{{ route('genres.movies', $genre->id) }}" class="btn btn-sm btn-success fa fa-video-camera" title="View Movies"></a>
                                            <div class="btn-group">
                                                <form action="{{ route('genres.destroy', $genre->id) }}" method="POST">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-sm btn-danger fa fa-remove" title="Delete Genre"></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <tfoot>
                                <tr>
                                    <td colspan="3">
                                        <div class="alert alert-warning alert-dismissible">
                                            Genres not found
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
