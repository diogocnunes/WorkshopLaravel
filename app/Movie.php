<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'description',
        'year',
        'genre_id'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
