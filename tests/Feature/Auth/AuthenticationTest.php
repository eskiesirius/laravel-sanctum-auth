<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function login_requires_validation()
    {
        $response = $this->post('/api/login');

        $response->assertSessionHasErrors(['email', 'password']);
    }

    /** @test */
    public function test_users_can_authenticate()
    {
        $user = User::factory()->create();

        $response = $this->post('/api/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertOk();

        $token = $response->content();

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)->get('/api/user');

        $response->assertOk();
    }

    /** @test */
    public function test_users_cant_authenticate_wrong_password()
    {
        $user = User::factory()->create();

        $response = $this->post('/api/login', [
            'email' => $user->email,
            'password' => 'wrong-password'
        ]);

        $response->assertStatus(422);
    }

    /** @test */
    public function test_users_can_not_access_middleware_not_authenticated()
    {
        $user = User::factory()->create();

        $response = $this->get('/api/user');

        $response->assertStatus(302);
    }
}
