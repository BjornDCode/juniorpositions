<?php

namespace App;

use Laravel\Scout\Searchable;
use App\Filters\SearchFilters;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use Searchable;

    protected $with = ['company', 'skills', 'city', 'city.country', 'role', 'role.category'];

    protected $guarded = [];

    
    public function company() 
    {
        return $this->belongsTo(Company::class);
    }

    public function skills() 
    {
        return $this->belongsToMany(Skill::class);
    }

    public function city() 
    {
        return $this->belongsTo(City::class);
    }

    public function role() 
    {
        return $this->belongsTo(Role::class);
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
