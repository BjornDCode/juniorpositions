<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_belongs_to_a_company()
    {
        $job = factory('App\Job')->create();

        $this->assertInstanceOf('App\Company', $job->company);
    }

    /** @test */
    public function it_contains_many_skills() 
    {
        $job = factory('App\Job')->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $job->skills);
    }

}
