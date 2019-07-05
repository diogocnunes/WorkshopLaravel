@extends('templates.master')

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">movies</i>
                    </div>
                    <p class="card-category">Filmes registados</p>
                    <h3 class="card-title">xx</h3>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">star</i>
                    </div>
                    <p class="card-category">Média</p>
                    <h3 class="card-title">4.5</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">visibility_off</i>
                    </div>
                    <p class="card-category">Faltam assistir</p>
                    <h3 class="card-title">xx</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">visibility</i>
                    </div>
                    <p class="card-category">Assistidos</p>
                    <h3 class="card-title">+xx</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection