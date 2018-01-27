<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SkillTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_many_jobs()
    {
        $skill = factory('App\Skill')->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $skill->jobs);
    }

}
