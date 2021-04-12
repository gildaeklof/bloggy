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
    public function test_create_post()
    {
        $user = new User();
        $user->name = 'Mr Robot';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this
            ->actingAs($user)
            ->post('posts', [
                'description' => 'Finish writing this test'
            ]);

        $this->assertDatabaseHas('posts', ['description' => 'Finish writing this test']);
    }
    /* public function test_edit_post()
    {
        $user = User::factory()->create();
         $post = Post::factory()->create(); 
        $response = $this->actingAs($user)->patch('posts', [PostsController::class, 'editPost'], [
            'description' => 'hjehejehejeheeheheje',
        ]);
        $response->assertSeeText('Your post was updated!');
    } */
}
