@extends('templates.master')

@section('title', $movie->title)

@section('content')
    <div class="links">
        <ul>
            <li>
               {{$movie->description}}
            </li>
            <li>
               {{$movie->release_date}}
            </li>
        </ul>
    </div>
@endsection