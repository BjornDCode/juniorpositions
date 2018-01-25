<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchJobsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_search_for_jobs_by_company()
    {
        
        $company = factory('App\Company')->create();
        $jobAtCompany = factory('App\Job')->create(['company_id' => $company->id]);
        $jobNotAtCompany = factory('App\Job')->create();

        $this->get("/jobs?company={$company->slug}")
             ->assertSee($jobAtCompany->title)
             ->assertDontSee($jobNotAtCompany->title);

    }

}
