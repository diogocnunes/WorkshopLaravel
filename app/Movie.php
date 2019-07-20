<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{


    protected $guarded = [];

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    /**
     * Remove one year
     *
     * @return void
     */
    public function removeYear(): void
    {
        --$this->year;
        $this->save();
    }

    /**
     * Add one year
     *
     * @return void
     */
    public function addYear(): void
    {
        ++$this->year;
        $this->save();
    }

}
