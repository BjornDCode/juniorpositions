<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobsTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function a_user_can_browse_all_jobs()
    {
        $firstJob = factory('App\Job')->create();
        $secondJob = factory('App\Job')->create();

        $this->get('/')
             ->assertSee($firstJob->title)
             ->assertSee($secondJob->title);
    }

    /** @test */
    public function a_user_can_view_a_single_job()
    {
        
        $job = factory('App\Job')->create();

        $this->get('/job/' . $job->id)
             ->assertSee($job->title);

    }
    
    /** @test */
    public function a_user_can_filter_jobs_by_jobtype()
    {
        $category = factory('App\Category')->create(['id' => 1]);
        $jobInCategory = factory('App\Job')->create(['category_id' => $category->id]);
        $jobNotInCategory = factory('App\Job')->create(['category_id' => 2]);

        $this->get("/{$category->title}")
             ->assertSee($jobInCategory->title)
             ->assertDontSee($jobNotInCategory->title);
    }

    /** @test */
    public function a_user_can_filter_jobs_by_company()
    {
        $company = factory('App\Company')->create();
        $jobAtCompany = factory('App\Job')->create(['company_id' => $company->id]);
        $jobNotAtCompany = factory('App\Job')->create();

        $this->get("/company/{$company->slug}")
             ->assertSee($jobAtCompany->title)
             ->assertDontSee($jobNotAtCompany->title);
    }

    /** @test */
    public function a_user_can_filter_jobs_by_city()
    {
        $city = factory('App\City')->create();
        $jobInCity = factory('App\Job')->create(['city_id' => $city->id]);
        $jobNotInCity = factory('App\Job')->create();

        $this->get("/location/{$city->country->slug}/{$city->slug}")
             ->assertSee($jobInCity->title)
             ->assertDontSee($jobNotInCity->title);
    }

    /** @test */
    public function a_user_can_filter_jobs_by_country()
    {
        $city = factory('App\City')->create();
        $jobInCountry = factory('App\Job')->create(['city_id' => $city->id]);
        $jobNotInCountry = factory('App\Job')->create();

        $this->get("/location/{$city->country->slug}")
             ->assertSee($jobInCountry->title)
             ->assertDontSee($jobNotInCountry->title);

    }

    /** @test */
    public function a_user_can_filter_jobs_by_skills()
    {
        $jobWithSkill = factory('App\Job')->create();
        $skill = $jobWithSkill->skills()->create(['name' => 'skill', 'slug' => 'skill']);

        $jobNotWithSkill = factory('App\Job')->create();
        
        $this->get("/skill/{$skill->slug}")
             ->assertSee($jobWithSkill->title)
             ->assertDontSee($jobNotWithSkill->title);

    }

}
