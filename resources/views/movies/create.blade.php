@extends('templates.master')

@section('title', 'Create Movie')

@section('content')
    <div class="links">
        <form method="POST" action="/movies">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Title</label> <input class="form-control" type="text" name="title"/>
            </div>
            <div class="form-group">
                <label>Description</label> <input class="form-control" type="text" name="description"/>
            </div>
            <div class="form-group">
                <label>Release Date</label> <input class="form-control" type="text" name="release_date"/>
            </div>
            <input type="submit"></input>
        </form>
    </div>
@endsection