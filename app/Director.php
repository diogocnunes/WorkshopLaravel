<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $casts = [
        'birthdate' => 'date:Y-m-d',
    ];

    protected $guarded = [];
}
