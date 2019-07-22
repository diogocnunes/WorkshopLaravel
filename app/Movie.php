<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = [];

    protected $with = ['genres'];

    protected static function boot()
    {
        parent::boot();

        static::saving(static function ($movie) {
            $movie->slug = str_slug($movie->title);
        });
    }

    public function path()
    {
        return '/movies/' . $this->slug;
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function getRouteKeyName()
    {
        return $this->slug;
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }
}
