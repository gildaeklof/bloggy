<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CommentsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_comment()
    {

        $this->withoutExceptionHandling();

        /* $user = new User();
        $user->name = 'Mr Robot';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $post = new Post();
        $post->title = 'Hej';
        $post->description = 'testststtststststt';
        $post->image = 'hej.jpg';
        $post->category = 'food';
        $post->user_id = $user->id;
        $post->save(); */

        $post = Post::factory()->create();

        $response = $this->post('comments', [
            'post_id' => $post->id,
            'name' => 'hejhej',
            'comment' => 'Finish writing this test',
        ]);

        $this->assertDatabaseHas('comments', [
            'post_id' => $post->id,
            'title' => 'hejhej',
            'comment' => 'Finish writing this test',
        ]);
    }
}
