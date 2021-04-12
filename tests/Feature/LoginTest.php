<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_view_login_form()
    {
        $response = $this->get('login');
        $response->assertSeeText('Email');
        $response->assertStatus(200);
    }
    public function test_login_user()
    {
        $user = new User();
        $user->name = 'Mr Robot';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => 'example@yrgo.se',
                'password' => '123',
            ]);


        $response->assertSeeText('Hello, Mr Robot');
    }

    public function test_login_user_without_password()
    {
        $response = $this->get('login');

        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => 'example@yrgo.se',
                'password' => '',
            ]);

        $response->assertSeeText('The password field is required.');
    }
    public function test_login_user_without_email()
    {
        $response = $this->get('login');

        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => '',
                'password' => '123',
            ]);

        $response->assertSeeText('The email field is required.');
    }
    public function test_login_user_with_incorrect_password()
    {
        $response = $this->get('login');
        $user = new User();
        $user->name = 'Mr Robot';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => 'example@yrgo.se',
                'password' => '124',
            ]);

        $response->assertSeeText('Whoops! Please try again!');
    }
}
