<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Post;

class PostsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_create_post()
    {

        $user = User::factory()->create();

        $this->actingAs($user)->post('posts', [
            'title' => 'hejhej',
            'description' => 'Finish writing this test',
            'category' => 'food',
        ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'hejhej',
            'description' => 'Finish writing this test',
            'category' => 'food',
        ]);
    }

    public function test_edit_post()
    {
        $user = User::factory()->create();

        /* $response = $this->actingAs($user)->post('posts', [
            'title' => 'hejhej',
            'description' => 'Finish writing this test',
            'category' => 'food',
        ]); */

        $response = $this->actingAs($user)->patch('posts', [
            'description' => 'hjehejehejeheeheheje',
        ]);

        $response->assertSeeText('Your post was updated!');

        $response = $this->assertDatabaseHas('posts', [
            'description' => 'hjehejehejeheeheheje',
        ]);
    }
}
