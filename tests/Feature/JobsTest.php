<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobsTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function a_user_can_browser_all_jobs()
    {
        // Given we have two jobs
        $firstJob = factory('App\Job')->create();
        $secondJob = factory('App\Job')->create();

        // And the user browse to the front page
        $this->get('/')
             ->assertSee($firstJob->title)
             ->assertSee($secondJob->title);

        // We expect to see the title of the jobs
    }

}
