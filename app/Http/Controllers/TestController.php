<?php

namespace App\Http\Controllers;

use App\Movie;

class TestController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        $movies = Movie::all();

        //$movies->each->addYear();
        $movies->each->removeYear();

        return $movies->pluck('year', 'title');
    }
}
