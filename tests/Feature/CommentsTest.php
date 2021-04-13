<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Comment;
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
        $response = $this->followingRedirects()->post('comments', [
            'post_id' => 1,
            'name' => 'hejhej',
            'comment' => 'Finish writing this test',
        ]);

        $this->assertDatabaseHas('comments', [
            'post_id' => 1,
            'name' => 'hejhej',
            'comment' => 'Finish writing this test',
        ]);

        $response->assertSeeText('Your comment was created!');
    }

    public function test_delete_comment()
    {
        $user = User::factory()->create();

        $comment = Comment::factory()->create();

        $response = $this->followingRedirects()->actingAs($user)->delete('comment/' . $comment->id . '/delete');

        $response->assertSeeText('Your comment is deleted!');

        $this->assertDatabaseMissing('comments', [
            'id' => $comment->id,
        ]);
    }
}
