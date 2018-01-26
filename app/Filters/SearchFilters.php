<?php 

namespace App\Filters;

use App\Company;

class SearchFilters extends Filters
{
    
    protected $filters = ['company'];

    protected function company($slug) 
    {
        $company = Company::where('slug', $slug)->firstOrFail();

        return $this->builder->where('company_id', $company->id);
    }

}
