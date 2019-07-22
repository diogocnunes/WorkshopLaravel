@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Bem vindo {{ Auth::user()->name }}</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    
                </div>
            </div>
        </div>
    </div>
@endsection
