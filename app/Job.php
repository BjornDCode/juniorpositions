<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    protected $with = ['company', 'skills'];
    
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
        $jobTitleSlug = str_replace(' ', '+', $this->title);
        $companySlug = str_replace(' ', '+', $this->company->name);

        return "https://twitter.com/home?status=${companySlug}+is+looking+for+a+${jobTitleSlug}+in+CITY+{$this->ownUrl()}";
    }

    public function facebookUrl() 
    {
        return "https://www.facebook.com/sharer/sharer.php?u={$this->ownUrl()}";
    }

}
