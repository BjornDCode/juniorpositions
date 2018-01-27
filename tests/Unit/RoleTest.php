<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_a_category()
    {
        $role = factory('App\Role')->create();

        $this->assertInstanceOf('App\Category', $role->category);
    }

    /** @test */
    public function it_has_many_jobs()
    {
        $role = factory('App\Role')->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $role->jobs);
    }

}
