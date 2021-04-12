<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LogoutTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_logout_user()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->followingRedirects()->get('logout');

        $response->assertSeeText('You are logged out. Come again!');
    }
}
