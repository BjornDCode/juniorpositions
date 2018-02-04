<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authenticated_user_can_access_the_admin_area()
    {
        $adminUser = factory('App\User')->create();

        $this->actingAs($adminUser)
             ->get('/admin')
             ->assertStatus(200);
    }

    /** @test */
    public function a_visitor_cannot_access_the_admin_area()
    {
        $this->get('/admin')
             ->assertRedirect('/admin/login');
    }

}
