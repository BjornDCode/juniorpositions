<?php 

namespace App\Filters;

use App\Job;
use App\Skill;
use App\Company;
use Illuminate\Database\Eloquent\Collection;

class SearchFilters extends Filters
{
    
    protected $filters = ['company', 'skill'];

    protected function company($slug) 
    {
        $company = Company::where('slug', $slug)->firstOrFail();

        return $this->builder->where('company_id', $company->id);
    }

    protected function skill($skills) 
    {
        $skills = explode(',', $skills);

        $results = Skill::whereIn('slug', $skills)->with('jobs')->get()->map(function ($skill) {
            return $skill->jobs;
        })->toArray();

        $jobIds = [];

        foreach ($results as $result) {
            foreach ($result as $job) {
                $jobIds[] = $job['id'];
            }
        }

        return $this->builder->whereIn('id', $jobIds);
    }

}
