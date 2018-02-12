<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $guarded = [];

    public function getRouteKeyName() 
    {
        return 'slug';
    }
    
    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function jobs() 
    {
        return $this->hasMany(Job::class);
    }

}
