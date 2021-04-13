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
        $response->assertStatus(500);
    }
}
