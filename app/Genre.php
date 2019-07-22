<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $guarded = [];

    public function path()
    {
        return '/genres/' . $this->slug;
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }

    public function getSlugAttribute()
    {
        return str_slug($this->name);
    }

    public function getRouteKeyName()
    {
        return $this->slug;
    }
}
