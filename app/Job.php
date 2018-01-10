<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    
    public function company() 
    {
        return $this->belongsTo(Company::class);
    }

    public function skills() 
    {
        return $this->belongsToMany(Skill::class);
    }

    public function ownUrl() 
    {
        return url('/') . '/job/' . $this->id;
    }

    public function twitterUrl() 
    {
        $jobTitleSlug = str_slug($this->title, '+');
        return "https://twitter.com/home?status=Company+is+looking+for+a+${jobTitleSlug}+in+City+{$this->ownUrl()}";
    }

    public function facebookUrl() 
    {
        return "https://www.facebook.com/sharer/sharer.php?u={$this->ownUrl()}";
    }

}
