<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_many_roles()
    {
        $category = factory('App\Category')->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $category->roles);
    }

    /** @test */
    public function it_has_many_jobs()
    {
        $category = factory('App\Category')->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $category->jobs);
    }

}
