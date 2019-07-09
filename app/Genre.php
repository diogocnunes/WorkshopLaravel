<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $guarded = [];

    public function getMenu() {

        $genres = App\Genre::all();
        return $genres;

    }
}
