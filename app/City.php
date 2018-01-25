<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    public function getRouteKeyName() 
    {
        return 'slug';
    }

    public function country() 
    {
        return $this->belongsTo(Country::class);
    }

    public function jobs() 
    {
        return $this->hasMany(Job::class);
    }

}
