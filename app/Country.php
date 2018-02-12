<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    
    protected $guarded = [];

    public function getRouteKeyName() 
    {
        return 'slug';
    }

    public function jobs() 
    {
        return $this->hasManyThrough(Job::class, City::class);
    }

    public function cities() 
    {
        return $this->hasMany(City::class);
    }

}
