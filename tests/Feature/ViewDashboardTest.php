<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewDashboardTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_user_cannot_view_a_dashboard_when_not_authenticated()
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }
}
