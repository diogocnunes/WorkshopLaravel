@extends ('layouts.master')

@section ('title', 'Cineflix | {{ $director->name }}')

@section ('content')
    <h2>{{ $director->name }}</h2>
@endsection
