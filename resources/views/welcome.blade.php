@extends('templates.master')

@section('title', 'My Favorite Movies')

@section('content')
    <div class="links">
        <ul>
            @foreach($movies as $movie)
                <li>{{ $movie }}</li>
            @endforeach
        </ul>
    </div>
@endsection