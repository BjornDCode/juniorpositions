<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CountryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_many_jobs()
    {
        $country = factory('App\Country')->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $country->jobs);
    }

}
