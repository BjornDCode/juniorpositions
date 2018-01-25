<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    
    protected $guarded = [];

    public function getRouteKeyName() 
    {
        return 'slug';
    }

    public function jobs() 
    {
        return $this->belongsToMany(Job::class);
    }

}
