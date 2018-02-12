<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $guarded = [];
    
    public function getRouteKeyName() 
    {
        return 'slug';
    }

    public function roles() 
    {
        return $this->hasMany(Role::class);   
    }

    public function jobs() 
    {
        return $this->hasManyThrough(Job::class, Role::class);
    }

}
