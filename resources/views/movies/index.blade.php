@extends('templates.master')

@section('title', 'Meus filmes')

@section('content')
    <a href="/movies/create"><button class="btn btn-danger btn-round"><i class="material-icons">add_circle_outline</i> adicionar filme</button></a>
    <div class="mt-5">


    @foreach($movies as $movie)
    <div class="col-md-4">
        <a href="/movies/{{ $movie->id }}">
        <div class="card card-movie">
            <div class="card-header">
                <img class="card-img" src="{{ $movie->cover }}" alt="Card image">
            </div>
            <div class="card-body">
                <h1 class="card-title">{{ $movie->title }}</h1>
                <div class="container">
                    <div class="row">
                        <div class="col-4 metadata">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <p>xx/10</p>
                        </div>
                        <div class="col-8 metadata">{{ $movie->year }}</div>
                    </div>
                </div>
                <p class="card-text">{{ $movie->description }}</p>
            </div>
        </div>
        </a>
    </div>
    @endforeach

    </div>
@endsection