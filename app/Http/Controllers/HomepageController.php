<?php

namespace App\Http\Controllers;

class HomepageController extends Controller
{
    public function index()
    {
        return auth()->check() ? view('dashboard') : view('index');
    }
}
