<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_a_country()
    {
        $city = factory('App\City')->create();

        $this->assertInstanceOf('App\Country', $city->country);
    }

    /** @test */
    public function it_has_many_jobs()
    {
        $city = factory('App\City')->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $city->jobs);
    }

}
