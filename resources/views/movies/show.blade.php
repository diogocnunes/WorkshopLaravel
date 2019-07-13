@extends('templates.master')

@section('title', $movie->title)

@section('content')

    <div class="row">
        <div class="col-3"><img src="{{ asset($movie->cover) }})" class="img-thumbnail"></div>
        <div class="col-9">
            <h2>{{ $movie->title }}</h2>
            <div class="d-flex justify-content-between">
                <div>{{ $movie->year }} | genre</div>
                <div class="metadata">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <p>xx/5</p>
                </div>
            </div>
            <span>{{ $movie->description }}</span>
        </div>

        @can('view', $movie)
            <div class="btn btn-danger">
                <a href="/movies/{{ $movie->id }}/edit">Edit</a>
            </div>
            @endcan
        @cannot('view', $movie)
            <div class="btn btn-danger">
                NÃO PODE EDITAR!!!!
            </div>
        @endcannot
        <div class="btn btn-facebook">
            <a href="/movies/">Movies List</a>
        </div>
    </div>
@endsection