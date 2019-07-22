<?php

namespace App\Http\Controllers;

use App\Director;

class DirectorsController extends Controller
{
    public function index()
    {
        $directors = Director::all();

        return view('directors.index', compact('directors'));
    }

    public function show(Director $director)
    {
        return view('directors.show', compact('director'));
    }

    public function create()
    {
        return view('directors.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'birthdate' => 'required',
        ]);

        Director::create($data);

        return redirect('/directors');
    }
}
