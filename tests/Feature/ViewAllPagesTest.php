<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewAllPagesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_view_index_page()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_view_posts_with_category_food_page()
    {
        $response = $this->get('/food');
        $response->assertStatus(200);
    }

    public function test_view_posts_with_category_interior_page()
    {
        $response = $this->get('/interior');
        $response->assertStatus(200);
    }

    public function test_view_posts_with_category_lifestyle_page()
    {
        $response = $this->get('/lifestyle');
        $response->assertStatus(200);
    }

    public function test_view_posts_with_category_fashion_page()
    {
        $response = $this->get('/fashion');
        $response->assertStatus(200);
    }
}
