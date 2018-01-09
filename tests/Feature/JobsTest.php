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
        $firstJob = factory('App\Job')->create();
        $secondJob = factory('App\Job')->create();

        $this->get('/job/' . $firstJob->id)
             ->assertSee($firstJob->description)
             ->assertDontSee($secondJob->description);
    }

}
