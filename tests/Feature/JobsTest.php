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

}
