@extends('templates.master')

@section('title', 'Edit Movie')

@section('content')
    <div class="links">
        <form method="POST" action="/movies/{{$movie->id}}">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label>Title</label> <input class="form-control" type="text" name="title" value="{{$movie->title}}"/>
            </div>
            <div class="form-group">
                <label>Description</label> <input class="form-control" type="text" value="{{$movie->description}}" name="description"/>
            </div>
            <div class="form-group">
                <label>Release Date</label> <input class="form-control" type="text" value="{{$movie->release_date}}" name="release_date"/>
            </div>
            <input type="submit"></input>
        </form>
    </div>
@endsection