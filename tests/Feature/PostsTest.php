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

        $post = Post::factory()->create();

        $response = $this->followingRedirects()->actingAs($user)->patch('posts/' . $post->id . '/edit', [
            'title' => 'hej',
            'description' => 'hjehejehejeheeheheje',
            'category' => $post->category
        ]);

        $response->assertSeeText('Your post was updated!');

        $this->assertDatabaseHas('posts', [
            'title' => 'hej',
            'description' => 'hjehejehejeheeheheje',
        ]);
    }

    public function test_delete_post()
    {
        $user = User::factory()->create();

        $post = Post::factory()->create();

        $response = $this->followingRedirects()->actingAs($user)->delete('posts/' . $post->id . '/delete');

        $response->assertSeeText('Your post is deleted!');

        $this->assertDatabaseMissing('posts', [
            'id' => $post->id,
        ]);

        $this->assertDatabaseMissing('comments', [
            'post_id' => $post->id,
        ]);
    }
}
