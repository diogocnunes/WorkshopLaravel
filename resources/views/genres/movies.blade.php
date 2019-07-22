@extends('adminlte::page')

@section('title', $genre->name . ' Movies')

@section('content_header')
    <h1>{{ $genre->name }} Movies</h1>
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
                    <a class="btn btn-warning" href="{{ route('genres.index') }}" title="Back">Back</a>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Year</th>
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
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <tfoot>
                                <tr>
                                    <td colspan="4">
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
