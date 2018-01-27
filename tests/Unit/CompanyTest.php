<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_many_jobs()
    {
        $company = factory('App\Company')->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $company->jobs);
    }

}
