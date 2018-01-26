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

    /** @test */
    public function a_user_can_search_for_jobs_by_skill()
    {
        $firstJobWithSkill = factory('App\Job')->create();
        $firstSkill = $firstJobWithSkill->skills()->create(['name' => 'firstskill', 'slug' => 'firstskill']);

        $secondJobWithSkill = factory('App\Job')->create();
        $secondSkill = $secondJobWithSkill->skills()->create(['name' => 'secondskill', 'slug' => 'secondskill']);

        $jobWithoutSkill = factory('App\Job')->create();

        $this->get("/jobs?skill={$firstSkill->slug},{$secondSkill->slug}")
             ->assertSee($firstJobWithSkill->title)
             ->assertSee($secondJobWithSkill->title)
             ->assertDontSee($jobWithoutSkill->title);
    }

    /** @test */
    public function a_user_can_search_for_jobs_by_title()
    {
        $jobWithTitle = factory('App\Job')->create(['title' => 'Front End Developer']);
        $jobNotWithTitle = factory('App\Job')->create();

        $this->get("/jobs?title=front-end")
             ->assertSee($jobWithTitle->title)
             ->assertDontSee($jobNotWithTitle->title);
    }

}
