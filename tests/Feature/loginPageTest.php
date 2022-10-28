<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class loginPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_login_using_login_form()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email, 'password' => 'jason123'
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/admin/dashboard');
    }

    public function test_user_cannot_access_admin_page()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email, 'password' => 'jason123'
        ]);

        $this->get('/admin/users');

        $response->assertRedirect('/');
    }

    public function test_user_can_access_admin_page()
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);

        $this->post('/login', [
            'email' => $user->email, 'password' => 'jason123'
        ]);

        $response =  $this->get('/admin/users');

        $response->assertRedirect('/admin/dashboard');
    }
}