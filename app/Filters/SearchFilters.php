<?php 

namespace App\Filters;

use App\Job;
use App\City;
use App\Skill;
use App\Company;
use App\Country;
use Illuminate\Database\Eloquent\Collection;

class SearchFilters extends Filters
{
    
    protected $filters = ['company', 'skill', 'title', 'location'];

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

    public function title($string) 
    {
        $title = ucwords(str_replace('-', ' ', $string));

        return $this->builder->where('title', 'LIKE', "%{$title}%");
    }

    protected function location($slug) 
    {
        $country = Country::where('slug', $slug)->first();
        $countryJobIds = [];

        if ($country) {

            foreach ($country->jobs()->get()->toArray() as $job) {
                $countryJobIds[] = $job['id'];
            }

            return $this->builder->orWhereIn('id', $countryJobIds);
        }

        $city = City::where('slug', $slug)->firstOrFail();
        return $this->builder->where('city_id', $city->id);
    }

}
