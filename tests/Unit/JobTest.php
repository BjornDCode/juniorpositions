<?php

namespace Tests\Unit;

use Tests\TestCase;
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

    /** @test */
    public function it_belongs_to_a_city()
    {
        $job = factory('App\Job')->create();

        $this->assertInstanceOf('App\City', $job->city);
    }

    /** @test */
    public function it_belongs_to_a_role()
    {
        $job = factory('App\Job')->create();

        $this->assertInstanceOf('App\Role', $job->role);
    }

    /** @test */
    public function it_knows_its_own_url()
    {
        $job = factory('App\Job')->create();

        $testUrl = url('/') . '/job/' . $job->id;

        $this->assertEquals($testUrl, $job->ownUrl());
    }

    /** @test */
    public function it_can_create_a_twitter_share_url()
    {
        $job = factory('App\Job')->create();

        $jobTitleSlug = str_replace(' ', '+', $job->title);
        $companySlug = str_replace(' ', '+', $job->company->name);

        $testUrl = "https://twitter.com/home?status=${companySlug}+is+looking+for+a+${jobTitleSlug}+in+CITY+{$job->ownUrl()}";

        $this->assertEquals($testUrl, $job->twitterUrl());
    }

    /** @test */
    public function it_can_create_a_facebook_share_url()
    {
        $job = factory('App\Job')->create();

        $testUrl = "https://www.facebook.com/sharer/sharer.php?u={$job->ownUrl()}";

        $this->assertEquals($testUrl, $job->facebookUrl());
    }

}
